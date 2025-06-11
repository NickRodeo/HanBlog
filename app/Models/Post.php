<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
   use HasFactory, Sluggable;
   
   protected $guarded = ["id"];

   public function category()
   {
      return $this->belongsTo(Category::class);
   }

   public function author()
   {
      return $this->belongsTo(User::class, "user_id");
   }

   public function scopeFilters($query, array $filters)
   {
      $query->when($filters["search"] ?? false, function($query, $search) {
         return $query->where(function($query) use ($search) {
             $query->where("title", "LIKE", '%'. $search .'%')
                   ->orWhere("body", "LIKE", '%'. $search .'%');
         });
      }); 
      
      $query->when($filters["category"] ?? false, function($query, $category){
         return $query->whereHas("category", function($query) use ($category){
            return $query->where("slug", "=", $category);
         });
      });

      $query->when($filters["author"] ?? false, function($query, $author){
         return $query->whereHas("author", function($query) use ($author){
            return $query->where("slug", "=", $author);
         });
      });
   }

   public function getRouteKeyName()
   {
      return 'slug';
   }

   public function sluggable(): array
   {
       return [
           'slug' => [
               'source' => 'title',  
               // 'onUpdate' => true  
           ]
       ];
   }
}

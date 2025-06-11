@extends('layouts/main')

@section('title', 'Categories')

@section('container')
<div class="container mt-5">
    <h1 class="text-center fw-bold mb-4">Explore Categories</h1>

    <div class="row justify-content-center">
        @foreach($categories as $category)
            <div class="col-md-4 col-lg-3 mb-4">
                <a href="{{ url("/posts?category=" . $category->slug) }}" class="text-decoration-none">
                    <div class="category-card position-relative overflow-hidden shadow-sm border-0 rounded-lg text-center"
                        style="transition: 0.3s;">
                        <!-- Gambar Background -->
                        <div class="category-image" 
                            style="background: url('{{ $category->image ?? 'https://picsum.photos/400/300?random=' . $loop->index }}') no-repeat center center/cover; height: 200px; border-radius: 10px;">
                        </div>
                        
                        <!-- Overlay Abu-Abu Transparan -->
                        <div class="category-overlay position-absolute top-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center"
                            style="background: rgba(0, 0, 0, 0.6); border-radius: 10px; transition: 0.3s;">
                            <h5 class="fw-bold text-light">{{ $category->name }}</h5>
                            <p class="text-light small">{{ $category->posts_count }} posts</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

<style>
    .category-card:hover {
        transform: translateY(-5px);
    }
</style>
@endsection

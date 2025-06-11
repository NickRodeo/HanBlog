@extends('layouts/main')

@section('title', 'Posts')

@section('container')

@if($posts->count() > 3 && !request("category") && !request("author") && !request("search"))
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach(range(0, 2) as $i)
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $i }}" 
                    class="{{ $i == 0 ? 'active' : '' }}" aria-label="Slide {{ $i+1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach([0, 5, 10] as $index)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ $postsCarousel[$index]->image ? url("storage/" . $postsCarousel[$index]->image) : 'https://picsum.photos/1920/1080?random=' . $index }}" 
                         class="d-block w-100" style="height: 600px; object-fit: cover;" alt="Post Image">
                    <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-2 mb-3">
                        <h5 class="text-light">{{ $postsCarousel[$index]->title }}</h5>
                        <p>{{ $postsCarousel[$index]->excerpt }}</p>
                        <a href="{{ url("/posts/" .  $postsCarousel[$index]->slug) }}" class="btn btn-light btn-sm">Read More</a>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>
@endif

<h1 class="text-center mt-4">{{ $title }}</h1>

<!-- Search Bar -->
<form class="container mt-3" action="{{ url('/posts') }}">
    <div class="input-group mb-3">
        @if (request("category"))
            <input type="hidden" name="category" value="{{ request("category") }}">
        @endif
        @if (request("author"))
            <input type="hidden" name="author" value="{{ request("author") }}">
        @endif
        <input type="text" class="form-control rounded-start" name="search" placeholder="Type to search...">
        <button class="btn btn-primary text-light" type="submit">Search</button>
    </div>
</form>

@if ($posts->count())
    <!-- Grid Layout for Posts -->
    <div class="container mt-4">
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0 rounded-lg overflow-hidden h-100">
                        <img src="{{ $post->image ? url("storage/" . $post->image) : 'https://picsum.photos/600/400?random=' . $loop->index }}" 
                             class="card-img-top" alt="Post Image" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="text-muted small mb-2">
                                By <a href="{{ url("/posts?author=" . $post->author->slug) }}" 
                                     class="text-decoration-none">{{ $post->author->name }}</a>
                                | <a href="{{ url("/posts?category=" . $post->category->slug) }}" 
                                     class="badge bg-primary">{{ $post->category->name }}</a>
                                <small class="text-muted d-block mt-2">
                                    ⏳ {{ $post->created_at->diffForHumans() }}
                                </small>
                            </p>
                            <p class="card-text flex-grow-1">{{ $post->excerpt }}</p>
                            <a href="{{ url("/posts/" . $post->slug) }}" class="btn btn-primary btn-sm mt-auto">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Pagination -->
    <div class="container mt-4">
        {{ $posts->links() }}
    </div>
@else
    <div class="container mt-5 text-center">
        <h4 class="text-muted">Not Found :\</h4>
    </div>
@endif

@endsection

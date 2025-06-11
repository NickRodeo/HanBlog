@extends('layouts/main')

@section('title', 'Post')

@section('container')
<div class="container mt-4">
    <!-- Hero Background -->
    <div class="position-relative text-center text-white" 
        style="background: url('{{ $post->image ? url("storage/" . $post->image) : 'https://picsum.photos/1200/600' }}') center/cover no-repeat; height: 300px; border-radius: 15px; box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);">
        <div class="position-absolute top-50 start-50 translate-middle w-100">
            <h1 class="fw-bold bg-dark bg-opacity-50 p-3 rounded d-inline-block">{{ $post->title }}</h1>
        </div>
    </div>

    <!-- Post Content -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <div class="card shadow-lg border-0 p-4 rounded-lg">
                <p class="text-muted mb-2">
                    ✍ By: <a class="text-decoration-none fw-bold" href="{{ url("/posts?author=" . $post->author->slug) }}">{{ $post->author->name }}</a>
                </p>
                <a href="{{ url("/posts?category=" . $post->category->slug) }}" 
                    class="badge bg-primary text-decoration-none py-1 px-3 rounded-pill d-inline-flex fs-8"
                    style="max-width: fit-content; font-size: 0.75rem;">
                     {{ $post->category->name }}
                 </a>
 
                <hr>

                <div class="post-body" style="line-height: 1.8; font-size: 1.1rem;">
                    {!! $post->body !!}
                </div>

                <div class="mt-4 d-flex justify-content-between">
                    <span class="text-muted small">
                        📅 {{ $post->created_at->format('F d, Y') }} • ⏳ {{ $post->created_at->diffForHumans() }}
                    </span>
                    <a href="{{ url('/posts') }}" class="btn btn-outline-primary btn-sm px-4">⬅ Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

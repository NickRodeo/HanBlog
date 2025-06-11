@extends('dashboard/layouts/main')

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
                <div class="container">
                    <a href="{{ url("/dashboard/posts") }}" class="btn btn-sm btn-info text-white">
                        <i class="bi bi-arrow-left"></i> Back to My Posts
                    </a>
                    <a href="{{ url("/dashboard/posts/" . $post->slug . "/edit") }}" class="btn btn-sm btn-warning text-dark">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <form action="{{ url('dashboard/posts/' . $post->slug)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger text-white border-0" onclick="return confirm('Are you sure?')">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </form>
                </div>
 
                <hr>

                <div class="post-body" style="line-height: 1.8; font-size: 1.1rem;">
                    {!! $post->body !!}
                </div>

                <div class="mt-4 d-flex justify-content-between">
                    <span class="text-muted small">
                        📅 {{ $post->created_at->format('F d, Y') }} • ⏳ {{ $post->created_at->diffForHumans() }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

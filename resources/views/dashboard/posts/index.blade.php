@extends('dashboard/layouts/main')

@section('title', 'Dashboard Post')

@section('container')
    @section('section title', '📌 My Posts')

    <div class="table-responsive small">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a class="btn btn-primary" href="{{ url('dashboard/posts/create') }}">
                <svg class="bi"><use xlink:href="#circle-plus"/></svg>   
            </a>
        </div>

        @if (session("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session("success") }}!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <table class="table table-striped table-hover table-bordered align-middle">
            <thead class="table-primary text-center">
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td class="text-center">
                            <form action="{{ url('dashboard/posts/' . $post->slug)}}" method="POST" class="d-inline">
                                <div class="btn-group">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ url("/dashboard/posts/" . $post->slug) }}" class="btn btn-sm btn-info text-white">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                    <a href="{{ url("/dashboard/posts/" . $post->slug . "/edit") }}" class="btn btn-sm btn-warning text-dark">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <button type="submit" class="btn btn-sm btn-danger text-white" onclick="return confirm('Are you sure?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

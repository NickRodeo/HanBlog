@extends('dashboard/layouts/main')

@section('title', 'Dashboard Categories')

@section('container')
    @section('section title', 'Create Category')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <form action="{{ url("dashboard/categories") }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label fw-medium">Category Name</label>
                                <input type="text" class="form-control rounded-3 @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label fw-medium">Category Slug</label>
                                <input type="text" class="form-control rounded-3 @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" required>
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ url('/dashboard/categories') }}" class="btn btn-outline-secondary rounded-3 px-4">Cancel</a>
                                <button type="submit" class="btn btn-primary rounded-3 px-4" >Create Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const name = document.getElementById("name");
        const slug = document.getElementById("slug");

        name.addEventListener("change", function () {
            fetch("/dashboard/categories/checkSlug?name=" + name.value)
                .then((response) => response.json())
                .then((data) => {
                    slug.value = data.slug;
                })
        });
    </script>
    
@endsection

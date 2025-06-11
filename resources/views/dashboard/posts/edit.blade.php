@extends('dashboard/layouts/main')

@section('title', 'Dashboard Post')

@section('container')
    @section('section title', 'Edit Post')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <form action="{{ url("dashboard/posts/" . $post->slug) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label for="title" class="form-label fw-medium">Title</label>
                                <input type="text" class="form-control rounded-3 @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label fw-medium">Slug</label>
                                <input type="text" class="form-control rounded-3 @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old("slug", $post->slug) }}" required>
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label fw-medium">Category</label>
                                <select class="form-select rounded-3 @error('category') is-invalid @enderror" id="category" name="category_id" required>
                                    <option selected disabled>Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category', $post->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label @error('image') is-invalid @enderror">Post Image</label>
                                <img class="img-fluid img-preview d-block mb-3 col-sm-6" src='{{ $post->image ? asset('storage/' . $post->image) : ""}}'>
                                <input class="form-control" type="file" id="image" name="image" onchange="imagePreview()">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="body" class="form-label fw-medium">Content</label>
                                <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                                <trix-editor input="body" class="form-control rounded-3 @error('body') is-invalid @enderror"></trix-editor>
                                @error('body')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ url('/dashboard/posts') }}" class="btn btn-outline-secondary rounded-3 px-4">Cancel</a>
                                <button type="submit" class="btn btn-primary rounded-3 px-4" >Update Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const title = document.getElementById("title");
        const slug = document.getElementById("slug");

        title.addEventListener("change", function () {
            fetch("/dashboard/posts/checkSlug?title=" + title.value)
                .then((response) => response.json())
                .then((data) => {
                    slug.value = data.slug;
                })
        });

        function imagePreview() {
            const image = document.getElementById("image");
            const preview = document.querySelector(".img-preview");

            if (image.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.height = "300";
            };
            reader.readAsDataURL(image.files[0]);
            }
        }
    </script>
    
@endsection

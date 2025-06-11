@extends('layouts/main')

@section('title', "Login")

@section('container')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4 rounded" style="width: 400px;">
        <h2 class="text-center fw-bold mb-3">Login</h2>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session("success") }}</strong> Please login!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session('loginFailed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session("loginFailed") }}</strong> Please try again!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3 @error('name') is-invalid @enderror" name="name" placeholder="Username" value="{{ old("name") }}" required>
                <label for="username">Username</label>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="form-floating mb-3">
                <input type="password" class="form-control rounded-3 @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            
            <button type="submit" class="btn btn-primary w-100 mt-3">Login</button>
        </form>

        <div class="text-center mt-3">
            <small>
                 Doesnt Have an Account?
                <a href="{{ url('/register') }}" class="text-primary text-decoration-none">
                 Register
                </a>
            </small>
        </div>
    </div>
</div>
@endsection

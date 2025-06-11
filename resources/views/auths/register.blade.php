@extends('layouts/main')

@section('title', "Register")

@section('container')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4 rounded" style="width: 400px;">
        <h2 class="text-center fw-bold mb-3">Register</h2>

        <form action="{{ url('/register') }}" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-3 @error('name') is-invalid @enderror" name="name" placeholder="Username" value="{{ old("name") }}"  required>
                <label for="username">Username</label>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="form-floating mb-3">
                <input type="email" class="form-control rounded-3 @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old("email") }}"  required>
                <label for="email">Email</label>
                @error('email')
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
                 Already Have an Account?
                <a href="{{ url('/login') }}" class="text-primary text-decoration-none">
                 Login
                </a>
            </small>
        </div>
    </div>
</div>
@endsection

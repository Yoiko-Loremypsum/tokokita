@extends('layouts.app5')

@section('title', 'Login Sistem')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endpush

@section('content')

    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <!-- Header Card -->
                <div class="card-header text-center bg-primary text-white">
                    <h3 class="font-weight-light my-2">
                        <i class="bi bi-person-circle me-2"></i>Login TokoKita
                    </h3>
                </div>
                <!-- Body Card -->
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <!-- Input Email -->
                        <div class="mb-3">
                            <label class="form-label text-muted">
                                Alamat Email
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                                <input type="email" name="email"
                                    class="form-control py-2 @error('email') is-invalid @enderror" 
                                    value="{{ old('email') }}"
                                    required autofocus placeholder="nama@email.com">
                                @error('email')
                                    <div class="invalid-feedback fw-bold">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Input Password -->
                        <div class="mb-3">
                            <label class="form-label text-muted">
                                Password
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-lock"></i></span>
                                <input type="password" name="password" 
                                    class="form-control py-2 @error('password') is-invalid @enderror" 
                                    required placeholder="Masukkan password">
                                @error('password')
                                    <div class="invalid-feedback fw-bold">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label small text-muted" for="remember">
                                    Ingat Saya
                                </label>
                            </div>
                            <a href="#" class="small text-decoration-none">Lupa Password?</a>
                        </div>

                        <!-- Button Login -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Masuk
                            </button>
                        </div>
                    </form>
                </div>
                <!-- Footer Card -->
                <div class="card-footer text-center py-3">
                    <div class="small">
                        <a href="#">
                            Belum punya akun? Daftar di sini!
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
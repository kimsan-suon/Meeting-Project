@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <h3 class="mb-1">{{ __('Create Your Account') }}</h3>
                        <p class="small mb-0">{{ __('Join us today') }}</p>
                    </div>

                    <div class="card-body px-5 py-4">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="form-label">{{ __('Full Name') }}</label>
                                <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-user text-primary"></i>
                                </span>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                           placeholder="John Doe">
                                </div>
                                @error('name')
                                <div class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-envelope text-primary"></i>
                                </span>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required autocomplete="email"
                                           placeholder="your@email.com">
                                </div>
                                @error('email')
                                <div class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-lock text-primary"></i>
                                </span>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                           name="password" required autocomplete="new-password"
                                           placeholder="At least 8 characters">
                                </div>
                                @error('password')
                                <div class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                                <div class="form-text">Use a strong, unique password</div>
                            </div>

                            <div class="mb-4">
                                <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-check-circle text-primary"></i>
                                </span>
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password"
                                           placeholder="Re-enter your password">
                                </div>
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary btn-lg rounded-pill py-2">
                                    {{ __('Create Account') }} <i class="fas fa-user-plus ms-2"></i>
                                </button>
                            </div>

                            <div class="text-center mt-4">
                                <p class="mb-0">{{ __('Already have an account?') }}
                                    <a href="{{ route('login') }}" class="text-decoration-none text-primary fw-bold">
                                        {{ __('Sign in') }}
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 15px;
            overflow: hidden;
        }
        .form-control {
            border-left: none;
            padding-left: 0;
        }
        .input-group-text {
            border-right: none;
            background-color: transparent !important;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #ced4da;
        }
        .btn-primary {
            background-color: #0d6efd;
            border: none;
            transition: all 0.3s;
        }
        .btn-primary:hover {
            background-color: #0b5ed7;
            transform: translateY(-1px);
        }
        .form-text {
            font-size: 0.85rem;
            color: #6c757d;
        }
    </style>
@endsection

@extends('auth.auth_layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4 bg-white border-0 shadow">
                    <div class="card-body">
                        <h2 class="fw-bold text-primary mb-5 text-center">
                            <i class="bi bi-shop me-2"></i>
                            Zay Kwat
                        </h2>
                        <p class="mb-0 text-dark fs-4">Welcome to Zay Kwat!</p>
                        <p class="mb-4 text-black-50">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet praesentium tenetur deserunt.Lorem
                            ipsum dolor sit amet consectetur adipisicing elit. Amet praesentium tenetur deserunt.
                        </p>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" placeholder="09-xxx-xxx-xxx" name="phone" value="{{ old('phone') }}"
                                    required autocomplete="phone" autofocus>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="d-flex align-items-center justify-content-between"><label for="password"
                                        class="form-label">Password</label>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-decoration-none" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" placeholder="***" name="password" value="{{ old('password') }}" required
                                    autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <div class="">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="">
                                    <button type="submit" class="btn btn-primary w-100 mb-3">
                                        {{ __('Login') }}
                                    </button>
                                    <p class=" text-center">
                                        New on our platform?
                                        <a class="btn btn-link px-0" href="{{ route('register') }}">
                                            Create an account
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

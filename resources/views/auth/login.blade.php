<x-guest-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <style>
            body {
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                background-color: #f8f9fa;
            }

            .login-card {
                padding: 2rem;
                border-radius: 10px;
                background-color: #fff;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                width: 120%;
                max-width: 400px;
            }

            .login-card img {
                max-width: 120px;
                margin: 0 auto 1rem;
                display: block;
            }

            .btn-custom {
                background-color: #ffaa00;
                color: #fff;
                border: none;
            }

            .btn-custom:hover {
                background-color: #e69900;
            }
        </style>
    </head>
    <body>
        <div class="login-card">
            <a href="/" class="text-center">
                <img src="{{ URL::asset('front/logo.jpg') }}" alt="Logo">
            </a>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <h4 class="mb-4 text-center">Login To Your Account</h4>

            <form method="POST" action="{{ route('admin') }}">
                @csrf
                <!-- Email Address -->
                <div class="mb-3 row">
                    <label for="email" >{{ __('Email') }}</label>
                    <div class="col-md-12">
                        <x-input id="email" class="form-control" type="email" placeholder="Employee Id" name="email" :value="old('email')" required autofocus />
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-3 row">
                    <label for="password" >{{ __('Password') }}</label>
                    <div class="col-md-12">
                        <x-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                    </div>
                </div>

                <!-- Remember Me and Forgot Password -->
                <div class="row align-items-center mb-3">
                    <div class="col-md-6">
                        <label for="remember_me" class="form-check-label">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            {{ __('Remember me') }}
                        </label>
                    </div>
                    <div class="col-md-6 text-end">
                        @if (Route::has('password.request'))
                            <a class="text-sm text-decoration-none" href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                        @endif
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" class="btn btn-custom w-100">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>

            <p class="mt-3 text-muted text-center">WinsCart All Rights Reserved</p>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</x-guest-layout>
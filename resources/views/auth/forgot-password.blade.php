<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>

    <div style="background-image: url('{{ asset('assets/img/bg.png') }}'); background-size: cover; background-position: center; min-height: 100vh;">
        <div class="container min-vh-100 d-flex flex-column justify-content-center align-items-center"
            style="font-family: 'Times New Roman', Times, serif;">

            <!-- Login Form Section -->
            <div class="account-box shadow-lg w-50 p-3" style="background-color: rgba(255, 255, 255,0.95); border-radius: 10px;">
                <div class="account-wrapper">
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('dashboard') }}">
                             <img src="{{ asset('assets/img/logo4.png') }}" alt="Winngoo Logo" class="img-fluid d-block mx-auto" style="max-height: 110px; object-fit: contain;">
                        </a>
                    </div>

                    <p class="account-title text-center fs-2">Forgot Password</p>
                    <p class=" text-center fs-6 text-muted">Enter you email to get a password reset link</p>


                    <!-- Login Form -->
                    <form method="POST" action="{{ route('admin.password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="input-block mb-4">
                            <label class="col-form-label fs-6 fw-bold">Email Address</label>
                            <input class="form-control p-1 fs-6 border-info" type="email" name="email" id="email" placeholder="Enter your email" value="{{ old('email') }}" required>

                            <!-- Email Error -->
                            @error('email')
                            <div class="text-danger pt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4 text-success" :status="session('status')" />

                        <!-- Submit Button -->
                        <div class="input-block mb-4 text-center">
                            <button class="btn btn-info btn-lg w-50 fs-6" type="submit">Email Password Reset Link</button>
                        </div>

                        <!-- Remember Me & Forgot Password Link -->
                        <div>
                            <!-- You can add "Remember me" functionality if needed -->
                            <div class="fs-6 text-center">
                                <p class="text-center">Remember your password ?
                                    <a class="text-info fs-6 ps-1" href="{{ route('admin.login') }}">
                                        Back to Login
                                    </a>
                                </p>
                            </div>
                            
                        </div>
                    </form>

                </div>
            </div>
            <footer>
                <p class="text-white fs-5 mt-2">&copy; 2025 Winngoo. All rights reserved.</p>
            </footer>
        </div>
    </div>



    <!-- Bootstrap 5 JS Bundle (includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

</body>

</html>
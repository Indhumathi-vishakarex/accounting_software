<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>

    <div style="background-image: url('{{ asset('assets/img/bg.png') }}'); background-size: cover; background-position: center; min-height: 100vh;">
        <div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh; font-family:'roboto', sans-serif;">

            <!-- Login Form Section -->
            <div class="shadow-lg w-100 p-4 mt-2" style="background-color: rgba(255, 255, 255, 0.95); border-radius: 10px; max-width: 500px;">
                <div class="account-wrapper">
                    <div class="d-flex justify-content-center mb-3">
                        <a href="{{ route('dashboard') }}">
                            <img src="{{ asset('assets/img/logo4.png') }}" alt="Winngoo Logo" class="img-fluid d-block mx-auto" style="max-height: 90px; object-fit: contain;">
                        </a>
                    </div>


                    <p class="text-center mt-3 fs-4">Administrator</p>
                    <p class="text-center fs-6 text-muted">Secure access to the Winngoo administration dashboard</p>

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('admin.login') }}">

                        @csrf

                        <!-- Email Address -->
                        <!-- <div class="mb-3">
                            <label class="form-label fs-6 fw-bold">Email Address</label>
                            <input class="form-control p-2 fs-6 border-info" type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                            @error('email')
                            <div class="text-danger pt-2">{{ $message }}</div>
                            @enderror
                        </div> -->

                        <!-- name -->
                        <div class="mb-3">
                            <label class="form-label fs-6 fw-bold">Username</label>
                            <input class="form-control p-2 fs-6 border-info" type="text" name="name" placeholder="Enter your name" value="{{ old('name') }}" required>
                            @error('name')
                            <div class="text-danger pt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label fs-6 fw-bold">Password</label>
                            <div class="position-relative">
                                <input class="form-control p-2 fs-6 border-info" type="password" name="password" id="password" placeholder="Enter your password" required autocomplete="current-password">
                                <i class="bi bi-eye position-absolute top-50 end-0 translate-middle-y me-3" id="togglePassword" style="cursor: pointer;"></i>
                            </div>
                            @error('password')
                            <div class="text-danger pt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input border-info" type="checkbox" name="remember" id="remember_me">
                                <label class="form-check-label fs-6" for="remember_me">
                                    Remember me
                                </label>
                            </div>
                            <a class="text-info fs-6" href="{{ route('admin.password.request') }}">
                                Forgot password?
                            </a>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button class="btn btn-info btn-lg w-50 fs-6" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
            <footer>
                <p class="text-white mt-2">&copy; 2025 Winngoo. All rights reserved.</p>
            </footer>


        </div>
    </div>




    <script>
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        togglePassword.addEventListener('click', function() {

            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });
    </script>

    <!-- Bootstrap 5 JS Bundle (includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

</body>

</html>
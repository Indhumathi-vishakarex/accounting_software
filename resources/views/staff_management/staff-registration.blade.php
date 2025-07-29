@include('layouts.head')


<body>

    <div class="main-wrapper">

        @include('layouts.header')
        @include('layouts.sidebar')

        <div class="page-wrapper bg-white">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row align-items-center">
                        <!-- Left side: Page Title & Breadcrumb -->
                        <div class="col">
                            <h3 class="page-title">Staff Registration</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin-dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Staff Registration</li>
                            </ul>
                        </div>

                        <!-- Right side: Add Client & View Icons -->
                        <!-- <div class="col-auto d-flex align-items-center">
                            <a
                                href="{{ route('client-registration') }}"
                                class="btn add-btn me-2">
                                <i class="fa fa-plus"></i> Add Client
                            </a>

                        </div> -->
                    </div>
                </div>




              
                    <div class="card-body fs-6">
                        <div class="container-fluid w-75">
                            <!-- <h2></h2> -->
                            <form action="{{ route('store-staff') }}" method="POST">
                                @csrf
                                {{-- Name --}}
                                <div class="mb-3">
                                    <label for="name" class="form-label">Full Name<span class="text-danger">*</span></label>
                                    <input type="text" class="p-2 form-control large-input @error('name') is-invalid @enderror"
                                        id="name" name="name" placeholder="Enter your full name" value="{{ old('name') }}" required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address<span class="text-danger">*</span></label>
                                    <input type="email" class="p-2 form-control large-input @error('email') is-invalid @enderror"
                                        id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="role_id" class="form-label">Assign Role <span class="text-danger">*</span></label>
                                    <select
                                        id="role_id"
                                        name="role_id"
                                        class="p-2 form-control large-input @error('role_id') is-invalid @enderror"
                                        required>
                                        <option value="">Select a role</option>
                                        @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                            {{ ucfirst($role->rolename) }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>




                                {{-- Password --}}
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
                                    <input type="password" class="p-2 form-control large-input @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="Enter password" required minlength="6">
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Confirm Password --}}
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password<span class="text-danger">*</span></label>
                                    <input type="password" class="p-2 form-control large-input @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required minlength="6">
                                    @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Submit Button --}}
                                <button type="submit" class="btn btn-primary">Register</button>
                            </form>
                        </div>


                    </div>
               
            </div>
        </div>
    </div>





       
            <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
            <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('assets/js/layout.js') }}"></script>
            <script src="{{ asset('assets/js/app.js') }}"></script>

</body>


</html>
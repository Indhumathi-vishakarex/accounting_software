@include('layouts.head')


<body>

    <div class="main-wrapper">

        @include('layouts.header')
        @include('layouts.sidebar')

        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Admin Profile</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Admin Profile</li>
                            </ul>
                        </div>
                    </div>
                </div>



                <div class="card mb-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-view">
                                    <div class="profile-img-wrap">
                                        <div class="profile-img">
                                            <a href="#"><img alt src="/assets/img/profiles/avatar-02.jpg"></a>
                                        </div>
                                    </div>
                                    <div class="profile-basic">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="profile-info-left ms-3">
                                                    <h3 class="user-name m-t-0 mb-2 fs-2">{{ Auth::guard('admin')->user()->name }}
                                                    </h3>
                                                    <!-- <p class="fw-bold fs-5 mb-1">Role : <span class="text-muted ms-2">Admin</span></p> -->
                                                    <p class="fs-5 fw-bold mb-1">Email : <span class="text-muted ms-2">{{ Auth::guard('admin')->user()->email }}</span></p>
                                                    <p class="fs-5 fw-bold mb-1">Admin ID : <span class="text-muted ms-2">{{ Auth::guard('admin')->user()->id }}</span></p>
                                                    <p class="fw-bold fs-6 mb-1">Joined : <span class="text-muted ms-2">{{ Auth::guard('admin')->user()->created_at->format('d M Y') }}</span></p>
                                                    <span class="badge text-bg-success fs-6">Active</span>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <a data-bs-target="#profile_info" data-bs-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a>
                                                <ul class="personal-info">
                                                    <li>
                                                        <div class="title">Name:</div>
                                                        <div class="text">{{ Auth::guard('admin')->user()->name }}</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Email:</div>
                                                        <div class="text">{{ Auth::guard('admin')->user()->email }}</div>
                                                    </li>

                                                    <!-- Added HR below the Email section -->
                                                    <hr>
                                                    <li>
                                                        <div class="title">Password:</div>
                                                        <div class="text">
                                                            ********
                                                            <!-- Edit Icon on the right side of Password -->

                                                            <a data-bs-target="#profile_password" data-bs-toggle="modal" class="edit-icon" href="#" style="float: right;"><i class="fa fa-pencil"></i></a>
                                                        </div>
                                                    </li>
                                                    <li>


                                                        <!-- Delete Account Button -->
                                                        <!-- <button
                                                            type="button"
                                                            class="btn btn-outline-danger float-end btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#profiledelete">
                                                            {{ __('Delete Account') }}
                                                        </button> -->


                                                    </li>



                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="profile_info" class="modal custom-modal fade" role="dialog" aria-labelledby="profile_infoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title fs-3" id="profile_infoLabel">Update Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark fs-5"></i></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Profile Update Form -->
                    <form method="post" action="{{ route('profile.update') }}" class="mt-4 space-y-4">
                        @csrf
                        @method('patch')

                        <!-- Name Field -->
                        <div class="mb-3">
                            <x-input-label for="name" :value="__('Name')" class="fs-5" />
                            <x-text-input id="name" name="name" type="text" class="form-control mt-2" :value="old('name', Auth::guard('admin')->user()->name)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <!-- Email Field -->
                        <div class="mb-3">
                            <x-input-label for="email" :value="__('Email')" class="fs-5" />
                            <x-text-input id="email" name="email" type="email" class="form-control mt-2" :value="old('email', Auth::guard('admin')->user()->email)" required autocomplete="username" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />

                            @if (Auth::guard('admin')->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail
                            && ! Auth::guard('admin')->user()->hasVerifiedEmail())

                            <div class="mt-2">
                                <p class="text-sm text-gray-800">
                                    {{ __('Your email address is unverified.') }}
                                    <button form="send-verification" class="btn btn-link p-0 m-0 text-decoration-none">
                                        {{ __('Click here to re-send the verification email.') }}
                                    </button>
                                </p>
                            </div>
                            @endif
                        </div>

                        <!-- Save Button & Success Message -->
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <x-primary-button class="fs-6 px-4 py-2">{{ __('Save') }}</x-primary-button>

                            @if (session('status') === 'profile-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-green-600">{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- The form for sending the verification email -->
    <form id="send-verification" method="post" action="{{ route('admin.verification.send') }}">
        @csrf
    </form>


    <div id="profile_password" class="modal custom-modal fade" role="dialog" aria-labelledby="profile_passwordLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title fs-3" id="profile_passwordLabel">Update Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark fs-5"></i></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Password Update Form -->
                    <form method="post" action="{{ route('admin.password.update') }}" class="space-y-4">
                        @csrf
                        @method('put')

                        <!-- Current Password -->
                        <div class="mb-4">
                            <x-input-label for="update_password_current_password" :value="__('Current Password')" class="fs-5" />
                            <x-text-input id="update_password_current_password" name="current_password" type="password" class="form-control mt-2" autocomplete="current-password" />
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>

                        <!-- New Password -->
                        <div class="mb-4">
                            <x-input-label for="update_password_password" :value="__('New Password')" class="fs-5" />
                            <x-text-input id="update_password_password" name="password" type="password" class="form-control mt-2" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" class="fs-5" />
                            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control mt-2" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                        </div>

                        <!-- Save Button & Success Message -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <x-primary-button class="fs-6 px-4 py-2">{{ __('Save') }}</x-primary-button>

                            @if (session('status') === 'password-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-green-600">{{ __('Password updated.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal for Confirming Account Deletion -->
    <div class="modal fade" id="profiledelete" tabindex="-1" aria-labelledby="profiledeleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <form method="POST" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('DELETE')

                    <div class="modal-header">
                        <h5 class="modal-title" id="profiledeleteLabel">Confirm Delete Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <p>Are you sure you want to delete your account? All your data will be permanently removed.</p>

                        <div class="form-group">
                            <label for="password">Enter Password to Confirm:</label>
                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="form-control"
                                placeholder="Password"
                                required>
                            @error('password', 'userDeletion')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete Account</button>
                    </div>
                </form>

            </div>
        </div>
    </div>






    <!-- Cloudflare Email Decode -->
    <script data-cfasync="false" src="{{ asset('../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>

    <!-- jQuery and Bootstrap -->
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/feather.min.js') }}"></script>

    <!-- Layout & Theme Scripts -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <script src="{{ asset('assets/js/theme-settings.js') }}"></script>
    <script src="{{ asset('assets/js/greedynav.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script src="{{ asset('../../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}" data-cf-settings="2c4a77a6990a29245566c995-|49" defer></script>

</body>

<!-- Mirrored from smarthr.dreamstechnologies.com/laravel/template/public/profile by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Aug 2024 02:21:50 GMT -->

</html>
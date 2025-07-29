@include('layouts.head')


<body>

    <div class="main-wrapper">

        @include('layouts.header')
        @include('layouts.sidebar')

        <div class="page-wrapper bg-white">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Edit Client</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin-dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Edit Client</li>
                            </ul>
                        </div>
                    </div>
                </div>



                <div class="card-body fs-5">
                    <div class="container-fluid w-75">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- ========== PERSONAL DETAILS ========== --}}
                            <h4 class="mb-3">Personal Details</h4>
                            <div class="row">
                                {{-- Profile Image --}}
                                <div class="col-md-12 text-center mb-4">
                                    <div class="profile-img-wrap edit-img position-relative">
                                        <img id="profile-preview" class="inline-block rounded-circle" width="100"
                                            src="{{ $client->profile_image ? asset($client->profile_image) : asset('/assets/img/profiles/avatar-02.jpg') }}"
                                            alt="user">
                                        <div class="fileupload btn position-absolute bottom-0 start-50 translate-middle-x">
                                            <span class="btn-text">Edit</span>
                                            <input class="upload" type="file" name="image" accept="image/*" onchange="previewImage(event)">
                                        </div>
                                    </div>
                                </div>

                                {{-- First Name --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" name="name" value="{{ $client->name }}" class="form-control" required>
                                </div>

                                {{-- Last Name --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="last_name" value="{{ $client->last_name }}" class="form-control" required>
                                </div>

                                {{-- Email --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" value="{{ $client->email }}" class="form-control" required>
                                </div>

                                {{-- Phone --}}
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="tel" name="phone" value="{{ $client->phone }}" class="form-control" required>
                                </div>
                            </div>

                            <hr class="my-4">

                            {{-- ========== BUSINESS INFORMATION ========== --}}
                            <h4 class="mb-3">Business Information</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Business Name</label>
                                    <input type="text" name="business_name" value="{{ $client->business_name }}" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Trading Name</label>
                                    <input type="text" name="trading_name" value="{{ $client->trading_name }}" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Contact Number</label>
                                    <input type="text" name="business_no" value="{{ $client->business_no }}" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Business Start Date</label>
                                    <input type="date" name="business_date" value="{{ $client->business_date }}" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">City/Town</label>
                                    <input type="text" name="city" value="{{ $client->city }}" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">State</label>
                                    <input type="text" name="state" value="{{ $client->state }}" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Country</label>
                                    <input type="text" name="country" value="{{ $client->country }}" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Postal Code</label>
                                    <input type="text" name="post_code" value="{{ $client->post_code }}" class="form-control">
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea name="address" rows="2" class="form-control">{{ $client->address }}</textarea>
                                </div>
                            </div>

                            <hr class="my-4">

                            {{-- ========== VAT INFORMATION ========== --}}
                            <h4 class="mb-3">VAT Information</h4>
                          <div class="row">

    {{-- Business Start Date --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Business Start Date <span class="text-danger">*</span></label>
        <input type="date" name="business_date" value="{{ $client->business_date }}" class="form-control" required>
    </div>

    {{-- Book Start Date --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Book Start Date <span class="text-danger">*</span></label>
        <input type="date" name="book_date" value="{{ $client->book_date }}" class="form-control" required>
    </div>

    {{-- VAT Registered --}}
    <div class="col-md-12 mb-3">
        <label class="form-label">VAT Registered <span class="text-danger">*</span></label><br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="vat_register" id="vat_yes" value="yes" {{ $client->vat_register == 'yes' ? 'checked' : '' }}>
            <label class="form-check-label" for="vat_yes">Yes</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="vat_register" id="vat_no" value="no" {{ $client->vat_register == 'no' ? 'checked' : '' }}>
            <label class="form-check-label" for="vat_no">No</label>
        </div>
    </div>

    {{-- VAT Fields (Always Visible, Conditionally Editable) --}}
    <div id="vatFields" class="border rounded p-3 bg-light">
        {{-- VAT Scheme --}}
        <div class="mb-3">
            <label for="vat_scheme" class="form-label">VAT Scheme <span class="text-danger">*</span></label>
            <select class="form-control vat-dependent" id="vat_scheme" name="vat_scheme" {{ $client->vat_register == 'no' ? 'disabled' : '' }}>
                <option value="">Select</option>
                <option value="Accrual Based" {{ $client->vat_scheme == 'Accrual Based' ? 'selected' : '' }}>Accrual Based</option>
                <option value="Cash Based" {{ $client->vat_scheme == 'Cash Based' ? 'selected' : '' }}>Cash Based</option>
                <option value="Flat Rate" {{ $client->vat_scheme == 'Flat Rate' ? 'selected' : '' }}>Flat Rate</option>
            </select>
        </div>

        {{-- VAT Reg No --}}
        <div class="mb-3">
            <label for="vat_reg_no" class="form-label">VAT Reg No <span class="text-danger">*</span></label>
            <input type="text" name="vat_reg_no" id="vat_reg_no" class="form-control vat-dependent"
                value="{{ $client->vat_reg_no }}" {{ $client->vat_register == 'no' ? 'disabled' : '' }}>
        </div>

        {{-- VAT Registration Date --}}
        <div class="mb-3">
            <label for="vat_date" class="form-label">VAT Registration Date <span class="text-danger">*</span></label>
            <input type="date" name="vat_date" id="vat_date" class="form-control vat-dependent"
                value="{{ $client->vat_date }}" {{ $client->vat_register == 'no' ? 'disabled' : '' }}>
        </div>

        {{-- VAT Submit Frequency --}}
        <div class="mb-3">
            <label for="vat_type" class="form-label">VAT Submit Type <span class="text-danger">*</span></label>
            <select name="vat_type" id="vat_type" class="form-control vat-dependent" {{ $client->vat_register == 'no' ? 'disabled' : '' }}>
                <option value="">Select</option>
                <option value="Monthly" {{ $client->vat_type == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                <option value="Quarterly" {{ $client->vat_type == 'Quarterly' ? 'selected' : '' }}>Quarterly</option>
                <option value="Yearly" {{ $client->vat_type == 'Yearly' ? 'selected' : '' }}>Yearly</option>
            </select>
        </div>
    </div>
</div>

                            <hr class="my-4">

                            {{-- ========== PASSWORD UPDATE ========== --}}
                            <h4 class="mb-3">Update Password</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">New Password</label>
                                    <input type="password" name="password" class="form-control" autocomplete="new-password">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" autocomplete="new-password">
                                </div>
                            </div>

                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary">Update Client</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
            <script>
                function previewImage(event) {
                    const reader = new FileReader();
                    reader.onload = function() {
                        const output = document.getElementById('profile-preview');
                        output.src = reader.result;
                    };
                    reader.readAsDataURL(event.target.files[0]);
                }

                document.addEventListener('DOMContentLoaded', function () {
        const vatYes = document.getElementById('vat_yes');
        const vatNo = document.getElementById('vat_no');
        const vatInputs = document.querySelectorAll('.vat-dependent');

        function toggleVatFields() {
            const isVatRegistered = vatYes.checked;
            vatInputs.forEach(input => {
                input.disabled = !isVatRegistered;
            });
        }

        // Attach events
        vatYes.addEventListener('change', toggleVatFields);
        vatNo.addEventListener('change', toggleVatFields);

        // Run on page load
        toggleVatFields();
    });
            </script>


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


</body>

<!-- Mirrored from smarthr.dreamstechnologies.com/laravel/template/public/profile by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Aug 2024 02:21:50 GMT -->

</html>
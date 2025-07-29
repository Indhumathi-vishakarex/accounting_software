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
                            <h3 class="page-title">Client Registration</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin-dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ul>
                        </div>
                    </div>
                </div>




                <div class="card-body fs-6">
                    <div class="container-fluid w-75">
                        <!-- <h2></h2> -->
                        <form method="POST" action="{{ route('client.preview') }}">
                            @csrf

                            <!-- Step 1: Personal & Contact Information -->
                            <div id="step-1" class="form-step">
                                <h4>Personal & Contact Information</h4>

                                {{-- Full Name --}}
                                <div class="mb-3">
                                    <label for="name" class="form-label">Full Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name', $personalData['name'] ?? '') }}" required>
                                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                {{-- last Name --}}
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                        id="last_name" name="last_name" value="{{ old('last_name', $personalData['last_name'] ?? '') }}">
                                    @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                {{-- Email --}}
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email ID<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email', $personalData['email'] ?? '') }}" required>
                                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                {{-- phone Number --}}
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Mobile Number<span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                        id="phone" name="phone" value="{{ old('phone', $personalData['phone'] ?? '') }}" required>
                                    @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                {{-- profile image --}}
                                <!-- <div class="mb-3">
                                    <label for="profile" class="form-label">Profile Image</label>
                                    <input type="file" class="form-control @error('profile') is-invalid @enderror"
                                        id="profile" name="profile" accept="image/*">
                                    @error('profile')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div> -->


                                {{-- Alternate Contact --}}
                                <!-- <div class="mb-3">
                                    <label for="alternate_contact" class="form-label">Alternate Contact Number</label>
                                    <input type="number" class="form-control @error('alternate_contact') is-invalid @enderror"
                                        id="alternate_contact" name="alternate_contact" value="{{ old('alternate_contact', $personalData['alternate_contact'] ?? '') }}">
                                    @error('alternate_contact') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div> -->

                                {{-- Password --}}
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" required>
                                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                {{-- Confirm Password --}}
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password<span class="text-danger">*</span></label>
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirmation" name="password_confirmation" required>
                                </div>

                                <button type="button" class="btn btn-primary next-step">Next</button>
                            </div>

                            <!-- Step 2: Business Information -->
                            <div id="step-2" class="form-step d-none">
                                <h4>Business Information</h4>

                                {{-- business Name --}}
                                <div class="mb-3">
                                    <label for="business_name" class="form-label">Business Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('business_name') is-invalid @enderror"
                                        id="business_name" name="business_name" value="{{ old('business_name', $personalData['business_name'] ?? '') }}" required>
                                    @error('business_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                {{-- Business Number --}}
                                <div class="mb-3">
                                    <label for="business_no" class="form-label">Contact Number<span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control @error('business_no') is-invalid @enderror"
                                        id="business_no" name="business_no" value="{{ old('business_no', $personalData['business_no'] ?? '') }}" required>
                                    @error('business_no') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>


                                {{-- Trading Name --}}
                                <div class="mb-3">
                                    <label for="trading_name" class="form-label">Trading Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('trading_name') is-invalid @enderror"
                                        id="trading_name" name="trading_name" value="{{ old('trading_name', $personalData['trading_name'] ?? '') }}" required>
                                    @error('trading_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                {{-- Address Line  --}}
                                <div class="mb-3">
                                    <label for="address1" class="form-label">Address<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        id="address" name="address" value="{{ old('address', $personalData['address'] ?? '') }}" required>
                                    @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                {{-- City --}}
                                <div class="mb-3">
                                    <label for="city" class="form-label">City/Town<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror"
                                        id="city" name="city" value="{{ old('city', $personalData['city'] ?? '') }}" required>
                                    @error('city') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                {{-- state --}}
                                <div class="mb-3">
                                    <label for="state" class="form-label">State<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('state') is-invalid @enderror"
                                        id="state" name="state" value="{{ old('state', $personalData['state'] ?? '') }}" required>
                                    @error('state') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                {{-- Country --}}
                                <div class="mb-3">
                                    <label for="country" class="form-label">Country <span class="text-danger">*</span></label>
                                    <select class="form-control @error('country') is-invalid @enderror" id="country" name="country" required>
                                        <option value="">Select</option>
                                        <option value="India"
                                            {{ old('country', $personalData['country'] ?? '') == 'India' ? 'selected' : '' }}>India</option>
                                        <option value="UK"
                                            {{ old('country', $personalData['country'] ?? '') == 'UK' ? 'selected' : '' }}>UK</option>
                                    </select>
                                    @error('country') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>


                                {{-- Postal Code --}}
                                <div class="mb-3">
                                    <label for="post_code" class="form-label">Postal Code<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('post_code') is-invalid @enderror"
                                        id="post_code" name="post_code" value="{{ old('post_code', $personalData['post_code'] ?? '') }}" required>
                                    @error('post_code') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <button type="button" class="btn btn-secondary prev-step">Back</button>
                                <button type="button" class="btn btn-primary next-step">Next</button>
                            </div>


                            <!-- Step 3: VAT & Bookkeeping Information -->
                            <div id="step-3" class="form-step d-none">
                                <h4>VAT & Bookkeeping</h4>

                                {{-- Business Start Date --}}
                                <div class="mb-3">
                                    <label for="business_date" class="form-label">Business Start Date<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="business_date" name="business_date" required>
                                </div>
                                {{-- Book Start Date --}}
                                <div class="mb-3">
                                    <label for="book_date" class="form-label">Book Start Date<span class="text-danger">*</span></label>
                                     <input type="date" class="form-control" id="book_date" name="book_date" required readonly>
                                </div>

                                {{-- VAT Registered --}}
                                <div class="mb-3">
                                    <label class="form-label">VAT Registered<span class="text-danger">*</span></label>
                                    <div>
                                        <input type="radio" name="vat_register" value="yes" id="vat_yes" required> Yes
                                        <input type="radio" name="vat_register" value="no" id="vat_no"> No
                                    </div>
                                </div>

                                {{-- VAT Fields (Wrapped in Container) --}}
                                <div id="vatFields" class="d-none border rounded p-3 bg-light">
                                    {{-- VAT Scheme --}}
                                    <div class="mb-3">
                                        <label for="vat_scheme" class="form-label">VAT Scheme <span class="text-danger">*</span></label>
                                        <select class="form-control" id="vat_scheme" name="vat_scheme">
                                            <option value="">Select</option>
                                            <option value="Accrual Based" {{ old('vat_scheme') == 'Accrual Based' ? 'selected' : '' }}>Accrual Based</option>
                                            <option value="Cash Based" {{ old('vat_scheme') == 'Cash Based' ? 'selected' : '' }}>Cash Based</option>
                                            <option value="Flat Rate" {{ old('vat_scheme') == 'Flat Rate' ? 'selected' : '' }}>Flat Rate</option>
                                        </select>
                                        @error('vat_scheme')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    {{-- VAT Reg No --}}
                                    <div class="mb-3">
                                        <label for="vat_reg_no" class="form-label">VAT Reg No<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="vat_reg_no" id="vat_reg_no" placeholder="Enter VAT Register Number">
                                    </div>

                                    {{-- VAT Registration Date --}}
                                    <div class="mb-3">
                                        <label for="vat_date" class="form-label">VAT Registration Date<span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" id="vat_date" name="vat_date">
                                    </div>

                                    {{-- VAT Submit Type --}}
                                    <div class="mb-3">
                                        <label for="vat_type" class="form-label">VAT Submit Type<span class="text-danger">*</span></label>
                                        <select class="form-control" id="vat_type" name="vat_type">
                                            <option value="">Select</option>
                                            <option value="Monthly">Monthly</option>
                                            <option value="Quarterly">Quarterly</option>
                                            <option value="Yearly">Yearly</option>
                                        </select>
                                    </div>
                                </div>



                                <button type="button" class="btn btn-secondary prev-step">Back</button>
                                <button type="submit" class="btn btn-success">Review & Confirm</button>
                            </div>
                        </form>

                    </div>


                </div>

            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const steps = document.querySelectorAll('.form-step');
                    const nextButtons = document.querySelectorAll('.next-step');
                    const prevButtons = document.querySelectorAll('.prev-step');
                    let currentStep = 0;
                      var today = new Date().toISOString().split('T')[0]; // Get current date in YYYY-MM-DD format
        document.getElementById('book_date').value = today;
          document.getElementById('business_date').setAttribute('max', today);
            document.getElementById('vat_date').setAttribute('max', today);

                    nextButtons.forEach(button => {
                        button.addEventListener('click', (e) => {
                            const currentForm = steps[currentStep];

                            // Validate required inputs
                            const requiredInputs = currentForm.querySelectorAll('input[required], select[required], textarea[required]');
                            let isValid = true;

                            requiredInputs.forEach(input => {
                                if (!input.value.trim()) {
                                    input.classList.add('is-invalid');
                                    isValid = false;
                                } else {
                                    input.classList.remove('is-invalid');
                                }
                            });

                            // Password match check (only in password step)
                            const password = currentForm.querySelector('#password');
                            const confirmPassword = currentForm.querySelector('#password_confirmation');

                            if (password && confirmPassword) {
                                if (password.value !== confirmPassword.value) {
                                    confirmPassword.classList.add('is-invalid');

                                    // Add custom error message if not present
                                    if (!document.getElementById('confirm-password-error')) {
                                        const errorMessage = document.createElement('div');
                                        errorMessage.classList.add('invalid-feedback');
                                        errorMessage.id = 'confirm-password-error';
                                        errorMessage.innerText = 'Password and confirm password must match.';
                                        confirmPassword.parentNode.appendChild(errorMessage);
                                    }

                                    isValid = false;
                                } else {
                                    confirmPassword.classList.remove('is-invalid');
                                    const existingError = document.getElementById('confirm-password-error');
                                    if (existingError) existingError.remove();
                                }
                            }

                            // Move to next step only if valid
                            if (isValid) {
                                steps[currentStep].classList.add('d-none');
                                currentStep++;
                                steps[currentStep].classList.remove('d-none');
                            }
                        });
                    });

                    prevButtons.forEach(button => {
                        button.addEventListener('click', () => {
                            steps[currentStep].classList.add('d-none');
                            currentStep--;
                            steps[currentStep].classList.remove('d-none');
                        });
                    });

                    // VAT toggle logic
                    const vatYes = document.getElementById('vat_yes');
                    const vatNo = document.getElementById('vat_no');
                    const vatFields = document.getElementById('vatFields');

                    function toggleVatFields() {
                        if (vatYes && vatYes.checked) {
                            vatFields.classList.remove('d-none');
                        } else {
                            vatFields.classList.add('d-none');
                            vatFields.querySelectorAll('input, select').forEach(el => el.value = '');
                        }
                    }

                    if (vatYes && vatNo && vatFields) {
                        vatYes.addEventListener('change', toggleVatFields);
                        vatNo.addEventListener('change', toggleVatFields);
                        toggleVatFields(); // initial check
                    }
                });
            </script>







            <!-- jQuery and Bootstrap -->
            <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
            <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}" type="text/javascript"></script>




            <!-- Layout & Theme Scripts -->
            <script src="{{ asset('assets/js/layout.js') }}"></script>
            <script src="{{ asset('assets/js/theme-settings.js') }}"></script>
            <script src="{{ asset('assets/js/greedynav.js') }}"></script>
            <script src="{{ asset('assets/js/app.js') }}"></script>



</body>

<!-- Mirrored from smarthr.dreamstechnologies.com/laravel/template/public/profile by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Aug 2024 02:21:50 GMT -->

</html>
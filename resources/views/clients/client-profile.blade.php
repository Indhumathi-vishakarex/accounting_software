@include('layouts.head')
<style>
    .dz-error-message {
        display: none !important;
    }

    .dropzone .dz-preview.dz-error {
        border: none;
        background: none;
    }

    .dropzone .dz-preview.dz-error .dz-details {
        border: none;
        background-color: transparent;
    }
</style>

<body>
    <div class="main-wrapper">

        @include('layouts.header')
        @include('layouts.sidebar')


        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Profile</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin-dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
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
                                            <a href="#">
                                                <img alt
                                                    src="{{ $client->profile ? asset($client->profile) : asset('/assets/img/profiles/avatar-02.jpg') }}">
                                            </a>


                                        </div>
                                    </div>
                                    <div class="profile-basic">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="profile-info-left ms-3">

                                                    <h3 class="user-name m-t-0 mb-2 fs-4 fw-bold">{{ $client->name }} {{$client->last_name}}</h3>
                                                    <!-- <p class="fw-bold fs-5 mb-1">Role : <span class="text-muted ms-2">Admin</span></p> -->
                                                    <p class="fs-6 fw-bold mb-1">Client ID : <span class="text-muted ms-2">{{ $client->id }}</span></p>

                                                    <p class="fs-6 fw-bold mb-1">Email : <span class="text-muted ms-2">{{ $client->email }}</span></p>
                                                    <p class="fw-bold fs-6 mb-1">Joined : <span class="text-muted ms-2">{{ $client->created_at->format('d M Y') }}</span></p>
                                                    <span class="badge text-bg-success fs-6">Active</span>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <a data-bs-target="#profile_info{{ $client->id }}" data-bs-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a>
                                                <ul class="personal-info">

                                                    <!-- <li>
                                                        <div class="title">Email:</div>
                                                        <div class="text"><a href><span class="__cf_email__" data-cfemail="28424740464c474d684d50494558444d064b4745">[email&#160;protected]</span></a></div>
                                                    </li> -->
                                                    <li>

                                                        <div class="title">Name:</div>
                                                        <div class="text">{{ $client->name }}</div>
                                                    </li>
                                                    <li>

                                                        <div class="title">Last Name:</div>
                                                        <div class="text">{{ $client->last_name }}</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Email:</div>
                                                        <div class="text">{{ $client->email }}</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Mobile:</div>
                                                        <div class="text">{{ $client->phone }}</div>
                                                    </li>

                                                    <hr>
                                                    <li>
                                                        <!-- <div class="title">Password:</div>
                                                        <div class="text">********</div>
                                                        <a data-bs-target="#profile_password" data-bs-toggle="modal" class="edit-icon" href="#" style="float: right;"><i class="fa fa-pencil"></i></a> -->
                                                    </li>
                                                    <li>


                                                        <form action="" method="POST" onsubmit="return confirm('Are you sure you want to delete this account?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger float-end btn-sm">
                                                                Delete Account
                                                            </button>
                                                        </form>


                                                    </li>


                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="pro-edit"><a data-bs-target="#profile_info" data-bs-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card tab-box">
                    <div class="row user-tabs">
                        <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                            <ul class="nav nav-tabs nav-tabs-bottom">
                                <li class="nav-item">
                                    <a href="#emp_profile" data-bs-toggle="tab" class="nav-link active">Business</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#payment" data-bs-toggle="tab" class="nav-link">payment</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#subscription" data-bs-toggle="tab" class="nav-link">Subscription</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#bills" data-bs-toggle="tab" class="nav-link">Bills</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Tab Content Wrapper -->
                <div class="tab-content">

                    <!-- Business Tab -->
                    <div class="tab-pane fade show active" id="emp_profile">
                        <div class="card profile-box">
                            <div class="card-body">
                                <a href="#" class="edit-icon" data-bs-toggle="modal" data-bs-target="#business_info_modal">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="mb-3">Business Information</h4>
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Business Name</div>
                                                <div class="text">{{ $client->business_name }}</div>
                                            </li>
                                            <li>
                                                <div class="title">Trading Name</div>
                                                <div class="text">{{ $client->trading_name }}</div>
                                            </li>
                                            <li>
                                                <div class="title">Contact Number</div>
                                                <div class="text">{{ $client->business_no }}</div>
                                            </li>
                                            <li>
                                                <div class="title">Address</div>
                                                <div class="text">{{ $client->address }}</div>
                                            </li>
                                            <li>
                                                <div class="title">Business Start Date</div>
                                                <div class="text">{{ $client->business_date }}</div>
                                            </li>
                                            <li>
                                                <div class="title">City/Town</div>
                                                <div class="text">{{ $client->city }}</div>
                                            </li>
                                            <li>
                                                <div class="title">State</div>
                                                <div class="text">{{ $client->state }}</div>
                                            </li>
                                            <li>
                                                <div class="title">Country</div>
                                                <div class="text">{{ $client->country }}</div>
                                            </li>
                                            <li>
                                                <div class="title">Postal Code</div>
                                                <div class="text">{{ $client->post_code }}</div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-md-6">
                                        <h4 class="mb-3">VAT Information</h4>
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Book Start Date</div>
                                                <div class="text">{{ $client->book_date }}</div>
                                            </li>
                                            <li>
                                                <div class="title">VAT Registered</div>
                                                <div class="text">{{ $client->vat_register }}</div>
                                            </li>
                                            <li>
                                                <div class="title">VAT Scheme</div>
                                                <div class="text">{{ $client->vat_scheme ?? 'No' }}</div>
                                            </li>
                                            <li>
                                                <div class="title">VAT Registration Date</div>
                                                <div class="text">{{ $client->vat_date ?? 'No' }}</div>
                                            </li>
                                            <li>
                                                <div class="title">VAT Submit Frequency</div>
                                                <div class="text">{{ $client->vat_type ?? 'No' }}</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Projects Tab -->
                    <div class="tab-pane fade" id="payment">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Payment Information</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Transaction ID</th>
                                                <th scope="col">Client Name</th>
                                                <th scope="col">Email Address</th>
                                                <th scope="col">Plan Name</th>
                                                <th scope="col">Amount Paid</th>
                                                <th scope="col">Payment Status</th>
                                                <th scope="col">Payment Date</th>
                                                <th scope="col">Payment Method</th>
                                                <th scope="col">Invoice ID</th>
                                                <th scope="col">Action</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Row 1 -->
                                            <tr>
                                                <td>1</td>
                                                <td>TXN001234</td>
                                                <td>John Doe</td>
                                                <td>john@example.com</td>
                                                <td>Professional</td>
                                                <td>$49.99</td>
                                                <td><span class="badge bg-success">Paid</span></td>
                                                <td>2025-07-01</td>
                                                <td>Credit Card</td>
                                                <td>INV-1001</td>
                                                <td>
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                                            <a class="dropdown-item" href="{{route('invoice-view')}}"><i class="fa-solid fa-eye m-r-5"></i> View</a>
                                                            <a class="dropdown-item" href="{{route('invoice-view')}}"><i class="fa-regular fa-file-pdf m-r-5"></i> Download</a>
                                                            <a class="dropdown-item" href="#"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Row 2 -->
                                            <tr>
                                                <td>2</td>
                                                <td>TXN001235</td>
                                                <td>Jane Smith</td>
                                                <td>jane@example.com</td>
                                                <td>Basic</td>
                                                <td>$19.99</td>
                                                <td><span class="badge bg-warning text-dark">Pending</span></td>
                                                <td>2025-07-05</td>
                                                <td>PayPal</td>
                                                <td>INV-1002</td>
                                                <td>
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                                            <a class="dropdown-item" href="{{route('invoice-view')}}"><i class="fa-solid fa-eye m-r-5"></i> View</a>
                                                            <a class="dropdown-item" href="{{route('invoice-view')}}"><i class="fa-regular fa-file-pdf m-r-5"></i> Download</a>
                                                            <a class="dropdown-item" href="#"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bank & Statutory Tab -->
                    <div class="tab-pane fade" id="subscription">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Subscription</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Plan Name</th>
                                                <th scope="col">Plan Type</th>
                                                <th scope="col">Range</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">VAT</th>
                                                <th scope="col">Total Price</th>
                                                <th scope="col">Start Date</th>
                                                <th scope="col">End Date</th>
                                                <th scope="col">Status</th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Row 1 -->
                                            <tr>
                                                <td>Basic</td>
                                                <td>Monthly</td>
                                                <td>20</td>
                                                <td>10.0</td>
                                                <td>0.00</td>
                                                <td>10.00</td>
                                                <td>2025-07-01</td>
                                                <td>2025-07-01</td>

                                                <td><span class="badge bg-success">Active</span></td>

                                            </tr>

                                            <!-- Row 2 -->
                                            <tr>
                                                <td>Basic</td>
                                                <td>Monthly</td>
                                                <td>20</td>
                                                <td>10.0</td>
                                                <td>0.00</td>
                                                <td>10.00</td>
                                                <td>2025-07-01</td>
                                                <td>2025-07-01</td>

                                                <td><span class="badge bg-success">Active</span></td>

                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Assets Tab -->
                    <div class="tab-pane fade" id="bills">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex aligin-items-center justify-content-between">
                                    <div>
                                        <h4 class="mb-3">Bills</h4>
                                    </div>
                                    <div class="">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#upload_file_modal" class="btn btn-primary">
                                            <i class="fa fa-plus"></i> Upload Bills
                                        </a>

                                    </div>

                                </div>

                                <form method="GET" action="">
                                    <div class="row filter-row align-items-end">





                                        {{-- Plan Type --}}
                                        <div class="col-sm-6 col-md-3">
                                            <div class="input-block mb-3 form-focus select-focus">
                                                <select class="form-control floating" name="plan_type">
                                                    <option value="">Select Bill Type</option>
                                                    <option value="Monthly" {{ request('plan_type') == 'Purchase' ? 'selected' : '' }}>Purchase</option>
                                                    <option value="Yearly" {{ request('plan_type') == 'Expense' ? 'selected' : '' }}>Expense</option>
                                                    <option value="Trial" {{ request('plan_type') == 'Sales' ? 'selected' : '' }}>Sales</option>
                                                </select>
                                                <label class="focus-label">Bill Type</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-3">
                                            <div class="input-block mb-3 form-focus">
                                                <input type="date" name="date" class="form-control floating" value="{{ request('date') }}" />

                                            </div>
                                        </div>


                                        <!-- Search Button -->
                                        <div class="col-sm-6 col-md-3">
                                            <div class="d-grid mb-3">
                                                <button type="submit" class="btn btn-success w-100">Search</button>
                                            </div>
                                        </div>



                                    </div>
                                </form>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Invoice Date</th>
                                                <th>Invoice No</th>
                                                <th>Type</th>

                                                <th>Total</th>
                                                <th>VAT</th>
                                                <th>NET</th>
                                                <th>SR</th>
                                                <th>ZR</th>
                                                <th>Action</th>
                                                <!-- <th>Description</th>
                <th>Cleaning</th>
                <th>Tel</th> -->

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($purchases as $purchase)

                                            <tr>
                                                <td>{{ ($purchase->invoice_date)->format('Y-m-d') }}</td>
                                                <td>{{ $purchase->invoice_no ?? '—' }}</td>
                                                <td>{{ ucfirst($purchase->type ?? '—') }}</td>


                                                <td>{{ number_format($purchase->total_amount, 2) }}</td>
                                                <td>{{ number_format($purchase->vat, 2) }}</td>
                                                <td>{{ number_format($purchase->net, 2) }}</td>
                                                <td>{{ number_format($purchase->sr, 2) }}</td>
                                                <td>{{ number_format($purchase->zr, 2) }}</td>
                                                <td class="text-center">
                                                    <div class="btn-group gap-2" role="group">

                                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editbillModal">
                                                            <i class="fa-solid fa-pencil"></i>
                                                        </button>


                                                        <button class="btn btn-sm btn-danger">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>


                                                        <button class="btn btn-sm btn-success">
                                                            <i class="fa-solid fa-download"></i>
                                                        </button>
                                                    </div>
                                                </td>

                                                <!-- <td>{{ $purchase->description ?? $purchase->supplier_name ?? '—' }}</td>
                    <td>{{ number_format($purchase->cleaning, 2) }}</td>
                    <td>{{ number_format($purchase->tel, 2) }}</td>
                     -->
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>


            <div id="profile_info{{ $client->id }}" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="modal-header">
                                <h5 class="modal-title">Edit Profile Information</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark fs-5"></i></button>
                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    {{-- Profile Image --}}
                                    <div class="col-md-12 text-center">
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

                                    {{-- Full Name --}}
                                    <div class="col-md-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Full Name</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $client->name }}" required>
                                        </div>
                                    </div>
                                    {{-- Last Name --}}
                                    <div class="col-md-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Full Name</label>
                                            <input type="text" name="last_name" class="form-control"
                                                value="{{ $client->last_name }}" required>
                                        </div>
                                    </div>

                                    {{-- Email --}}
                                    <div class="col-md-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ $client->email }}" required>
                                        </div>
                                    </div>

                                    {{-- Phone number --}}
                                    <div class="col-md-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Email</label>
                                            <input type="tel" name="phone" class="form-control"
                                                value="{{ $client->phone }}" required>
                                        </div>
                                    </div>

                                </div> {{-- row end --}}
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="profile_password" class="modal custom-modal fade" tabindex="-1" aria-labelledby="profile_passwordLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content p-4">


                        <div class="modal-header">
                            <h5 class="modal-title fs-3 fw-semibold" id="profile_passwordLabel">Update client Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark fs-5"></i></button>
                        </div>

                        <div class="modal-body">
                            <form method="POST" action="">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label class="form-label fw-bold fs-6">New Password</label>
                                    <input type="password" name="password" class="form-control fs-6 p-2 border-info" placeholder="Enter new password" required>
                                    @error('password')
                                    <div class="text-danger pt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold fs-6">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control fs-6 p-2 border-info" placeholder="Confirm password" required>
                                    @error('password_confirmation')
                                    <div class="text-danger pt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary px-4 py-2">Update</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Business & VAT Edit Modal -->
            <div class="modal fade" id="business_info_modal" tabindex="-1" aria-labelledby="businessInfoModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form action="" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="businessInfoModalLabel">Edit Business & VAT Information</h5>
                                <button type="button" class="btn-close bg-secondary text-white" data-bs-dismiss="modal" aria-label="Close">X</button>
                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    <!-- Business Info -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Business Name</label>
                                            <input type="text" name="business_name" value="{{ $client->business_name }}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Trading Name</label>
                                            <input type="text" name="trading_name" value="{{ $client->trading_name }}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Contact Number</label>
                                            <input type="text" name="business_no" value="{{ $client->business_no }}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                            <textarea name="address" class="form-control">{{ $client->address }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Business Start Date</label>
                                            <input type="date" name="business_date" value="{{ $client->business_date }}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">City/Town</label>
                                            <input type="text" name="city" value="{{ $client->city }}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">State</label>
                                            <input type="text" name="state" value="{{ $client->state }}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Country</label>
                                            <input type="text" name="country" value="{{ $client->country }}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Postal Code</label>
                                            <input type="text" name="post_code" value="{{ $client->post_code }}" class="form-control">
                                        </div>
                                    </div>

                                    <!-- VAT Info -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Book Start Date</label>
                                            <input type="date" name="book_date" value="{{ $client->book_date }}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">VAT Registered</label>
                                            <input type="text" name="vat_register" value="{{ $client->vat_register }}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">VAT Scheme</label>
                                            <input type="text" name="vat_scheme" value="{{ $client->vat_scheme }}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">VAT Registration Date</label>
                                            <input type="date" name="vat_date" value="{{ $client->vat_date }}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">VAT Submit Frequency</label>
                                            <input type="text" name="vat_type" value="{{ $client->vat_type }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Upload File Modal -->
            <!-- Upload File Modal -->
            <div class="modal fade" id="upload_file_modal" tabindex="-1" aria-labelledby="upload_file_modal_label" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="upload_file_modal_label">Upload Bills</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Modal Body / Dropzone -->
                        <form action="/upload" method="POST" class="dropzone" id="fileUploadDropzone" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="dz-message needsclick text-center">
                                    <strong>Drop files here or click to upload.</strong><br />
                                    <span class="note needsclick">(Only image/pdf/doc files are allowed. Max 5MB)</span>
                                </div>
                            </div>

                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Edit bill Modal -->
            <div class="modal fade" id="editbillModal" tabindex="-1" aria-labelledby="editbillModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg"> <!-- medium-large modal -->
                    <form id="editForm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editbillModalLabel">Edit Row</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="editDate" class="form-label">Date</label>
                                        <input type="text" id="editDate" class="form-control" />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="editType" class="form-label">Type</label>
                                        <input type="text" id="editType" class="form-control" />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="editInvoice" class="form-label">Invoice No</label>
                                        <input type="text" id="editInvoice" class="form-control" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="editDescription" class="form-label">Description</label>
                                        <input type="text" id="editDescription" class="form-control" />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="editTotal" class="form-label">Total</label>
                                        <input type="number" step="0.01" id="editTotal" class="form-control" />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="editVAT" class="form-label">VAT</label>
                                        <input type="number" step="0.01" id="editVAT" class="form-control" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="editNET" class="form-label">NET</label>
                                        <input type="number" step="0.01" id="editNET" class="form-control" />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="editSR" class="form-label">SR</label>
                                        <input type="number" step="0.01" id="editSR" class="form-control" />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="editZR" class="form-label">ZR</label>
                                        <input type="number" step="0.01" id="editZR" class="form-control" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label for="editCleaning" class="form-label">Cleaning</label>
                                        <input type="text" id="editCleaning" class="form-control" />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="editTel" class="form-label">Tel</label>
                                        <input type="text" id="editTel" class="form-control" />
                                    </div>
                                    <!-- 3rd col empty to keep spacing -->
                                    <div class="col-md-4"></div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>






        </div>
    </div>


    {{-- Image preview script --}}
    <!-- <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('profile-preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script> -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hash = window.location.hash;

            if (hash) {
                const triggerEl = document.querySelector(`a.nav-link[href="${hash}"]`);
                if (triggerEl) {
                    const tab = new bootstrap.Tab(triggerEl);
                    tab.show();
                }
            }
            Dropzone.options.fileUploadDropzone = {
                paramName: "file",
                maxFilesize: 5, // MB
                acceptedFiles: ".jpg,.jpeg,.png,.pdf,.doc,.docx,.xls,.xlsx,.txt",
                addRemoveLinks: true,
                clickable: true,
                timeout: 5000,
                dictDefaultMessage: "Drag and drop files here or click to upload.",
                init: function() {
                    this.on("error", function(file) {
                        // Just clear the error message completely
                        let errorDisplay = file.previewElement.querySelector("[data-dz-errormessage]");
                        if (errorDisplay) {
                            errorDisplay.textContent = "";
                        }
                    });
                }
            };
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
    <!-- Dropzone JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>


</body>

<!-- Mirrored from smarthr.dreamstechnologies.com/laravel/template/public/profile by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Aug 2024 02:21:50 GMT -->

</html>
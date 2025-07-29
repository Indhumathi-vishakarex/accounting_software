@include('layouts.head')


<body>
    <div class="main-wrapper">
        @include('layouts.header')
        @include('layouts.sidebar')

        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Subscriptions</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{route('admin-dashboard')}}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Subscriptions</li>
                            </ul>
                        </div>
                        <div class="col-auto float-end ms-auto">
                            <a
                                href="{{route('create-plan')}}"
                                class="btn add-btn"><i class="fa fa-plus"></i> Add Subscription</a>
                        </div>
                    </div>
                </div>
                <form method="GET" action="">
                    <div class="row filter-row">

                        {{-- Plan Name --}}
                        <div class="col-sm-6 col-md-3">
                            <div class="input-block mb-3 form-focus">
                                <input type="text" name="name" class="form-control floating" value="{{ request('name') }}" />
                                <label class="focus-label">Plan Name</label>
                            </div>
                        </div>

                        {{-- Plan Type --}}
                        <div class="col-sm-6 col-md-3">
                            <div class="input-block mb-3 form-focus select-focus">
                                <select class="form-control floating" name="plan_type">
                                    <option value="">Select Plan Type</option>
                                    <option value="Monthly" {{ request('plan_type') == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                                    <option value="Yearly" {{ request('plan_type') == 'Yearly' ? 'selected' : '' }}>Yearly</option>
                                    <option value="Trial" {{ request('plan_type') == 'Trial' ? 'selected' : '' }}>Trial</option>
                                </select>
                                <label class="focus-label">Plan Type</label>
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="col-sm-6 col-md-3">
                            <div class="input-block mb-3 form-focus select-focus">
                                <select class="form-control floating" name="status">
                                    <option value="">Select Status</option>
                                    <option value="Active" {{ request('status') == 'Active' ? 'selected' : '' }}>Active</option>
                                    <option value="Inactive" {{ request('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                <label class="focus-label">Status</label>
                            </div>
                        </div>

                        {{-- Search Button --}}
                        <div class="col-sm-6 col-md-3">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success w-100">Search</button>
                            </div>
                        </div>

                    </div>

                </form>

                <div class="row mb-30 equal-height-cards">
                    <div class="col-md-4">
                        <div class="card pricing-box h-100">
                            <div class="card-body d-flex flex-column">

                                <!-- Top Badge (right-aligned) -->
                                <div class="d-flex justify-content-end mb-2">
                                    <span class="badge bg-success text-uppercase px-3 py-2 small">Active</span>
                                </div>

                                <!-- Centered Plan Title -->
                                <div class="text-center mb-1">
                                    <h3 class="mb-0">Free</h3>
                                </div>

                                <!-- Price and Duration -->
                                <div class="mb-2 text-center">
                                    <span class="display-6 fw-bold">$0</span>
                                    <span class="text-muted">/Yearly</span>
                                </div>

                                <!-- Big Duration Badge -->
                                <div class="mb-4 text-center">
                                    <span class="badge bg-primary fs-6 px-4 py-2">30 Days</span>
                                    <!-- Or: <span class="badge bg-primary fs-6 px-4 py-2">12 Months</span> -->
                                </div>

                                <!-- Features in Two Columns -->
                                <div class="row mb-4">
                                    <div class="col-6">
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-check text-success me-2"></i><b>1 User</b></li>
                                            <li><i class="fa fa-check text-success me-2"></i>5 Projects</li>
                                            <li><i class="fa fa-check text-success me-2"></i>5 GB Storage</li>
                                            <li><i class="fa fa-check text-success me-2"></i>Unlimited Message</li>
                                            <li><i class="fa fa-check text-success me-2"></i>Email Support</li>
                                        </ul>
                                    </div>
                                    <div class="col-6">
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-check text-success me-2"></i>Team Access</li>
                                            <li><i class="fa fa-check text-success me-2"></i>API Access</li>
                                            <li><i class="fa fa-check text-success me-2"></i>Basic Analytics</li>
                                            <li><i class="fa fa-check text-success me-2"></i>Community Support</li>
                                            <li><i class="fa fa-check text-success me-2"></i>Secure Data</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="mt-auto d-flex justify-content-between">
                                    <a href="#" class="btn btn-outline-secondary btn-sm px-3"
                                        data-bs-toggle="modal" data-bs-target="#edit_plan">Edit</a>
                                    <form action="" method="POST" onsubmit="return confirm('Are you sure you want to delete this plan?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm px-3">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card pricing-box h-100">
                            <div class="card-body d-flex flex-column">

                                <div class="d-flex justify-content-end mb-2">
                                    <span class="badge bg-danger text-uppercase  px-3 py-2">Inactive</span>
                                </div>

                                <!-- Centered Plan Title -->
                                <div class="text-center mb-1">
                                    <h3 class="mb-0">Professional</h3>
                                </div>

                                {{-- Price and Duration Label --}}
                                <div class="mb-2">
                                    <span class="display-6 fw-bold">$0</span>
                                    <span class="text-muted">/Monthly</span>
                                </div>

                                {{-- BIG Duration Display --}}
                                <div class="mb-4">
                                    <span class="badge bg-primary fs-6 px-4 py-2">12 Months</span>
                                </div>

                                {{-- Feature List in Two Columns --}}
                                <div class="row mb-4">
                                    <div class="col-6">
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-check text-success me-2"></i><b>1 User</b></li>
                                            <li><i class="fa fa-check text-success me-2"></i>5 Projects</li>
                                            <li><i class="fa fa-check text-success me-2"></i>5 GB Storage</li>
                                            <li><i class="fa fa-check text-success me-2"></i>Unlimited Message</li>
                                            <li><i class="fa fa-check text-success me-2"></i>Email Support</li>
                                        </ul>
                                    </div>
                                    <div class="col-6">
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-check text-success me-2"></i>Team Access</li>
                                            <li><i class="fa fa-check text-success me-2"></i>API Access</li>
                                            <li><i class="fa fa-check text-success me-2"></i>Basic Analytics</li>
                                            <li><i class="fa fa-check text-success me-2"></i>Community Support</li>
                                            <li><i class="fa fa-check text-success me-2"></i>Secure Data</li>
                                        </ul>
                                    </div>
                                </div>

                                {{-- Action Buttons --}}
                                <div class="mt-auto d-flex justify-content-between">
                                    <a href="#" class="btn btn-outline-secondary btn-sm px-3"
                                        data-bs-toggle="modal" data-bs-target="#edit_plan">Edit</a>
                                    <form action="" method="POST" onsubmit="return confirm('Are you sure you want to delete this plan?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm px-3">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
    <div class="card pricing-box h-100">
        <div class="card-body d-flex flex-column">

            <!-- Top Badge (right-aligned) -->
            <div class="d-flex justify-content-end mb-2">
                <span class="badge bg-success text-uppercase px-3 py-2 small">Active</span>
            </div>

            <!-- Centered Plan Title -->
            <div class="text-center mb-1">
                <h3 class="mb-0">Free</h3>
            </div>

            <!-- Price and Duration -->
            <div class="mb-2 text-center">
                <span class="display-6 fw-bold">$0</span>
                <span class="text-muted">/Yearly</span>
            </div>

            <!-- Big Duration Badge -->
            <div class="mb-4 text-center">
                <span class="badge bg-primary fs-6 px-4 py-2">30 Days</span>
                <!-- Or: <span class="badge bg-primary fs-6 px-4 py-2">12 Months</span> -->
            </div>

            <!-- Features in Two Columns -->
            <div class="row mb-4">
                <div class="col-6">
                    <ul class="list-unstyled">
                        <li><i class="fa fa-check text-success me-2"></i><b>1 User</b></li>
                        <li><i class="fa fa-check text-success me-2"></i>5 Projects</li>
                        <li><i class="fa fa-check text-success me-2"></i>5 GB Storage</li>
                        <li><i class="fa fa-check text-success me-2"></i>Unlimited Message</li>
                        <li><i class="fa fa-check text-success me-2"></i>Email Support</li>
                    </ul>
                </div>
                <div class="col-6">
                    <ul class="list-unstyled">
                        <li><i class="fa fa-check text-success me-2"></i>Team Access</li>
                        <li><i class="fa fa-check text-success me-2"></i>API Access</li>
                        <li><i class="fa fa-check text-success me-2"></i>Basic Analytics</li>
                        <li><i class="fa fa-check text-success me-2"></i>Community Support</li>
                        <li><i class="fa fa-check text-success me-2"></i>Secure Data</li>
                    </ul>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-auto d-flex justify-content-between">
                <a href="#" class="btn btn-outline-secondary btn-sm px-3"
                   data-bs-toggle="modal" data-bs-target="#edit_plan">Edit</a>
                <form action="" method="POST" onsubmit="return confirm('Are you sure you want to delete this plan?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm px-3">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

                </div>

                <!-- <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="row justify-content-center mb-4">
                            <div class="col-auto">
                                <nav class="nav btn-group">
                                    <a
                                        href="#monthly"
                                        class="btn btn-outline-secondary active show"
                                        data-bs-toggle="tab">Monthly Plan</a>
                                    <a
                                        href="#annual"
                                        class="btn btn-outline-secondary"
                                        data-bs-toggle="tab">Annual Plan</a>
                                </nav>
                            </div>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="monthly">
                                <div class="row mb-30 equal-height-cards">
                                    <div class="col-md-4">
                                        <div class="card pricing-box">
                                            <div class="card-body d-flex flex-column">
                                                <div class="mb-4">
                                                    <h3>Free</h3>
                                                    <span class="display-4">$0</span>
                                                </div>
                                                <ul>
                                                    <li><i class="fa fa-check"></i> <b>1 User</b></li>
                                                    <li><i class="fa fa-check"></i> 5 Projects</li>
                                                    <li><i class="fa fa-check"></i> 5 GB Storage</li>
                                                    <li>
                                                        <i class="fa fa-check"></i> Unlimited Message
                                                    </li>
                                                </ul>
                                                <a
                                                    href="#"
                                                    class="btn btn-lg btn-secondary mt-auto"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#edit_plan">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card pricing-box">
                                            <div class="card-body d-flex flex-column">
                                                <div class="mb-4">
                                                    <h3>Professional</h3>
                                                    <span class="display-4">$21</span>
                                                    <span>/mo</span>
                                                </div>
                                                <ul>
                                                    <li><i class="fa fa-check"></i> <b>30 Users</b></li>
                                                    <li><i class="fa fa-check"></i> 50 Projects</li>
                                                    <li><i class="fa fa-check"></i> 100 GB Storage</li>
                                                    <li>
                                                        <i class="fa fa-check"></i> Unlimited Message
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-check"></i> 24/7 Customer Support
                                                    </li>
                                                </ul>
                                                <a
                                                    href="#"
                                                    class="btn btn-lg btn-secondary mt-auto"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#edit_plan">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card pricing-box">
                                            <div class="card-body d-flex flex-column">
                                                <div class="mb-4">
                                                    <h3>Enterprise</h3>
                                                    <span class="display-4">$38</span>
                                                    <span>/mo</span>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <i class="fa fa-check"></i>
                                                        <b>Unlimited Users </b>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-check"></i> Unlimited Projects
                                                    </li>
                                                    <li><i class="fa fa-check"></i> 500 GB Storage</li>
                                                    <li>
                                                        <i class="fa fa-check"></i> Unlimited Message
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-check"></i> Voice and Video Call
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-check"></i> 24/7 Customer Support
                                                    </li>
                                                </ul>
                                                <a
                                                    href="#"
                                                    class="btn btn-lg btn-secondary mt-auto"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#edit_plan">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-table mb-0">
                                            <div class="card-header">
                                                <h4 class="card-title mb-0">Plan Details</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Plan</th>
                                                                <th>Plan Type</th>
                                                                <th>Create Date</th>
                                                                <th>Modified Date</th>
                                                                <th>Amount</th>
                                                                <th>Subscribed Users</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Free Trial</td>
                                                                <td>Monthly</td>
                                                                <td>9 Nov 2019</td>
                                                                <td>8 Dec 2019</td>
                                                                <td>Free</td>
                                                                <td>
                                                                    <a
                                                                        class="btn btn-info btn-sm"
                                                                        href="">30 Users</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Professional</td>
                                                                <td>Monthly</td>
                                                                <td>9 Nov 2019</td>
                                                                <td>8 Dec 2019</td>
                                                                <td>$21</td>
                                                                <td>
                                                                    <a
                                                                        class="btn btn-info btn-sm"
                                                                        href="">97 Users</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Enterprise</td>
                                                                <td>Monthly</td>
                                                                <td>9 Nov 2019</td>
                                                                <td>8 Dec 2019</td>
                                                                <td>$38</td>
                                                                <td>
                                                                    <a
                                                                        class="btn btn-info btn-sm"
                                                                        href="">125 Users</a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                        </div>



                        <div class="modal custom-modal fade" id="edit_plan" role="dialog">
                            <div class="modal-dialog modal-md modal-dialog-centered">
                                <div class="modal-content">
                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal">
                                        <i class="fa fa-close"></i>
                                    </button>
                                    <div class="modal-body">
                                        <h5 class="modal-title text-center mb-3">Edit Plan</h5>
                                        <form>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-block mb-3">
                                                        <label class="col-form-label">Plan Name</label>
                                                        <input
                                                            type="text"
                                                            placeholder="Free Trial"
                                                            class="form-control"
                                                            value="Free Trial" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-block mb-3">
                                                        <label class="col-form-label">Plan Amount</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            value="$500" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-block mb-3">
                                                        <label class="col-form-label">Plan Type</label>
                                                        <select class="select">
                                                            <option>Monthly</option>
                                                            <option>Yearly</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-block mb-3">
                                                        <label class="col-form-label">No of Users</label>
                                                        <select class="select">
                                                            <option>5 Users</option>
                                                            <option>50 Users</option>
                                                            <option>Unlimited</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-block mb-3">
                                                        <label class="col-form-label">No of Projects</label>
                                                        <select class="select">
                                                            <option>5 Projects</option>
                                                            <option>50 Projects</option>
                                                            <option>Unlimited</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-block mb-3">
                                                        <label class="col-form-label">No of Storage Space</label>
                                                        <select class="select">
                                                            <option>5 GB</option>
                                                            <option>100 GB</option>
                                                            <option>500 GB</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-block mb-3">
                                                <label class="col-form-label">Plan Description</label>
                                                <textarea
                                                    class="form-control"
                                                    rows="4"
                                                    cols="30"></textarea>
                                            </div>
                                            <div class="input-block mb-3">
                                                <label class="d-block col-form-label">Status</label>
                                                <div class="status-toggle">
                                                    <input
                                                        type="checkbox"
                                                        id="edit_plan_status"
                                                        class="check" />
                                                    <label for="edit_plan_status" class="checktoggle">checkbox</label>
                                                </div>
                                            </div>
                                            <div class="m-t-20 text-center">
                                                <button class="btn btn-primary submit-btn">
                                                    Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="modal custom-modal fade" id="edit_plan" role="dialog">
                    <div class="modal-dialog modal-md modal-dialog-centered">
                        <div class="modal-content">
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal">
                                <i class="fa fa-close"></i>
                            </button>
                            <div class="modal-body">
                                <h5 class="modal-title text-center mb-3">Edit Plan</h5>
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-block mb-3">
                                                <label class="col-form-label">Plan Name</label>
                                                <input
                                                    type="text"
                                                    placeholder="Free Trial"
                                                    class="form-control"
                                                    value="Free Trial" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-block mb-3">
                                                <label class="col-form-label">Plan Amount</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    value="$500" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-block mb-3">
                                                <label class="col-form-label">Plan Type</label>
                                                <select class="select">
                                                    <option>Monthly</option>
                                                    <option>Yearly</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-block mb-3">
                                                <label class="col-form-label">Plan Duration</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    value="30" />
                                            </div>
                                        </div>
                                        <!-- Add Feature Input -->
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Add Feature</label>
                                            <div class="d-flex">
                                                <input type="text" id="feature_input" class="form-control me-2" placeholder="Enter feature">
                                                <button type="button" onclick="addFeature()" class="btn btn-secondary">Add</button>
                                            </div>
                                        </div>

                                        <!-- Feature Display -->
                                        <label class="form-label fw-semibold d-block">Features Added</label>
                                        <div id="features_container" class="d-flex flex-wrap gap-2">
                                            <!-- Example Existing Features -->
                                            <span class="badge bg-light text-dark border px-3 py-2 d-flex align-items-center">
                                                1 User
                                                <i class="fa fa-times ms-2 text-danger cursor-pointer small" onclick="removeFeature(this)"></i>
                                            </span>
                                            <span class="badge bg-light text-dark border px-3 py-2 d-flex align-items-center">
                                                Unlimited Projects
                                                <i class="fa fa-times ms-2 text-danger cursor-pointer small" onclick="removeFeature(this)"></i>
                                            </span>
                                        </div>



                                    </div>

                                    <div class="input-block mb-3">
                                        <label class="d-block col-form-label">Status</label>
                                        <div class="status-toggle">
                                            <input
                                                type="checkbox"
                                                id="edit_plan_status"
                                                class="check" />
                                            <label for="edit_plan_status" class="checktoggle">checkbox</label>
                                        </div>
                                    </div>
                                    <div class="m-t-20 text-center">
                                        <button class="btn btn-primary submit-btn">
                                            Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <script src="{{ asset('assets/js/theme-settings.js') }}"></script>
    <script src="{{ asset('assets/js/greedynav.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- Cloudflare Rocket Loader -->
    <script src="{{ asset('../../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}" data-cf-settings="2677b5cf9375b85502dbc51e-|49" defer></script>

</body>

<!-- Mirrored from smarthr.dreamstechnologies.com/laravel/template/public/subscriptions by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Aug 2024 02:23:15 GMT -->

</html>
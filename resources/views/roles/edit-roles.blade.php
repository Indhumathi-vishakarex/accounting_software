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
                            <h3 class="page-title">Edit Role</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin-dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Edit Role</li>
                            </ul>
                        </div>
                    </div>
                </div>



                <div class="">
                    <div class="card-body fs-5">
                        <div class="container-fluid w-75">
                            <!-- <h2></h2> -->
                            <form method="POST" action="{{ route('roles.update', $role->id) }}">
                                @csrf
                                @method('PUT')

                                {{-- Role Name --}}
                                <div class="mb-3">
                                    <label for="rolename" class="form-label fw-bold">Role Name <span class="text-danger">*</span></label>
                                    <input
                                        type="text"

                                        class="large-input form-control @error('rolename') is-invalid @enderror"
                                        name="rolename" id="rolename{{ $role->id }}"
                                        value="{{ old('rolename', $role->rolename) }}"
                                        required>
                                    @error('rolename')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- {{-- Type (Text Input) --}}
                                <div class="mb-3">
                                    <label for="type" class="form-label">Type <span class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        id="type"
                                        name="type"
                                        class="large-input form-control @error('type') is-invalid @enderror"
                                        placeholder="Enter role type (e.g., Admin, Moderator)"
                                        value="{{ old('type') }}"
                                        required>
                                    @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div> -->

                                {{-- Permissions (Checkboxes) --}}
                                <!-- <div class="mb-3">
                                    <label class="form-label">Permissions <span class="text-danger">*</span></label><br>
                                    <div class="form-check">
                                        <input
                                            type="checkbox"
                                            id="permission_view"
                                            name="permissions[]"
                                            value="view"
                                            class="form-check-input @error('permissions') is-invalid @enderror"
                                            {{ in_array('view', old('permissions', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="permission_view">View</label>
                                    </div>

                                    <div class="form-check">
                                        <input
                                            type="checkbox"
                                            id="permission_create"
                                            name="permissions[]"
                                            value="create"
                                            class="form-check-input @error('permissions') is-invalid @enderror"
                                            {{ in_array('create', old('permissions', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="permission_create">Create</label>
                                    </div>

                                    <div class="form-check">
                                        <input
                                            type="checkbox"
                                            id="permission_edit"
                                            name="permissions[]"
                                            value="edit"
                                            class="form-check-input @error('permissions') is-invalid @enderror"
                                            {{ in_array('edit', old('permissions', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="permission_edit">Edit</label>
                                    </div>

                                    <div class="form-check">
                                        <input
                                            type="checkbox"
                                            id="permission_delete"
                                            name="permissions[]"
                                            value="delete"
                                            class="form-check-input @error('permissions') is-invalid @enderror"
                                            {{ in_array('delete', old('permissions', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="permission_delete">Delete</label>
                                    </div>

                                    @error('permissions')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div> -->

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Permissions <span class="text-danger">*</span></label><br>

                                    <!-- Row 1: All Permissions -->
                                    <div class="row mb-3">
                                        
                                            <div class="form-check">
                                                <input type="checkbox" id="permission_all" class="form-check-input">
                                                <label class="form-check-label ms-1" for="permission_all">All Permissions</label>
                                            </div>
                                     
                                    </div>
<hr>

                                    <!-- Row 2: Category Permissions -->
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input type="checkbox" id="permission_category" class="form-check-input module-checkbox" data-target="category">
                                                <label class="form-check-label" for="permission_category">Category</label>
                                            </div>
                                        </div>
                                        <div class="col-md-9 d-flex flex-wrap gap-3">
                                            <div class="form-check me-3">
                                                <input type="checkbox" id="category_view" class="form-check-input category">
                                                <label class="form-check-label" for="category_view">category_view</label>
                                            </div>
                                            <div class="form-check me-3">
                                                <input type="checkbox" id="category_create" class="form-check-input category">
                                                <label class="form-check-label" for="category_create">category_create</label>
                                            </div>
                                            <div class="form-check me-3">
                                                <input type="checkbox" id="category_edit" class="form-check-input category">
                                                <label class="form-check-label" for="category_edit">category_edit</label>
                                            </div>
                                            <div class="form-check me-3">
                                                <input type="checkbox" id="category_delete" class="form-check-input category">
                                                <label class="form-check-label" for="category_delete">category_delete</label>
                                            </div>
                                            <div class="form-check me-3">
                                                <input type="checkbox" id="category_approve" class="form-check-input category">
                                                <label class="form-check-label" for="category_approve">category_approve</label>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <!-- Row 3: Subscription Permissions -->
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input type="checkbox" id="permission_subscription" class="form-check-input module-checkbox" data-target="subscription">
                                                <label class="form-check-label" for="permission_subscription">Subscription</label>
                                            </div>
                                        </div>
                                        <div class="col-md-9 d-flex flex-wrap gap-3">
                                            <div class="form-check me-3">
                                                <input type="checkbox" id="subscription_view" class="form-check-input subscription">
                                                <label class="form-check-label" for="subscription_view">subscription_view</label>
                                            </div>
                                            <div class="form-check me-3">
                                                <input type="checkbox" id="subscription_create" class="form-check-input subscription">
                                                <label class="form-check-label" for="subscription_create">subscription_create</label>
                                            </div>
                                            <div class="form-check me-3">
                                                <input type="checkbox" id="subscription_edit" class="form-check-input subscription">
                                                <label class="form-check-label" for="subscription_edit">subscription_edit</label>
                                            </div>
                                            <div class="form-check me-3">
                                                <input type="checkbox" id="subscription_delete" class="form-check-input subscription">
                                                <label class="form-check-label" for="subscription_delete">subscription_delete</label>
                                            </div>
                                            <div class="form-check me-3">
                                                <input type="checkbox" id="subscription_approve" class="form-check-input subscription">
                                                <label class="form-check-label" for="subscription_approve">subscription_approve</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <!-- Row 4: Client Permissions -->
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input type="checkbox" id="permission_client" class="form-check-input module-checkbox" data-target="client">
                                            <label class="form-check-label" for="permission_client">Clients</label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 d-flex flex-wrap gap-3">
                                        <div class="form-check me-3">
                                            <input type="checkbox" id="client_view" class="form-check-input client">
                                            <label class="form-check-label" for="client_view">clients_view</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input type="checkbox" id="client_create" class="form-check-input client">
                                            <label class="form-check-label" for="client_create">clients_create</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input type="checkbox" id="client_edit" class="form-check-input client">
                                            <label class="form-check-label" for="client_edit">clients_edit</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input type="checkbox" id="client_delete" class="form-check-input client">
                                            <label class="form-check-label" for="client_delete">clients_delete</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input type="checkbox" id="client_approve" class="form-check-input client">
                                            <label class="form-check-label" for="client_approve">clients_approve</label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <!-- Row: Staff Permissions -->
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input type="checkbox" id="permission_staff" class="form-check-input module-checkbox" data-target="staff">
                                            <label class="form-check-label" for="permission_staff">Staffs</label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 d-flex flex-wrap gap-3">
                                        <div class="form-check me-3">
                                            <input type="checkbox" id="staff_view" class="form-check-input staff">
                                            <label class="form-check-label" for="staff_view">staffs_view</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input type="checkbox" id="staff_create" class="form-check-input staff">
                                            <label class="form-check-label" for="staff_create">staffs_create</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input type="checkbox" id="staff_edit" class="form-check-input staff">
                                            <label class="form-check-label" for="staff_edit">staffs_edit</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input type="checkbox" id="staff_delete" class="form-check-input staff">
                                            <label class="form-check-label" for="staff_delete">staffs_delete</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input type="checkbox" id="staff_approve" class="form-check-input staff">
                                            <label class="form-check-label" for="staff_approve">staffs_approve</label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <!-- Row: Bills Permissions -->
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input type="checkbox" id="permission_bills" class="form-check-input module-checkbox" data-target="bills">
                                            <label class="form-check-label" for="permission_bills">Bills</label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 d-flex flex-wrap gap-3">
                                        <div class="form-check me-3">
                                            <input type="checkbox" id="bills_view" class="form-check-input bills">
                                            <label class="form-check-label" for="bills_view">bills_view</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input type="checkbox" id="bills_create" class="form-check-input bills">
                                            <label class="form-check-label" for="bills_create">bills_create</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input type="checkbox" id="bills_edit" class="form-check-input bills">
                                            <label class="form-check-label" for="bills_edit">bills_edit</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input type="checkbox" id="bills_delete" class="form-check-input bills">
                                            <label class="form-check-label" for="bills_delete">bills_delete</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input type="checkbox" id="bills_approve" class="form-check-input bills">
                                            <label class="form-check-label" for="bills_approve">bills_approve</label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <!-- Row: Payment Permissions -->
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input type="checkbox" id="permission_payment" class="form-check-input module-checkbox" data-target="payment">
                                            <label class="form-check-label" for="permission_payment">Payment</label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 d-flex flex-wrap gap-3">
                                        <div class="form-check me-3">
                                            <input type="checkbox" id="payment_view" class="form-check-input payment">
                                            <label class="form-check-label" for="payment_view">payment_view</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input type="checkbox" id="payment_create" class="form-check-input payment">
                                            <label class="form-check-label" for="payment_create">payment_create</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input type="checkbox" id="payment_edit" class="form-check-input payment">
                                            <label class="form-check-label" for="payment_edit">payment_edit</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input type="checkbox" id="payment_delete" class="form-check-input payment">
                                            <label class="form-check-label" for="payment_delete">payment_delete</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input type="checkbox" id="payment_approve" class="form-check-input payment">
                                            <label class="form-check-label" for="payment_approve">payment_approve</label>
                                        </div>
                                    </div>
                                </div>





                                {{-- Status Toggle --}}
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Status</label><br>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="status" value="active" class="form-check-input"
                                            {{ $role->status === 'active' ? 'checked' : '' }}>
                                        <label class="form-check-label">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="status" value="inactive" class="form-check-input"
                                            {{ $role->status === 'inactive' ? 'checked' : '' }}>
                                        <label class="form-check-label">Inactive</label>
                                    </div>
                                </div>

                                    {{-- Submit Button --}}
                                    <button type="submit" class="btn btn-primary">Register</button>
                            </form>

                        </div>


                    </div>
                </div>
            </div>




            <script>
                // Toggle All Permissions
                document.getElementById('permission_all').addEventListener('change', function() {
                    const allCheckboxes = document.querySelectorAll('.form-check-input');
                    allCheckboxes.forEach(cb => {
                        if (cb.id !== 'permission_all') {
                            cb.checked = this.checked;
                        }
                    });
                });

                // Toggle Module Permissions (Category, Subscription, etc.)
                document.querySelectorAll('.module-checkbox').forEach(moduleCheckbox => {
                    moduleCheckbox.addEventListener('change', function() {
                        const targetClass = this.dataset.target;
                        const related = document.querySelectorAll(`.${targetClass}`);
                        related.forEach(cb => cb.checked = this.checked);
                    });
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
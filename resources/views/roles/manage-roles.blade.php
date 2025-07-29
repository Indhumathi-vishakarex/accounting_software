@include('layouts.head')


<body>

    <div class="main-wrapper">

        @include('layouts.header')
        @include('layouts.sidebar')

        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Manage Roles</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Manage Roles</li>
                            </ul>
                        </div>
                        <div class="col-auto d-flex align-items-center">
                            <a
                                href="{{ route('create-roles') }}"
                                class="btn add-btn me-2">
                                <i class="fa fa-plus"></i> Add Role
                            </a>

                        </div>
                    </div>

                </div>

                <div class="table-responsive">
                    <table class="table table-striped fs-6 table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">Role ID</th>
                                <th scope="col">Role Name</th>
                                <th scope="col">Permission</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td class="fs-6">{{ $role->id }}</td>
                                <td class="fs-6">{{ $role->rolename }}</td>
                                <!-- <td>
                                <div class="d-flex gap-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" {{ $role->can_view ? 'checked' : '' }} disabled>
                                        <label class="form-check-label">View</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" {{ $role->can_create ? 'checked' : '' }} disabled>
                                        <label class="form-check-label">Create</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" {{ $role->can_edit ? 'checked' : '' }} disabled>
                                        <label class="form-check-label">Edit</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" {{ $role->can_delete ? 'checked' : '' }} disabled>
                                        <label class="form-check-label">Delete</label>
                                    </div>
                                </div>
                            </td> -->
                                <td class="d-flex flex-column gap-2">

                                    <div class="d-flex">
                                        <span class="badge bg-primary me-1">staffs_view</span>
                                        <span class="badge bg-primary me-1">staffs_create</span>
                                        <span class="badge bg-primary me-1">staffs_edit</span>
                                        <span class="badge bg-primary me-1">staffs_delete</span>
                                        <span class="badge bg-primary me-1">staffs_approve</span>
                                    </div>

<div class="d-flex">
                                        <span class="badge bg-primary me-1">clients_view</span>
                                        <span class="badge bg-primary me-1">clients_create</span>
                                        <span class="badge bg-primary me-1">clients_edit</span>
                                        <span class="badge bg-primary me-1">clients_delete</span>
                                        <span class="badge bg-primary me-1">clients_approve</span>
</div>

<div class="d-flex">

                                        <span class="badge bg-primary me-1">payment_view</span>
                                        <span class="badge bg-primary me-1">payment_create</span>
                                        <span class="badge bg-primary me-1">payment_edit</span>
                                        <span class="badge bg-primary me-1">payment_delete</span>
                                        <span class="badge bg-primary me-1">payment_approve</span>
</div>
<div class="d-flex">

                                        <span class="badge bg-primary me-1">subscription_view</span>
                                        <span class="badge bg-primary me-1">subscription_create</span>
                                        <span class="badge bg-primary me-1">subscription_edit</span>
                                        <span class="badge bg-primary me-1">subscription_delete</span>
                                        <span class="badge bg-primary me-1">subscription_approve</span>
</div>
<div class="d-flex">

                                        <span class="badge bg-primary me-1">category_view</span>
                                        <span class="badge bg-primary me-1">category_create</span>
                                        <span class="badge bg-primary me-1">category_edit</span>
                                        <span class="badge bg-primary me-1">category_delete</span>
                                        <span class="badge bg-primary me-1">category_approve</span>

</div>
<div class="d-flex">
                                        <span class="badge bg-primary me-1">bills_view</span>
                                        <span class="badge bg-primary me-1">bills_create</span>
                                        <span class="badge bg-primary me-1">bills_edit</span>
                                        <span class="badge bg-primary me-1">bills_delete</span>
                                        <span class="badge bg-primary me-1">bills_approve</span>
</div>
                                    </div>
                                </td>


                                <td class="fs-6">
                                    @if($role->status === 'active')
                                    <span class="badge badge-success p-2">Active</span>
                                    @else
                                    <span class="badge badge-danger p-2">Inactive</span>
                                    @endif
                                </td>

                                <td>
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">

                                            <a href="{{ route('edit-role', $role->id) }}" class="dropdown-item">
                                                <i class="fa-solid fa-pencil m-r-5"></i> Edit
                                            </a>


                                            <a href="{{ route('roles.destroy', $role->id) }}"
                                                onclick="event.preventDefault(); 
            if (confirm('Are you sure you want to delete this role?')) {
                document.getElementById('delete-form-{{ $role->id }}').submit();
            }"
                                                class="dropdown-item text-danger">
                                                <i class="fa-regular fa-trash-can m-r-5"></i> Delete
                                            </a>

                                            <form id="delete-form-{{ $role->id }}" action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                        </div>
                                    </div>
                                </td>
                            </tr>


                            <!-- Edit Role Modal -->
                            <div id="edit_role{{ $role->id }}" class="modal fade" tabindex="-1" aria-labelledby="editRoleLabel{{ $role->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <form method="POST" action="{{ route('roles.update', $role->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editRoleLabel{{ $role->id }}">Edit Role - {{ $role->rolename }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark fs-5"></i></button>
                                            </div>

                                            <div class="modal-body">
                                                <!-- Role Name -->
                                                <div class="mb-3">
                                                    <label for="rolename{{ $role->id }}" class="form-label fw-bold">Role Name</label>
                                                    <input type="text" name="rolename" id="rolename{{ $role->id }}" class="form-control"
                                                        value="{{ old('rolename', $role->rolename) }}">
                                                </div>

                                                <!-- Permissions
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Permissions</label>
                                                <div class="d-flex gap-4 flex-wrap">
                                                    @php
                                                    $permissions = ['can_view' => 'View', 'can_create' => 'Create', 'can_edit' => 'Edit', 'can_delete' => 'Delete'];
                                                    @endphp
                                                    @foreach ($permissions as $field => $label)
                                                    <div class="form-check">
                                                        <input type="checkbox" name="{{ $field }}" id="{{ $field }}{{ $role->id }}"
                                                            class="form-check-input"
                                                            {{ $role->$field ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="{{ $field }}{{ $role->id }}">{{ $label }}</label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div> -->

                                                <!-- Row 1: All Permissions -->
                                                <div class="row mb-3">
                                                    <div class="col-md-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" id="permission_all" class="form-check-input">
                                                            <label class="form-check-label" for="permission_all">All Permissions</label>
                                                        </div>
                                                    </div>
                                                </div>

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

                                            <!-- Status -->
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
                                    </div>

                                    <!-- Modal Footer -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Update</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                </div>

                @endforeach
                </tbody>

                </table>
            </div>
            </div>
        </div>
    </div>










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
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ui.touch-punch.min.js') }}"></script>

    <!-- Layout & Theme Scripts -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <script src="{{ asset('assets/js/theme-settings.js') }}"></script>
    <script src="{{ asset('assets/js/greedynav.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- Custom Script -->
    <!-- <script>
$(document).on('click', '.edit-role-btn', function (e) {
    e.preventDefault();
    var roleId = $(this).data('role-id');

    $.get('/roles/edit/' + roleId, function (response) {
        $('#edit-role-body').html(response.html); // Insert form into modal
        $('#edit_role').modal('show'); // Show modal
    });
});
</script> -->

</body>

</html>
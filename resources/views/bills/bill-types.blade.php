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
                            <h3 class="page-title">Bill Types</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin-dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Bill Types</li>
                            </ul>
                        </div>
                        <div class="col-auto float-end ms-auto"></div>
                        <div class="col-auto float-end ms-auto">
                            <a
                                href=""
                                class="btn add-btn" data-bs-toggle="modal" data-bs-target="#create_bill"><i class="fa fa-plus"></i> Add Bill</a>

                        </div>
                    </div>
                </div>

                <form method="GET" action="{{ route('client-list') }}">
                    <div class="row filter-row">

                        <div class="col-sm-6 col-md-3">
                            <div class="input-block mb-3 form-focus">
                                <input type="text" name="name" class="form-control floating" value="{{ request('name') }}" />
                                <label class="focus-label">Bill Name</label>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success w-100">Search</button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-light">
                            <tr>
                                <th>Bill Name</th>
                                <th>Description</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Purchase</td>
                                <td>Used for recording all supplier purchases.</td>
                                <td>
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">

                                            <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit_bill">
                                                <i class="fa-solid  fa-pencil m-r-5 "></i> Edit
                                            </a>

                                            <a href=""
                                                onclick="event.preventDefault(); 
            if (confirm('Are you sure you want to delete this role?')) {
                document.getElementById('delete-form-').submit();
            }"
                                                class="dropdown-item text-danger">
                                                <i class="fa-regular fa-trash-can m-r-5"></i> Delete
                                            </a>



                                        </div>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>Expense</td>
                                <td>Covers general operational expenses.</td>
                                <td>
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">

                                            <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit_bill">
                                                <i class="fa-solid  fa-pencil m-r-5 "></i> Edit
                                            </a>

                                            <a href=""
                                                onclick="event.preventDefault(); 
            if (confirm('Are you sure you want to delete this role?')) {
                document.getElementById('delete-form-').submit();
            }"
                                                class="dropdown-item text-danger">
                                                <i class="fa-regular fa-trash-can m-r-5"></i> Delete
                                            </a>



                                        </div>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td>Utilities</td>

                                <td>Includes bills for electricity, internet, water, etc.</td>
                                <td>
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">

                                            <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit_bill">
                                                <i class="fa-solid  fa-pencil m-r-5 "></i> Edit
                                            </a>

                                            <a href=""
                                                onclick="event.preventDefault(); 
            if (confirm('Are you sure you want to delete this role?')) {
                document.getElementById('delete-form-').submit();
            }"
                                                class="dropdown-item text-danger">
                                                <i class="fa-regular fa-trash-can m-r-5"></i> Delete
                                            </a>


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

    <!-- Edit Bill Modal -->
<div class="modal fade" id="edit_bill" tabindex="-1" aria-labelledby="editBillLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="editBillLabel">Edit Bill Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark fs-5"></i></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <form id="editBillForm">
          <div class="mb-3">
            <label for="billName" class="form-label">Bill Name</label>
            <input type="text" class="form-control" id="billName" name="bill_name" value="Purchase" />
          </div>

          <div class="mb-3">
            <label for="billDescription" class="form-label">Description</label>
            <textarea class="form-control" id="billDescription" name="description" rows="3">Used for recording all supplier purchases.</textarea>
          </div>
        </form>
      </div>

      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" form="editBillForm">Save Changes</button>
      </div>

    </div>
  </div>
</div>

<!-- Create Bill Modal -->
<div class="modal fade" id="create_bill" tabindex="-1" aria-labelledby="createBillLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="createBillLabel">Create Bill Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark fs-5"></i></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <form id="createBillForm" action="#" method="POST">
          <div class="mb-3">
            <label for="newBillName" class="form-label">Bill Name</label>
            <input type="text" class="form-control" id="newBillName" name="bill_name" placeholder="Enter bill name" required />
          </div>

          <div class="mb-3">
            <label for="newBillDescription" class="form-label">Description</label>
            <textarea class="form-control" id="newBillDescription" name="description" rows="3" placeholder="Enter bill description"></textarea>
          </div>
        </form>
      </div>

      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success" form="createBillForm">Create</button>
      </div>

    </div>
  </div>
</div>





    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <script src="{{ asset('assets/js/theme-settings.js') }}"></script>
    <script src="{{ asset('assets/js/greedynav.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script
        src="https://cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="ab0e61c7c601ec36511db1d3-|49"
        defer></script>

</body>

<!-- Mirrored from smarthr.dreamstechnologies.com/laravel/template/public/employees by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Aug 2024 02:22:31 GMT -->

</html>
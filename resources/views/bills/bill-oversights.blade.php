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
              <h3 class="page-title">Bill Processing Oversights</h3>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Bill Processing Oversights</li>
              </ul>
            </div>
          </div>
        </div>



        <form method="GET" action="">
          <div class="row filter-row align-items-end">



            <!-- Client Name -->
            <div class="col-sm-6 col-md-3">
              <div class="input-block mb-3 form-focus">
                <input type="text" name="name" class="form-control floating" value="{{ request('name') }}" />
                <label class="focus-label">Client Name</label>
              </div>
            </div>

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
          <table class="table table-bordered table-striped ">
            <thead>
              <tr>
                <th>Date</th>
                <th>Type</th>
                <th>Invoice No</th>
                <th>Description</th>
                <th>Total</th>
                <th>VAT</th>
                <th>NET</th>
                <th>SR</th>
                <th>ZR</th>
                <th>Cleaning</th>
                <th>Tel</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>11-04-2025</td>
                <td>Purchases</td>
                <td>348895</td>
                <td>Lioncroft</td>
                <td>25.19</td>
                <td>4.20</td>
                <td>20.99</td>
                <td>20.99</td>
                <td>0.00</td>
                <td>–</td>
                <td>–</td>
                <td>
                  <div class="dropdown dropdown-action">
                    <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"><i class="material-icons">more_vert</i></a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editModal" href="#"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                      <a class="dropdown-item" href="{{route('invoice-view')}}"><i class="fa-solid fa-eye m-r-5"></i> View</a>
                      <a class="dropdown-item" href="{{route('invoice-view')}}"><i class="fa-regular fa-file-pdf m-r-5"></i> Download</a>
                      <a class="dropdown-item" href="#"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>06-04-2025</td>
                <td>Purchases</td>
                <td>–</td>
                <td>SAI Foods Wholesale Ltd</td>
                <td>154.07</td>
                <td>0.00</td>
                <td>154.07</td>
                <td>0.00</td>
                <td>154.07</td>
                <td>–</td>
                <td>–</td>
                <td>
                  <div class="dropdown dropdown-action">
                    <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"><i class="material-icons">more_vert</i></a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
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

        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Invoice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark fs-5"></i></button>
              </div>

              <div class="modal-body">
                <form>

                  <div class="row mb-3">
                    <div class="col-md-4">
                      <label class="form-label">Date</label>
                      <input type="date" class="form-control" name="date">
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">Type</label>
                      <input type="text" class="form-control" name="type">
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">Invoice No</label>
                      <input type="text" class="form-control" name="invoice_no">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-md-4">
                      <label class="form-label">Description</label>
                      <input type="text" class="form-control" name="description">
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">Total</label>
                      <input type="number" step="0.01" class="form-control" name="total">
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">VAT</label>
                      <input type="number" step="0.01" class="form-control" name="vat">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-md-4">
                      <label class="form-label">NET</label>
                      <input type="number" step="0.01" class="form-control" name="net">
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">SR</label>
                      <input type="number" step="0.01" class="form-control" name="sr">
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">ZR</label>
                      <input type="number" step="0.01" class="form-control" name="zr">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-md-4">
                      <label class="form-label">Cleaning</label>
                      <input type="text" class="form-control" name="cleaning">
                    </div>
                    <div class="col-md-4">
                      <label class="form-label">Tel</label>
                      <input type="text" class="form-control" name="tel">
                    </div>
                  </div>

                </form>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>

            </div>
          </div>
        </div>



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

</body>

<!-- Mirrored from smarthr.dreamstechnologies.com/laravel/template/public/profile by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Aug 2024 02:21:50 GMT -->

</html>
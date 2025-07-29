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
              <h3 class="page-title">Payments</h3>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Payments</li>
              </ul>
            </div>
          </div>
        </div>



        <form method="GET" action="">
          <div class="row filter-row align-items-end">

            <!-- Client Email -->
            <div class="col-sm-6 col-md-3">
              <div class="input-block mb-3 form-focus">
                <input type="text" name="email" class="form-control floating" value="{{ request('email') }}" />
                <label class="focus-label">Client Email ID</label>
              </div>
            </div>

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
                  <option value="">Select Plan Type</option>
                  <option value="Monthly" {{ request('plan_type') == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                  <option value="Yearly" {{ request('plan_type') == 'Yearly' ? 'selected' : '' }}>Yearly</option>
                  <option value="Trial" {{ request('plan_type') == 'Trial' ? 'selected' : '' }}>Trial</option>
                </select>
                <label class="focus-label">Plan Type</label>
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
        <!-- Filter Toggle Button -->
            <div class="col-1 ms-auto mx-4 ">
              <div class="form-sorts dropdown mb-3 bg-primary">
                <a href="javascript:void(0);" class="dropdown-toggle text-white" id="table-filter">
                  <i class="las la-filter me-2"></i>Filter
                </a>

                <!-- Filter Dropdown Content -->
                <div class="filter-dropdown-menu mt-2">
                  <div class="filter-set-view">

                    <!-- Filter Header -->
                    <div class="filter-set-head">
                      <h4>Filter</h4>
                    </div>

                    <!-- Payment Status -->
                    <div class="filter-set-content mb-3">
                      <h6 class="mb-2">Payment Status</h6>
                      <ul class="list-unstyled mb-0">
                        <li><label class="checkboxs"><input type="checkbox" name="status[]" value="success" /> <span class="checkmarks"></span> Success</label></li>
                        <li><label class="checkboxs"><input type="checkbox" name="status[]" value="failed" /> <span class="checkmarks"></span> Failed</label></li>
                        <li><label class="checkboxs"><input type="checkbox" name="status[]" value="pending" /> <span class="checkmarks"></span> Pending</label></li>
                      </ul>
                    </div>



                    <!-- Date Range -->
                    <div class="filter-set-content mb-3">
                      <h6 class="mb-2">Date Range</h6>
                      <div class="d-flex gap-2">
                        <input type="date" name="from_date" class="form-control" placeholder="From" />
                        <input type="date" name="to_date" class="form-control" placeholder="To" />
                      </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="filter-set-content mb-3">
                      <h6 class="mb-2">Payment Method</h6>
                      <ul class="list-unstyled mb-0">
                        <li><label class="checkboxs"><input type="checkbox" name="method[]" value="card" /> <span class="checkmarks"></span> Card</label></li>
                        <li><label class="checkboxs"><input type="checkbox" name="method[]" value="upi" /> <span class="checkmarks"></span> UPI</label></li>
                        <li><label class="checkboxs"><input type="checkbox" name="method[]" value="bank" /> <span class="checkmarks"></span> Bank Transfer</label></li>
                        <li><label class="checkboxs"><input type="checkbox" name="method[]" value="paypal" /> <span class="checkmarks"></span> PayPal</label></li>
                      </ul>
                    </div>

                    <!-- Filter Buttons -->
                    <div class="filter-reset-btns mt-4">
                      <a href="{{ url()->current() }}" class="btn btn-light">Reset</a>
                      <button type="submit" class="btn btn-primary">Apply Filter</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

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
  <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.ui.touch-punch.min.js') }}"></script>

  <!-- Layout & Theme Scripts -->
  <script src="{{ asset('assets/js/layout.js') }}"></script>
  <script src="{{ asset('assets/js/theme-settings.js') }}"></script>
  <script src="{{ asset('assets/js/greedynav.js') }}"></script>
  <script src="{{ asset('assets/js/app.js') }}"></script>

  <script src="{{ asset('../../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}" data-cf-settings="2c4a77a6990a29245566c995-|49" defer></script>

</body>

<!-- Mirrored from smarthr.dreamstechnologies.com/laravel/template/public/profile by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Aug 2024 02:21:50 GMT -->

</html>
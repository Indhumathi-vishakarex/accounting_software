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
              <h3 class="page-title">Clients List</h3>
              <ul class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ route('admin-dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Clients List</li>
              </ul>
            </div>
            <div class="col-auto float-end ms-auto"></div>
            <div class="col-auto float-end ms-auto">
              <a
                href="{{ route('client-registration') }}"
                class="btn add-btn"><i class="fa fa-plus"></i> Add Clients</a>

            </div>
          </div>
        </div>

        <form method="GET" action="{{ route('client-list') }}">
          <div class="row filter-row">
            <div class="col-sm-6 col-md-3">
              <div class="input-block mb-3 form-focus">
                <input type="text" name="email" class="form-control floating" value="{{ request('email') }}" />
                <label class="focus-label">Client Email ID</label>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="input-block mb-3 form-focus">
                <input type="text" name="name" class="form-control floating" value="{{ request('name') }}" />
                <label class="focus-label">Client Name</label>
              </div>
            </div>

            <div class="col-sm-6 col-md-3">
              <div class="d-grid">
                <button type="submit" class="btn btn-success w-100">Search</button>
              </div>
            </div>
          </div>
        </form>



        <!-- <div class="row staff-grid-row">
          <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">

            <div class="profile-widget">
              <div class="profile-img">
                <a href="" class="avatar"><img src="assets/img/profiles/avatar-02.jpg" alt /></a>
              </div>
              <div class="dropdown profile-action">
                <a
                  href="#"
                  class="action-icon dropdown-toggle"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"><i class="material-icons">more_vert</i></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a
                    class="dropdown-item"
                    href="#"
                    data-bs-toggle="modal"
                    data-bs-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                  <a
                    class="dropdown-item"
                    href="#"
                    data-bs-toggle="modal"
                    data-bs-target="#delete_employee"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                </div>
              </div>
              <h4 class="user-name m-t-10 mb-0 text-ellipsis">
                <a href="">John Doe</a>
              </h4>
              <div class="small text-muted">Web Designer</div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
            <div class="profile-widget">
              <div class="profile-img">
                <a href="#('profile')}}" class="avatar"><img src="assets/img/profiles/avatar-09.jpg" alt /></a>
              </div>
              <div class="dropdown profile-action">
                <a
                  href="#"
                  class="action-icon dropdown-toggle"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"><i class="material-icons">more_vert</i></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a
                    class="dropdown-item"
                    href="#"
                    data-bs-toggle="modal"
                    data-bs-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                  <a
                    class="dropdown-item"
                    href="#"
                    data-bs-toggle="modal"
                    data-bs-target="#delete_employee"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                </div>
              </div>
              <h4 class="user-name m-t-10 mb-0 text-ellipsis">
                <a href="">Richard Miles</a>
              </h4>
              <div class="small text-muted">Web Developer</div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
            <div class="profile-widget">
              <div class="profile-img">
                <a href="" class="avatar"><img src="assets/img/profiles/avatar-10.jpg" alt /></a>
              </div>
              <div class="dropdown profile-action">
                <a
                  href="#"
                  class="action-icon dropdown-toggle"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"><i class="material-icons">more_vert</i></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a
                    class="dropdown-item"
                    href="#"
                    data-bs-toggle="modal"
                    data-bs-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                  <a
                    class="dropdown-item"
                    href="#"
                    data-bs-toggle="modal"
                    data-bs-target="#delete_employee"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                </div>
              </div>
              <h4 class="user-name m-t-10 mb-0 text-ellipsis">
                <a href="">John Smith</a>
              </h4>
              <div class="small text-muted">Android Developer</div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
            <div class="profile-widget">
              <div class="profile-img">
                <a href="" class="avatar"><img src="assets/img/profiles/avatar-05.jpg" alt /></a>
              </div>
              <div class="dropdown profile-action">
                <a
                  href="#"
                  class="action-icon dropdown-toggle"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"><i class="material-icons">more_vert</i></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a
                    class="dropdown-item"
                    href="#"
                    data-bs-toggle="modal"
                    data-bs-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                  <a
                    class="dropdown-item"
                    href="#"
                    data-bs-toggle="modal"
                    data-bs-target="#delete_employee"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                </div>
              </div>
              <h4 class="user-name m-t-10 mb-0 text-ellipsis">
                <a href="">Mike Litorus</a>
              </h4>
              <div class="small text-muted">IOS Developer</div>
            </div>
          </div>

        </div> -->

        <!-- Entries Per Page Dropdown -->
        <div class="d-flex justify-content-between align-items-center mb-3">
          <form method="GET" class="d-flex align-items-center">
            <label for="per_page" class="me-2 mb-0">Show</label>
            <select name="per_page" id="per_page" onchange="this.form.submit()" class="form-select form-select-sm w-auto me-2">

              <option value="">-select entries-</option>
              <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
              <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
              <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
              <option value="150" {{ request('per_page') == 150 ? 'selected' : '' }}>150</option>
            </select>
            <span class="mb-0">entries per page</span>
          </form>

          <!-- Optional: show current result range -->
          <div>
            <small>

              {{ $clients->appends(request()->query())->links('pagination::bootstrap-5') }}
            </small>
          </div>
        </div>

        <!-- Client Grid -->
        <!-- <div class="row staff-grid-row">
    @foreach($clients as $client)
        <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
            <div class="profile-widget">
                <div class="profile-img">
                    <a href="{{ route('client-profile', $client->id) }}" class="avatar">
                        <img src="{{ $client->profile ? asset($client->profile) : asset('/assets/img/profiles/avatar-02.jpg') }}" alt="Staff Image" />
                    </a>
                </div>
                 <div class="dropdown profile-action">
                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="material-icons">more_vert</i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="{{ route('client-edit', $client->id) }}">
                    <i class="fa fa-pencil m-r-5"></i> Edit
                  </a>
                  <form action="" method="POST" onsubmit="return confirm('Are you sure you want to delete this account?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-item">
                      <i class="fa-regular fa-trash-can m-r-5"></i> Delete
                    </button>
                  </form>
                </div>
              </div>
                
                <h4 class="user-name m-t-10 mb-0 text-ellipsis">
                    <a href="#">{{ $client->name }}</a>
                    <a href="#">{{ $client->last_name }}</a>
                     
                </h4>
                <div class="small text-muted">{{ $client->email }}</div>
                <a class="dropdown-item" href="{{ route('client-profile', $client->id) }}#payment">
                   payment
                  </a>
            </div>
        </div>
    @endforeach 
</div> -->

        <!-- <div class="row staff-grid-row">
          @foreach($clients as $client)
          <div class="col-md-6 col-lg-4 col-xl-3 mb-3">
            <div class="card p-2 h-100">

              <div class="d-flex flex-wrap align-items-start gap-2">
                <div class="flex-shrink-0">
                  <a href="{{ route('client-profile', $client->id) }}">
                    <img src="{{ $client->profile ? asset($client->profile) : asset('/assets/img/profiles/avatar-02.jpg') }}"
                      class="rounded-circle"
                      alt="Profile"
                      style="width: 70px; height: 70px;">
                  </a>
                </div>
                <div class="flex-grow-1 min-w-0">
                  <div class="mb-1">
                    <strong class="small">Name:</strong><br class="d-lg-none">
                    <span class="d-block text-break small">{{ $client->name }} {{ $client->last_name }}</span>
                  </div>
                  <div class="mb-1">
                    <strong class="small">Email:</strong><br class="d-lg-none">
                    <span class="d-block text-break small">{{ $client->email }}</span>
                  </div>
                  <div class="mb-1">
                    <strong class="small">Client ID:</strong> <span class="small">{{ $client->id }}</span>
                  </div>
                </div>
              </div>

              <div class="mt-2 border-top pt-2">
                <div class="row row-cols-2  g-1 text-center">
                  <div class="col">
                    <a href="{{ route('client-profile', $client->id) }}"
                      class="btn btn-outline-secondary  d-flex flex-column align-items-center justify-content-center">
                      <span>Business</span>
                      <i class="fa-solid fa-briefcase mt-1 small"></i>
                    </a>
                  </div>
                  <div class="col">
                    <a href="{{ route('client-profile', $client->id) }}#payment"
                      class="btn btn-outline-secondary d-flex flex-column align-items-center justify-content-center">
                      <span>Payment</span>
                      <i class="fa-solid fa-credit-card mt-1 small"></i>
                    </a>
                  </div>
                  <div class="col">
                    <a href="{{ route('client-profile', $client->id) }}#subscription"
                      class="btn btn-outline-secondary   d-flex flex-column align-items-center justify-content-center ">
                      <span>Subscription</span>
                      <i class="fa-solid fa-file-invoice-dollar mt-1 small"></i>
                    </a>
                  </div>
                  <div class="col">
                    <a href="{{ route('client-profile', $client->id) }}#bills"
                      class="btn btn-outline-secondary  d-flex flex-column align-items-center justify-content-center ">
                      <span>Bills</span>
                      <i class="fa-solid fa-file-invoice mt-1 small"></i>
                    </a>
                  </div>
                </div>
              </div>


            </div>
          </div>
          @endforeach
        </div> -->
<!-- <div class="row staff-grid-row">
    @foreach($clients as $client)
    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-3">
        <div class="card p-2 h-100">
            <div class="row g-0">
             
                <div class="col-12 col-md-6 d-flex flex-column align-items-center align-items-md-start">
                    <div class="mb-2">
                        <a href="{{ route('client-profile', $client->id) }}">
                            <img src="{{ $client->profile ? asset($client->profile) : asset('/assets/img/profiles/avatar-02.jpg') }}"
                                 class="rounded-circle img-fluid"
                                 alt="Profile"
                                 style="width: 70px; height: 70px;">
                        </a>
                    </div>
                    <div class="text-center text-md-start">
                        <div class="mb-1">
                            <strong class="small">Name:</strong>
                            <span class="d-block text-break small">{{ $client->name }} </span>
                        </div>
                        <div class="mb-1">
                            <strong class="small">Email:</strong>
                            <span class="d-block small">{{ $client->email }}</span>
                        </div>
                    </div>
                </div>
               
                <div class="col-12 col-md-6 d-flex flex-column mt-2 gap-2">
                    <div>
                        <a href="{{ route('client-profile', $client->id) }}"
                           class="text-decoration-none text-dark d-flex align-items-center align-items-md-start gap-2">
                            <i class="fa-solid fa-briefcase"></i>
                            <span class="text-primary"> : Business</span>
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('client-profile', $client->id) }}#payment"
                           class="text-decoration-none text-dark d-flex align-items-center align-items-md-start gap-2">
                            <i class="fa-solid fa-credit-card"></i>
                            <span class="text-primary"> : Payment</span>
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('client-profile', $client->id) }}#subscription"
                           class="text-decoration-none text-dark d-flex align-items-center align-items-md-start gap-2">
                            <i class="fa-solid fa-file-invoice-dollar"></i>
                            <span class="text-primary"> : Plans</span>
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('client-profile', $client->id) }}#bills"
                           class="text-decoration-none text-dark d-flex align-items-center align-items-md-start gap-2">
                            <i class="fa-solid fa-file-invoice"></i>
                            <span class="text-primary"> : Bills</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div> -->

<div class="table-responsive">
  <table class="table table-bordered table-striped align-middle text-nowrap">
    <thead class="table-light">
      <tr>
        <th>Client ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Email</th>
        <th>Business Details</th>
        <th>Subscription Details</th>
        <th>Payment Details</th>
        <th>Bills Details</th>
      </tr>
    </thead>
    <tbody>
      @foreach($clients as $client)
      <tr>
        <!-- Client ID -->
        <td class="small">
          {{ $client->id }}
        </td>

        <!-- Image -->
        <td>
          <a href="{{ route('client-profile', $client->id) }}">
            <img src="{{ $client->profile ? asset($client->profile) : asset('/assets/img/profiles/avatar-02.jpg') }}"
                 class="rounded-circle"
                 alt="Profile"
                 style="width: 50px; height: 50px;">
          </a>
        </td>

        <!-- Name -->
        <td class="small text-break">
          <a href="" class="text-decoration-none text-dark">
            {{ $client->name }} {{ $client->last_name }}
          </a>
        </td>

        <!-- Email -->
        <td class="small text-break">
          <a href="" class="text-decoration-none text-dark">
            {{ $client->email }}
          </a>
        </td>

        <!-- Business -->
        <td class="small">
          <a href="{{ route('client-profile', $client->id) }}" class="text-decoration-none text-primary">
            <i class="fa-solid fa-briefcase me-1"></i>Business
          </a>
        </td>

        <!-- Subscription -->
        <td class="small">
          <a href="{{ route('client-profile', $client->id) }}#subscription" class="text-decoration-none text-primary">
            <i class="fa-solid fa-file-invoice-dollar me-1"></i>Plans
          </a>
        </td>

        <!-- Payment -->
        <td class="small">
          <a href="{{ route('client-profile', $client->id) }}#payment" class="text-decoration-none text-primary">
            <i class="fa-solid fa-credit-card me-1"></i>Payment
          </a>
        </td>

        <!-- Bills -->
        <td class="small">
          <a href="{{ route('client-profile', $client->id) }}#bills" class="text-decoration-none text-primary">
            <i class="fa-solid fa-file-invoice me-1"></i>Bills
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>







        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-4">

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
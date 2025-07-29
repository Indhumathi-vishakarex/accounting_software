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
              <h3 class="page-title">Staff List</h3>
              <ul class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ route('admin-dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Staff List</li>
              </ul>
            </div>
            <div class="col-auto float-end ms-auto"></div>
            <div class="col-auto float-end ms-auto">
              <a
                href="{{ route('staff-registration') }}"
                class="btn add-btn"><i class="fa fa-plus"></i> Add Staff</a>

            </div>
          </div>
        </div>

        <form method="GET" action="{{ route('staff-list') }}">
          <div class="row filter-row">
            <div class="col-sm-6 col-md-3">
              <div class="input-block mb-3 form-focus">
                <input type="text" name="email" class="form-control floating" value="{{ request('email') }}" />
                <label class="focus-label">Staff Email ID</label>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="input-block mb-3 form-focus">
                <input type="text" name="name" class="form-control floating" value="{{ request('name') }}" />
                <label class="focus-label">Staff Name</label>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="input-block mb-3 form-focus select-focus">
                <select name="role_id" class="select floating">
                  <option value="">Select Role</option>
                  @foreach($roles as $role)
                  <option value="{{ $role->id }}" {{ request('role_id') == $role->id ? 'selected' : '' }}>
                    {{ ucfirst($role->rolename) }}
                  </option>
                  @endforeach
                </select>
                <label class="focus-label">Role</label>
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

        <div class="row staff-grid-row">
          @foreach($staffMembers as $staff)
          <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
            <div class="profile-widget">
              <div class="profile-img">
                <a href="{{ route('staff-profile', $staff->id) }}" class="avatar">
                  <img src="{{ $staff->profile_image ? asset($staff->profile_image) : asset('/assets/img/profiles/avatar-02.jpg') }}" alt="Staff Image" />
                </a>
              </div>
              <!-- <div class="dropdown profile-action">
                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="material-icons">more_vert</i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="{{ route('staff-profile', $staff->id) }}">
                    <i class="fa fa-pencil m-r-5"></i> Edit
                  </a>
                  <form action="{{ route('staff-destroy', $staff->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this account?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-item">
                      <i class="fa-regular fa-trash-can m-r-5"></i> Delete
                    </button>
                  </form>
                
                </div>
              </div> -->
              <h4 class="user-name m-t-10 mb-0 text-ellipsis">
                <a href="">{{ $staff->name }}</a>
              </h4>
              <div class="small text-muted">{{ ucfirst(optional($staff->role)->rolename) }}</div>
            </div>
          </div>
          @endforeach
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
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
                                                    src="{{ $staff->profile_image ? asset($staff->profile_image) : asset('/assets/img/profiles/avatar-02.jpg') }}">
                                            </a>


                                        </div>
                                    </div>
                                    <div class="profile-basic">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="profile-info-left ms-3">

                                                    <h3 class="user-name m-t-0 mb-2 fs-4">{{ $staff->name }}</h3>
                                                    <!-- <p class="fw-bold fs-5 mb-1">Role : <span class="text-muted ms-2">Admin</span></p> -->
                                                    <!-- <p class="fs-5 fw-bold mb-1">Role ID : <span class="text-muted ms-2">{{ $staff->role_id }}</span></p> -->
                                                    <p class="fs-6 fw-bold mb-1">Role : <span class="text-muted ms-2">{{ optional($staff->role)->rolename }}</span></p>
                                                    <p class="fs-6 fw-bold mb-1">Email : <span class="text-muted ms-2">{{ $staff->email }}</span></p>
                                                    <p class="fw-bold fs-6 mb-1">Joined : <span class="text-muted ms-2">{{ $staff->created_at->format('d M Y') }}</span></p>
                                                    <span class="badge text-bg-success fs-6">Active</span>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <a data-bs-target="#profile_info{{ $staff->id }}" data-bs-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a>
                                                <ul class="personal-info">

                                                    <!-- <li>
                                                        <div class="title">Email:</div>
                                                        <div class="text"><a href><span class="__cf_email__" data-cfemail="28424740464c474d684d50494558444d064b4745">[email&#160;protected]</span></a></div>
                                                    </li> -->
                                                    <li>

                                                        <div class="title">Name:</div>
                                                        <div class="text">{{ $staff->name }}</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Email:</div>
                                                        <div class="text">{{ $staff->email }}</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Role:</div>
                                                        <div class="text">{{ optional($staff->role)->rolename }}</div>
                                                    </li>
                                                    <hr>
                                                    <li>
                                                        <div class="title">Password:</div>
                                                        <div class="text">********</div>
                                                        <a data-bs-target="#profile_password" data-bs-toggle="modal" class="edit-icon" href="#" style="float: right;"><i class="fa fa-pencil"></i></a>
                                                    </li>
                                                    <li>


                                                        <form action="{{ route('staff-destroy', $staff->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this account?')">
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
                <!-- <div class="card tab-box">
                    <div class="row user-tabs">
                        <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                            <ul class="nav nav-tabs nav-tabs-bottom">
                                <li class="nav-item"><a href="#emp_profile" data-bs-toggle="tab" class="nav-link active">Profile</a>
                                </li>
                                <li class="nav-item"><a href="#emp_projects" data-bs-toggle="tab" class="nav-link">Projects</a></li>
                                <li class="nav-item"><a href="#bank_statutory" data-bs-toggle="tab" class="nav-link">Bank & Statutory
                                        <small class="text-danger">(Admin Only)</small></a></li>
                                <li class="nav-item"><a href="#emp_assets" data-bs-toggle="tab" class="nav-link">Assets</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content">

                    <div id="emp_profile" class="pro-overview tab-pane fade show active">
                        <div class="row">
                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Personal Informations <a href="#" class="edit-icon" data-bs-toggle="modal" data-bs-target="#personal_info_modal"><i class="fa fa-pencil"></i></a></h3>
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Passport No.</div>
                                                <div class="text">9876543210</div>
                                            </li>
                                            <li>
                                                <div class="title">Passport Exp Date.</div>
                                                <div class="text">9876543210</div>
                                            </li>
                                            <li>
                                                <div class="title">Tel</div>
                                                <div class="text"><a href>9876543210</a></div>
                                            </li>
                                            <li>
                                                <div class="title">Nationality</div>
                                                <div class="text">Indian</div>
                                            </li>
                                            <li>
                                                <div class="title">Religion</div>
                                                <div class="text">Christian</div>
                                            </li>
                                            <li>
                                                <div class="title">Marital status</div>
                                                <div class="text">Married</div>
                                            </li>
                                            <li>
                                                <div class="title">Employment of spouse</div>
                                                <div class="text">No</div>
                                            </li>
                                            <li>
                                                <div class="title">No. of children</div>
                                                <div class="text">2</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Emergency Contact <a href="#" class="edit-icon" data-bs-toggle="modal" data-bs-target="#emergency_contact_modal"><i class="fa fa-pencil"></i></a></h3>
                                        <h5 class="section-title">Primary</h5>
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Name</div>
                                                <div class="text">John Doe</div>
                                            </li>
                                            <li>
                                                <div class="title">Relationship</div>
                                                <div class="text">Father</div>
                                            </li>
                                            <li>
                                                <div class="title">Phone </div>
                                                <div class="text">9876543210, 9876543210</div>
                                            </li>
                                        </ul>
                                        <hr>
                                        <h5 class="section-title">Secondary</h5>
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Name</div>
                                                <div class="text">Karen Wills</div>
                                            </li>
                                            <li>
                                                <div class="title">Relationship</div>
                                                <div class="text">Brother</div>
                                            </li>
                                            <li>
                                                <div class="title">Phone </div>
                                                <div class="text">9876543210, 9876543210</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Bank information</h3>
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Bank name</div>
                                                <div class="text">ICICI Bank</div>
                                            </li>
                                            <li>
                                                <div class="title">Bank account No.</div>
                                                <div class="text">159843014641</div>
                                            </li>
                                            <li>
                                                <div class="title">IFSC Code</div>
                                                <div class="text">ICI24504</div>
                                            </li>
                                            <li>
                                                <div class="title">PAN No</div>
                                                <div class="text">TC000Y56</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Family Informations <a href="#" class="edit-icon" data-bs-toggle="modal" data-bs-target="#family_info_modal"><i class="fa fa-pencil"></i></a></h3>
                                        <div class="table-responsive">
                                            <table class="table table-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Relationship</th>
                                                        <th>Date of Birth</th>
                                                        <th>Phone</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Leo</td>
                                                        <td>Brother</td>
                                                        <td>Feb 16th, 2019</td>
                                                        <td>9876543210</td>
                                                        <td class="text-end">
                                                            <div class="dropdown dropdown-action">
                                                                <a aria-expanded="false" data-bs-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="#" class="dropdown-item"><i class="fa-solid fa-pencil m-r-5"></i> Edit</a>
                                                                    <a href="#" class="dropdown-item"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
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

                    </div>


                    <div class="tab-pane fade" id="emp_projects">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown profile-action">
                                            <a aria-expanded="false" data-bs-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-bs-target="#edit_project" data-bs-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a data-bs-target="#delete_project" data-bs-toggle="modal" href="#" class="dropdown-item"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                        <h4 class="project-title"><a href="project-view.html">Office Management</a></h4>
                                        <small class="block text-ellipsis m-b-15">
                                            <span class="text-xs">1</span> <span class="text-muted">open tasks, </span>
                                            <span class="text-xs">9</span> <span class="text-muted">tasks completed</span>
                                        </small>
                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. When an unknown printer took a galley of type and
                                            scrambled it...
                                        </p>
                                        <div class="pro-deadline m-b-15">
                                            <div class="sub-title">
                                                Deadline:
                                            </div>
                                            <div class="text-muted">
                                                17 Apr 2019
                                            </div>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Project Leader :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img alt src="assets/img/profiles/avatar-16.jpg"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Team :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="John Doe"><img alt src="assets/img/profiles/avatar-02.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="Richard Miles"><img alt src="assets/img/profiles/avatar-09.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="John Smith"><img alt src="assets/img/profiles/avatar-10.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="Mike Litorus"><img alt src="assets/img/profiles/avatar-05.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="m-b-5">Progress <span class="text-success float-end">40%</span></p>
                                        <div class="progress progress-xs mb-0">
                                            <div style="width: 40%" title data-bs-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown profile-action">
                                            <a aria-expanded="false" data-bs-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-bs-target="#edit_project" data-bs-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a data-bs-target="#delete_project" data-bs-toggle="modal" href="#" class="dropdown-item"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                        <h4 class="project-title"><a href="project-view.html">Project Management</a></h4>
                                        <small class="block text-ellipsis m-b-15">
                                            <span class="text-xs">2</span> <span class="text-muted">open tasks, </span>
                                            <span class="text-xs">5</span> <span class="text-muted">tasks completed</span>
                                        </small>
                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. When an unknown printer took a galley of type and
                                            scrambled it...
                                        </p>
                                        <div class="pro-deadline m-b-15">
                                            <div class="sub-title">
                                                Deadline:
                                            </div>
                                            <div class="text-muted">
                                                17 Apr 2019
                                            </div>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Project Leader :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img alt src="assets/img/profiles/avatar-16.jpg"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Team :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="John Doe"><img alt src="assets/img/profiles/avatar-02.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="Richard Miles"><img alt src="assets/img/profiles/avatar-09.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="John Smith"><img alt src="assets/img/profiles/avatar-10.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="Mike Litorus"><img alt src="assets/img/profiles/avatar-05.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="m-b-5">Progress <span class="text-success float-end">40%</span></p>
                                        <div class="progress progress-xs mb-0">
                                            <div style="width: 40%" title data-bs-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown profile-action">
                                            <a aria-expanded="false" data-bs-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-bs-target="#edit_project" data-bs-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a data-bs-target="#delete_project" data-bs-toggle="modal" href="#" class="dropdown-item"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                        <h4 class="project-title"><a href="project-view.html">Video Calling App</a></h4>
                                        <small class="block text-ellipsis m-b-15">
                                            <span class="text-xs">3</span> <span class="text-muted">open tasks, </span>
                                            <span class="text-xs">3</span> <span class="text-muted">tasks completed</span>
                                        </small>
                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. When an unknown printer took a galley of type and
                                            scrambled it...
                                        </p>
                                        <div class="pro-deadline m-b-15">
                                            <div class="sub-title">
                                                Deadline:
                                            </div>
                                            <div class="text-muted">
                                                17 Apr 2019
                                            </div>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Project Leader :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img alt src="assets/img/profiles/avatar-16.jpg"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Team :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="John Doe"><img alt src="assets/img/profiles/avatar-02.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="Richard Miles"><img alt src="assets/img/profiles/avatar-09.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="John Smith"><img alt src="assets/img/profiles/avatar-10.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="Mike Litorus"><img alt src="assets/img/profiles/avatar-05.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="m-b-5">Progress <span class="text-success float-end">40%</span></p>
                                        <div class="progress progress-xs mb-0">
                                            <div style="width: 40%" title data-bs-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown profile-action">
                                            <a aria-expanded="false" data-bs-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-bs-target="#edit_project" data-bs-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a data-bs-target="#delete_project" data-bs-toggle="modal" href="#" class="dropdown-item"><i class="fa-regular fa-trash-can m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                        <h4 class="project-title"><a href="project-view.html">Hospital Administration</a>
                                        </h4>
                                        <small class="block text-ellipsis m-b-15">
                                            <span class="text-xs">12</span> <span class="text-muted">open tasks, </span>
                                            <span class="text-xs">4</span> <span class="text-muted">tasks completed</span>
                                        </small>
                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. When an unknown printer took a galley of type and
                                            scrambled it...
                                        </p>
                                        <div class="pro-deadline m-b-15">
                                            <div class="sub-title">
                                                Deadline:
                                            </div>
                                            <div class="text-muted">
                                                17 Apr 2019
                                            </div>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Project Leader :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="Jeffery Lalor"><img alt src="assets/img/profiles/avatar-16.jpg"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Team :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="John Doe"><img alt src="assets/img/profiles/avatar-02.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="Richard Miles"><img alt src="assets/img/profiles/avatar-09.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="John Smith"><img alt src="assets/img/profiles/avatar-10.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-bs-toggle="tooltip" title="Mike Litorus"><img alt src="assets/img/profiles/avatar-05.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="m-b-5">Progress <span class="text-success float-end">40%</span></p>
                                        <div class="progress progress-xs mb-0">
                                            <div style="width: 40%" title data-bs-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div> -->
            </div>


            <div id="profile_info{{ $staff->id }}" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <form action="{{ route('staff-update', $staff->id) }}" method="POST" enctype="multipart/form-data">
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
                                                src="{{ $staff->profile_image ? asset($staff->profile_image) : asset('/assets/img/profiles/avatar-02.jpg') }}"
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
                                                value="{{ $staff->name }}" required>
                                        </div>
                                    </div>

                                    {{-- Email --}}
                                    <div class="col-md-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ $staff->email }}" required>
                                        </div>
                                    </div>

                                    {{-- Role --}}
                                    <div class="col-md-6">
                                        <div class="input-block mb-3">
                                            <label class="col-form-label">Role</label>
                                            <select name="role_id" class="form-control" required>
                                                @foreach($roles as $role)
                                                <option value="{{ $role->id }}"
                                                    {{ $staff->role_id == $role->id ? 'selected' : '' }}>
                                                    {{ ucfirst($role->rolename) }}
                                                </option>
                                                @endforeach
                                            </select>
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

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title fs-3 fw-semibold" id="profile_passwordLabel">Update Staff Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark fs-5"></i></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form method="POST" action="{{ route('staff.updatePassword', $staff->id) }}">
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





        </div>
    </div>


    {{-- Image preview script --}}
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function () {
            const output = document.getElementById('profile-preview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
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
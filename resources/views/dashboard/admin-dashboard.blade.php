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
                            <h3 class="page-title">Welcome Admin!</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <!-- Total Users -->
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget h-100">
                            <div class="card-body p-3 position-relative">
                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <span class="dash-widget-icon  " style="font-size: 60px; color: #4e73df;">
                                        <i class="fa-solid fa-users"></i>
                                    </span>
                                    <div class="dash-widget-info text-end me-4">
                                        <h3 class="mb-0 ">112</h3>
                                        <span class="mb-0">Total Users</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- New Registrations -->
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget h-100">
                            <div class="card-body p-3 position-relative">
                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <span class="dash-widget-icon  " style="font-size: 60px; color: #4e73df;">
                                        <i class="fa-solid fa-user-plus"></i>
                                    </span>
                                    <div class="dash-widget-info text-end me-4">
                                        <h3 class="mb-0">44</h3>
                                        <span class="mb-0 ">New Registration</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Bills -->
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget h-100">
                            <div class="card-body p-3 position-relative">
                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <span class="dash-widget-icon" style="font-size: 60px;color: #4e73df;">
                                        <i class="fa-solid fa-receipt"></i>
                                    </span>
                                    <div class="dash-widget-info text-end me-4">
                                        <h3 class="mb-0">37</h3>
                                        <span class="mb-0 ">Total Bills</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bills Uploaded with Filter -->
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget h-100">
                            <div class="card-body p-3 position-relative">

                                <!-- Filter icon (Top left) -->
                                <div class="dropdown position-absolute top-0 start-0 m-2">
                                    <a href="#" class="bg-secondary p-1 rounded-circle d-inline-flex align-items-center justify-content-center text-light" data-bs-toggle="dropdown">
                                        <i class="la la-filter "></i>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" onclick="showPeriod('today', 'bills')">Today</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="showPeriod('week', 'bills')">This Week</a></li>
                                    </ul>
                                </div>

                                <!-- Icon and Info -->
                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <span class="dash-widget-icon " style="font-size: 60px; color: #4e73df;">
                                        <i class="fa-solid fa-file-invoice-dollar"></i>
                                    </span>

                                    <div class="dash-widget-info text-end me-4">
                                        <!-- Today -->
                                        <div id="bills-today">
                                            <h3 class="mb-0">10</h3>
                                            <span class="mb-0">Bills Uploaded (Today)</span>
                                        </div>

                                        <!-- This Week (Initially Hidden) -->
                                        <div id="bills-week" class="d-none">
                                            <h3 class="mb-0">56</h3>
                                            <span class="mb-0 ">Bills Uploaded (This Week)</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <!-- <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Total Revenue</h3>
                                        <div id="bar-charts"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Sales Overview</h3>
                                        <div id="line-charts"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->


                <div class="row">
                    <!-- <div class="col-md-12 col-lg-12 col-xl-4 d-flex">
                        <div class="card flex-fill dash-statistics">
                            <div class="card-body">
                                <h5 class="card-title">Statistics</h5>
                                <div class="stats-list">
                                    <div class="stats-info">
                                        <p>Today Leave <strong>4 <small>/ 65</small></strong></p>
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                style="width: 31%" aria-valuenow="31" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="stats-info">
                                        <p>Pending Invoice <strong>15 <small>/ 92</small></strong></p>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                style="width: 31%" aria-valuenow="31" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="stats-info">
                                        <p>Completed Projects <strong>85 <small>/ 112</small></strong></p>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: 62%" aria-valuenow="62" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="stats-info">
                                        <p>Open Tickets <strong>190 <small>/ 212</small></strong></p>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 62%"
                                                aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="stats-info">
                                        <p>Closed Tickets <strong>22 <small>/ 212</small></strong></p>
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 22%"
                                                aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-4 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <h4 class="card-title">Task Statistics</h4>
                                <div class="statistics">
                                    <div class="row">
                                        <div class="col-md-6 col-6 text-center">
                                            <div class="stats-box mb-4">
                                                <p>Total Tasks</p>
                                                <h3>385</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6 text-center">
                                            <div class="stats-box mb-4">
                                                <p>Overdue Tasks</p>
                                                <h3>19</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress mb-4">
                                    <div class="progress-bar bg-purple w-30" role="progressbar" aria-valuenow="30"
                                        aria-valuemin="0" aria-valuemax="100">30%</div>
                                    <div class="progress-bar bg-warning w-22" role="progressbar" aria-valuenow="18"
                                        aria-valuemin="0" aria-valuemax="100">22%</div>
                                    <div class="progress-bar bg-success w-24" role="progressbar" aria-valuenow="12"
                                        aria-valuemin="0" aria-valuemax="100">24%</div>
                                    <div class="progress-bar bg-danger w-21" role="progressbar" aria-valuenow="14"
                                        aria-valuemin="0" aria-valuemax="100">21%</div>
                                    <div class="progress-bar bg-info w-10" role="progressbar" aria-valuenow="14"
                                        aria-valuemin="0" aria-valuemax="100">10%</div>
                                </div>
                                <div>
                                    <p><i class="fa-regular fa-circle-dot text-purple me-2"></i>Completed Tasks <span
                                            class="float-end">166</span></p>
                                    <p><i class="fa-regular fa-circle-dot text-warning me-2"></i>Inprogress Tasks <span
                                            class="float-end">115</span></p>
                                    <p><i class="fa-regular fa-circle-dot text-success me-2"></i>On Hold Tasks <span
                                            class="float-end">31</span></p>
                                    <p><i class="fa-regular fa-circle-dot text-danger me-2"></i>Pending Tasks <span
                                            class="float-end">47</span></p>
                                    <p class="mb-0"><i class="fa-regular fa-circle-dot text-info me-2"></i>Review
                                        Tasks <span class="float-end">5</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-4 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <h4 class="card-title">Today Absent <span
                                        class="badge bg-inverse-danger ms-2">5</span></h4>
                                <div class="leave-info-box">
                                    <div class="media d-flex align-items-center">
                                        <a href="#('profile')}}" class="avatar"><img alt src="/assets/img/user.jpg"></a>
                                        <div class="media-body flex-grow-1">
                                            <div class="text-sm my-0">Martin Lewis</div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mt-3">
                                        <div class="col-6">
                                            <h6 class="mb-0">4 Sep 2019</h6>
                                            <span class="text-sm text-muted">Leave Date</span>
                                        </div>
                                        <div class="col-6 text-end">
                                            <span class="badge bg-inverse-danger">Pending</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="leave-info-box">
                                    <div class="media d-flex align-items-center">
                                        <a href="#('profile')}}" class="avatar"><img alt src="/assets/img/user.jpg"></a>
                                        <div class="media-body flex-grow-1">
                                            <div class="text-sm my-0">Martin Lewis</div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mt-3">
                                        <div class="col-6">
                                            <h6 class="mb-0">4 Sep 2019</h6>
                                            <span class="text-sm text-muted">Leave Date</span>
                                        </div>
                                        <div class="col-6 text-end">
                                            <span class="badge bg-inverse-success">Approved</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="load-more text-center">
                                    <a class="text-dark" href="javascript:void(0);">Load More</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>

                <div class="row">
                    <div class="col-md-6 d-flex">
                        <div class="card card-table flex-fill">
                            <div class="card-header">
                                <h3 class="card-title mb-0">Invoices</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-nowrap custom-table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Invoice ID</th>
                                                <th>Client</th>
                                                <th>Due Date</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="#('invoice-view')}}">#INV-0001</a></td>
                                                <td>
                                                    <h2><a href="#">Global Technologies</a></h2>
                                                </td>
                                                <td>11 Mar 2019</td>
                                                <td>$380</td>
                                                <td>
                                                    <span class="badge bg-inverse-warning">Partially Paid</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a href="#('invoice-view')}}">#INV-0002</a></td>
                                                <td>
                                                    <h2><a href="#">Delta Infotech</a></h2>
                                                </td>
                                                <td>8 Feb 2019</td>
                                                <td>$500</td>
                                                <td>
                                                    <span class="badge bg-inverse-success">Paid</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a href="#('invoice-view')}}">#INV-0003</a></td>
                                                <td>
                                                    <h2><a href="#">Cream Inc</a></h2>
                                                </td>
                                                <td>23 Jan 2019</td>
                                                <td>$60</td>
                                                <td>
                                                    <span class="badge bg-inverse-danger">Unpaid</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="">View all invoices</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="card card-table flex-fill">
                            <div class="card-header">
                                <h3 class="card-title mb-0">Payments</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table custom-table table-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th>Invoice ID</th>
                                                <th>Client</th>
                                                <th>Payment Type</th>
                                                <th>Paid Date</th>
                                                <th>Paid Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="#('invoice-view')}}">#INV-0001</a></td>
                                                <td>
                                                    <h2><a href="#">Global Technologies</a></h2>
                                                </td>
                                                <td>Paypal</td>
                                                <td>11 Mar 2019</td>
                                                <td>$380</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#('invoice-view')}}">#INV-0002</a></td>
                                                <td>
                                                    <h2><a href="#">Delta Infotech</a></h2>
                                                </td>
                                                <td>Paypal</td>
                                                <td>8 Feb 2019</td>
                                                <td>$500</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#('invoice-view')}}">#INV-0003</a></td>
                                                <td>
                                                    <h2><a href="#">Cream Inc</a></h2>
                                                </td>
                                                <td>Paypal</td>
                                                <td>23 Jan 2019</td>
                                                <td>$60</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="#('payments')}}">View all payments</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 d-flex">
    <div class="card card-table flex-fill">
        <div class="card-header">
            <h3 class="card-title mb-0">Clients</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table custom-table mb-0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Business</th>
                            <th>Subscription </th>
                            <th>Payment </th>
                            <th>Bills</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clients->take(5) as $client)
                        <tr>
                            <td>
                                <a href="{{ route('client-profile', $client->id) }}" class="avatar">
                                    <img src="{{ $client->profile ? asset($client->profile) : asset('/assets/img/profiles/avatar-02.jpg') }}"
                                         alt="User Image"
                                         class="rounded-circle"
                                         width="40" height="40">
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('client-profile', $client->id) }}">
                                    {{ $client->name }}
                                </a>
                            </td>
                            <td >
                               {{ $client->email }}
                            </td>
                            <td class="text-center align-middle">
                                <a href="{{ route('client-profile', $client->id) }}" class="text-primary">
                                  <i class="fa-solid fa-briefcase me-1"></i>
                                </a>
                            </td>
                            <td class="text-center align-middle">
                                <a href="{{ route('client-profile', $client->id) }}#subscription" class="text-primary text-center" >
                                   <i class="fa-solid fa-file-invoice-dollar me-1"></i>
                                </a>
                            </td>
                            <td class="text-center align-middle">
                                <a href="{{ route('client-profile', $client->id) }}#payment" class="text-primary text-center" >
                                   <i class="fa-solid fa-credit-card me-1"></i>
                                </a>
                            </td>
                            <td class="text-center align-middle">
                                <a href="{{ route('client-profile', $client->id) }}#bills" class="text-primary ">
                                  <i class="fa-solid fa-file-invoice me-1"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @if($clients->count() >= 5)
        <div class="card-footer">
            <a href="{{ route('client-list') }}">View all clients</a>
        </div>
        @endif
    </div>
</div>

                    <!-- <div class="col-md-6 d-flex">
                        <div class="card card-table flex-fill">
                            <div class="card-header">
                                <h3 class="card-title mb-0">Recent Projects</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table custom-table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Project Name </th>
                                                <th>Progress</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h2><a href="#('project-view')}}">Office Management</a></h2>
                                                    <small class="block text-ellipsis">
                                                        <span>1</span> <span class="text-muted">open tasks, </span>
                                                        <span>9</span> <span class="text-muted">tasks completed</span>
                                                    </small>
                                                </td>
                                                <td>
                                                    <div class="progress progress-xs progress-striped">
                                                        <div class="progress-bar" role="progressbar"
                                                            data-bs-toggle="tooltip" title="65%"
                                                            style="width: 65%"></div>
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="javascript:void(0)"><i
                                                                    class="fa fa-pencil m-r-5"></i> Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0)"><i
                                                                    class="fa-regular fa-trash-can m-r-5"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2><a href="#('project-view')}}">Project Management</a></h2>
                                                    <small class="block text-ellipsis">
                                                        <span>2</span> <span class="text-muted">open tasks, </span>
                                                        <span>5</span> <span class="text-muted">tasks completed</span>
                                                    </small>
                                                </td>
                                                <td>
                                                    <div class="progress progress-xs progress-striped">
                                                        <div class="progress-bar" role="progressbar"
                                                            data-bs-toggle="tooltip" title="15%"
                                                            style="width: 15%"></div>
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="javascript:void(0)"><i
                                                                    class="fa fa-pencil m-r-5"></i> Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0)"><i
                                                                    class="fa-regular fa-trash-can m-r-5"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2><a href="#('project-view')}}">Video Calling App</a></h2>
                                                    <small class="block text-ellipsis">
                                                        <span>3</span> <span class="text-muted">open tasks, </span>
                                                        <span>3</span> <span class="text-muted">tasks completed</span>
                                                    </small>
                                                </td>
                                                <td>
                                                    <div class="progress progress-xs progress-striped">
                                                        <div class="progress-bar" role="progressbar"
                                                            data-bs-toggle="tooltip" title="49%"
                                                            style="width: 49%"></div>
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="javascript:void(0)"><i
                                                                    class="fa fa-pencil m-r-5"></i> Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0)"><i
                                                                    class="fa-regular fa-trash-can m-r-5"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2><a href="#('project-view')}}">Hospital Administration</a></h2>
                                                    <small class="block text-ellipsis">
                                                        <span>12</span> <span class="text-muted">open tasks, </span>
                                                        <span>4</span> <span class="text-muted">tasks completed</span>
                                                    </small>
                                                </td>
                                                <td>
                                                    <div class="progress progress-xs progress-striped">
                                                        <div class="progress-bar" role="progressbar"
                                                            data-bs-toggle="tooltip" title="88%"
                                                            style="width: 88%"></div>
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="javascript:void(0)"><i
                                                                    class="fa fa-pencil m-r-5"></i> Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0)"><i
                                                                    class="fa-regular fa-trash-can m-r-5"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2><a href="#('project-view')}}">Digital Marketplace</a></h2>
                                                    <small class="block text-ellipsis">
                                                        <span>7</span> <span class="text-muted">open tasks, </span>
                                                        <span>14</span> <span class="text-muted">tasks
                                                            completed</span>
                                                    </small>
                                                </td>
                                                <td>
                                                    <div class="progress progress-xs progress-striped">
                                                        <div class="progress-bar" role="progressbar"
                                                            data-bs-toggle="tooltip" title="100%"
                                                            style="width: 100%"></div>
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="javascript:void(0)"><i
                                                                    class="fa fa-pencil m-r-5"></i> Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0)"><i
                                                                    class="fa-regular fa-trash-can m-r-5"></i>
                                                                Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="#('projects')}}">View all projects</a>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-md-6 d-flex">
                        <div class="card card-table flex-fill">
                            <div class="card-header">
                                <h3 class="card-title mb-0">Staffs</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table custom-table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($staffMembers as $staff)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('staff-profile', $staff->id) }}" class="avatar">
                                                        <img src="{{ $staff->profile_image ? asset($staff->profile_image) : asset('/assets/img/profiles/avatar-02.jpg') }}" alt="Staff Image" class="rounded-circle" width="40" height="40" />
                                                    </a>
                                                </td>
                                                <td>{{ $staff->name }}</td>
                                                <td>{{ $staff->email }}</td>
                                                <td>{{ $staff->role->role_name ?? 'N/A' }}</td>
                                                <td class="text-end">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="material-icons">more_vert</i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="{{ route('staff-profile', $staff->id) }}">
                                                                <i class="fa-solid fa-pencil m-r-5"></i> Edit
                                                            </a>
                                                            <form action="{{ route('staff-destroy', $staff->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this staff member?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="dropdown-item" type="submit">
                                                                    <i class="fa-regular fa-trash-can m-r-5"></i> Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{route('staff-list')}}">View all staffs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    </div>
    </div>

    </div>
    <script>
        function showPeriod(period, id) {
            const today = document.getElementById(`${id}-today`);
            const week = document.getElementById(`${id}-week`);

            if (period === 'today') {
                today.classList.remove('d-none');
                week.classList.add('d-none');
            } else {
                today.classList.add('d-none');
                week.classList.remove('d-none');
            }
        }
    </script>




    <script data-cfasync="false"
        src="{{ asset('../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('assets/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/chart.js') }}" type="text/javascript"></script>

    <script src="{{ asset('assets/js/greedynav.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/feather.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/layout.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/theme-settings.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/app.js') }}" type="text/javascript"></script>

    <script src="/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="df34b4036a34bdaddca43b5b-|49" defer></script>

    <!-- Mirrored from smarthr.dreamstechnologies.com/laravel/template/public/admin-dashboard by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Aug 2024 02:20:17 GMT -->

    </html>
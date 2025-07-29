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
                            <h3 class="page-title">Client Registration</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin-dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Client Registration</li>
                            </ul>
                        </div>
                    </div>
                </div>




                <div class="card-body fs-6">

                    <div class="container">
                        <h3 class="mb-4">Review Your Information<a href="{{ route('client-registration') }}" 
   class="btn btn-sm btn-outline-primary ms-2" 
   style="text-decoration: none; ">
   <i class="fa fa-pencil "></i> Edit
</a>
</h3>


                        <ul class="list-group">
                            @if (!empty($data['profile_path']))
                            <p><strong>Profile Image:</strong></p>
                            <img src="{{ asset($data['profile_path']) }}" width="150" />
                            @endif
                            <li class="list-group-item"><strong>Full Name:</strong> {{ $data['name'] }}</li>
                            <li class="list-group-item"><strong>Email:</strong> {{ $data['email'] }}</li>
                            <li class="list-group-item"><strong>Mobile:</strong> {{ $data['phone'] }}</li>
                           
                            <li class="list-group-item"><strong>Company Name:</strong> {{ $data['business_name'] }}</li>
                            <li class="list-group-item"><strong>Trading Name:</strong> {{ $data['trading_name'] }}</li>
                            <li class="list-group-item"><strong>Address:</strong> {{ $data['address'] }}, {{ $data['city'] }}, {{ $data['country'] }}</li>
                             <li class="list-group-item"><strong>Postal code:</strong> {{ $data['post_code'] }}</li>
                            <li class="list-group-item"><strong>Business Start Date:</strong> {{ $data['business_date'] }}</li>
                            <li class="list-group-item"><strong>Book Date:</strong> {{ $data['book_date'] }}</li>
                            <li class="list-group-item"><strong>VAT Registered:</strong> {{ ucfirst($data['vat_register']) }}</li>
                            @if ($data['vat_register'] === 'yes')
                            <li class="list-group-item"><strong>VAT Scheme:</strong> {{ $data['vat_scheme'] }}</li>
                            <li class="list-group-item"><strong>VAT Reg No:</strong> {{ $data['vat_reg_no'] }}</li>
                            <li class="list-group-item"><strong>VAT Reg Date:</strong> {{ $data['vat_date'] }}</li>
                            <li class="list-group-item"><strong>VAT Submit Type:</strong> {{ $data['vat_type'] }}</li>
                            @endif
                        </ul>

                        <form action="{{route('client-store')}}" method="POST" class="mt-4">
                            @csrf
                            @foreach($data as $key => $value)
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                            @endforeach
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>

            </div>







            <!-- jQuery and Bootstrap -->
            <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
            <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>




            <!-- Layout & Theme Scripts -->
            <script src="{{ asset('assets/js/layout.js') }}"></script>
            <script src="{{ asset('assets/js/theme-settings.js') }}"></script>
            <script src="{{ asset('assets/js/greedynav.js') }}"></script>
            <script src="{{ asset('assets/js/app.js') }}"></script>



</body>

<!-- Mirrored from smarthr.dreamstechnologies.com/laravel/template/public/profile by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Aug 2024 02:21:50 GMT -->

</html>
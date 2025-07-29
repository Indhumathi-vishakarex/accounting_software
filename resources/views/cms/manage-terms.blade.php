@include('layouts.head')


<style>
/* Fix TinyMCE dropdown hidden by Bootstrap or other frameworks */
.tox .tox-menu {
  display: block !important;
  z-index: 1055 !important;
}
.tox .tox-toolbar__primary {
  flex-wrap: wrap !important;
}
</style>


<body>

    <div class="main-wrapper">

        @include('layouts.header')
        @include('layouts.sidebar')

        <div class="page-wrapper bg-white">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Terms and Condition</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin-dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Terms and Condition</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container w-75 mt-1">
                <form action="" method="POST">
                    @csrf

                    <!-- Answer (Rich Text Editor) -->
                    <div class="mb-3">
                        <h1 class="mb-3">Terms and Condition</h1>
                        <textarea id="answer" name="answer">{{ old('answer') }}</textarea>
                        @error('answer')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

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

    <!-- Layout & Theme Scripts -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <script src="{{ asset('assets/js/theme-settings.js') }}"></script>
    <script src="{{ asset('assets/js/greedynav.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>




</body>

</html>
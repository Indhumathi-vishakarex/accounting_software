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
                            <h3 class="page-title">Edit FAQ</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin-dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">EditFAQ</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-4">
               <form action="{{ route('faq.update', $faq->id) }}" method="POST">
    @csrf
    @method('PUT')  <!-- Indicate this is a PUT request for updating -->

    <!-- Question -->
    <div class="mb-3">
        <label for="question" class="form-label">Question <span class="text-danger">*</span></label>
        <input type="text" name="question" id="question" class="form-control @error('question') is-invalid @enderror" value="{{ old('question', $faq->question) }}" required>
        @error('question')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- FAQ Category -->
    <div class="mb-3">
        <label for="faq_category" class="form-label">FAQ Category <span class="text-danger">*</span></label>
        <select name="faq_category" id="faq_category" class="form-select @error('faq_category') is-invalid @enderror" required>
            <option value="">Select a category</option>
            <option value="Winngoo" {{ old('faq_category', $faq->faq_category) == 'Winngoo' ? 'selected' : '' }}>Winngoo</option>
            <option value="Winngoo Page" {{ old('faq_category', $faq->faq_category) == 'Winngoo Page' ? 'selected' : '' }}>Winngoo Page</option>
            <option value="Winngoo Coin" {{ old('faq_category', $faq->faq_category) == 'Winngoo Coin' ? 'selected' : '' }}>Winngoo Coin</option>
        </select>
        @error('faq_category')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Answer (Rich Text Editor) -->
    <div class="mb-3">
        <label for="answer">Answer:</label>
        <textarea id="answer" name="answer">{{ old('answer', $faq->answer) }}</textarea>
        @error('answer')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Submit -->
    <div class="text-end">
        <button type="submit" class="btn btn-primary">Update FAQ</button>
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
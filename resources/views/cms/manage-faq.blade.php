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
                            <h3 class="page-title">Manage FAQ</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin-dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Manage FAQ</li>
                            </ul>
                        </div>
                        <div class="col-auto float-end ms-auto"></div>
                        <div class="col-auto float-end ms-auto">
                            <a
                                href="{{route('create-faq')}}"
                                class="btn add-btn" ><i class="fa fa-plus"></i>Add New FAQ</a>

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
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Question</th>
                <th>FAQ Category</th>
                <th>Answer</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $faq)
                <tr>
                    <td>{{ $faq->id }}</td>
                    <td>{{ $faq->question }}</td>
                    <td>{{ $faq->faq_category }}</td>
                   <td style="word-break: break-word; white-space: normal;">
    {{ $faq->answer }}
</td>

                    <td class="text-center">
                        <div class="btn-group gap-2" role="group">
                          
    <a href="{{ route('faq-edit', $faq->id) }}" class="text-decoration-none text-white">
         <button class="btn btn-sm btn-primary">
        <i class="fa-solid fa-pencil"></i>
        </button>
    </a>


                            <form action="{{ route('faq-delete', $faq->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
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
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

   
</body>

<!-- Mirrored from smarthr.dreamstechnologies.com/laravel/template/public/employees by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Aug 2024 02:22:31 GMT -->

</html>
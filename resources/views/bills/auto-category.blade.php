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
                            <h3 class="page-title">Auto Categorization</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin-dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Auto Categorization</li>
                            </ul>
                        </div>
                        <div class="col-auto float-end ms-auto"></div>
                        <div class="col-auto float-end ms-auto">
                            <a
                                href=""
                                class="btn add-btn" data-bs-toggle="modal" data-bs-target="#autoCategorizationModal"><i class="fa fa-plus"></i> Add Bill</a>

                        </div>
                    </div>
                </div>

                <form method="GET" action="{{ route('client-list') }}">
                    <div class="row filter-row">

                        <div class="col-sm-6 col-md-3">
                            <div class="input-block mb-3 form-focus">
                                <input type="text" name="name" class="form-control floating" value="{{ request('name') }}" />
                                <label class="focus-label">Keyword</label>
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
                                <th>Keyword / Phrase</th>
                                <th>Match Type</th>
                                <th>Assigned Bill Type</th>
                                <th>Added Field</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example row -->
                            <tr>
                                <td>Lion craft</td>
                                <td>Contains</td>
                                <td>Purchase</td>
                                <td>Fuel Category</td>
                                <td>1</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td class="text-center">
                                    <div class="btn-group gap-2" role="group">
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editRuleModal">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>BT</td>
                                <td>Contains</td>
                                <td>Expense</td>
                                <td>Telephone</td>
                                <td>1</td>
                                <td><span class="badge bg-danger">Incctive</span></td>
                                <td class="text-center">
                                    <div class="btn-group gap-2" role="group">
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editRuleModal">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- You can add more rows dynamically -->
                        </tbody>
                    </table>


                </div>









            </div>
        </div>
    </div>


    <!-- Auto Categorization Modal -->
    <div class="modal fade" id="autoCategorizationModal" tabindex="-1" aria-labelledby="autoCategorizationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered"> <!-- Centered & large -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="autoCategorizationModalLabel">Create Auto-Categorization Rule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark fs-5"></i></button>
                </div>

                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <!-- Keyword / Phrase -->
                            <div class="col-md-6">
                                <label for="keyword" class="form-label">Keyword / Phrase</label>
                                <input type="text" id="keyword" name="keyword" class="form-control" placeholder="e.g. enter keyword">
                            </div>

                            <!-- Match Type -->
                            <div class="col-md-6">
                                <label for="match_type" class="form-label">Match Type</label>
                                <select id="match_type" name="match_type" class="form-select">
                                    <option value="exact">Exact Match</option>
                                    <option value="contains">Contains</option>
                                    <option value="starts_with">Starts With</option>
                                </select>
                            </div>

                            <!-- Assigned Bill Type -->
                            <div class="col-md-6">
                                <label for="bill_type" class="form-label">Assigned Bill Type</label>
                                <select id="bill_type" name="bill_type" class="form-select">
                                    <option selected disabled>-- Select Bill Type --</option>
                                    <option value="purchase">Purchase</option>
                                    <option value="expense">Expense</option>

                                </select>
                            </div>

                            <!-- Added Field -->
                            <div class="col-md-6">
                                <label for="added_field" class="form-label">Added Field (Optional)</label>
                                <input type="text" id="added_field" name="added_field" class="form-control" placeholder="Custom field name">
                            </div>

                            <!-- Priority -->
                            <div class="col-md-6">
                                <label for="priority" class="form-label">Priority</label>
                                <input type="number" id="priority" name="priority" class="form-control" placeholder="e.g. 1">
                                <small class="text-muted">Lower number = higher priority</small>
                            </div>

                            <!-- Active Status -->
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="form-check form-switch mt-4">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" checked>
                                    <label class="form-check-label" for="is_active">Active Status</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create Rule</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Auto Categorization Modal -->
    <div class="modal fade" id="editRuleModal" tabindex="-1" aria-labelledby="editRuleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered"> <!-- Centered & large -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRuleModalLabel"> Edit Auto-Categorization Rule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark fs-5"></i></button>
                </div>

                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <!-- Keyword / Phrase -->
                            <div class="col-md-6">
                                <label for="keyword" class="form-label">Keyword / Phrase</label>
                                <input type="text" id="keyword" name="keyword" class="form-control" placeholder="e.g. enter keyword">
                            </div>

                            <!-- Match Type -->
                            <div class="col-md-6">
                                <label for="match_type" class="form-label">Match Type</label>
                                <select id="match_type" name="match_type" class="form-select">
                                    <option value="exact">Exact Match</option>
                                    <option value="contains">Contains</option>
                                    <option value="starts_with">Starts With</option>
                                </select>
                            </div>

                            <!-- Assigned Bill Type -->
                            <div class="col-md-6">
                                <label for="bill_type" class="form-label">Assigned Bill Type</label>
                                <select id="bill_type" name="bill_type" class="form-select">
                                    <option selected disabled>-- Select Bill Type --</option>
                                    <option value="purchase">Purchase</option>
                                    <option value="expense">Expense</option>

                                </select>
                            </div>

                            <!-- Added Field -->
                            <div class="col-md-6">
                                <label for="added_field" class="form-label">Added Field (Optional)</label>
                                <input type="text" id="added_field" name="added_field" class="form-control" placeholder="Custom field name">
                            </div>

                            <!-- Priority -->
                            <div class="col-md-6">
                                <label for="priority" class="form-label">Priority</label>
                                <input type="number" id="priority" name="priority" class="form-control" placeholder="e.g. 1">
                                <small class="text-muted">Lower number = higher priority</small>
                            </div>

                            <!-- Active Status -->
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="form-check form-switch mt-4">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" checked>
                                    <label class="form-check-label" for="is_active">Active Status</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create Rule</button>
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
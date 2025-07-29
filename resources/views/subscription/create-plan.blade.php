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
                            <h3 class="page-title">Create Plan</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin-dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Create Plan</li>
                            </ul>
                        </div>
                    </div>
                </div>



                <div class="">
                    <div class="card-body fs-5">
                        <div class="container-fluid w-75">
                            <form action="{{route('store-plans')}}" method="POST">
                                @csrf

                                {{-- Plan Name --}}
                                <div class="mb-3">
                                    <label for="plan_name" class="form-label fw-semibold">Plan Name <span class="text-danger">*</span></label>
                                    <input type="text"
                                        id="plan_name"
                                        name="plan_name"
                                        class="form-control p-2 large-input @error('plan_name') is-invalid @enderror"
                                        placeholder="Enter plan name"
                                        value="{{ old('plan_name') }}"
                                        required>
                                    @error('plan_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Plan Type --}}
                                <div class="mb-3">
                                    <label for="plan_type" class="form-label fw-semibold">Plan Type <span class="text-danger">*</span></label>
                                    <select id="plan_type"
                                        name="plan_type"
                                        class="form-control p-2 large-input @error('plan_type') is-invalid @enderror"
                                        required>
                                        <option value="">Select type</option>
                                        <option value="Monthly" {{ old('plan_type') == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                                        <option value="Yearly" {{ old('plan_type') == 'Yearly' ? 'selected' : '' }}>Yearly</option>
                                    </select>
                                    @error('plan_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Price --}}
                                <div class="mb-3">
                                    <label for="price" class="form-label fw-semibold">Price <span class="text-danger">*</span></label>
                                    <input type="number"
                                        id="price"
                                        name="price"
                                        class="form-control p-2 large-input @error('price') is-invalid @enderror"
                                        placeholder="Enter price"
                                        min="1"
                                        value="{{ old('price') }}"
                                        required>
                                    @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Duration --}}
                                <div class="mb-3">
                                    <label for="duration" class="form-label fw-semibold">Duration (in days/months) <span class="text-danger">*</span></label>
                                    <input type="number" id="duration" name="duration"
                                        class="form-control p-2 large-input @error('duration') is-invalid @enderror"
                                        placeholder="Enter duration"
                                        min="1"
                                        value="{{ old('duration') }}"
                                        required>
                                    @error('duration')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="feature_input" class="form-label fw-semibold">Add Feature</label>
                                    <div class="d-flex">
                                        <input type="text" id="feature_input" class="form-control me-2" placeholder="Enter feature">
                                        <button type="button" onclick="addFeature()" class="btn btn-secondary">Add</button>
                                    </div>
                                    <div id="feature_error" class="text-danger mt-1" style="display:none;">Feature cannot be empty</div>
                                </div>

                                <!-- Feature Display -->
                                <div class="mb-3">
                                    <label class="form-label fw-semibold d-block">Features Added</label>
                                    <div id="features_container" class="d-flex flex-wrap gap-2"></div>
                                </div>

                                {{-- Status Toggle --}}
                                <!-- <div class="mb-4">
                                    <label class="form-label fw-semibold d-block">Status</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input"
                                            type="radio"
                                            name="status"
                                            id="status_active"
                                            value="active"
                                            {{ old('status', 'active') == 'active' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_active">Active</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input"
                                            type="radio"
                                            name="status"
                                            id="status_inactive"
                                            value="inactive"
                                            {{ old('status') == 'inactive' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_inactive">Inactive</label>
                                    </div>
                                    @error('status')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div> -->

                                {{-- Submit --}}
                                <button type="submit" class="btn btn-primary px-4 py-2">Create Plan</button>
                            </form>
                        </div>
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
            <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>

             <script>
    document.addEventListener("DOMContentLoaded", function () {
        let features = [];

        function addFeature() {
            const input = document.getElementById('feature_input');
            const value = input.value.trim();

            if (value && !features.includes(value)) {
                features.push(value);
                renderFeatures();
                input.value = '';
            }
        }

        function removeFeature(feature) {
            features = features.filter(f => f !== feature);
            renderFeatures();
        }

        function renderFeatures() {
            const container = document.getElementById('features_container');
            container.innerHTML = '';

            features.forEach(feature => {
                const tag = document.createElement('div');
                tag.className = 'd-flex align-items-center bg-light px-2 py-1 rounded me-2 mb-2';

                tag.innerHTML = `
                    <span class="me-2">${feature}</span>
                    <span class="text-danger fw-bold" style="cursor:pointer" onclick="removeFeature('${feature}')">&times;</span>
                    <input type="hidden" name="features[]" value="${feature}">
                `;
                container.appendChild(tag);
            });
        }

        // Expose to global scope
        window.addFeature = addFeature;
        window.removeFeature = removeFeature;
    });
</script>




</body>



</html>
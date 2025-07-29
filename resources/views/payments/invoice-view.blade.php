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
                <h3 class="page-title">Invoice</h3>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="{{route('admin-dashboard')}}">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active"><a href="{{route('payments')}}">Payments</a></li>
                  <li class="breadcrumb-item active">Invoice</li>
                </ul>
              </div>
              <div class="col-auto float-end ms-auto"></div>
              <div class="col-auto float-end ms-auto">
                <div class="btn-group btn-group-sm">
                  <button class="btn btn-white">CSV</button>
                  <button class="btn btn-white">EXCEL</button>
                  <button class="btn btn-white">PDF</button>
                  <button class="btn btn-white">
                    <i class="fa fa-print fa-lg"></i> Print
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6 m-b-20">
                      <img src="/assets/img/logo4.png" class="inv-logo" alt />
                      <ul class="list-unstyled">
                        <li>Dreamguy's Technologies</li>
                        <li>3864 Quiet Valley Lane,</li>
                        <li>Sherman Oaks, CA, 91403</li>
                        <li>GST No:</li>
                      </ul>
                    </div>
                    <div class="col-sm-6 m-b-20">
                      <div class="invoice-details">
                        <h3 class="text-uppercase">Invoice #INV-0001</h3>
                        <ul class="list-unstyled">
                          <li>Date: <span>March 12, 2019</span></li>
                          <li>Due date: <span>April 25, 2019</span></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6 col-lg-7 col-xl-8 m-b-20">
                      <h5>Invoice to:</h5>
                      <ul class="list-unstyled">
                        <li>
                          <h5><strong>Barry Cuda</strong></h5>
                        </li>
                        <li><span>Global Technologies</span></li>
                        <li>5754 Airport Rd</li>
                        <li>Coosada, AL, 36020</li>
                        <li>United States</li>
                        <li>888-777-6655</li>
                        <li>
                          <a href="#"
                            ><span
                              class="__cf_email__"
                              data-cfemail="ea888b989893899f8e8baa8f928b879a868fc4898587"
                              >[email&#160;protected]</span
                            ></a
                          >
                        </li>
                      </ul>
                    </div>
                    <div class="col-sm-6 col-lg-5 col-xl-4 m-b-20">
                      <span class="text-muted">Payment Details:</span>
                      <ul class="list-unstyled invoice-payment-details">
                        <li>
                          <h5>
                            Total Due: <span class="text-end">$8,750</span>
                          </h5>
                        </li>
                        <li>Bank name: <span>Profit Bank Europe</span></li>
                        <li>Country: <span>United Kingdom</span></li>
                        <li>City: <span>London E1 8BF</span></li>
                        <li>Address: <span>3 Goodman Street</span></li>
                        <li>IBAN: <span>KFH37784028476740</span></li>
                        <li>SWIFT code: <span>BPT4E</span></li>
                      </ul>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>ITEM</th>
                          <th class="d-none d-sm-table-cell">DESCRIPTION</th>
                          <th>UNIT COST</th>
                          <th>QUANTITY</th>
                          <th class="text-end">TOTAL</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Android Application</td>
                          <td class="d-none d-sm-table-cell">
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit
                          </td>
                          <td>$1000</td>
                          <td>2</td>
                          <td class="text-end">$2000</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Ios Application</td>
                          <td class="d-none d-sm-table-cell">
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit
                          </td>
                          <td>$1750</td>
                          <td>1</td>
                          <td class="text-end">$1750</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Codeigniter Project</td>
                          <td class="d-none d-sm-table-cell">
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit
                          </td>
                          <td>$90</td>
                          <td>3</td>
                          <td class="text-end">$270</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Phonegap Project</td>
                          <td class="d-none d-sm-table-cell">
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit
                          </td>
                          <td>$1200</td>
                          <td>2</td>
                          <td class="text-end">$2400</td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td>Website Optimization</td>
                          <td class="d-none d-sm-table-cell">
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit
                          </td>
                          <td>$200</td>
                          <td>2</td>
                          <td class="text-end">$400</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div>
                    <div class="row invoice-payment">
                      <div class="col-sm-7"></div>
                      <div class="col-sm-5">
                        <div class="m-b-20">
                          <div class="table-responsive no-border">
                            <table class="table mb-0">
                              <tbody>
                                <tr>
                                  <th>Subtotal:</th>
                                  <td class="text-end">$7,000</td>
                                </tr>
                                <tr>
                                  <th>
                                    Tax: <span class="text-regular">(25%)</span>
                                  </th>
                                  <td class="text-end">$1,750</td>
                                </tr>
                                <tr>
                                  <th>Total:</th>
                                  <td class="text-end text-primary">
                                    <h5>$8,750</h5>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="invoice-info">
                      <h5>Other information</h5>
                      <p class="text-muted">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Vivamus sed dictum ligula, cursus blandit risus.
                        Maecenas eget metus non tellus dignissim aliquam ut a
                        ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed
                        finibus leo vitae lorem interdum, eu scelerisque tellus
                        fermentum. Curabitur sit amet lacinia lorem. Nullam
                        finibus pellentesque libero, eu finibus sapien interdum
                        vel
                      </p>
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
    <!-- Cloudflare Email Decode (Optional) -->
<script data-cfasync="false" src="{{ asset('../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>

<!-- Core JS Libraries -->
<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/js/feather.min.js') }}"></script>

<!-- Template Scripts -->
<script src="{{ asset('assets/js/layout.js') }}"></script>
<script src="{{ asset('assets/js/theme-settings.js') }}"></script>
<script src="{{ asset('assets/js/greedynav.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

<!-- Cloudflare Rocket Loader (Optional) -->
<script src="{{ asset('../../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js') }}"
        data-cf-settings="c44d1b82964c757f15c00558-|49" defer></script>

  </body>

  <!-- Mirrored from smarthr.dreamstechnologies.com/laravel/template/public/invoice-view by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Aug 2024 02:24:46 GMT -->
</html>

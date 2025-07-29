<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>TinyMCE Heading Dropdown Working</title>
 <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
      <script src="https://cdn.tiny.cloud/1/xxsgu5p9mpvqh92i4l7ia69g0hcilcy5keyrfcums8ye06co/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>

  <textarea id="answer">Type your answer here...</textarea>

  <script>
tinymce.init({
  selector: '#answer',
  height: 400,
  menubar: false,
  plugins: 'advlist lists link image media code formats',
  toolbar: 'formatselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image media | code',
  block_formats: 'Paragraph=p; Heading 1=h1; Heading 2=h2; Heading 3=h3',
  toolbar_mode: 'wrap',
  branding: false
});
</script>

</body>
</html>  -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>jQuery SlimScroll Demo</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.4.1/dist/css/coreui.min.css" rel="stylesheet" integrity="sha384-NlsxdkweGA8nr9s0TVc3Qu2zqhWMNsHrvzMpAjVR0yDqXgC2z+RWYoeCNG2uO2MC" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

</head>
<body>
  <!-- header -->
   <header class="header">
  <a class="header-brand" href="#">CoreUI</a>
  <ul class="header-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#">Home <span class="visually-hidden">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Features</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Pricing</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
    </li>
  </ul>
</header>
  <!-- sidebar -->
  <div class="sidebar border-end">
  <div class="sidebar-header border-bottom">
    <div class="sidebar-brand">CoreUI</div>
  </div>
  <ul class="sidebar-nav">
    <li class="nav-title">Nav Title</li>
    <li class="nav-item">
      <a class="nav-link active" href="#">
        <i class="nav-icon cil-speedometer"></i> Nav item
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="nav-icon cil-speedometer"></i> With badge
        <span class="badge bg-primary ms-auto">NEW</span>
      </a>
    </li>
    <li class="nav-item nav-group show">
      <a class="nav-link nav-group-toggle" href="#">
        <i class="nav-icon cil-puzzle"></i> Nav dropdown
      </a>
      <ul class="nav-group-items">
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Nav dropdown item
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Nav dropdown item
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item mt-5">
      <a class="nav-link" href="https://coreui.io">
        <i class="nav-icon cil-cloud-download"></i> Download CoreUI</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="https://coreui.io/pro/">
        <i class="nav-icon cil-layers"></i> Try CoreUI
        <strong>PRO</strong>
      </a>
    </li>
  </ul>
  <div class="sidebar-footer border-top d-flex">
    <button class="sidebar-toggler" type="button"></button>
  </div>
</div>

<div class="box" id="scroll-box">
  <div class="content">
    <p>This is a demo of SlimScroll plugin. Scroll this area.</p>
    <p>Line 2</p>
    <p>Line 3</p>
    <p>Line 4</p>
    <p>Line 5</p>
    <p>Line 6</p>
    <p>Line 7</p>
    <p>Line 8</p>
    <p>Line 9</p>
    <p>Line 10</p>
  </div>
</div>



<script>
  $('#scroll-box').slimScroll({
    height: '200px',
    color: '#007bff',
    size: '6px'
  });

  new DataTable('#example', {
    paging: false,
    scrollCollapse: true,
    scrollY: '200px'
});
</script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.4.1/dist/js/coreui.bundle.min.js" integrity="sha384-A/PJYVqbBIxVQjEeGNq+sol2Ti2m1CIs9UqTU4QAPHMm+4V/Qzov2cZYatOxoVgf" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@5.16.0/dist/js/coreui.min.js" integrity="sha384-L3pWUyiZ07OG/bJbrvVdWRQwimCWJYlF3aZ6ZoB+JgJ5Z9xoqEJdT+DNXcMJv6DQ" crossorigin="anonymous"></script>
</body>
</html>

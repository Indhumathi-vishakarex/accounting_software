<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
  data-sidebar-image="none">

<!-- Mirrored from smarthr.dreamstechnologies.com/laravel/template/public/admin-dashboard by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Aug 2024 02:18:29 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Smarthr - Bootstrap Admin Template">
  <meta name="keywords"
    content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
  <meta name="author" content="Dreamstechnologies - Bootstrap Admin Template">
  <title>Winngoopages</title>

  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo2.png') }}">

  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/css/line-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/material.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}" />

  <link
    rel="stylesheet"
    href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">


  <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">

  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}">


  <!-- TinyMCE from CDN with API Key -->
  <script src="https://cdn.tiny.cloud/1/xxsgu5p9mpvqh92i4l7ia69g0hcilcy5keyrfcums8ye06co/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

  <script>
    tinymce.init({
      selector: '#answer',
      height: 500,
      menubar: false,
      plugins: 'advlist lists link image media code',
      toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | link image media | code',
      branding: false,
      automatic_uploads: true,

      // Block formats: Ensures heading dropdown appears
      block_formats: 'Paragraph=p; Heading 1=h1; Heading 2=h2; Heading 3=h3; Heading 4=h4; Heading 5=h5; Heading 6=h6',

      file_picker_types: 'file image media',

      // Custom file picker
      file_picker_callback: function(callback, value, meta) {
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        if (meta.filetype === 'image') {
          input.setAttribute('accept', 'image/*');
        } else if (meta.filetype === 'media') {
          input.setAttribute('accept', 'video/*');
        } else {
          input.setAttribute('accept', '*');
        }
        input.onchange = function() {
          const file = this.files[0];
          const reader = new FileReader();
          reader.onload = function() {
            callback(reader.result, {
              title: file.name
            });
          };
          reader.readAsDataURL(file);
        };
        input.click();
      },

      // Fix: Ensure content has valid HTML to start with
      setup: function(editor) {
        editor.on('init', function() {
          const content = editor.getContent({
            format: 'html'
          });
          if (!content || content.trim() === '') {
            editor.setContent('<p></p>');
          }
        });
      },

      content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
  </script>



</head>
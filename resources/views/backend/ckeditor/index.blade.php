<!DOCTYPE html>
<html>
<meta name="csrf-token" content="{{ csrf_token() }}">
<head>
 
</head>
<body>
  <textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor"></textarea>
  <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>

  
  <script src="{{ asset('backend/js/ckeditor/ckeditor.js') }}"></script>
<script>
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
     CKEDITOR.replace( 'summary-ckeditor', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });

</script>
</body>
</html>
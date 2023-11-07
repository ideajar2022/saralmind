<!DOCTYPE html>
<html>
<meta name="csrf-token" content="{{ csrf_token() }}">
<head>
 
</head>
<body>
  <textarea>
    Welcome to TinyMCE!
  </textarea>
  <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('backend/js/tinymce/jquery.tinymce.min.js') }}"></script>
<script src="{{ asset('backend/js/tinymce/tinymce.min.js') }}"></script>

<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
tinymce.init({
    relative_urls : false,
    remove_script_host : false,
    convert_urls : true,
    selector: "textarea",theme: "modern",width: 680,height: 300,
    plugins: [
    "advlist autolink link image lists charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
    "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
    ],
    toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect | image",
    toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
    image_advtab: true ,
    
    external_filemanager_path:"{{asset('backend/js/tinymce/filemanager')}}/",
    filemanager_title:"Responsive Filemanager" ,
    external_plugins: { "filemanager" : "{{url('backend/js/tinymce')}}/filemanager/plugin.min.js"},
    // images_upload_url : "{{ route('upload') }}",
    automatic_uploads : false,

    images_upload_handler : function(blobInfo, success, failure) {
      var xhr, formData;

      xhr = new XMLHttpRequest();
      xhr.withCredentials = false;
      xhr.open('POST', "{{ route('upload') }}");

      xhr.onload = function() {
        var json;

        if (xhr.status != 200) {
          failure('HTTP Error: ' + xhr.status);
          return;
        }

        json = JSON.parse(xhr.responseText);

        if (!json || typeof json.file_path != 'string') {
          failure('Invalid JSON: ' + xhr.responseText);
          return;
        }

        success(json.file_path);
      };

      formData = new FormData();
      formData.append('file', blobInfo.blob(), blobInfo.filename());
      formData.append( "_token", $('meta[name="csrf-token"]').attr('content') ); 
      xhr.send(formData);
    },
});
</script>
</body>
</html>
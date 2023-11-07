@extends('frontend.app')
@section('title', 'PAGE NOT FOUND')
@section('content')

{!! cache('page_not_found_view') !!}

@endsection

@section('extra-js')
<script type="text/javascript">
</script>
@endsection
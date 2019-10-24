@extends('distributor.layout.base')

@section('content')
{{-- @extends('farmers.layout.base') --}}
@section('styles-below')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/sweetalert.css')}}">
@endsection
@section('content')
    <div class="row">

    </div>
@endsection
@section('scripts-below')
  <script src="{{asset('assets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>
@endsection
@stop
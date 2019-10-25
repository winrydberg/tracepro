@extends('packer.layout.base')
@section('styles-below')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/sweetalert.css')}}">
@endsection
@section('content')
<div class="row">
     <div class="col-sm-12">
            <h4 class="form-section"> Customer Information</h4>
            <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="customerbin">Customer BIN</label>
                            <input type="text" id="customerbin" class="form-control"  name="customerbin">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="customername">Customer Name</label>
                            <input type="text" id="customername" class="form-control" name="customername">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="customercontact">Customer Contact Info</label>
                            <input type="text" id="customercontact" class="form-control" name="customercontact">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="customeraddress">Customer Address</label>
                            <input type="text" id="customeraddress" class="form-control" name="customeraddress">
                        </div>
                    </div>
                </div>
     </div>   
</div>
@endsection
@section('scripts-below')
  <script src="{{asset('assets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>
@endsection
@extends('farmers.layout.base')
@section('styles-below')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/sweetalert.css')}}">
@endsection
@section('content')
<div class="row">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">ADD INPUTS</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="card-text">
                                <p>Use the form below to add inputs</p>
                            </div>
                            <form class="form" id="{{ isset($data) ? 'updatefarminput' : 'farminputform'}}">
                                {{csrf_field()}}
                                <input type="hidden" name="idtoupdate" value="{{isset($data) ? $data->id : ''}}">
                                <div class="form-body">
                                    <h4 class="form-section">Supplier Information</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="supplierbin">Supplier BIN</label>
                                            <input type="text" id="supplierbin" class="form-control"  name="supplierbin" value="{{isset($data) ? $data->supplierbin : ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="suppliername">Supplier Name</label>
                                                <input type="text" id="suppliername" class="form-control" name="suppliername" value="{{isset($data) ? $data->suppliername : ''}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="suppliercontact">Supplier Contact Info</label>
                                                <input type="text" id="suppliercontact" class="form-control" name="suppliercontact" value="{{isset($data) ? $data->suppliercontact : ''}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="supplieraddress">Supplier Address</label>
                                                <input type="text" id="supplieraddress" class="form-control" name="supplieraddress" value="{{isset($data) ? $data->supplieraddress : ''}}">
                                            </div>
                                        </div>
                                    </div>
    
                                    <h4 class="form-section">Product Information</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="productidno">Product Identification No.</label>
                                                        <input type="text" id="productidno" class="form-control" name="productidno" value="{{isset($data) ? $data->productidno : ''}}">
                                                    </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="productname">Product Name</label>
                                                        <input type="text" id="productname" class="form-control" name="productname" value="{{isset($data) ? $data->productname : ''}}">
                                                </div>
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="productbrandname">Brand Name</label>
                                                        <input type="text" id="productbrandname" class="form-control" name="productbrandname" value="{{isset($data) ? $data->productbrandname : ''}}">
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="productvariety">Product variety</label>
                                                        <input type="text" id="productvariety" class="form-control" name="productvariety" value="{{isset($data) ? $data->productvariety : ''}}">
                                                </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="productbatchno">Batch No.</label>
                                                        <input type="text" id="productbatchno" class="form-control" name="productbatchno" value="{{isset($data) ? $data->productbatchno : ''}}">
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                        <label for="productquantity">Quantity</label>
                                                        <input type="text" id="productquantity" class="form-control" name="productquantity" value="{{isset($data) ? $data->productquantity : ''}}">
                                                </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="productwherepurchased">Digital Addres of Where you purchased product</label>
                                                            <input type="text" id="productwherepurchased" class="form-control" name="productwherepurchased" value="{{isset($data) ? $data->productwherepurchased : ''}}">
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="productwheredelivered">Digital Addres of Where you Delivered product</label>
                                                            <input type="text" id="productwheredelivered" class="form-control" name="productwheredelivered" value="{{isset($data) ? $data->productwheredelivered : ''}}">
                                                    </div>
                                            </div>
                                        </div>
                                
                                    <div class="form-group">
                                        <label for="productextrainfo">Extra Information</label>
                                        <textarea id="productextrainfo" rows="5" class="form-control" name="productextrainfo">{{isset($data) ? $data->productextrainfo : ''}}</textarea>
                                    </div>

                                    <h4 class="form-section">Transporter Information</h4>
                                    <div class="row">
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="transportername">Transporter Name</label>
                                                            <input type="text" id="transportername" class="form-control" name="transportername" value="{{isset($data) ? $data->transportername : ''}}">
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="transportercontact">Transporter Contact</label>
                                                            <input type="text" id="transportercontact" class="form-control" name="transportercontact" value="{{isset($data) ? $data->transportercontact : ''}}">
                                                    </div>
                                            </div>
                                        </div>

                                    <h4 class="form-section">Receipt Information</h4>
                                    <div class="row">
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="receiptno">Receipt No.</label>
                                                            <input type="text" id="receiptno" class="form-control" name="receiptno" value="{{isset($data) ? $data->receiptno : ''}}">
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="receivedperson">Name of person who received the product</label>
                                                            <input type="text" id="receivedperson" class="form-control" name="receivedperson" value="{{isset($data) ? $data->receivedperson : ''}}">
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="dispatchedperson">Name of person who dispatched the product</label>
                                                            <input type="text" id="dispatchedperson" class="form-control" name="dispatchedperson" value="{{isset($data) ? $data->dispatchedperson : ''}}">
                                                    </div>
                                            </div>
                                        </div>

                                </div>
    
                                <div class="form-actions">
                                <a href="{{url()->previous()}}" class="btn btn-warning mr-1">
                                        <i class="ft-x"></i> Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-check-square-o"></i> {{isset($data) ? 'Update':'Save'}}
                                        <img src="{{asset('assets/images/loading.gif')}}" id="loadinggif" style="max-height: 25px;display: none">
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection
@section('scripts-below')
  <script src="{{asset('assets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>
  <script type="text/javascript">
    $('#farminputform').submit(function(e){
        e.preventDefault();
        $('#loadinggif').show();
        $.post('{{url('farmers/savefarminputs')}}',$(this).serialize(),function(response){
            $('#loadinggif').hide(); 
          if(response.status==='success'){
            swal("Success",'Your farm Inputs has been successfully saved','success');
          }else{
            swal("Error",'Sorry.. Your Farm Input Records could not be saved.. Please try again','error');
          }
        }).fail(function(){
        $('#loadinggif').hide(); 
        swal("Error",'Sorry.. Your Farm Input Records could not be saved.. Please try again','error');
        });
    });
</script>
<script type="text/javascript">
    $('#updatefarminput').submit(function(e){
        e.preventDefault();
        $('#loadinggif').show();
        $.post('{{url('farmers/updatefarminputs')}}',$(this).serialize(),function(response){
            $('#loadinggif').hide(); 
          if(response.status==='success'){
            swal("Success",'Your farm Inputs has been successfully updated','success');
          }else{
            swal("Error",'Sorry.. Your Farm Input Records could not be updated.. Please try again','error');
          }
        }).fail(function(){
        $('#loadinggif').hide(); 
        swal("Error",'Sorry.. Your Farm Input Records could not be updated.. Please try again','error');
        });
    });
</script>
<script>
 @if(isset($type) && $type=='view')
    $('input, textarea').attr('readonly','readonly');
    @endif
</script>
@endsection
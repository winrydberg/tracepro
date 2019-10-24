@extends('farmers.layout.base')
@section('styles-below')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/sweetalert.css')}}">
@endsection
@section('content')
<div class="row">
        <div class="col-md-12">
                <div class="card" style="height: 980px;">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">FARM RECORDS</h4>
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
                                <p>Use this form to add records to your farm</p>
                            </div>
                            <form class="form" id="farmrecordsform">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <h4 class="form-section"> Farm/Input Records</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="farmbin">Farm BIN</label>
                                                <input type="text" id="farmbin" class="form-control" name="farmbin">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="farmname">Farm Name</label>
                                                <input type="text" id="farmname" class="form-control"  name="farmname">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="plotsapplied">Plots Applied on</label>
                                                <input type="text" id="plotsapplied" class="form-control"  name="plotsapplied">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="dateofapplication">Date Applied</label>
                                                <input type="text" id="dateofapplication" class="form-control"  name="dateofapplication">
                                            </div>
                                        </div>
                                    </div>
    
                                    <h4 class="form-section">Details of Product you applied</h4>
    
                                    <div class="row">
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="productidno">Product Identification No.</label>
                                                            <input type="text" id="productidno" class="form-control" name="productidno">
                                                        </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="productname">Product Name</label>
                                                            <input type="text" id="productname" class="form-control" name="productname">
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                                <div class="col-md-6">
                                                        <div class="form-group">
                                                                <label for="supplierbin">Supplier BIN.</label>
                                                                <input type="text" id="supplierbin" class="form-control" name="supplierbin">
                                                            </div>
                                                </div>
                                        </div>
                                       
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="productbrandname">Brand Name</label>
                                                            <input type="text" id="productbrandname" class="form-control" name="productbrandname">
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="productvariety">Product variety</label>
                                                            <input type="text" id="productvariety" class="form-control" name="productvariety">
                                                    </div>
                                            </div>
                                        </div>
    
                                        <div class="row">
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="productbatchno">Batch No.</label>
                                                            <input type="text" id="productbatchno" class="form-control" name="productbatchno">
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="productquantityapplied">Quantity Applied</label>
                                                            <input type="text" id="productquantityapplied" class="form-control" name="productquantityapplied">
                                                    </div>
                                            </div>
                                        </div>         
                                </div>
    
                                <div class="form-actions center">
                                    <button type="button" class="btn btn-warning mr-1">
                                        <i class="ft-x"></i> Cancel
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-check-square-o"></i> Save
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
    $('#farmrecordsform').submit(function(e){
        e.preventDefault();
        $('#loadinggif').show();
        $.post('{{url('farmers/savefarmrecords')}}',$(this).serialize(),function(response){
            $('#loadinggif').hide(); 
          if(response.status==='success'){
            swal("Success",'Your farm Records has been successfully saved','success');
          }else{
            swal("Error",'Sorry.. Your Farm Records could not be saved.. Please try again','error');
          }
        }).fail(function(){
        $('#loadinggif').hide(); 
        swal("Error",'Sorry.. Your Farm Records could not be saved.. Please try again','error');
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
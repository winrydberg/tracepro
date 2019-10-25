@extends('farmers.layout.base')
@section('styles-below')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/sweetalert.css')}}">
@endsection
@section('content')
<div class="row">
        <div class="col-md-12">   
            <div class="card">
                 <div class="card-header">
                    <h4 class="card-title">Add New Customer</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collpase show">
                    <div class="card-body">
                        <div class="card-text">
                        </div>
                    <form class="form form-horizontal" id="addcustomerform">
                            {{csrf_field()}}
                            <input type="hidden" name="customeroftype" value="Grower">
                            <div class="form-body">
                                
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
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="customeremail">Customer Address</label>
                                                        <input type="text" id="customeremail" class="form-control" name="customeremail">
                                                    </div>
                                                </div>
                                            
                                                <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="customertype">What does your customer do</label>
                                                            <select id="customertype" class="form-control" name="customertype">
                                                                <option value="">Please select</option>
                                                                <option value="Grower">Grower/Farmer</option>
                                                                <option value="Packer">Produce Packer/Re-packer</option>
                                                                <option value="Distributor">Distributor/Trader</option>
                                                                <option value="Manufacturer">Manufacturer/Processor</option>
                                                                <option value="Retail Store">Retail Store</option>
                                                                <option value="Food Service Operator">Food Service Operator</option>
                                                                <option value="Supplier of farm inputs">Supplier of farm inputs</option>
                                                                <option value="Livestock Producer">Livestock Producer</option></select>
                                                            </select>
                                                        </div>
                                                    </div>
                                        </div>

                            
                            </div>

                            <div class="form-actions center">
                                <button type="reset" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-primary submit">
                                    <i class="fa fa-check-square-o"></i> Save
                                </button>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection
@section('scripts-below')
  <script src="{{asset('assets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>
  <script type="text/javascript">
    $('#addcustomerform').submit(function(e){
        e.preventDefault();
        $('#loadinggif').show();
        $.post('{{url('actors/savecustomer')}}',$(this).serialize(),function(response){
            $('#loadinggif').hide(); 
          if(response.status==='success'){
            swal("Success",'New Customer successfully recorded','success');
          }else{
            swal("Error",'Sorry.. Your Customer could not be saved.. Please try again','error');
          }
        }).fail(function(){
        $('#loadinggif').hide(); 
        swal("Error",'Sorry.. Your Customer could not be saved.. Please try again','error');
        });
    });
</script>
@endsection
@extends('retailstore.layout.base')
@section('styles-below')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/sweetalert.css')}}">
@endsection
@section('content')
<div class="row">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">TRANSACTIONS</h4>
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
                                <p>Add a transaction</p>
                            </div>
                            <form class="form" id="transactionform">
                                <div class="form-body">
                                    <h4 class="form-section"> Retailer’s Information</h4>
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="retailerbin">Retailer’s BIN</label>
                                                    <input type="text" id="retailerbin" class="form-control"  name="retailerbin">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="retailername">PRetailer’s Name</label>
                                                    <input type="text" id="retailername" class="form-control" name="retailername">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="retailercontact">Retailer’s Contact Info</label>
                                                    <input type="text" id="retailercontact" class="form-control" name="retailercontact">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="retaileraddress">Retailer’s Address</label>
                                                    <input type="text" id="retaileraddress" class="form-control" name="retaileraddress">
                                                </div>
                                            </div>
                                        </div>

                               

                                    <h4 class="form-section"> Product Information</h4>
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
                                                            <label for="productquantity">Quantity</label>
                                                            <input type="text" id="productquantity" class="form-control" name="productquantity">
                                                    </div>
                                            </div>
                                        </div>
    
                                        <div class="row">
                                                <div class="col-md-6">
                                                        <div class="form-group">
                                                                <label for="productwherepurchased">Digital Addres of Where the product will be picked</label>
                                                                <input type="text" id="productwherepurchased" class="form-control" name="productwherepurchased">
                                                        </div>
                                                </div>
                                                <div class="col-md-6">
                                                        <div class="form-group">
                                                                <label for="productwheredelivered">Digital Address of Where the product will be delivered</label>
                                                                <input type="text" id="productwheredelivered" class="form-control" name="productwheredelivered">
                                                        </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                    <label for="transactiondate">Date of Transaction</label>
                                                    <input type="text" id="transactiondate" class="form-control col-md-6" name="transactiondate">
                                                </div>
                                    
                                        <div class="form-group">
                                            <label for="productextrainfo">Extra Information</label>
                                            <textarea id="productextrainfo" rows="5" class="form-control" name="productextrainfo"></textarea>
                                        </div>

                                    <h4 class="form-section"> Transporter Information</h4>
                                    <div class="row">
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="transportername">Transporter Name</label>
                                                            <input type="text" id="transportername" class="form-control" name="transportername">
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="transportercontact">Transporter Contact</label>
                                                            <input type="text" id="transportercontact" class="form-control" name="transportercontact">
                                                    </div>
                                            </div>
                                        </div>

                                    <h4 class="form-section"> Receipt Information</h4>
                                    <div class="row">
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="recepitno">Receipt No.</label>
                                                            <input type="text" id="recepitno" class="form-control" name="recepitno">
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="receivedperson">Name of person who received the product</label>
                                                            <input type="text" id="receivedperson" class="form-control" name="receivedperson">
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="dispatchedperson">Name of person who dispatched the product</label>
                                                            <input type="text" id="dispatchedperson" class="form-control" name="dispatchedperson">
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
        $('#transactionform').submit(function(e){
            e.preventDefault();
            $('#loadinggif').show();
            $.post('{{url('actors/recordtransactions')}}',$(this).serialize(),function(response){
                $('#loadinggif').hide(); 
              if(response.status==='success'){
                swal("Success",'Transactions successfully recorded','success');
              }else{
                swal("Error",'Sorry.. Your Transactions could not be saved.. Please try again','error');
              }
            }).fail(function(){
            $('#loadinggif').hide(); 
            swal("Error",'Sorry.. Your Transactions could not be saved.. Please try again','error');
            });
        });
    </script>
@endsection
@extends('packer.layout.base')
@section('styles-below')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/sweetalert.css')}}">
@endsection
@section('content')
<div class="row">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">RECEIVE A PRODUCT</h4>
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
                                <p>Use this form to receive a product</p>
                            </div>
                            <form class="form">
                                <div class="form-body">
                                    <h4 class="form-section"> Supplier Information</h4>
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="supplierbin">Supplier BIN</label>
                                                    <input type="text" id="supplierbin" class="form-control"  name="supplierbin">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="suppliername">Supplier Name</label>
                                                    <input type="text" id="suppliername" class="form-control" name="suppliername">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="suppliercontact">Supplier Contact Info</label>
                                                    <input type="text" id="suppliercontact" class="form-control" name="suppliercontact">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="supplieraddress">Supplier Address</label>
                                                    <input type="text" id="supplieraddress" class="form-control" name="supplieraddress">
                                                </div>
                                            </div>
                                        </div>

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
                                                                <label for="productgtin">Product GTIN No.</label>
                                                                <input type="text" id="productgtin" class="form-control" name="productgtin">
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
                                                                <label for="productaddressfrom">Address from where the good was delivered</label>
                                                                <input type="text" id="productaddressfrom" class="form-control" name="productaddressfrom">
                                                        </div>
                                                </div>
                                                <div class="col-md-6">
                                                        <div class="form-group">
                                                                <label for="productaddressto">Address of receiving location/trading partner</label>
                                                                <input type="text" id="productaddressto" class="form-control" name="productaddressto">
                                                        </div>
                                                </div>
                                            </div>

                                        <div class="form-group">
                                                <label for="productdescription">Product Description</label>
                                                <textarea id="productdescription" rows="5" class="form-control" name="productdescription"></textarea>
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

                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                            <label for="recepitdate">Receipt Date.</label>
                                                            <input type="text" id="recepitdate" class="form-control" name="recepitdate">
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
@endsection
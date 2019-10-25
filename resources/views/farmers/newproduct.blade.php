@extends('farmers.layout.base')
@section('styles-below')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/sweetalert.css')}}">
@endsection
@section('content')
@if(Session::has('success'))
<div class="alert alert-success">New Product Added Successfully</div>
@endif
@if(Session::has('error'))
<div class="alert alert-error">Error Adding Prodcut.. Please try again</div>
@endif
<div class="row">
        <div class="col-md-12">
           
            <div class="card">
                 <div class="card-header">
                    <h4 class="card-title">Add New Product</h4>
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
                    <form class="form form-horizontal" method="POST" action="{{url('/farmers/addproduct')}}">
                            {{csrf_field()}}
                            <div class="form-body">

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="farmname">Product Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="farmname" class="form-control" name="productname">
                                    </div>
                                </div>

                                <div class="form-group row">
                                        <label class="col-md-3 label-control" for="farmlocation">Brand Name</label>
                                        <div class="col-md-6">
                                            <input type="text" id="farmlocation" class="form-control" name="productbrandname">
                                        </div>
                                </div>

                                <div class="form-group row">
                                        <label class="col-md-3 label-control" for="farmlocation">Product Variety</label>
                                        <div class="col-md-6">
                                            <input type="text" id="farmlocation" class="form-control" name="productvariety">
                                        </div>
                                </div>

                                <div class="form-group row">
                                        <label class="col-md-3 label-control" for="farmlocation">Product BatchNo</label>
                                        <div class="col-md-6">
                                            <input type="text" id="farmlocation" class="form-control" name="bno">
                                        </div>
                                </div>


                                <div class="form-group row">
                                        <label class="col-md-3 label-control" for="farmlocation">Input BatchNo</label>
                                        <div class="col-md-6">
                                                <select id="farmid" required name="productbatchno[]" multiple="multiple" class="form-control">
                                                        <option value="" selected="" disabled="">Select Input Batch No</option>
                                                        @foreach($farmerTransactions as $t)
                                                        @if($t->productbatachno ==="")
                                                        @else
                                                           <option value="{{$t->productbatchno}}">{{$t->productbatchno}}</option>
                                                        @endif
                                                            
                                                        @endforeach
                                                    </select>
                                        </div>
                                </div>

                                <div class="form-group row">
                                        <label class="col-md-3 label-control" for="farmlocation">Product Quantity</label>
                                        <div class="col-md-6">
                                            <input type="number" id="farmlocation" class="form-control" name="productquantity">
                                        </div>
                                </div>
                                                              

                                <div class="form-group row">
                                        <label class="col-md-3 label-control" for="farmlocation">Farm</label>
                                        <div class="col-md-6">
                                                <select id="farmid" required name="farmid[]" multiple="multiple" class="form-control">
                                                        <option value="" selected="" disabled="">Select Source Farm</option>
                                                        @foreach($farms as $f)
                                                            <option value="{{$f->farmbin}}">{{$f->farmname}}</option>
                                                        @endforeach
                                                    </select>
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
                        <br>
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
  $('.delete').click(function(e){
        e.preventDefault();
     var id = $(this).attr('id');
        swal({
            title: "Are you Sure?",
            text: "Delete This Farm From Database",
            icon: "info",
            showCancelButton: true,
            buttons: {
                cancel: {
                    text: "No",
                    value: null,
                    visible: true,
                    className: "btn-danger",
                    closeModal: false,
                },
                confirm: {
                    text: "Yes",
                    value: true,
                    visible: true,
                    className: "btn-success",
                    closeModal: false
                }
            }
        }).then(isConfirm => {
            if (isConfirm) {
                $.get("{{url('farmers/deletefarm')}}",{id:id},function(r){
                        if(r.status=='success'){
                            window.location.reload(true);
                        }
                }).fail(function(){
                    swal("Error",'Check Network Connection','error');
                })
            }else {
                swal("Error", "Farm Not Deleted", "error");
            }
        });
    });
  </script>
@endsection
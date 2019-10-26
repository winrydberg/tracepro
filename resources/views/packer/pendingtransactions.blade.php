@extends('distributor.layout.base')

@section('content')
{{-- @extends('farmers.layout.base') --}}
@section('styles-below')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/sweetalert.css')}}">
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">PENDING TRANSACTIONS</h4>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="card-content">
            <div class="table-responsive">
                <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                    <thead>
                        <tr>
                            <th>CUSTOMER BIN</th>
                            <th>CUSTOMER NAME</th>
                            <th>CUSTOMER ADDRESS</th>
                            <th>CUSTOMER PHONE NO.</th>
                            <th>PRODUCT ID</th>
                            <th>PRODUCT NAME</th>
                            <th>BATCH NO</th>
                            <th>QUANTITY</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($pendings as $p)
                        <tr>
                        <td class="text-truncate">{{$p->customerbin}}</td>
                        <td class="text-truncate">{{$p->customername}}</td>
                        <td class="text-truncate">{{$p->customeraddress}}</td>
                        <td class="text-truncate">{{$p->customercontact}}</td>
                        <td class="text-truncate">{{$p->productidno}}</td>
                        <td class="text-truncate">{{$p->productname}}</td>
                        <td class="text-truncate">{{$p->productbatchno}}</td>
                        <td class="text-truncate">{{$p->productquantity}}</td>
                        {{-- <td class="text-truncate">{{$p->productidno}}</td> --}}
                        {{-- <td class="text-truncate">4</td> --}}
                        <td class="text-truncate">
                            <a href="#" class="btn btn-info btn-sm">View Transactions</a>
                            <button class="btn btn-success btn-sm approve" id="{{$p->id}}">Approve</button>
                            <button class="btn btn-danger btn-sm">Disapprove</button>
                        </td>
                        </tr>
                       @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>

    {{-- modal here --}}
    <div class="modal fade text-left" id="approvalmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <label class="modal-title text-text-bold-600" id="myModalLabel33">Details</label>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:white">&times;</span>
                  </button>
                </div>
                    <div class="modal-body">
                      <div class="row" id="printout">
                            <form class="form form-horizontal" method="POST" action="{{url('/packer/addproduct')}}" id="addproductform">
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
                                                            <option value="null" selected="" disabled="">Select Input Batch No</option>
                                                            {{-- @foreach($transactions as $t)
                                                            @if($t->productbatachno ==="")
                                                            @else
                                                               <option value="{{$t->productbatchno}}">{{$t->productbatchno}}</option>
                                                            @endif
                                                                
                                                            @endforeach --}}
                                                        </select>
                                            </div>
                                    </div>
    
                                    <div class="form-group row">
                                            <label class="col-md-3 label-control" for="farmlocation">Product Quantity</label>
                                            <div class="col-md-6">
                                                <input type="number" id="farmlocation" class="form-control" name="productquantity">
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
                      </div>
                  <div class="modal-footer">
                  <input type="reset" class="btn btn-danger" data-dismiss="modal" value="Cancel">
                  {{-- <button class="btn btn-primary" id="print">Print</button> --}}
                  </div>
              </div>
            </div>
          </div>
    {{-- end of modal --}}
@endsection


@section('scripts-below')
<script src="{{asset('assets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>

<script type="text/javascript">
    $('.approve').click(function(e){
          e.preventDefault();
       var id = $(this).attr('id');
          swal({
              title: "Are you Sure?",
              text: "Approve the recorded Transaction",
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
                  $.get("{{url('foodservice/approveorder')}}",{id:id},function(r){
                          if(r.status=='success'){
                              window.location.reload(true);
                          }
                  }).fail(function(){
                      swal("Error",'Check Network Connection','error');
                  })
              }else {
                  swal("Error", "Approval Cancelled", "error");
              }
          });
      });
    </script>
@stop
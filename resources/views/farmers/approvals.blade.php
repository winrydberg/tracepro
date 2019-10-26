@extends('farmers.layout.base')
@section('styles-below')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/sweetalert.css')}}">
@endsection
@section('content')
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Approvals</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                      <div class="table-responsive">
                            <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Supplier Bin</th>
                                                <th>Product ID/GTIN</th>
                                                <th>Product Name</th>
                                                <th>Batch No</th>
                                                <th>Quantity</th>
                                                <th>Receipt No.</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach($approvals as $f)
                                            <tr>
                                                <td>{{$f->supplierbin}}</td>
                                                <td>{{$f->productidno}}</td>
                                                <td>{{$f->productname}}</td>
                                                <td>{{$f->productbatchno}}</td>
                                                <td>{{$f->productquantity}}</td>
                                                <td>{{$f->receiptno}}</td>
                                                <td>
                                                <a href="#" class="btn btn-sm btn-warning approve" id="{{$f->id}}">Pending Approval</a>
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
        </div> 
    </div>
@endsection
@section('scripts-below')
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
@endsection
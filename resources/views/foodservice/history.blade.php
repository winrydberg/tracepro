@extends('foodservice.layout.base')
@section('styles-below')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/sweetalert.css')}}">
@endsection
@section('content')
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">History</h4>
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
                              @foreach($history as $f)
                                <tr>
                                    <td>{{$f->supplierbin}}</td>
                                    <td>{{$f->productidno}}</td>
                                    <td>{{$f->productname}}</td>
                                    <td>{{$f->productbatchno}}</td>
                                    <td>{{$f->productquantity}}</td>
                                    <td>{{$f->receiptno}}</td>
                                    <td>
                                    <a href="{{url('/foodservice/action/'.$f->id.'/view')}}" class="btn btn-sm btn-primary">View</a>
                                      @if($f->approvedbysupplier==0 && $f->approvedbycustomer==1)
                                      <a href="{{url('/foodservice/action/'.$f->id.'/update')}}" class="btn btn-sm btn-success">Edit</a>
                                      <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                      @endif
                                      @if($f->approvedbysupplier==1 && $f->approvedbycustomer==0)
                                      <a href="#" class="btn btn-sm btn-warning">Pending Approval</a>
                                      @endif
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
@endsection
@section('scripts-below')
  <script src="{{asset('assets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>
  <script type="text/javascript">
    $('table').DataTable();
  </script>
@endsection
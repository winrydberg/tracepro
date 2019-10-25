@extends('farmers.layout.base')
@section('styles-below')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/sweetalert.css')}}">
@endsection
@section('content')
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Product List</h4>
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
                                    <th>Customer Bin</th>
                                    <th>Customer Name</th>
                                    <th>Customer Contact</th>
                                    <th>Customer Address</th>
                                    <th>Customer Email</th>
                                    <th>Customer Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($customers as $f)
                                <tr>
                                    <td>{{$f->customerbin}}</td>
                                    <td>{{$f->customername}}</td>
                                    <td>{{$f->customercontact}}</td>
                                    <td>{{$f->customeraddress}}</td>
                                    <td>{{$f->customeremail}}</td>
                                    <td>{{$f->customertype}}</td>
                                    
                                    <td>
                                    <a href="#" class="btn btn-sm btn-primary">View</a>
                                      <a href="#" class="btn btn-sm btn-success">Edit</a>
                                      <a href="#" class="btn btn-sm btn-danger">Delete</a>
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
@endsection
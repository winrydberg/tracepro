@extends('farmers.layout.base')
@section('styles-below')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/sweetalert.css')}}">
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Products</h4>
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
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>brand Name</th>
                                <th>Product Variety</th>
                                <th>Batch No.</th>
                                <th>Quantity</th>
                                <th>Date Recorded</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $p)
                            <tr>
                                <td>PID{{$p->id}}</td>
                                <td>{{$p->productname}}</td>
                                <td>{{$p->productbrandname}}</td>
                                <td>{{$p->productvariety}}</td>
                                <td>{{$p->productbatchno}}</td>
                                <td>{{$p->productquantity}}</td>
                                <td>{{date('Y/m/d H:i A',strtotime($p->created_at))}}</td>
                                
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
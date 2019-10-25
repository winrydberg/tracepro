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
                            <th>BIN</th>
                            <th>NAME</th>
                            <th>PRODUCT ID</th>
                            <th>PRODUCT NAME</th>
                            <th>BATCH NO</th>
                            <th>QUANTITY</th>
                            <th>DIGITAL ADDRESS</th>
                            <th>PHONE NO.</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                        <tr>
                        <td class="text-truncate">1</td>
                        <td class="text-truncate">2</td>
                        <td class="text-truncate">7</td>
                        <td class="text-truncate">3</td>
                        <td class="text-truncate">4</td>
                        <td class="text-truncate">4</td>
                        <td class="text-truncate">4</td>
                        <td class="text-truncate">4</td>
                        <td class="text-truncate">
                            <a href="#" class="btn btn-info btn-sm">View Transactions</a>
                            <button class="btn btn-success btn-sm">Approve</button>
                            <button class="btn btn-danger btn-sm">Disapprove</button>
                        </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>
@endsection


@section('scripts-below')
<script src="{{asset('assets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>

    <script>
          $(document).ready(function(){
              alert("{{$bin}}");
               
            //    $.ajax({
            //        url: "{{url('actors/getpendingtransactions/'+{{$bin}}+)}}",
            //        method: 'POST',
            //        data: {actortype: actortype, _token:"{{Session::token()}}"},
            //        success: function(response){
            //                if(response.status =='success'){
            //                    $('#bin').val(response.bin);
            //                }else{
            //                   alert(response.message)
            //                }
            //        },
            //        error: function(error){
            //             alert('Oops Something went wrong. Please try again');
            //             console.log(error)
            //        }
            //    })
          });
    </script>
@stop
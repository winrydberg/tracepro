@extends('retailstore.layout.base')
@section('styles-below')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/sweetalert.css')}}">
@endsection
@section('content')
<div class="row">
        <div class="col-xl-3 col-md-3">
                <div class="card box-shadow-4">
                    <div class="text-center">
                        <div class="card-body">
                            <img src="{{asset('assets/images/profile.png')}}" class="rounded-circle  height-150" alt="Card image">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Ernest Here</h4>
                            <h6 class="card-subtitle text-muted">Phone here</h6><br>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-xl-9 col-md-9">
                    <div class="card box-shadow-4">
                        <div class="card-header">
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                   <h3>PROFILE INFORMATION</h3>
                                    <table class="table">
                                            <tr>
                                                   <th>Name</th>
                                                   <td>Ernest</td>
                                               </tr>
                                              
                                       </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
@section('scripts-below')
  <script src="{{asset('assets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>
@endsection
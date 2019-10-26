@extends('packer.layout.base')
@section('styles-below')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/sweetalert.css')}}">
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="alert alert-success">
            <?php $user = Session::get('outh');?>
        <strong>Welcome Back {{$user->name}}</strong>
          </div>
    </div>
  </div>
      <div class="row">
          <div class="col-xl-4 col-lg-6 col-12">
          <a href="{{url('/packer/receiveproduct')}}"><div class="card">
                   <div class="card-content">
                       <div class="card-body">
                           <div class="media d-flex">
                               <div class="align-self-center">
                                   <i class="ft-list primary font-large-2 float-left"></i>
                               </div>
                               <div class="media-body text-right">
                                   <h3>RECEIVE PRODUCTS</h3>
                                 
                               </div>
                           </div>
                       </div>
                   </div>
               </div></a>
           </div>
           <div class="col-xl-4 col-lg-6 col-12">
                   <a href="#"><div class="card">
                   <div class="card-content">
                       <div class="card-body">
                           <div class="media d-flex">
                               <div class="align-self-center">
                                   <i class="ft-list warning font-large-2 float-left"></i>
                               </div>
                               <div class="media-body text-right">
                                   <h3>RECALLS</h3>
                               
                               </div>
                           </div>
                       </div>
                   </div>
               </div></a>
           </div>
           <div class="col-xl-4 col-lg-6 col-12">
                   <a href="{{url('/packer/transactions')}}"><div class="card">
                   <div class="card-content">
                       <div class="card-body">
                           <div class="media d-flex">
                               <div class="align-self-center">
                                   <i class="ft-target success font-large-2 float-left"></i>
                               </div>
                               <div class="media-body text-right">
                                   <h3>TRANSACTIONS</h3>
                                   
                               </div>
                           </div>
                       </div>
                   </div>
               </div></a>
           </div>
           
       </div>
  
  <div class="row">
      <div class="col-xl-3 col-md-3">
              <div class="card box-shadow-4">
                  <div class="text-center">
                      <div class="card-body">
                          <img src="{{asset('assets/images/profile.png')}}" class="rounded-circle  height-150" alt="Card image">
                      </div>
                      <div class="card-body">
                            <?php  $user = Session::get('outh');?>
                            <h4 class="card-title">{{$user->name}}</h4>
                            {{-- <h6 class="card-subtitle text-muted">Phone here</h6><br> --}}
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
                                               <td>{{$user->name}}</td>
                                           </tr>
                                           <tr>
                                                <th>Phone</th>
                                                <td>{{$user->phoneno}}</td>
                                            </tr>
                                            <tr>
                                                    <th>Email</th>
                                                    <td>{{$user->email}}</td>
                                            </tr>
                                            <tr>
                                                    <th>Digital Address</th>
                                                    <td>{{$user->digital_address}}</td>
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
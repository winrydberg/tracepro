@extends('regulator.layout.base')


@section('content')
<div class="col-md-12">
    <div class="card" style="height: 980px;">
        <div class="card-header">
            <h4 class="card-title" id="basic-layout-form">ACTOR REGISTRATION</h4>
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
                @if(Session::has('success'))
                    <p class="alert alert-success">{{Session::get('success')}}</p>
                @elseif(Session::has('error'))
                    <p class="alert alert-danger">{{Session::get('error')}}</p>
                @endif
                <div class="card-text">
                    <p>Register new actors on the platform </p>
                </div>

            <form class="form" action="{{url('/regulator/new-actor')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> Actor Info</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput2">NAME</label>
                                    <input type="text" id="projectinput2" required class="form-control" placeholder="Name" name="name">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput4">PHONE NUMBER</label>
                                    <input type="text" id="projectinput4" required class="form-control" placeholder="Phone No" name="phoneno">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput3">EMAIL</label>
                                    <input type="text" id="projectinput3" required class="form-control" placeholder="E-mail" name="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput4">DIGITAL ADDRESS</label>
                                    <input type="text" id="projectinput6" required class="form-control" placeholder="Digital Address" name="digital_address">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="actortype">ACTOR TYPE</label>
                                            <select id="actortype" required name="actortype" class="form-control">
                                                <option value="" selected="" disabled="">Select Actor Type</option>
                                                <option value="GROWER">GROWER</option>
                                                <option value="PACKER">PACKER</option>
                                                <option value="DISTRIBUTOR">DISTRIBUTOR</option>
                                                <option value="MANUFACTURER">MANUFACTURER</option>
                                                <option value="RETAILSTORE">RETAIL STORE</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="bin">BIN</label>
                                                <input type="text" id="bin" readonly class="form-control" placeholder="Actor BIN" name="bin">
                                            </div>
                                    </div>
                        </div>

                        <h4 class="form-section"><i class="icon-clipboard4"></i> Personal Info</h4>

                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">FIRST NAME</label>
                                        <input type="text" id="firstname" class="form-control" placeholder="First Name" name="pfname">
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastname">LAST NAME</label>
                                        <input type="text" id="lastname" class="form-control" placeholder="Last Name" name="plname">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                       <div class="form-group">
                                            <label for="projectinput4">PHONE NO</label>
                                                <input type="text" id="projectinput6" class="form-control" placeholder="Phone No" name="pphoneno">
                                        </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput3">EMAIL</label>
                                        <input type="text" id="projectinput3" class="form-control" placeholder="E-mail" name="pemail">
                                    </div>
                                </div>
                                
                            </div>
                      

                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-danger mr-1">
                            <i class="ft-x"></i> CANCEL
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-check-square-o"></i> REGISTER ACTOR
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop



@section('scripts-below')
    <script>
          $(document).on('change','#actortype',function(){
              // var actortype = $('#actortype').val()
               var actortype = $('#actortype').find("option:selected").attr('value') 
               $.ajax({
                   url: "{{url('regulator/get-bin')}}",
                   method: 'POST',
                   data: {actortype: actortype, _token:"{{Session::token()}}"},
                   success: function(response){
                           if(response.status =='success'){
                               $('#bin').val(response.bin);
                           }else{
                              alert(response.message)
                           }
                   },
                   error: function(error){
                        alert('Oops Something went wrong. Please try again');
                        console.log(error)
                   }
               })
          });
    </script>
@stop
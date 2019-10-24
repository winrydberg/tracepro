@extends('farmers.layout.base')
@section('styles-below')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/sweetalert.css')}}">
@endsection
@section('content')
@if(Session::has('success'))
<div class="alert alert-success">New Farm Added Successfully</div>
@endif
@if(Session::has('error'))
<div class="alert alert-error">Error Adding Farm.. Please try again</div>
@endif
<div class="row">
        <div class="col-md-12">
           
            <div class="card">
                 <div class="card-header">
                    <h4 class="card-title">Add New Farm</h4>
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
                    <form class="form form-horizontal" method="POST" action="{{url('/farmers/addnewfarm')}}">
                            {{csrf_field()}}
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="farmname">Farm Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="farmname" class="form-control" name="farmname">
                                    </div>
                                </div>

                                <div class="form-group row">
                                        <label class="col-md-3 label-control" for="farmlocation">Farm Location</label>
                                        <div class="col-md-6">
                                            <input type="text" id="farmlocation" class="form-control" name="farmlocation">
                                        </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="extrainfo">Extra Information</label>
                                    <div class="col-md-6">
                                        <textarea name="extrainfo" id="extrainfo" cols="10" rows="5" class="form-control"></textarea>
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
                        {{-- table here --}}
                               <div class="col-md-12">
                                <h2 class="text-center">Farm List</h2>
                        <table class="table table-striped">
                            <thead>
                                <th>Farm BIN</th>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Extra Info</th>
                                <th>Action</th>
                            </thead>

                            <tbody>
                                @foreach($farms as $f)
                                <tr>
                                <td>{{$f->farmbin}}</td>
                                <td>{{$f->farmname}}</td>
                                <td>{{$f->farmlocation}}</td>
                                <td>{{$f->extrainfo}}</td>
                                <td>
                                <a href="#" class="bn btn-sm btn-danger delete" id="{{$f->id}}">delete</a>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
            </table>
        </div>
                        {{-- end --}}
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
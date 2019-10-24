@extends('farmers.layout.base')
@section('styles-below')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/sweetalert.css')}}">
@endsection
@section('content')
@if(Session::has('success'))
<div class="alert alert-success">New Plot Added Successfully</div>
@endif
@if(Session::has('error'))
<div class="alert alert-error">Error Adding Plot.. Please try again</div>
@endif
<div class="row">
        <div class="col-md-12">
           
            <div class="card">
                 <div class="card-header">
                    <h4 class="card-title">Add New Plot</h4>
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
                    <form class="form form-horizontal" method="POST" action="{{url('farmers/addnewplot')}}">
                            {{csrf_field()}}
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="plotname">Plot Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="plotname" class="form-control" name="plotname">
                                    </div>
                                </div>

                                <div class="form-group row">
                                        <label class="col-md-3 label-control" for="farmbin">Farm the plot is located</label>
                                        <div class="col-md-6">
                                            <select name="farmbin" id="farmbin" class="form-control" required="required">
                                                <option value="">Select Farm</option>
                                                @foreach($farms as $f)
                                                    <option value="{{$f->farmbin}}">{{$f->farmname}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="productsonplot">Crops/Products on Plot</label>
                                    <div class="col-md-6">
                                            <input type="text" id="productsonplot" class="form-control" name="productsonplot">
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
                                <h2 class="text-center">Plot List</h2>
                        <table class="table table-striped">
                            <thead>
                                <th>Farm ID</th>
                                <th>Plot Name</th>
                                <th>Products on Plot</th>
                                <th>Extra</th>
                                <th>Action</th>
                            </thead>

                            <tbody>
                                @foreach($plots as $p)
                                <tr>
                                <td>{{$p->farmbin}}</td>
                                <td>{{$p->plotname}}</td>
                                <td>{{$p->productsonplot}}</td>
                                <td>{{$p->extrainfo}}</td>
                                <td>
                                  <a href="#" class="btn btn-sm btn-danger delete" id="{{$p->id}}">Delete</a>
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
              text: "Delete This Plot From Database",
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
                  $.get("{{url('farmers/deleteplot')}}",{id:id},function(r){
                          if(r.status=='success'){
                              window.location.reload(true);
                          }
                  }).fail(function(){
                      swal("Error",'Check Network Connection','error');
                  })
              }else {
                  swal("Error", "Plot Not Deleted", "error");
              }
          });
      });
    </script>
@endsection
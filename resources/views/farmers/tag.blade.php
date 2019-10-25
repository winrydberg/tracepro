@extends('farmers.layout.base')
@section('styles-below')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/sweetalert.css')}}">
@endsection
@section('content')
@if(Session::has('success'))
<div class="alert alert-success">New Product Added Successfully. Attach below tag to product.</div>
@endif
@if(Session::has('error'))
<div class="alert alert-error">Error Adding Prodcut.. Please try again</div>
@endif
<div class="row">
        <div class="col-md-6">
           
            <div class="card">
                 
                <div class="card-content collpase show">
                    <div class="card-body">
                        <div class="card-text">
                           <h3><strong>BIN: </strong>{{$actor->bin}}</h3>
                           <h3><strong>BATCH NO: </strong>{{$actor->bin}}</h3>
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
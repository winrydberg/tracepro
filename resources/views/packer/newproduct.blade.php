@extends('packer.layout.base')
@section('styles-below')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/sweetalert.css')}}">
@endsection
@section('content')
@if(Session::has('success'))
<div class="alert alert-success">New Product Added Successfully</div>
@endif
@if(Session::has('error'))
<div class="alert alert-error">Error Adding Prodcut.. Please try again</div>
@endif
<div class="row">
        <div class="col-md-12">
           
            <div class="card">
                 <div class="card-header">
                    <h4 class="card-title">Add New Product</h4>
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
                    <form class="form form-horizontal" method="POST" action="{{url('/packer/addproduct')}}" id="addproductform">
                            {{csrf_field()}}
                            <div class="form-body">

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="farmname">Product Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="farmname" class="form-control" name="productname">
                                    </div>
                                </div>

                                <div class="form-group row">
                                        <label class="col-md-3 label-control" for="farmlocation">Brand Name</label>
                                        <div class="col-md-6">
                                            <input type="text" id="farmlocation" class="form-control" name="productbrandname">
                                        </div>
                                </div>

                                <div class="form-group row">
                                        <label class="col-md-3 label-control" for="farmlocation">Product Variety</label>
                                        <div class="col-md-6">
                                            <input type="text" id="farmlocation" class="form-control" name="productvariety">
                                        </div>
                                </div>

                                <div class="form-group row">
                                        <label class="col-md-3 label-control" for="farmlocation">Product BatchNo</label>
                                        <div class="col-md-6">
                                            <input type="text" id="farmlocation" class="form-control" name="bno">
                                        </div>
                                </div>


                                <div class="form-group row">
                                        <label class="col-md-3 label-control" for="farmlocation">Input BatchNo</label>
                                        <div class="col-md-6">
                                                <select id="farmid" required name="productbatchno[]" multiple="multiple" class="form-control">
                                                        <option value="null" selected="" disabled="">Select Input Batch No</option>
                                                        @foreach($transactions as $t)
                                                        @if($t->productbatachno ==="")
                                                        @else
                                                           <option value="{{$t->productbatchno}}">{{$t->productbatchno}}</option>
                                                        @endif
                                                            
                                                        @endforeach
                                                    </select>
                                        </div>
                                </div>

                                <div class="form-group row">
                                        <label class="col-md-3 label-control" for="farmlocation">Product Quantity</label>
                                        <div class="col-md-6">
                                            <input type="number" id="farmlocation" class="form-control" name="productquantity">
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
                        
                    </div>
                </div>
            </div>
        </div>
    </div>  


    {{-- modal here --}}
    <div class="modal fade text-left" id="showqrcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <label class="modal-title text-text-bold-600" id="myModalLabel33">Details</label>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color:white">&times;</span>
                  </button>
                </div>
                    <div class="modal-body">
                      <div class="row" id="printout">
                        <div class="col-sm-4">
                        <img src="" alt="" id="qrcodebay" style="width:200px">
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-6" style="margin-top:20px">
                         <table>
                           <tbody id="body">
                               <tr>
                                   <td>Company Name</td>
                                    <td>{{Session::get('outh')->name}}</td>
                               </tr>
                               <tr>
                                    <td>BIN</td>
                                     <td>{{Session::get('outh')->bin}}</td>
                                </tr>
                               <tr>
                                    <td>Product Name</td>
                                    <td id="productname"></td>
                                </tr>
                                <tr>
                                    <td>Product Batch</td>
                                    <td id="productbatch"></td>
                                </tr>
                                <tr>
                                        <td>Product Qty</td>
                                        <td id="productqty"></td>
                                    </tr>
                                

                            </tbody> 
                        </table>    
                        </div>
                      </div>
                  <div class="modal-footer">
                  <input type="reset" class="btn btn-danger" data-dismiss="modal" value="Cancel">
                  <button class="btn btn-primary" id="print">Print</button>
                  </div>
              </div>
            </div>
          </div>
    {{-- end of modal --}}
@endsection
@section('scripts-below')
  <script src="{{asset('assets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>
  <script type="text/javascript">
//   $('#showqrcode').modal('show');
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
  <script type="text/javascript">
    $('#addproductform').submit(function(e){
        e.preventDefault();
        $('#loadinggif').show();
        $.post($('#addproductform').attr('action'),$(this).serialize(),function(response){
            $('#loadinggif').hide(); 
          if(response.status==='success'){
            $('#qrcodebay').attr('src',"{{url('/qrcodes')}}"+'/'+response.productidno+'.svg');
            var dt = JSON.parse(response.data);
            $('#productname').text(dt.productname)
            $('#productbatch').text(dt.productbatchno)
            $('#productqty').text(dt.productquantity)

            // $('#farmdetails').text(dt.farm)
            $('#showqrcode').modal('show');
           // swal("Success",'Transactions successfully recorded','success');
          }else{
            swal("Error",'Sorry.. Your Transactions could not be saved.. Please try again','error');
          }
        }).fail(function(){
        $('#loadinggif').hide(); 
        swal("Error",'Sorry.. Your Transactions could not be saved.. Please try again','error');
        });
    });
</script>
 <script type="text/javascript">
    $('#print').on('click',function(){
     let mywindow = window.open('', 'PRINT', 'height=650,width=900,top=100,left=150');
         mywindow.document.write('<html><head><title>Print out</title>');
         mywindow.document.write('<style type="text/css">@media print { .headback{background:#ddd;} }</style>');
         //mywindow.document.write('<link rel="stylesheet" type="text/css" href="http://localhost/rework/ugpay/assets/css/vendors.css">');
         mywindow.document.write('</head><body>');
         mywindow.document.write(document.getElementById('printout').innerHTML);
         mywindow.document.write('</body></html>');
         mywindow.document.close(); // necessary for IE >= 10
         mywindow.focus(); // necessary for IE >= 10*/
         mywindow.print();
          mywindow.close();
   return true;
 
 
    })
  
   </script>

@endsection
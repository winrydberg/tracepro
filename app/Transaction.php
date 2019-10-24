<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = [
         'transactionid' ,
         'approvedbysender' ,
         'approvedbyreceiver' ,
         'cancelled',
         'supplierbin' ,
         'suppliername' ,
         'suppliercontact' ,
         'supplieraddress' ,
         'supplieremail' ,
         'customerbin' ,
         'customername' ,
         'customercontact' ,
         'customeraddress' ,
         'customeremail' ,
         'productidno' ,
         'productname' ,
         'productbrandname' ,
         'productvariety' ,
         'productbatchno' ,
         'productquantity' ,
         'productwherepurchased' ,
         'productswheredelivered' ,
         'productextrainfo' ,
         'supplierofproductinput' ,
         'batchnoofsupplierproduct' ,
         'transportername' ,
         'transportercontact' ,
         'receiptno' ,
         'dateoftransaction' ,
         'receivedperson' ,
         'dispatchedperson' ,
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = [
         'transactionid',
         'approvedbysupplier' ,
         'approvedbycustomer' ,
         'cancelled',
         'supplierbin' ,
         'suppliername' ,
         'suppliercontact' ,
         'supplieraddress' ,
         'supplieremail',
         'suppliertype',
         'customerbin' ,
         'customername' ,
         'customercontact' ,
         'customeraddress' ,
         'customeremail',
         'customertype',
         'productidno',
         'productgtin',
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
         'dateofshipment',
         'shippingfromaddress',
         'shippingtoaddress'
    ];
}

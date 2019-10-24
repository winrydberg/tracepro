<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FarmInput extends Model
{
    //
    protected $fillable = [
        'farmerbin',
        'supplierbin',
        'suppliername',
        'suppliercontact',
        'supplieraddress',
        'productidno',
        'productname',
        'productbrandname',
        'productvariety',
        'productbatchno',
        'productquantity',
        'productwherepurchased',
        'productwheredelivered',
        'productextrainfo',
        'transportername',
        'transportercontact',
        'receiptno',
        'receivedperson',
        'dispatchedperson',
    ];
}

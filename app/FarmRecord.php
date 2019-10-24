<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FarmRecord extends Model
{
    //
    protected $fillable = [
        'farmerbin',
        'farmbin',
        'farmname',
        'plotsapplied',
        'dateofapplication',
        'productidno',
        'productname',
        'supplierbin',
        'productbrandname',
        'productvariety',
        'productbatchno',
        'productquantityapplied',
        'extrainfo',
    ];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'productname', 
        'productbrandname', 
        'productbatchno',
        'productvariety',
        'productquantity',
        'farmid',
        'plotid'
    ];
}

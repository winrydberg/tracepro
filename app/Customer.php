<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable = [
            'customerof',
            'customeroftype',
            'customerbin',
            'customername',
            'customercontact',
            'customeraddress',
            'customeremail',
            'customertype',
    ];

}

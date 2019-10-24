<?php

namespace App\Http\Controllers\Distributor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DistributorsController extends Controller
{
    //
    public function index(){
        return view('distributor.index');
    }

    public function receiveInputs(){
        return view('distributor.input');
    }
}

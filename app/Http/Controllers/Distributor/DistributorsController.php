<?php

namespace App\Http\Controllers\Distributor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Transaction;

class DistributorsController extends Controller
{
    //
    public function index(){
        return view('distributor.index');
    }

    public function receiveInputs(){
        return view('distributor.input');
    }
    
    public function newTransaction(){
       return view('distributor.newtransactions');
    }

    public function pendingTransaction(){
        
        return view('distributor.pendingtransactions');
    }
    
}

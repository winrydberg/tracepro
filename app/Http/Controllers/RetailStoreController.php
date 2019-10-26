<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Transaction;

class RetailStoreController extends Controller
{
    //
    public function home(){
        return view('retailstore.home');
      }
  
      public function profile(){
        return view('retailstore.profile');
      }
  
      public function receiveproduct(){
        return view('retailstore.receiveproduct');
      }

      public function transactions(){
        return view('retailstore.transactions');
      }

      public function approvals(){
        $approvals = Transaction::where('customerbin','')->where('approvedbycustomer',0)->get();
        return view('retailstore.approvals',compact('approvals'));
      }
}

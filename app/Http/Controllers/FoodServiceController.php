<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class FoodServiceController extends Controller
{
    //

    public function home(){
      return view('foodservice.home');
    }

    public function profile(){
      return view('foodservice.profile');
    }

    public function receiveproduct(){
      return view('foodservice.receiveproduct');
    }

    public function approvals(){
      $approvals = Transaction::where('customerbin','')->where('approvedbycustomer',0)->get();
      return view('foodservice.approvals',compact('approvals'));
    }

    public function history(){
      $history =  Transaction::where('customerbin','YOUR BIN')->get();
      return view('foodservice.history',compact('history'));
    }

    public function approveorder(Request $r){
      $update = Transaction::where('id',$r->id)->update([
        'approvedbycustomer'=>1
      ]);
      return ['status'=>'success'];
    }
}

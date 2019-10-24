<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}

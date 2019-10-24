<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    //
    public function home(){
        return view('packer.home');
      }
  
      public function profile(){
        return view('packer.profile');
      }
  
      public function receiveproduct(){
        return view('packer.receiveproduct');
      }

      public function transactions(){
        return view('packer.transactions');
      }

}

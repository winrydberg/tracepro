<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PackerController extends Controller
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

      public function createcustomers(){
        return view('packer.createcustomers');
      }
      
      public function createproducts(){
        return  view('packer.createproducts');
      }

      public function createsuppliers(){
         return view('packer.createsuppliers');
      }
}

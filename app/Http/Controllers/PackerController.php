<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use QrCode;

use App\Transaction;
use App\Product;


class PackerController extends Controller
{
    //
    public function generateRandomNumber(){
      return mt_rand(10000000,99999999);
     //  return 20000000;
     }

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

       //adding products
    public function newproducts(){
      $authuser = Session::get('outh');
      //$farms = Farm::where('farmerbin', $authuser->bin)->get(); //get farms specific to farmer later on
      $transactions  = Transaction::where('customerbin', $authuser->bin)->get();
      // dd($farmerTransactions);
      return view('packer.newproduct', compact('transactions'));
    }

    public function saveProducts(Request $r){
      $authuser = Session::get('outh');
      $product = new Product();
      $product->productidno = $this->generateRandomNumber();
      $product->productname = $r->productname;
      $product->productbrandname = $r->productbrandname;
      $product->productvariety = $r->productvariety;
      $product->productbatchno = $r->bno;
      $product->inputbatchno = implode(',',$r->productbatchno);
      $product->productquantity = $r->productquantity;
      $product->farmid = null;
      $product->actorbin = $authuser->bin;


      if($product->save()){
        $qrcodedata = json_encode([
          'productidno'=>$product->productidno,
          'productname'=>$r->productname,
          'productbatchno'=>$product->productbatchno,
          'supplierbin'=>Session::get('outh')->bin,
          'suppliername'=>Session::get('outh')->name,
          'productquantity'=>$r->productquantity,
          'inputsused'=>$product->inputbatchno,
          // 'farm'=>Farm::where('farmerbin', $authuser->bin)->first(['farmname'])->farmname
          ]);
        QrCode::size(400)->format('svg')->generate($qrcodedata,public_path('qrcodes/'.$product->productidno.'.svg'));
         
        //Session::flash('success', 'Product successfully created',);
        return ['status'=>'success','data'=>$qrcodedata,'productidno'=>$product->productidno];
        //return back();
      }else{
        //Session::flash('error', 'Oops Something went wrong.Please try agin');
        //return back();
        return ['status'=>'error'];
      }
    }

    public function getProducts(){
      $products = Product::where('actorbin',Session::get('outh')->bin )->get();
      return view('packer.productlist', compact('products'));
    }

    public function getPendingTransactions($bin=null){
      $pendings = Transaction::where('customerbin',$bin)->where('approvedbycustomer',0)->get();
      //return ['status'=>'success','data'=>$pendings];
      return view('packer.pendingtransactions', compact('pendings'));
    }
}

<?php

namespace App\Http\Controllers\Distributor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Product;
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

        //adding products
        public function newproducts(){
            $authuser = Session::get('outh');
            //$farms = Farm::where('farmerbin', $authuser->bin)->get(); //get farms specific to farmer later on
            $transactions  = Transaction::where('customerbin', $authuser->bin )->get();
            // dd($farmerTransactions);
            return view('distributor.newproduct', compact('farms','transactions'));
          }
      
          public function saveProducts(Request $r){
            $authuser = Session::get('outh');
            $product = new Product();
            $product->productname = $r->productname;
            $product->productbrandname = $r->productbrandname;
            $product->productvariety = $r->productvariety;
            $product->productbatchno = $r->bno;
            $product->inputbatchno = $r->productbatchno;
            $product->productquantity = $r->productquantity;
            $product->farmid = null;
            $product->actorbin = $authuser->bin;
      
            if($product->save()){
      
              Session::flash('success', 'Product successfully created');
              return back();
            }else{
              Session::flash('error', 'Oops Something went wrong.Please try agin');
              return back();
            }
          }
      
          public function getProducts(){
            $products = Product::where('actorbin',Session::get('outh')->bin )->get();
            return view('farmers.productlist', compact('products'));
          }
    
}

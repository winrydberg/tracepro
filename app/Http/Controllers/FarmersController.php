<?php

namespace App\Http\Controllers;
use App\FarmInput;
use App\FarmRecord;
use App\Farm;
use App\Plot;
use App\Transaction;
use App\Product;
use Session;

use Illuminate\Http\Request;

class FarmersController extends Controller
{
    //

    public function generateRandomNumber(){
     return mt_rand(10000000,99999999);
    //  return 20000000;
    }


    public function home(){
      return view('farmers.home');
    }

    public function addinput(){
      return view('farmers.addinputs');
    }

    public function savefarminputs(Request $r){
       $r->merge(['farmerbin' => '100000001']);
       $add = FarmInput::create($r->all());
       if($add){
           return ['status'=>'success'];
       }else{
           return ['status'=>'error'];
       }
    }

    public function updatefarminputs(Request $r){
        $add = FarmInput::where('id',$r->idtoupdate)->update($r->except(['_token','idtoupdate']));
        return ['status'=>'success'];
       
    }

    public function inputlist(){
        $farminputs = FarmInput::all();
      return view('farmers.inputlist',compact('farminputs'));
    }

    public function farminputaction($id,$type='view'){
       $data = FarmInput::where('id',$id)->first();
        if($data==null){
            return view('errors.400');
        }else{
            return view('farmers.addinputs',compact('data','type'));
        }
    }

    public function farmrecords(){
      return view('farmers.farmrecords');
    }

    public function farmrecordslist(){
        return view('farmers.farmrecordslist');
    }

    public function savefarmrecords(Request $r){
        $r->merge(['farmerbin' => '100000001']);
        $add  = FarmRecord::create($r->all());
        if($add){
            return ['status'=>'success'];
        }else{
            return ['status'=>'error'];  
        }
    }

    public function farms(){
        $farms = Farm::all();
      return view('farmers.farms',compact('farms'));
    }

    public function addnewfarm(Request $r){
        $r->merge(['farmerbin' => '100000001']);
       $authuser = Session::get('outh');
       $newfarm = new Farm;
       $newfarm->farmerbin = $authuser->bin;
       $newfarm->farmbin = $this->generateRandomNumber();
       $newfarm->farmlocation = $r->farmlocation;
       $newfarm->farmname = $r->farmname;
       $newfarm->extrainfo = $r->extrainfo;
       if($newfarm->save()){
           Session::flash('success','New farm added Successfully');
           return back();
       }else{
        Session::flash('error','Error Adding farm.. Please try again');
        return back();
       }
    }
    public function deleteFarm(Request $r){
      $del = Farm::where('id',$r->id)->delete();
      if($del){
          return ['status'=>'success'];
      }else{
          return ['status'=>'error'];
      }
    }

    public function plots(){
      $farms = Farm::where('farmerbin','100000001')->get();
      $plots = Plot::all();
      return view('farmers.plots',compact('farms','plots'));
    }

    public function addnewplot(Request $r){
        $r->merge(['farmerbin' => '100000001']);
        $newplot = new Plot;
        $newplot->farmerbin = $r->farmerbin;
        $newplot->farmbin = $r->farmbin;
        $newplot->plotname = $r->plotname;
        $newplot->productsonplot = $r->productsonplot;
        $newplot->extrainfo = $r->extrainfo;
        if($newplot->save()){
            Session::flash('success','New Plot added Successfully');
            return back();
        }else{
         Session::flash('error','Error Adding Plot.. Please try again');
         return back();
        }
    }

    public function deletePlot(Request $r){
        $del = Plot::where('id',$r->id)->delete();
        if($del){
            return ['status'=>'success'];
        }else{
            return ['status'=>'error'];
        }
      }

    public function profile(){
      return view('farmers.profile');
    }

    public function transactions(){
      return view('farmers.transactions');
    }


    //adding products
    public function newproducts(){
      $authuser = Session::get('outh');
      $farms = Farm::where('farmerbin', $authuser->bin)->get(); //get farms specific to farmer later on
      $farmerTransactions  = Transaction::where('customerbin', $authuser->bin )->get();
      // dd($farmerTransactions);
      return view('farmers.newproduct', compact('farms','farmerTransactions'));
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
      $product->farmid = $r->farmid;
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

<?php

namespace App\Http\Controllers;
use App\FarmInput;
use App\FarmRecord;
use App\Farm;
use App\Plot;
use App\Customer;
use App\Transaction;
use App\Product;
use Session;
use QrCode;



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
       $r->merge(['farmerbin' => Session::get('outh')->bin]);
       $add = FarmInput::create($r->all());
       if($add){
           return ['status'=>'success'];
       }else{
           return ['status'=>'error'];
       }
    }

    public function updatefarminputs(Request $r){
        $add = Transaction::where('id',$r->idtoupdate)->update($r->except(['_token','idtoupdate']));
        return ['status'=>'success'];
       
    }

    public function inputlist(){
        $farminputs = Transaction::where('customerbin',Session::get('outh')->bin)->get();
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
      $farms  = Farm::all();
      $plots = Plot::all();
      return view('farmers.farmrecords',compact('farms','plots'));
    }

    public function farmrecordslist(){
        return view('farmers.farmrecordslist');
    }

    public function savefarmrecords(Request $r){
        $r->merge(['farmerbin' => Session::get('outh')->bin]);
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
        $r->merge(['farmerbin' => Session::get('outh')->bin]);
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
      $farms = Farm::where('farmerbin',Session::get('outh')->bin)->get();
      $plots = Plot::all();
      return view('farmers.plots',compact('farms','plots'));
    }

    public function addnewplot(Request $r){
        $r->merge(['farmerbin' => Session::get('outh')->bin]);
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

    public function createcustomer(){
      return view('farmers.createcustomer');
    }

    public function customerlist(){
      $customers = Customer::where('customerof','1000000002')->get();
      return view('farmers.customerlist',compact('customers'));
    }

    public function savecustomer(Request $r){
      $r->merge(['customerof'=>'1000000002']);
      $add = Customer::create($r->all());
      if($add){
        return ['status'=>'success'];
      }else{
        return ['status'=>'error'];
      }
    }

    public function approvals(){
       $approvals  = Transaction::where('supplierbin',Session::get('outh'))->where('approvedbysupplier',0)->get();
       return view('farmers.approvals',compact('approvals'));
    }
    //adding products
    public function newproducts(){
      $authuser = Session::get('outh');
      $farms = Farm::where('farmerbin', $authuser->bin)->get(); //get farms specific to farmer later on
      $farmerTransactions  = Transaction::where('customerbin', $authuser->bin)->get();
      // dd($farmerTransactions);
      return view('farmers.newproduct', compact('farms','farmerTransactions'));
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
      $product->farmid = $r->farmid;
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
          'farm'=>Farm::where('farmerbin', $authuser->bin)->first(['farmname'])->farmname
          ]);
          $qrcodedata1 = json_encode([
            'APP'=>'TRACEPRO',
            'Product ID'=>$product->productidno,
            'Product Name'=>$r->productname,
            'Product Batchno'=>$product->productbatchno,
            'Supplier BIN'=>Session::get('outh')->bin,
            'Supplier Name'=>Session::get('outh')->name,
            'Quantity'=>$r->productquantity,
            'Input Used'=>$product->inputbatchno,
            'Farm'=>Farm::where('farmerbin', $authuser->bin)->first(['farmname'])->farmname
            ]);
        QrCode::size(400)->format('svg')->generate($qrcodedata1,public_path('qrcodes/'.$product->productidno.'.svg'));
         
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
      return view('farmers.productlist', compact('products'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Works\RedisQuery;
use App\Customer;
use DB;
use Session;
use Hash;


class ActorsController extends Controller
{
    //
    public function generateRandomString($length = 20) {
      return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
    public function pullinfo(Request $r){
       $fetch = Transaction::where('batchnoofsupplierproduct',$r->inputbatch)->first();
       if(is_null($fetch)){
         return ['status'=>'success'];
       }else{
        $data = json_encode([
          'APP'=>'TRACEPRO',
          'Product ID'=>$fetch->productidno,
          'Product Name'=>$fetch->productname,
          'Product Batchno'=>$fetch->productbatchno,
          'Supplier BIN'=>$fetch->supplierbin,
          'Supplier Name'=>$fetch->suppliername,
          'Quantity'=>$fetch->suppliername,
          'Input Used'=>$fetch->batchnoofsupplierproduct,
          ]);
          return ['status'=>'success','data'=>$data];
       }
    }

    public function login(){
      return view('actorslogin');
    }

    public function logout(){
        // clear session here;
      return redirect('/actors/login');
    }

    public function authuser($r){
        $checkuser = DB::table('actors')->where('email',$r->username)->orWhere('phoneno',$r->username)->first();

        if($checkuser !== null){
           if($checkuser->actortype != $r->actortype){
             return ['status'=>'error'];
           }
         if (Hash::check($r->password, $checkuser->password)) {
           Session::put('outh',$checkuser);
             return ['status'=>'success','user'=>$checkuser];
            }else{
             return ['status'=>'error'];
            }
       }else{
         return ['status'=>'error'];
       }
       //Session::put('evaluation','true');
       //return redirect('');
     }

    public function authenticate(Request $r){
        $response = ['status'=>'error'];
        switch($r->actortype){
            case 'GROWER':
            if($this->authuser($r)['status']=='success'){
                $response = ['status'=>'success','responseurl'=>url('/farmers/home')];
            }
            break;
            case 'PACKER':
            if($this->authuser($r)['status']=='success'){
                $response = ['status'=>'success','responseurl'=>url('/packer/home')];
            }
            break;
            case 'DISTRIBUTOR':
            if($this->authuser($r)['status']=='success'){
                $response = ['status'=>'success','responseurl'=>url('/packer/home')];
            }
            break;
            case 'MANUFACTURER':
            if($this->authuser($r)['status']=='success'){
                $response = ['status'=>'success','responseurl'=>url('/packer/home')];
            }
            break;
            case 'RETAILSTORE':
            if($this->authuser($r)['status']=='success'){
                $response = ['status'=>'success','responseurl'=>url('/retailstore/home')];
            }
            break;
            case 'Food Service Operator':
            if($this->authuser($r)['status']=='success'){
                $response = ['status'=>'success','responseurl'=>url('/foodservice/home')];
            }
            break;
            default:
            break;
        }

        return $response;
    }

    public function recordtransactions(Request $r){
        $add = Transaction::create($r->all());
        $authuser = Session::get('outh');
        if($add){     
            return ['status'=>'success'];
        }else{
            return ['status'=>'error'];
        }
    }

    public function updatetransactions(Request $r){
      $update = Transaction::where('id',$r->idtoupdate)->update($r->except(['_token','idtoupdate']));
      return ['status'=>'success'];
    }


    public function getpendingtransactions($bin=null){
      $pendings = Transaction::where('customerbin',$bin)->where('approvedbycustomer',0)->get();
      return ['status'=>'success','data'=>$pendings];
    }

    public function generateqrcode(Request $r){
        QrCode::generate($r->data, public_path('qrcodes'.'/'.$r->productidno));
    }

    public function savecustomer(Request $r){
        $r->merge(['customerof'=>Session::get('outh')->bin]);
        $r->merge(['customeroftype'=>Session::get('outh')->actortype]);
        $add = Customer::create($r->all());
        if($add){
          return ['status'=>'success'];
        }else{
          return ['status'=>'error'];
        }
    }

    public function approvetransaction(Request $r){
      $transactionid = $this->generateRandomString();
      $getdata = Transaction::where('id',$r->id)->first();
      //  RedisQuery::saveToRedis('transactionid',json_encode(
      //    [
      //      'supplierbin'=>$getdata->supplierbin,
      //      'suppliername'=>$getdata->suppliername,
      //      'customerbin'=>$getdata->customerbin,
      //      'customername'=>$getdata->customername,
      //      'productidno'=>$getdata->productidno,
      //      'productname'=>$getdata->productname,
      //      'productbatchno'=>$getdata->productbatchno,
      //      'productquantity'=>$getdata->productquantity,
      //      'receiptno'=>$getdata->receiptno,
      //      'dateoftransaction'=>$getdata->dateoftransaction,
      //      'supplierofproductinput'=>$getdata->supplierofproductinput,
      //      'batchnoofsupplierproduct'=>$getdata->batchnoofsupplierproduct,
      //    ]
      //  ));
       $update =  Transaction::where('id',$r->id)->update(['approvedbycustomer'=>1,'transactionid'=>$transactionid]);
       return ['status'=>'success'];
       
    }
}

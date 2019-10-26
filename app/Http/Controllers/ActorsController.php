<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Works\RedisQuery;
use DB;
use Session;
use Hash;


class ActorsController extends Controller
{
    //
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
            case 'Grower':
            if($this->authuser($r)['status']=='success'){
                $response = ['status'=>'success','responseurl'=>url('/farmers/home')];
            }
            break;
            case 'Packer':
            if($this->authuser($r)['status']=='success'){
                $response = ['status'=>'success','responseurl'=>url('/packer/home')];
            }
            break;
            case 'Distributor':
            if($this->authuser($r)['status']=='success'){
                $response = ['status'=>'success','responseurl'=>url('/packer/home')];
            }
            break;
            case 'Manufacturer':
            if($this->authuser($r)['status']=='success'){
                $response = ['status'=>'success','responseurl'=>url('/manufacturer/home')];
            }
            break;
            case 'Retail Store':
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

}

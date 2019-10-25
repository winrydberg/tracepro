<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

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

    public function authenticate(Request $r){
        $response = ['status'=>'error'];
        switch($r->actortype){
            case 'Grower':
            // perform authenication
            if(true){
                $response = ['status'=>'success','responseurl'=>url('/farmers/home')];
            }
            break;
            case 'Packer':
            // perform authentication
            if(true){
                $response = ['status'=>'success','responseurl'=>url('/packer/home')];
            }
            break;
            case 'Distributor':
            if(true){
                $response = ['status'=>'success','responseurl'=>url('/packer/home')];
            }
            break;
            case 'Manufacturer':
            // perform authentication
            if(true){
                $response = ['status'=>'success','responseurl'=>url('/manufacturer/home')];
            }
            break;
            case 'Retail Store':
            // perform authentication
            if(true){
                $response = ['status'=>'success','responseurl'=>url('/retailstore/home')];
            }
            break;
            // perform authentication
            case 'Food Service Operator':
            // perform authentication
            if(true){
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
        if($add){
            return ['status'=>'success'];
        }else{
            return ['status'=>'error'];
        }
    }

    
    public function getpendingtransactions($bin=null){
      $pendings = Transaction::where('customerbin',$bin)->where('approvedbycustomer',0)->get();
      return ['status'=>'success','data'=>$pendings];
    }
}

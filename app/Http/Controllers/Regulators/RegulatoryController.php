<?php

namespace App\Http\Controllers\Regulators;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Hash;
use Auth;
use Mail;

use App\Actor;
use App\Regulator;

class RegulatoryController extends Controller
{
    //
    public function login(){
        return view('regulator.login');
    }

    public function loginAdmin(Request $r){
       
        if (Auth::guard('regulator')->attempt(['email'=>$r->email, 'password'=>$r->password])) {
            return redirect()->to('regulator/dashboard');
         }else{
             Session::flash('error','Invalid Login Credentials');
             return back();
         }
    }

    public function logout(){
        Auth::guard('regulator')->logout();
        return redirect()->to('regulator/login');
    }

    public function index(Request $request){
        $actorcount = Actor::count();
        // dd($actorcount);
        if ($request->has('searchbin')) {
           $actors = Actor::where('bin', trim($request->get('searchbin')))->get();
        //    dd($actors);
           return view('regulator.dashboard', compact('actors','actorcount'));
        }else{
            return view('regulator.dashboard', compact('actorcount'));
        } 
    }

    public function searchActor(Request $request){
        if ($request->has('searchbin')) {
            $actors = Actor::where('bin', trim($request->get('searchbin')))->get();
         //    dd($actors);
            return view('regulator.searchlist', compact('actors'));
         }else{
            return view('regulator.searchlist');
         } 
    }

    public function newActor(){
        return view('regulator.newactor');
    }

    public function getNewBIN(Request $r){
        switch($r->actortype){
            case 'GROWER':
            //generate grower bin
            $bin = $this->genBIN('FM');   
            return response()->json([
                'status'=>'success',
                'bin'=>$bin
            ]);
            break;
            case 'PACKER':
            //generate packer bin
            $bin = $this->genBIN('PK'); 
            return response()->json([
                'status'=>'success',
                'bin'=>$bin
            ]);
            break;
            case 'DISTRIBUTOR':
            //generate distributor bin
            $bin = $this->genBIN('DT');  
            return response()->json([
                'status'=>'success',
                'bin'=>$bin
            ]);
            break;
            case 'MANUFACTURER':
            //generate manufacturer bin
            $bin = $this->genBIN('MF'); 
            return response()->json([
                'status'=>'success',
                'bin'=>$bin
            ]);
            break;
            case 'FSO':
            //generate fso bin
            $bin = $this->genBIN('FS'); 
            return response()->json([
                'status'=>'success',
                'bin'=>$bin
            ]);
            break;
            default:
            return response()->json([
                'status'=>'error',
                'message'=>'Actor Does not Exist'
            ]);
        }
    }

    public function genBIN($actorprefix){
        $binCode = $actorprefix.'-'.mt_rand(0000,9999).'-'.mt_rand(0000,9999);
        $actor = Actor::where('bin',$binCode)->first();
        if($actor){
            genBIN($actorprefix);
        }else{
            return $binCode;
        }
    }

    public function registerActor(Request $r){
        //dd($r->all());
        $actor = new Actor();
        $actor->bin = $r->bin;
        $actor->name = $r->name;
        $actor->phoneno = $r->phoneno;
        $actor->email = $r->email;
        $actor->digital_address = $r->digital_address;
        $actor->ispassword_reset = false;
        $actor->actortype = $r->actortype;
        //generate password
        $password = $this->genDefaultPassword();
        $actor->password = $password;
        //record registrer info
        $registeredby = [
            'email' => $r->pemail,
            'firstname' => $r->pfname,
            'lastname' => $r->plname,
            'phoneno' => $r->pphoneno
        ];
        $actor->registeredby = json_encode($registeredby);
       $token = $this->getResetToken();
       $actor->resettoken = $token;
        if($actor->save()){
            if($this->sendPasswordResetEmail($actor, $password)){
                Session::flash('success','Actor Registered on the system');
                return back();
            }else{
                Session::flash('error','Ooops Something Went Wrong. Please try again');
                return back();
            }
           
        }else{
            Session::flash('error','Ooops Something Went Wrong. Please try again');
            return back();
        }
        

       
    }

    public function sendPasswordResetEmail($actor, $password){
        Mail::send('regulator.email',['email' => $actor->email,'token'=>$actor->resettoken,'id'=>$actor->bin, 'name'=> $actor->name, 'password'=>$password,],function ($m) use ($actor){
            $m->from('edwinmydev@gmail.com', 'TRACEPRO');
            $m->to($actor->email)->subject('TracePRO Password Reset');
          });
         if( count(Mail::failures()) > 0 ) {
            $actor->delete();
            return false;
                //  return ['status'=>'error'];
          } else {
            //   return ['status'=>'success'];
            return true;
        }  
    }

    public function resetPassword(Request $request){
        $token = trim($request->get('token'));
        $bin = trim($request->get('uid'));

        // dd($token, $bin);

        $actor = Actor::where('bin',$bin)->where('resettoken', $token)->first();
        // dd($actor);
        if($actor != null){
            return view('regulator.newpassword');
        }else{
            return view('regulator.notpermitted');
        }
    }

    public function saveNewPassword(Request $r){
        $actor = Actor::where('bin',$r->bin)->where('resettoken', $r->token)->first();
        if($actor != null){
            $actor->update([
                'password' => Hash::make($r->password)
            ]);
        }else{
            Session::flash('error', 'Oops Records Not Found');
            return back();
        }
    }

    public function getResetToken (){
        $token = strval(bin2hex(openssl_random_pseudo_bytes(24)));
        return $token;
    }

    public function genDefaultPassword(){
        $password_string = '!@#$%*&abcdefghijklmnpqrstuwxyzABCDEFGHJKLMNPQRSTUWXYZ23456789';
        $password = substr(str_shuffle($password_string), 0, 12);
        return $password;
    }

    public function regulatorAdmin(){
        return view('regulator.admins');
    }

    public function newRegulatorAdmin(Request $r){
        // dd($r->all());
        $regulator = new Regulator();
        $regulator->fullname = $r->name;
        $regulator->email = $r->email;
        $regulator->phoneno = $r->phoneno;
        $regulator->password = Hash::make($r->passwordmain);
        $regulator->adminlevel = $r->adminlevel;
        if($regulator->save()){
            Session::flash('success', 'Aadministrator Successfully added');
            return back();
        }else{
            Session::flash('error', 'Oops something went wrong. Please try again');
            return back();
        }
    }

}

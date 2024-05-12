<?php

namespace App\Http\Controllers;

use App\Models\Assistant;
use App\Models\Parents;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only(['email','password']);
        if(Auth::guard('administrations')->attempt($credentials)){
            return redirect()->route('dashboard');
        }
        return back()->withErrors(['error'=>'Invalid email or password.']);
    }
    public function logout(){
        Auth::guard('administrations')->logout();
        return redirect()->route('login');
    }

    public function loginMobile(Request $request){
        $credentials = $request->only(['email','password']);
        if(Auth::guard('parents')->attempt($credentials)){
            $parent = Auth::guard('parents')->user();
            return response(['parent'=>$parent,'message'=>'your are login as parents'],200);
        }else if(Auth::guard('assistants')->attempt($credentials)){
            $id = Auth::guard('assistants')->user()->id;
            $assistant = Assistant::where('id',$id)->with('vehicle')->get();
            return response(['assistant'=>$assistant,'message'=>'your are login as assistant'],200);
        }else{
            return response(['message'=>'not found'],400);
        }
    }
    public function logoutAsParent(){
        Auth::guard('parents')->logout();
    }
    public function logoutAsAssistant(){
        Auth::guard('assistant')->logout();
    }

}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(Request $request){
        $validator=validator()->make($request->all(),[
            'email'=>'required',
            'password'=>'required'
        ]);
        if($validator->fails()){
      return response()->json(['data'=>[],'status'=>422,'message'=>$validator->errors()->first()]);
        }
    if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        $user=$request->user();
        $token= $user->createToken("API TOKEN")->plainTextToken;
        return response()->json([
            'token'=>$token,
            'user'=>$user,
            'message'=>'login successfully'
        ]);
    }
    return response()->json([
        'message'=>'falied to login please try again'
    ]);
    }
}

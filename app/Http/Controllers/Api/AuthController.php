<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
           'status'=>1,
           'message'=>'logged out successfully'
        ]);
    }

    public function register(Request $request){
        $validator=validator()->make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => 'required',
            'image'=>'required'
        ]);

        if($validator->fails()){
            return response()->json([
             'status'=>0,
             'message'=>$validator->errors()->first()
            ]);
        }
        $request['password']=Hash::make($request->password);
        $user=User::Create($request->all());
        if($user){
            return response()->json([
                'data'=>$user,
                'status'=>1,
                'message'=>'registered successfully'
            ]);
        }

        return response()->json([
            'data'=>[],
            'status'=>0,
            'message'=>'failed to register please try again'
        ]);
    }

    public function sendEmail(Request $request){
        $validator=Validator()->make($request->all(),[
            'email'=>'required|exists:users'
        ]);
            if($validator->fails()){
                return response()->json([
                 'status'=>0,
                 'message'=>$validator->errors()->first()
                ]);
            }    
        $user=User::where(['email'=>$request->email,'is_admin'=>0])->first();
        if(!$user){
            return response()->json([
             'status'=>0,
             'message'=>'email is not found'
            ]);
        }    
    $token=Str::random(64);
        DB::table('password_resets')->insert([
        'email'=>$request->email,
        'token'=>$token,
        'created_at'=>Carbon::now()
        ]);
        $mail=Mail::to($request->email)
        ->bcc('basmaelazony@gmail.com')
        ->send(new ResetPassword($request->email,$token));
        if($mail){
            return response()->json([
                'status'=>1,
                'message'=> 'reset link has been sent to your email',
               ]);
        }
        else{
            return response()->json([
                'status'=>0,
                'message'=>'something wrong is happened please try again'
               ]);
        }
    
        
    }

    public function resetPassword(Request $request){

        $validator=Validator()->make($request->all(),[
            'email'=>'required|exists:users',
            'password'=>'required|min:8|confirmed'
        ]);
            if($validator->fails()){
                return response()->json([
                 'status'=>0,
                 'message'=>$validator->errors()->first()
                ]);
            }    
        $reset=DB::table('password_resets')->where(['email'=>$request->email,'token'=>$request->token])->first();
        if(!$reset){
            return response()->json([
                'status'=>0,
                'message'=>'invalid token'
               ]);
           }
        $updated=User::where('email',$request->email)->update([
            'password'=>Hash::make($request->password)
        ]);
        if($updated){
            DB::table('password_resets')->where(['email'=> $request->email])->delete();
            return response()->json([
                'status'=>1,
                'message'=>'password updated successfully'
               ]);
           }
        else{
            return response()->json([
                'status'=>0,
                'message'=>'something wrong is happened please try again'
               ]);
           }    
    
    }    
    
}

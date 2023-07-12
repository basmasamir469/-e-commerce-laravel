<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use Carbon\Carbon;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class UserController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index(Request $request)
{
$users = User::paginate(5);
return view('users.index',compact('users'));
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
return view('users.create');
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
$this->validate($request, [
'name' => 'required',
'email' => 'required|email|unique:users,email',
'password' => 'required|same:confirm-password',
'phone_number' => 'required'
]);
$input = $request->all();
$input['password'] = Hash::make($input['password']);
$user = User::create($input);
flash(__('User stored successfully'))->success();
return redirect()->route('users.index');
}
/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
$user = User::find($id);
return view('users.show',compact('user'));
}
/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
$user = User::find($id);
return view('users.edit',compact('user'));
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
$this->validate($request, [
'name' => 'required',
'email' => 'required|email|unique:users,email,'.$id,
'password' => 'same:confirm-password',
'phone_number' => 'required'
]);
$input = $request->all();
if(!empty($input['password'])){
$input['password'] = Hash::make($input['password']);
}else{
$input = Arr::except($input,array('password'));
}
$user = User::find($id);
$user->update($input);
flash(__('User updated successfully'))->success();
return redirect()->route('users.index');
}
/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
User::find($id)->delete();
flash(__('User deleted successfully'))->success();
return redirect()->route('users.index');
} 

public function sendemail(Request $request){
    $validator=Validator()->make($request->all(),[
        'email'=>'required|exists:users'
    ]);
    if($validator->fails()){
        flash($validator->errors()->first())->error();
        return redirect()->back();
    }
    $user=User::where(['email'=>$request->email,'is_admin'=>0])->first();
    if(!$user){
        flash(__('email is not found'))->error();
        return redirect()->back();
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
        flash(__('reset link has been sent to your email'))->success();
    }
    else{
        flash(__('something wrong is happened please try again'))->error();
    }
    return redirect()->back();

    
}

public function showResetPasswordForm($email,$token){
    return view('website.auth.passwords.reset',compact('token','email'));
}

public function submitResetPasswordForm(Request $request){

    $validator=Validator()->make($request->all(),[
        'email'=>'required|exists:users',
        'password'=>'required|min:8|confirmed'
    ]);
    if($validator->fails()){
        flash($validator->errors()->first())->error();
        return redirect()->back();
    }
    $reset=DB::table('password_resets')->where(['email'=>$request->email,'token'=>$request->token])->first();
    if(!$reset){
        flash(__('invalid token'))->error();
        return redirect()->back();
    }
    $updated=User::where('email',$request->email)->update([
        'password'=>Hash::make($request->password)
    ]);
    if($updated){
        DB::table('password_resets')->where(['email'=> $request->email])->delete();
        flash(__('password updated successfully'))->success();
    }
    else{
        flash(__('something wrong is happened please try again'))->error();
    }
    return redirect()->route('users.login');


}

}
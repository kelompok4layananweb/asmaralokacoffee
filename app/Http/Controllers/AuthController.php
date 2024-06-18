<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function postlogin(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required' => 'Username or Email cannot be empty',
            'password.required' => 'Password cannot be empty'
        ]);

        $field=filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email':'username';
        if(Auth::attempt([$field=>$request->email, 'password'=>$request->password])){
            if(auth()->user()->role=="customer"){
                $request->session()->regenerate();
                return redirect()->intended('/menu');
            }
        }else{
            return redirect('/login')->withErrors(['email'=>'Username/Email or Password is invalid']);
        }
    }

    function register(Request $request){
        //set validation
        $validator = Validator::make($request->all(), [
            'email'  => 'required',
            'password'   => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return redirect('/register')->withErrors(['email'=>'Register Gagal']);
        }

        //save to database

        try {
            $customer = User::create([
                'username'  => explode("@",$request->email)[0],
                'email'     => $request->email,
                'password'  => bcrypt($request->password),
                'role'   => "customer"
            ]);
            return redirect('/login');
        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return redirect('/register')->withErrors(['email'=>'Email sudah Terdaftar']);
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}

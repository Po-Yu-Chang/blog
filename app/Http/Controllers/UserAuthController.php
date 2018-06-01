<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop\Entity\User as UserEloquent;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserAuthController extends Controller
{
    //
    public function  signUpPage()
    {
        $binding=[
            'title'=>'註冊',
        ];
        return view('auth.signUp',$binding);
    }
    public  function signInPage()
    {
        $binding=[
            'title'=>'登入',
        ];
        return view('Login',$binding);
    }
    public  function signUpProcess()
    {
        $input=request()->all();
        $roules=[
            'nickname'=>
            [
                'required',
                'max:50',
            ],
            'email'=>
                [
                    'required',
                    'max:150',
                    'email',
                ],
            'password'=>
            [
                'required',
                'same:password_confirmation',
                'min:6',
            ],
            'password_confirmation'=>
            [
                'required',
                'min:6',
            ],
            'type'=>
            [
                'required',
                'in:G,A'
            ]
        ];
        $validator=Validator::make($input,$roules);
        if($validator->fails())
        {
            return redirect('/user/auth/sign-up')
                ->withErrors($validator)->withInput();
        }
        $input['password']=Hash::make($input['password']);
        $users=UserEloquent::create($input);

    }
    public function signInProcess()
    {
        $input=request()->all();

        $User=UserEloquent::where('id',$input['id'])->firstOrFail();
        $is_password_correct=($input['password']==$User->password);

        /*if(!$is_password_correct)
        {
            $error_message=[
                'msg'=>['password error'],
            ];
            return redirect()->route("SignPage")->withErrors($error_message)->withInput();
        }
        else
        {
            return view('welcome');
        }
        //session()->put('user_id',$User->id);
       //d return redirect()->intended('/');*/
        return $is_password_correct;
    }
}

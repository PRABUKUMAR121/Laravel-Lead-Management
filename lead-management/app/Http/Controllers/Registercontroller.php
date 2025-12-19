<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Account;

class Registercontroller extends Controller
{
    //
    public function register(Request $request)
    {

        $input=$request->validate([

            'username'=>'required|string|min:5',
            'password'=>'required|string|min:6|confirmed',
            'email'=>'required|email|min:5'

        ]);


        $account=new Account;

        $account->username=$request->username;
        $account->password=$request->password;
        $account->email=$request->email;

        $account->save();


    }


    public function login(Request $request)
    {

        $account=Account::where('username',$request->input('username'))->where('password',$request->input('password'))->first();






        if($account)
        {
            return "Login Successfull";

        }
        else
        {
            return "Login Failed";
        }

    }
}

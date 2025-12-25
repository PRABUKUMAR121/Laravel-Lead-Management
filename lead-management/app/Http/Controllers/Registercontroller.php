<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Account;

use App\Models\Demo;

use Transaction;

Use Hash;


use DB;

class Registercontroller extends Controller
{
    //
    public function register(Request $request)
    {

        DB::beginTransaction();

        $input=$request->validate([

            'username'=>'required|string|min:5',
            'password'=>'required|string|min:6|confirmed',
            'email'=>'required|email|min:5',
            'role'=>'required'

        ]);


        // $account=new Account;

        // $account->username=$request->username;
        // $account->password=Hash::Make($request->password);
        // $account->role=$request->role;
        // $account->email=$request->email;

        // $account->save();

        try
        {
            Account::create(['username'=>$request->username,'password'=>Hash::Make($request->password),'email'=>$request->email,'role'=>$request->role]);
            Demo::create($request->all());
            DB::commit();
        }
        catch(\Exception $e)
        {
            DB::rollback();
            return $e->getMessage();
        }


    }


    public function login(Request $request)
    {

        $account=Account::where('username',$request->input('username'))->first();

       

        if($account && Hash::check($request->password,$account->password))
        {
            Auth::login($account);
           
           return redirect('/add-lead')->withMessage(auth()->user()->username)->withClass('btn btn-success');

        }
        else
        {
            return "Login Failed";
        }

    }


    public function tm_add()
    {
        return view('concept.pages.add_tm');
    }

    public function tm_store(Request $request)
    {
        $inputs=$request->validate([

                'team_manager'=>'required'


        ]);

        DB::insert("insert into team_managers(name) values(?)",[$request->input('team_manager')]);

        return redirect('/add-tm')->withMessage('Team Manager Added successfully')->withClass('btn btn-success');
    }


      public function tm_list()
    {
        $tms=DB::select("select * from team_managers");
        return view('concept.pages.tm_list',['tms'=>$tms]);
    }
}

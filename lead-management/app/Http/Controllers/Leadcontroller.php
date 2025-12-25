<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lead;

use DB;

use Gate;

class Leadcontroller extends Controller
{
    //
    public function save(Request $request)
    {

        $inputs=$request->validate([
            'lead_given_date'=>'required|date',
            'lead_name'=>'required|string|min:5',
            'email'=>'required|email',
            'phone'=>'required|min:10',
            'lead_source'=>'required'


        ]);

$lead_given_date=$request->input('lead_given_date');
$assigned_date=$request->input('assigned_date');
$solution_date=$request->input('solution_date');
$lead_name=$request->input('lead_name');
$email=$request->input('email');
$phone=$request->input('phone');
$company=$request->input('company');
$lead_source=$request->input('lead_source');
$assigned_to=$request->input('assigned_to');
$lead_priority=$request->input('lead_priority');
$lead_status=$request->input('lead_status');
$closed_status=$request->input('closed_status');
$enquiry_remarks=$request->input('enquiry_remarks');
$solution_remarks=$request->input('solution_remarks');

DB::update("insert into leads(lead_given_date,assigned_date,solution_date,lead_name,email,phone,company,lead_source,assigned_to,lead_priority,lead_status,closed_status,enquiry_remarks,solution_remarks) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)",[$lead_given_date,$assigned_date,$solution_date,$lead_name,$email,$phone,$company,$lead_source,$assigned_to,$lead_priority,$lead_status,$closed_status,$enquiry_remarks,$solution_remarks]);


return redirect('/add-lead')->withMessage("Lead Inserted successfully")->with('class','btn btn-success');



    }

    public function list()
    {
        $leads=Lead::where('lead_priority','High')->paginate(5);
        return view('concept.pages.lead_list',compact('leads'));
    }


    public function edit(Request $request,$id)
    {

        if(Gate::allows('admin_access'))
        {
            return abort(401);
        }

        $leads=DB::select("select * from leads where id=?",[$id]);
        return view('concept.pages.edit_lead',['leads'=>$leads]);

    }

    public function update(Request $request,$id)
    {
           $inputs=$request->validate([
            'lead_given_date'=>'required|date',
            'lead_name'=>'required|string|min:5',
            'email'=>'required|email',
            'phone'=>'required|min:10',
            'lead_source'=>'required'


        ]);

$lead_given_date=$request->input('lead_given_date');
$assigned_date=$request->input('assigned_date');
$solution_date=$request->input('solution_date');
$lead_name=$request->input('lead_name');
$email=$request->input('email');
$phone=$request->input('phone');
$company=$request->input('company');
$lead_source=$request->input('lead_source');
$assigned_to=$request->input('assigned_to');
$lead_priority=$request->input('lead_priority');
$lead_status=$request->input('lead_status');
$closed_status=$request->input('closed_status');
$enquiry_remarks=$request->input('enquiry_remarks');
$solution_remarks=$request->input('solution_remarks');

DB::insert("update leads set lead_given_date=?,assigned_date=?,solution_date=?,lead_name=?,email=?,phone=?,company=?,lead_source=?,assigned_to=?,lead_priority=?,lead_status=?,closed_status=?,enquiry_remarks=?,solution_remarks=? ",[$lead_given_date,$assigned_date,$solution_date,$lead_name,$email,$phone,$company,$lead_source,$assigned_to,$lead_priority,$lead_status,$closed_status,$enquiry_remarks,$solution_remarks]);


return redirect('/lead/edit/'.$id)->withMessage("Lead Updated successfully")->with('class','btn btn-success');
    }

      public function delete(Request $request,$id)
    {
        $leads=DB::select("delete from leads where id=?",[$id]);
        return redirect('/lead-list')->with('message','Lead Deleted Success')->with('class','btn btn-success');
    }



}

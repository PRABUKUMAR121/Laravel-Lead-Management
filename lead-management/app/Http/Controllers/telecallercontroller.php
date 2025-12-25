<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\telecaller;

class telecallercontroller extends Controller
{
    //

    public function index()
    {
        $tcs=telecaller::all();

        return view('concept.pages.tc_list',compact('tcs'));
    }

    public function create()
    {
        return view('concept.pages.add_tc');
    }

    public function store(Request $request)
    {
            telecaller::create($request->all());

         

        return redirect(route('telecallers.index'));;

    }

    public function show(Request $request,telecaller $telecaller)
    {
        $tcs=telecaller::where('id',$telecaller->id)->get();

        return view('concept.pages.tc_list',['tcs'=>$tcs]);
    }

    public function edit(Request $request,telecaller $telecaller)
    {
         $tcs=telecaller::where('id',$telecaller->id)->get();

        return view('concept.pages.edit_tc',['tcs'=>$tcs]);
    }

    public function update(Request $request,telecaller $telecaller)
    {
            telecaller::where('id',$telecaller->id)->update($request->all());

        return redirect(route("telecallers.index"));
    }

    public function destroy(telecaller $telecaller)
    {
            return 1;
    }


}

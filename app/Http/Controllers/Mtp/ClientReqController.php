<?php

namespace App\Http\Controllers\Mtp;

use App\Appoinment;
use App\Http\Controllers\Controller;
use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientReqController extends Controller
{
    public function index()
    {
        return view('mtp/clientreqests');
    }

    public function pending()
    {
        $data['requesteds'] = Appoinment::all()->where('status','pending');
        //dd($data);
        return view('mtp/clientrequest/pending',$data);
    }

    public function processing()
    {
        $data['requesteds'] = Appoinment::all()->where('status','processing');
        return view('mtp/clientrequest/processing',$data);
    }

    public function completed()
    {
        $data['requesteds'] = Appoinment::all()->where('status','completed');
        return view('mtp/clientrequest/completed',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    public function showpen($id)
    {
        $data['appoinment'] = Appoinment::findorfail($id);
        $test = DB::table('appoinment_tests')->where('appoinment_id',$id)->value('test_id');
        $data['test'] = Test::findorfail($test)->name;

        return view('mtp/clientrequest/showpending',$data);
    }

    public function showpro($id)
    {
        $data['appoinment'] = Appoinment::findorfail($id);
        $test = DB::table('appoinment_tests')->where('appoinment_id',$id)->value('test_id');
        $data['test'] = Test::findorfail($test)->name;

        return view('mtp/clientrequest/showprocessing',$data);
    }

    public function showcom($id)
    {
        $data['appoinment'] = Appoinment::findorfail($id);
        $test = DB::table('appoinment_tests')->where('appoinment_id',$id)->value('test_id');
        $data['test'] = Test::findorfail($test)->name;

        return view('mtp/clientrequest/showcompleted',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        //
    }

    public function updatepen(Request $request, Test $test,$id)
    {
        $data['status'] = $request->status;
        Appoinment::findorfail($id)->update($data);

        return redirect(url('clientrequests/pending'))->with('success','Status updated');
    }

    public function updatepro(Request $request, Test $test,$id)
    {
        $data['status'] = $request->status;
        Appoinment::findorfail($id)->update($data);

        return redirect(url('clientrequests/processing'))->with('success','Status updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }
}

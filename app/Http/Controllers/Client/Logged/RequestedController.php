<?php

namespace App\Http\Controllers\Client\Logged;

use App\Appoinment;
use App\Http\Controllers\Controller;
use App\Requested;
use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestedController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $number = Appoinment::all()->where('data',"no")->count();
        for ($i=0;$i<$number;$i++)
        {
            if (Appoinment::all()->where('data',"no"))
            {
                $appoinment_id = DB::table('appoinments')->where('data',"no")->value('id');
                Appoinment::findorfail($appoinment_id)->delete();
            }
        }
        $data['requesteds'] = Appoinment::all()->where('user_id',$user_id);
        //$data['tests'] = Test::all();
        return view('user/logged/requested/requested',$data);
    }

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
     * @param  \App\Requested  $requested
     * @return \Illuminate\Http\Response
     */
    public function show(Requested $requested)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Requested  $requested
     * @return \Illuminate\Http\Response
     */
    public function edit(Requested $requested)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Requested  $requested
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requested $requested)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Requested  $requested
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requested $requested)
    {
        //
    }
}

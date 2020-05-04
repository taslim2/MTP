<?php

namespace App\Http\Controllers\Client\Logged;

use App\Appoinment;
use App\Hospital;
use App\HospitalTest;
use App\Http\Controllers\Controller;
use App\Requested;
use App\Test;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppoinmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data['user'] = auth()->user();
        $data['hospitals'] = Hospital::all();

        return view('user/logged/appoinmnet/create',$data);

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'hospital_id' => 'required',
            'phone' => 'required',
            'date' => 'required'
        ]);

        //dd($request->all());
        $appoinment['user_id'] = auth()->user()->id;
        $appoinment['name'] = $request->name;
        $appoinment['address'] = $request->address;
        $appoinment['hospital_id'] = $request->hospital_id;
        $appoinment['phone'] = $request->phone;
        $appoinment['date'] = $request->date;
        $appoinment['status'] = "pending";

        $hospital_id = $appoinment['hospital_id'];
        $data['hospital'] = Hospital::findorfail($hospital_id);
        $data['tests'] = HospitalTest::all()->where('hospital_id',$hospital_id);
        Appoinment::create($appoinment);
        $data['appoinmen_id'] = Appoinment::latest()->first()->id;
        //dd($data['appoinmen_id']);
        return view('user/logged/appoinmnet/appoinmenttest',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appoinment  $appoinment
     * @return \Illuminate\Http\Response
     */
    public function show(Appoinment $appoinment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appoinment  $appoinment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appoinment $appoinment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appoinment  $appoinment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appoinment $appoinment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appoinment  $appoinment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appoinment $appoinment)
    {
        //
    }
}

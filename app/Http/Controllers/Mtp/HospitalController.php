<?php

namespace App\Http\Controllers\Mtp;

use App\Hospital;
use App\Http\Controllers\Controller;
use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class HospitalController extends Controller
{
    public function index()
    {
        $data['hospitals'] = Hospital::all();
        return view('mtp/hospital/hospuitals',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mtp/hospital/create');
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
            'phone' => 'required'
        ]);

        $hospital = $request->name;
        $number = DB::table('hospitals')->count('id');
        $valid = DB::select('select name from hospitals');

        $print = json_decode(json_encode($valid),true);

        for ($i=0;$i<$number;$i++)
        {

            if ($hospital == $print[$i]['name'])
            {
                Alert::error('Duplicate Hospital!', 'Hospital alerady exist');
                return redirect('hospital/add');
            }
        }

        $data['name'] = $request->name;
        $data['address'] = $request->address;
        $data['phoneno'] = $request->phone;

        Hospital::create($data);
        return redirect('hospitals')->with('success','New hospital added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $hospital,$id)
    {
        $data['hospital'] = Hospital::findOrfail($id);
        return view('mtp/hospital/edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hospital $hospital,$id)
    {
        $data['name'] = $request->name;
        $data['address'] = $request->address;
        $data['phoneno'] = $request->phone;

        Hospital::FindOrFail($id)->update($data);
        return redirect('hospitals')->with('success','Hospital updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital,$id)
    {
        Hospital::FindorFail($id)->delete();
        return redirect('hospitals')->with('success','Hospital deleted');
    }
}

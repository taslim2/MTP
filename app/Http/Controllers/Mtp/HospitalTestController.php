<?php

namespace App\Http\Controllers\Mtp;

use App\Hospital;
use App\HospitalTest;
use App\Http\Controllers\Controller;
use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class HospitalTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data['tests'] = Test::all();
        $data['hospitals'] = Hospital::FindOrFail($id);
        $data['hospitaltests'] = HospitalTest::all()->where('hospital_id',$id);
        //dd($data);
        return view('mtp/hospitaltest/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['tests'] = Test::all();
        $data['hospitals'] = Hospital::all();
        return view('mtp/hospitaltest/create',$data);
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
            'hospital_id' => 'required',
            'test_id' => 'required',
            'cost' => 'required'
        ]);

        $hospital_id = $request->hospital_id;
        $test_id = $request->test_id;
        $number = DB::table('hospital_tests')->count('id');
        $valid = DB::select('select hospital_id,test_id from hospital_tests');

        $print = json_decode(json_encode($valid),true);

        for ($i=0;$i<$number;$i++)
        {

            if ($hospital_id == $print[$i]['hospital_id'] && $test_id == $print[$i]['test_id'])
            {
                Alert::error('Duplicate record!', 'This record alerady exist');
                return redirect('hospitaltest/add');
            }
        }

        $data['hospital_id'] = $request->hospital_id;
        $data['test_id'] = $request->test_id;
        $data['cost'] = $request->cost;
        // $id = $request->hospital_id;
        HospitalTest::create($data);
        return redirect('hospitals')->with('success','Test added successfully');//to make it work i need to use route!
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HospitalTest  $hospitalTest
     * @return \Illuminate\Http\Response
     */
    public function show(HospitalTest $hospitalTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HospitalTest  $hospitalTest
     * @return \Illuminate\Http\Response
     */
    public function edit(HospitalTest $hospitalTest,$id)
    {
        $data['hospitals'] = Hospital::all();
        $data['tests'] = Test::all();
        $data['hospitaltest'] = HospitalTest::findorfail($id);
        return view('mtp/hospitaltest/edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HospitalTest  $hospitalTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HospitalTest $hospitalTest,$id)
    {
        $data['hospital_id'] = $request->hospital_id;
        $data['test_id'] = $request->test_id;
        $data['cost'] = $request->cost;
        //dd($data);
        HospitalTest::findorfail($id)->update($data);
        return redirect('hospitals')->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HospitalTest  $hospitalTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(HospitalTest $hospitalTest,$id)
    {
        HospitalTest::findorfail($id)->delete();
        return redirect('hospitals')->with('success','Deleteds');
    }
}

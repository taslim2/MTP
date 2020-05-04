<?php

namespace App\Http\Controllers\Mtp;

use App\Http\Controllers\Controller;
use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class TestController extends Controller
{
    public function index()
    {
        $data['tests'] = Test::all();
        return view('mtp/test/test',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mtp/test/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $request->validate([
            'testname' => 'required'
        ]);

        $test = $request->testname;
        $number = DB::table('tests')->count('id');
        $valid = DB::select('select name from tests');

        $print = json_decode(json_encode($valid),true);

        for ($i=0;$i<$number;$i++)
        {

            if ($test == $print[$i]['name'])
            {
                Alert::error('Duplicate test!', 'Test alerady exist');
                return redirect('test/add');
            }
        }

        $data['name'] = $request->testname;
        Test::create($data);
        return redirect('tests')->with('success','Test is added');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test,$id)
    {
        $data['test'] = Test::FindOrFail($id);
        return view('mtp/test/edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test,$id)
    {
        $data['name'] = $request->testname;
        Test::findorFail($id)->update($data);
        return redirect('tests')->with('success','Test is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test,$id)
    {
        Test::findorFail($id)->delete();
        return redirect('tests')->with('success','Test is deleted');
    }
}

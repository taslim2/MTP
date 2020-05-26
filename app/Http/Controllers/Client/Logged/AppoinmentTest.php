<?php

namespace App\Http\Controllers\Client\Logged;

use App\Appoinment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppoinmentTest extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'appoinment_id' => 'required',
            'test_id' => 'required'
        ]);


        $data['test_id'] = $request->test_id;
        $data['appoinment_id'] = $request->appoinment_id;
        //dd($data);
        $hospital_id = DB::table('appoinments')->where('id',$data['appoinment_id'])
            ->value('hospital_id');
        $data['cost'] = DB::table('hospital_tests')
            ->where([['test_id',$data['test_id']],['hospital_id',$hospital_id]])
            ->value('cost');
        \App\AppoinmentTest::create($data);
        $appoinment['data'] = "yes";
        Appoinment::findorfail($data['appoinment_id'])->update($appoinment);
        return redirect(url('requested'))->with('success','Request submitted');

    }

    public function destroy($id)
    {
        Appoinment::findorfail($id)->delete();
        return redirect('requested');

    }

}

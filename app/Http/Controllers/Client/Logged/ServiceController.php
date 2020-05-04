<?php

namespace App\Http\Controllers\Client\Logged;

use App\Appoinment;
use App\Http\Controllers\Controller;
use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index($id)
    {
        $data['appoinment'] = Appoinment::findorfail($id);
        $test = DB::table('appoinment_tests')->where('appoinment_id',$id)->value('test_id');
        $data['test'] = Test::findorfail($test)->name;

        return view('user/logged/services',$data);
    }

    public function cancel($id)
    {
        DB::table('appoinment_tests')->where('appoinment_id',$id)->delete();
        Appoinment::findorfail($id)->delete();
        return redirect(url('requested'))->with('success','Request cancel');
    }
}

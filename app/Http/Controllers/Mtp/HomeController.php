<?php

namespace App\Http\Controllers\Mtp;

use App\Appoinment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $number = Appoinment::all()->where('data',"no")->count();
        for ($i=0;$i<$number;$i++)
        {
            if (Appoinment::all()->where('data',"no"))
            {
                $appoinment_id = DB::table('appoinments')->where('data',"no")->value('id');
                Appoinment::findorfail($appoinment_id)->delete();
            }
        }
        $data['completed'] = DB::table('appoinments')->where('status','completed')->count('id');
        $data['pending'] = DB::table('appoinments')->where('status','pending')->count('id');
        $data['processing'] = DB::table('appoinments')->where('status','processing')->count('id');
        $data['requests'] = DB::table('appoinments')->count('id');
        $data['users'] = DB::table('users')->where('role','client')->count('id');
        //dd($data);
        return view('mtp/home',$data);
    }
}

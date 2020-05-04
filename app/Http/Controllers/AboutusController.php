<?php

namespace App\Http\Controllers;

use App\HospitalTest;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function index()
    {
        return view('user/logged/aboutus');
    }

    public function indexl()
    {
        return view('user/logout/aboutus');
    }

    public function available()
    {
        $data['availables'] = HospitalTest::all();
        return view('user/logout/availabletests',$data);
    }

    public function availablelogged()
    {
        $data['availables'] = HospitalTest::all();
        return view('user/logged/availabletests',$data);
    }
}

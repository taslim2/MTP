<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContractusController extends Controller
{
    public function index()
    {
        return view('user/logged/contractus');
    }

    public function indexl()
    {
        return view('user/logout/contractus');
    }
}

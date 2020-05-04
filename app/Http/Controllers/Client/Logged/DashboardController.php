<?php

namespace App\Http\Controllers\Client\Logged;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('user/logged/dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return view('user/logout/dashboard');
    }
}

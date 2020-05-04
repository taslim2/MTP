<?php

namespace App\Http\Controllers\Client\Logout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (\auth()->user())
        {
            return redirect('dashboard');
        }
        return view('user/logout/login');
    }

    public function register()
    {

    }

    public function login(Request $request)
    {
        $role = "client";
        if(Auth::attempt(['email'=> $request->email, 'password' => $request->password, 'role' => $role]))
        {
            return redirect('dashboard')->with('success','Login successful');
        }
        else
        {
            return redirect('login');
        }
    }

}

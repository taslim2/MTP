<?php

namespace App\Http\Controllers\Mtp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (\auth()->user())
        {
            return redirect('mtphome');
        }
        return view('mtp/login');
    }

    public function login(Request $request)
    {
        $role = "admin";
        if(Auth::attempt(['email'=> $request->email, 'password' => $request->password, 'role' => $role]))
        {
            return redirect('mtphome')->with('success','Login successful');
        }
        else
        {
            return redirect('mtp');
        }
    }
}

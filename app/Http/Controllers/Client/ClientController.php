<?php

namespace App\Http\Controllers\Client;

use App\Client;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user['user'] = auth()->user();
        return view('user/logged/profileedit',$user);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user/logout/register');
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
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $email = $request->email;
        $number = DB::table('users')->count('id');
        $valid = DB::select('select email from users');

        $print = json_decode(json_encode($valid),true);

        for ($i=0;$i<$number;$i++)
        {

            if ($email == $print[$i]['email'])
            {
                Alert::error('Duplicate email!', 'Email alerady exist');
                return redirect('client/register');
            }
        }

        $data['name'] = $request->name;
        $data['address'] = $request->address;
        $data{'phone'} = $request->phone;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);
        $data['role'] = "client";

        User::create($data);
        Alert::success('Registration successful');
        return redirect('client/register');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $data['name'] = $request->name;
        $data['address'] = $request->address;
        $data{'phone'} = $request->phone;
        $data['email'] = $request->email;

        User::findorfail($id)->update($data);
        return redirect('requested')->with('success','User data updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

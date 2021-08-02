<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsumen;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DaftarController extends Controller
{

    public function index()
    {
        return view('user.daftar');
    }

    public function store(Request $request)
    {

        $data = array(
            'nama'=>$request->nama,
            'username'=>$request->username,
            //'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'alamat'=>$request->alamat,
            'no_telepon'=>$request->no_telepon,
            //'confirm password'=>bcrypt($request->confirm_password)
           
        );
        Konsumen::create($data);
        return redirect('/login')->with('success','konsumen berhasil ditambah');
    }
}

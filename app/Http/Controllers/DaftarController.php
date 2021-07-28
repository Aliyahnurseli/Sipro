<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DaftarController extends Controller
{

    public function index()
    {
        return view('daftar');
    }

    public function store(Request $request)
    {

        $data = array(
            'nama'=>$request->nama,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'confirm password'=>bcrypt($request->confirm_password),
           
        );
        Konsumen::create($data);
        return redirect('/login')->with('success','konsumen berhasil ditambah');
    }
}

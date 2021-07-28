<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Developer;
use App\Models\Konsumen;
use Auth;

class LoginController extends Controller
{
    function masuk(Request $kiriman)
    {
        $data1=Admin::where('username',$kiriman->username)->where('password',$kiriman->password)->get();
        $data2=Developer::where('id_developer',$kiriman->username)->where('password',$kiriman->password)->get();
        $data3=Konsumen::where('id_konsumen',$kiriman->username)->where('password',$kiriman->password)->get();

        if (count($data1)>0) {
    		Auth::guard('admin')->LoginUsingId($data1[0]['username']);
    		return redirect('/admin/dashboard');
    	}
    	else if (count($data2)>0) {
    		Auth::guard('developer')->LoginUsingId($data2[0]['id_developer']);
            return redirect('/developer/dashboard');
    	}
    	else if (count($data3)>0) {
    		Auth::guard('konsumen')->LoginUsingId($data3[0]['id_konsumen']);
    		return redirect('/konsumen/konsumen');
    	}
    	else{
    		return redirect('/login')->with('Login Gagal');
    	}
    }

    function keluar()
    {
        if (Auth::guard('admin')->check()) {
    		Auth::guard('admin')->logout();
    	}else if (Auth::guard('developer')->check()) {
    		Auth::guard('developer')->logout();
		}else if (Auth::guard('konsumen')->check()) {
    		Auth::guard('konsumen')->logout();
        }
		return redirect('/login');
    }
}
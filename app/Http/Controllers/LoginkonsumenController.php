<?php

namespace App\Http\Controllers;

use App\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class LoginkonsumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         if(!Session::get('loginkonsumen')){
            return redirect('loginkonsumen')->with('Alert','You must Login');
        } else {
            return view('/home_user');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginkonsumen()
    {
        return view ('/loginkonsumen');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loginPost(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $data=pengguna::where('email',$email)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('username',$data->username);
                Session::put('email',$data->email);
                Session::put('password',$data->password);
                Session::put('ulang_password',$data->ulangpassword);

                //Session::put('id_paket',$data->id_paket);
                Session::put('loginkonsumen',TRUE);
                return redirect('home_user');
            }
            else {
                return redirect('loginkonsumen')->with('alert', 'login yang bener woy !');
            }
        } else {
            return redirect('loginkonsumen')->with('alert', ' Incorrect !');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('loginkonsumen')->with ('alert', 'Your Was Logout');
    }

    public function register(Request $request){
       
        $username= $request->input('username');
        $email= $request->input('email');
        $password= $request->input('password');
        $ulang_password= $request->input('ulang_password');
        
       
        return view('register');
    }
    public function registerPost(Request $request){
        $this->validate($request, [
            'username' => 'required|min:4',
            'email' => 'required|min:4|email|unique:pengguna',
            'password' => 'required|min:4',
            'ulang_password' => 'required|min:4',

           
        ]);

        $data =  new pengguna();
        
        $data->username = $request->username;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->ulang_password = bcrypt($request->ulang_password);

        $data->alamat = $request->alamat;
       
        $data->save();
        return redirect('loginkonsumen')->with('alert-success','Kamu berhasil Register');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsumen;


class AdminkonsumenController extends Controller
{
    public function index()
    {
        $konsumen = konsumen::all();
        return view('admin/konsumen',compact('konsumen'))->with('i');
    }

    public function store(Request $request)
    {
        $data = array(
            'nama'=>$request->nama,
            'username'=>$request->username,
            'password'=>$request->password,
            'alamat'=>$request->alamat,
            'no_telepon'=>$request->no_telepon,
            
        );
        Konsumen::create($data);
        return redirect('admin\konsumen')->with('success','konsumen berhasil ditambah');
    }

    public function update(Request $request, $id)
    {
        if($request->has('alamat'))
        {
            $data = array(
                'alamat'=>$request->alamat,
            );
        Konsumen::whereid_konsumen($id)->update($data);
        }
        return redirect('admin\konsumen');
    }

    public function destroy($id)
    {
        try{
            $datas = Konsumen::findOrfail($id);
            $datas->delete();
            return redirect('admin\konsumen')->with('success','konsumen Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin\konsumen')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}

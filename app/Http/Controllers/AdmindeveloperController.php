<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Developer;

class AdmindeveloperController extends Controller
{
    public function index()
    {
        $developers = Developer::all();
        return view('admin/developer',compact('developers'))->with('i');
    }

    public function store(Request $request)
    {
        $data = array(
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'no_telepon'=>$request->no_telepon,
            'status'=>$request->status,
            'keterangan'=>$request->keterangan,
        );
        Developer::create($data);
        return redirect('admin\developer')->with('success','developer berhasil ditambah');
    }

    public function update(Request $request, $id)
    {
        if($request->has('status'))
        {
            $data = array(
                'status'=>$request->status,
            );
        Developer::whereid_developer($id)->update($data);
        return redirect('admin\developer');
        }
        return redirect('admin\developer');
    }


    public function destroy($id)
    {
        try{
            $datas = Developer::findOrfail($id);
            $datas->delete();
            return redirect('admin\developer')->with('success','developer Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin\developer')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}

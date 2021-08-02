<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Fasilitas;

class AdminfasilitasController extends Controller
{
    public function index()
    {
        $fasilitass = Fasilitas::all();
        return view('admin/fasilitas',compact('fasilitas'))->with('i');
    }

    public function store(Request $request)
    {
        $data = array(
            'id_property'=>$request->id_property,
            'ruangan'=>$request->ruangan,
            'funiture'=>$request->funiture,
        );
        Fasilitas::create($data);
        return redirect('admin\fasilitas')->with('success','fasilitas berhasil ditambah');
    }

    public function update(Request $request, $id)
    {
        {
            $data = array(
                'ruangan'=>$request->ruangan,
                'funiture'=>$request->funiture,
            );
        Fasilitas::whereid_fasilitas($id)->update($data);
        
        }
        return redirect('admin\fasilitas');
    }

    public function destroy($id)
    {
        try{
            $datas = Fasilitas::findOrfail($id);
            $datas->delete();
            return redirect('admin\fasilitas')->with('success','fasilitas Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin\fasilitas')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}

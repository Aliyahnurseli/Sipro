<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;

class AdminpemesananController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::all();
        return view('admin/pemesanan',compact('pemesanan'))->with('i');
    }

    public function store(Request $request)
    {
        $data = array(
            'id_konsumen'=>$request->id_konsumen,
            'tanggal_sewa'=>$request->tanggal_sewa,
            'status'=>$request->status,
            
        );
        Pemesanan::create($data);
        return redirect('admin\pemesanan')->with('success','pemesanan berhasil ditambah');
    }

    public function update(Request $request, $id)
    {
        {
            $data = array(
                'tanggal_sewa'=>$request->tanggal_sews,
                'status'=>$request->status,
            );
        Pemesanan::whereid_pemesanan($id)->update($data);
        
        }
        return redirect('admin\pemesanan');
        
        
    }

    public function destroy($id)
    {
        try{
            $datas = Pemesanan::findOrfail($id);
            $datas->delete();
            return redirect('admin\pemesanan')->with('success','pemesanan Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin\pemesanan')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}

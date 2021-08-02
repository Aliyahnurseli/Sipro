<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class AdmintransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('admin/transaksi',compact('transaksi'))->with('i');
    }

    public function store(Request $request)
    {
        $data = array(
            'id_pemesanan'=>$request->id_pemesanan,
            'id_bank'=>$request->id_bank,
            'total_harga'=>$request->total_harga,
            'tanggal_transaksi'=>$request->tanggal_transaksi,
            'jenis_transaksi'=>$request->jenis_transaksi,
            'status'=>$request->status,

            
        );
        Transaksi::create($data);
        return redirect('admin\transaksi')->with('success','transaksi berhasil ditambah');
    }

    public function update(Request $request, $id)
    {
        {
            $data = array(
                'total_harga'=>$request->total_harga,
                'tanggal_transaksi'=>$request->tanggal_transaksi,
                'jenis_transaksi'=>$request->jenis_transaksi,
                'status'=>$request->status,
            );
        Transaksi::whereid_transaksi($id)->update($data);
        }
        return redirect('admin\transaksi');
    }

    public function destroy($id)
    {
        try{
            $datas = Transaksi::findOrfail($id);
            $datas->delete();
            return redirect('admin\transaksi')->with('success','transaksi Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin\transaksi')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}

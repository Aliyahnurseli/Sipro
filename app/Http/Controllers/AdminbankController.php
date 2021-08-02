<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
App\Models\Bank;

class AdminbankController extends Controller
{
    public function index()
    {
        $bank = Bank::all();
        return view('admin/bank',compact('bank'))->with('i');
    }

    public function store(Request $request)
    {
        $data = array(
            'nama_bank'=>$request->nama_bank,
            'kontak'=>$request->kontak,
            'penanggung_jawab'=>$request->penanggung_jawab,
            
        );
        Bank::create($data);
        return redirect('admin\bank')->with('success','bank berhasil ditambah');
    }

    public function update(Request $request, $id)
    {
        {
            $data = array(
                'kontak'=>$request->kontak,
                'penanggung_jawab'=>$request->penanggung_jawabt,
            );
        Bank::whereid_bank($id)->update($data);
        }
        return redirect('admin\bank');
    }

    public function destroy($id)
    {
        try{
            $datas = Bank::findOrfail($id);
            $datas->delete();
            return redirect('admin\bank')->with('success','bank Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin\bank')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}

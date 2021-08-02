<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class AdminpropertyController extends Controller
{
    public function index()
    {
        $property = Property::all();
        return view('admin/property',compact('property'))->with('i');
    }

    public function store(Request $request)
    {
        $data = array(
            'id_penjual'=>$request->id_penjual,
            'nama_property'=>$request->nama_property,
            'jenis_property'=>$request->jenis_property,
            'harga'=>$request->harga,
            'status'=>$request->status,

            
        );
        Property::create($data);
        return redirect('admin\property')->with('success','property berhasil ditambah');
    }

    public function update(Request $request, $id)
    {
        {
            $data = array(
                'jenis_property'=>$request->jenis_property,
                'harga'=>$request->harga,
                'status'=>$request->status,
            );
        Property::whereid_property($id)->update($data);
        }
        return redirect('admin\property');
    }

    public function destroy($id)
    {
        try{
            $datas = Property::findOrfail($id);
            $datas->delete();
            return redirect('admin\property')->with('success','property Berhasil Dihapus');
        }catch(\Throwable $th){
            return redirect('admin\property')->withErrors('Data gagal dihapus. Harap hapus data yang terkait');
        }
    }
}

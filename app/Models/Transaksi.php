<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table='transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = ['id_transaksi','id_pemesanan','id_bank','total_harga','tanggal_transaksi','jenis_transaksi','status']; //field tabel
    public $timestamps = false;

    public function Pemesanan()
    {
	return $this->belongsTo('App\Models\Pemesanan','id_pemesanan');
    }
    public function Bank ()
    {
	return $this->belongsTo('App\Models\Bank','id_bank');
    }
}

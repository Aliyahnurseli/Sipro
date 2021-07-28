<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table='pemesanan';
    protected $primaryKey = 'id_pemesanan';
    protected $fillable = ['id_pemesanan','id_konsumen','tanggal_sewa','status']; //field tabel
    public $timestamps = false;

    
    public function Konsumen()
    {
	return $this->belongsTo('App\Models\Konsumen','id_konsumen');
    }
}

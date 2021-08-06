<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table='property';
    protected $primaryKey = 'id_property';
    protected $fillable = ['id_property','id_developer','nama_property','jenis_property','harga','status','alamat']; //field tabel
    public $timestamps = false;

    public function Developer()
    {
	return $this->belongsTo('App\Models\Developer','id_developer');
    }
}

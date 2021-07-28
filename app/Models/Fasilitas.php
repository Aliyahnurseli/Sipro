<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $table='fasilitas';
    protected $primaryKey = 'id_fasilitas';
    protected $fillable = ['id_fasilitas','id_property','ruangan','furniture']; //field tabel
    public $timestamps = false;

    public function Property()
    {
	return $this->belongsTo('App\Models\Property','id_property');
    }
}
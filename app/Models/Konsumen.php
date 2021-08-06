<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
    

class Konsumen extends Model
{
    protected $table='konsumen';
    protected $primaryKey = 'id_konsumen';
    protected $fillable = ['id_konsumen','nama','username','password','alamat','no_telepon']; //field tabel
    public $timestamps = false;
}

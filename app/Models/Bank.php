<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table='bank';
    protected $primaryKey = 'id_bank';
    protected $fillable = ['id_bank','nama_bank','kontak','penanggungjawab']; //field tabel
    public $timestamps = false;
}

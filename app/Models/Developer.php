<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    protected $table='developer';
    protected $primaryKey = 'id_developer';
    protected $fillable = ['id_developer','nama','username','password','alamat','no_telepon','status','keterangan']; //field tabel
    public $timestamps = false;
}

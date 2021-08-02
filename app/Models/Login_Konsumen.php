<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Login_Konsumen extends Authenticatable
{
    protected $table="konsumen";
    protected $primaryKey = 'id_konsumen';
    protected $fillable = ['id_konsumen', 'nama','username','password','alamat','no_telepon']; //field tabel
    public $timestamps = false;
}

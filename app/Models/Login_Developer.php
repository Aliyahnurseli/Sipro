<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Login_Developer extends Authenticatable
{
    protected $table="developer";
    protected $primaryKey = 'id_developer';
    protected $fillable = ['id_developer', 'nama','username','password','alamat','no_telepon',]; //field tabel
    public $timestamps = false;
}

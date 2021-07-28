<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table='admin';
    protected $primaryKey = 'id_admin';
    protected $fillable = ['id_admin','nama','username','password']; //field tabel
    public $timestamps = false;
}

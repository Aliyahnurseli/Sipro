<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Login_Admin extends Model
{
    protected $table="admin";
    protected $primaryKey = 'username';
    protected $fillable = ['username', 'password']; //field tabel
    public $timestamps = false;
}

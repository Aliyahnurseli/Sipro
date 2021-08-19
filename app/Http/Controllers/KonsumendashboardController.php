<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KonsumendashboardController extends Controller
{
    public function index()
    {
        return view('konsumen/dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TiktokController extends Controller
{
    public function index()
    {
        return view('tiktok.index');
    }
}

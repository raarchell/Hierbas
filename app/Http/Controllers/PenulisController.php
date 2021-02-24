<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenulisController extends Controller
{
    public function index(){
        return view('pages.penulis.dashboard');
    }
}

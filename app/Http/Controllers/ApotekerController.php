<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApotekerController extends Controller
{
    public function index(){
        return view('pages.apoteker.dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegenteController extends Controller
{
    public function index()
    {
        return view('regente.dashboard');
    }
}

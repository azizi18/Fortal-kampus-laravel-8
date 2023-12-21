<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Evaluasi extends Controller
{

    public function index()
    {

        return view('akademik.peraturan-akademik.evaluasi-studi');
    }
}

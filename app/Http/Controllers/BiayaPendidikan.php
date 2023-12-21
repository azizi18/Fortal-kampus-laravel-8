<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiayaPendidikan extends Controller
{

    public function index()
    {

        return view('akademik.peraturan-akademik.biaya-pendidikan');
    }
}

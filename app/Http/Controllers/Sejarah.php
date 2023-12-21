<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sejarah_model;

class Sejarah extends Controller
{

     // Sejarahpage
     public function index()
     {
        
         $model     = new Sejarah_model();
         $sejarah = $model->semua();
 
         $data = array(
             'sejarah'    => $sejarah,
             'content'   => 'profil/sejarah'
         );
         return view('layout/wrapper', $data);
     }
}

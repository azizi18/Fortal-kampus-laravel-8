<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sejarah_model extends Model
{
    protected $table         = "sejarah";
    protected $primaryKey     = 'id_sejarah';

    public function semua()
    {
        $query = DB::table('sejarah')
             ->join('users', 'users.id_user', '=', 'sejarah.id_user', 'LEFT')
            ->select('sejarah.*', 'sejarah.judul', 'sejarah.isi')
            ->orderBy('sejarah.id_sejarah', 'DESC')
            ->get();
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('sejarah')
            ->join('users', 'users.id_user', '=', 'sejarah.id_user', 'LEFT')
            ->select('sejarah.*', 'sejarah.judul', 'sejarah.isi')
            ->orderBy('id_sejarah', 'DESC')
            ->limit(15)
            ->get();
        return $query;
    }
    public function detail($id_sejarah)
    {
        $query = DB::table('sejarah')
            ->select('sejarah.*', 'sejarah.judul', 'sejarah.isi', 'sejarah.urutan')
            ->where('sejarah.id_sejarah', $id_sejarah)
            ->orderBy('id_sejarah', 'DESC')
            ->first();
        return $query;
    }


    // // listing
    public function cari($keywords)
    {
        $query = DB::table('sejarah')
            ->select('sejarah.*')
            ->where('sejarah.judul', 'LIKE', "%{$keywords}%")
            ->orWhere('sejarah.isi', 'LIKE', "%{$keywords}%")
            ->orderBy('id_sejarah', 'DESC')
            ->get();
        return $query;
    }
    
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Staff_model extends Model
{

    protected $table         = "gambar_struktur";
    protected $primaryKey     = 'id_gambar';

    // listing
    public function semua()
    {
        $query = DB::table('gambar_struktur')
            ->select('gambar_struktur.*')
            ->orderBy('gambar_struktur.id_gambar', 'DESC')
            ->get();
        return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('gambar_struktur')
            // ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'gambar_struktur.id_kategori_staff', 'LEFT')
            ->select('gambar_struktur.*')
            ->where('gambar_struktur.nama_staff', 'LIKE', "%{$keywords}%")
            ->orWhere('gambar_struktur.isi', 'LIKE', "%{$keywords}%")
            ->orderBy('id_gambar', 'DESC')
            ->get();
        return $query;
    }

    // listing
    public function listing()
    {
        $query = DB::table('gambar_struktur')
            ->join('users', 'users.id_user', '=', 'gambar_struktur.id_user', 'LEFT')
            ->select('gambar_struktur.*', 'gambar_struktur.slug_staff ', 'gambar_struktur.nama_staff ')
            ->where(array('gambar_struktur.status_staff' => 'gambar_struktur'))
            ->orderBy('id_gambar', 'DESC')
            ->paginate(12);
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('gambar_struktur')
            // ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'gambar_struktur.id_kategori_staff', 'LEFT')
            ->join('users', 'users.id_user', '=', 'gambar_struktur.id_user', 'LEFT')
            ->select('gambar_struktur.*')

            ->orderBy('id_gambar', 'DESC')
            ->limit(15)
            ->get();
        return $query;
    }


    // detail
    public function detail($id_gambar)
    {
        $query = DB::table('gambar_struktur')
            // ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'gambar_struktur.id_kategori_staff', 'LEFT')
            ->select('gambar_struktur.*')
            ->where('gambar_struktur.id_gambar', $id_gambar)
            ->orderBy('id_gambar', 'DESC')
            ->first();
        return $query;
    }

   
}

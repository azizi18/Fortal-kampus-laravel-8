<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class S1Rpl_model extends Model
{
    protected $table         = "s1_rpl";
    protected $primaryKey     = 'id_rpl';
    public $timestamps = false;

    protected $fillable = [
        
        'nidn',
        'nik_nip',
        'nama',
        'email',
       
    ];



    public function semua()
    {
        $query = DB::table('s1_rpl')
        ->join('users', 'users.id_user', '=', 's1_rpl.id_user', 'LEFT')
            ->select('s1_rpl.*', 's1_rpl.nidn', 's1_rpl.nik_nip', 's1_rpl.nama', 's1_rpl.email')
            ->orderBy('s1_rpl.id_rpl', 'DESC')
            ->get();
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('s1_rpl')
            ->join('users', 'users.id_user', '=', 's1_rpl.id_user', 'LEFT')
            ->select('s1_rpl.*', 's1_rpl.nidn', 's1_rpl.nik_nip', 's1_rpl.nama', 's1_rpl.email')
            ->orderBy('id_rpl', 'DESC')
            ->limit(15)
            ->get();
        return $query;
    }
    public function detail($id_rpl)
    {
        $query = DB::table('s1_rpl')
            ->join('users', 'users.id_user', '=', 's1_rpl.id_user', 'LEFT')
            ->select('s1_rpl.*', 's1_rpl.nidn', 's1_rpl.nik_nip', 's1_rpl.nama', 's1_rpl.email')
            ->where('s1_rpl.id_rpl', $id_rpl)
            ->orderBy('id_rpl', 'DESC')
            ->first();
        return $query;
    }


    // // listing
    public function cari($keywords)
    {
        $query = DB::table('s1_rpl')
             ->join('users', 'users.id_user', '=', 's1_rpl.id_user', 'LEFT')
             ->select('s1_rpl.*', 's1_rpl.nidn', 's1_rpl.nik_nip', 's1_rpl.nama', 's1_rpl.email')
            ->where('s1_rpl.nama', 'LIKE', "%{$keywords}%")
            ->orderBy('id_rpl', 'DESC')
            ->get();
        return $query;
    }

    // // listing
    // public function listing()
    // {
    //     $query = DB::table('instagram')
    //         ->join('kategori_instagram', 'kategori_instagram.id_kategori_instagram', '=', 'instagram.id_kategori_instagram', 'LEFT')
    //         ->select('instagram.*', 'kategori_instagram.slug_kategori_instagram', 'kategori_instagram.nama_kategori_instagram')
    //         ->where('status_instagram', 'Publish')
    //         ->orderBy('id_instagram', 'DESC')
    //         ->get();
    //     return $query;
    // }



    // // detail
    // public function read($slug_instagram)
    // {
    //     $query = DB::table('instagram')
    //         ->join('kategori_instagram', 'kategori_instagram.id_kategori_instagram', '=', 'instagram.id_kategori_instagram', 'LEFT')
    //         ->select('instagram.*', 'kategori_instagram.slug_kategori_instagram', 'kategori_instagram.nama_kategori_instagram')
    //         ->where('instagram.slug_instagram', $slug_instagram)
    //         ->orderBy('id_instagram', 'DESC')
    //         ->first();
    //     return $query;
    // }

    // // detail

    // Gambar
    // public function gambar($id_fasilitas)
    // {
    //     $query = DB::table('ilmu_komputer')
    //         ->select('*')
    //         ->where('gambar.id_fasilitas', $id_fasilitas)
    //         ->orderBy('id_fasilitas', 'DESC')
    //         ->get();
    //     return $query;
    // }
}

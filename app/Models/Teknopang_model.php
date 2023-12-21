<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Teknopang_model extends Model
{
    protected $table         = "teknologi_pangan";
    protected $primaryKey     = 'id_tp';
    public $timestamps = false;

    protected $fillable = [
        
        'nidn',
        'nik_nip',
        'nama',
        'email',
       
    ];



    public function semua()
    {
        $query = DB::table('teknologi_pangan')
        ->join('users', 'users.id_user', '=', 'teknologi_pangan.id_user', 'LEFT')
            ->select('teknologi_pangan.*', 'teknologi_pangan.nidn', 'teknologi_pangan.nik_nip', 'teknologi_pangan.nama', 'teknologi_pangan.email')
            ->orderBy('teknologi_pangan.id_tp', 'DESC')
            ->get();
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('teknologi_pangan')
            ->join('users', 'users.id_user', '=', 'teknologi_pangan.id_user', 'LEFT')
            ->select('teknologi_pangan.*', 'teknologi_pangan.nidn', 'teknologi_pangan.nik_nip', 'teknologi_pangan.nama', 'teknologi_pangan.email')
            ->orderBy('id_tp', 'DESC')
            ->limit(15)
            ->get();
        return $query;
    }
    public function detail($id_tp)
    {
        $query = DB::table('teknologi_pangan')
            ->join('users', 'users.id_user', '=', 'teknologi_pangan.id_user', 'LEFT')
            ->select('teknologi_pangan.*', 'teknologi_pangan.nidn', 'teknologi_pangan.nik_nip', 'teknologi_pangan.nama', 'teknologi_pangan.email')
            ->where('teknologi_pangan.id_tp', $id_tp)
            ->orderBy('id_tp', 'DESC')
            ->first();
        return $query;
    }


    // // listing
    public function cari($keywords)
    {
        $query = DB::table('teknologi_pangan')
             ->join('users', 'users.id_user', '=', 'teknologi_pangan.id_user', 'LEFT')
             ->select('teknologi_pangan.*', 'teknologi_pangan.nidn', 'teknologi_pangan.nik_nip', 'teknologi_pangan.nama', 'teknologi_pangan.email')
            ->where('teknologi_pangan.nama', 'LIKE', "%{$keywords}%")
            ->orderBy('id_tp', 'DESC')
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TeknologiInformasi_model extends Model
{
    protected $table         = "teknologi_informasi";
    protected $primaryKey     = 'id_ti';
    public $timestamps = false;

    protected $fillable = [
        
        'nidn',
        'nik_nip',
        'nama',
        'email',
       
    ];



    public function semua()
    {
        $query = DB::table('teknologi_informasi')
        ->join('users', 'users.id_user', '=', 'teknologi_informasi.id_user', 'LEFT')
            ->select('teknologi_informasi.*', 'teknologi_informasi.nidn', 'teknologi_informasi.nik_nip', 'teknologi_informasi.nama', 'teknologi_informasi.email')
            ->orderBy('teknologi_informasi.id_ti', 'DESC')
            ->get();
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('teknologi_informasi')
            ->join('users', 'users.id_user', '=', 'teknologi_informasi.id_user', 'LEFT')
            ->select('teknologi_informasi.*', 'teknologi_informasi.nidn', 'teknologi_informasi.nik_nip', 'teknologi_informasi.nama', 'teknologi_informasi.email')
            ->orderBy('id_ti', 'DESC')
            ->limit(15)
            ->get();
        return $query;
    }
    public function detail($id_ti)
    {
        $query = DB::table('teknologi_informasi')
            ->join('users', 'users.id_user', '=', 'teknologi_informasi.id_user', 'LEFT')
            ->select('teknologi_informasi.*', 'teknologi_informasi.nidn', 'teknologi_informasi.nik_nip', 'teknologi_informasi.nama', 'teknologi_informasi.email')
            ->where('teknologi_informasi.id_ti', $id_ti)
            ->orderBy('id_ti', 'DESC')
            ->first();
        return $query;
    }


    // // listing
    public function cari($keywords)
    {
        $query = DB::table('teknologi_informasi')
             ->join('users', 'users.id_user', '=', 'teknologi_informasi.id_user', 'LEFT')
             ->select('teknologi_informasi.*', 'teknologi_informasi.nidn', 'teknologi_informasi.nik_nip', 'teknologi_informasi.nama', 'teknologi_informasi.email')
            ->where('teknologi_informasi.nama', 'LIKE', "%{$keywords}%")
            ->orderBy('id_ti', 'DESC')
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pengumuman_model extends Model
{
    protected $table         = "pengumuman";
    protected $primaryKey     = 'id_pengumaman';

    // listing
    public function semua()
    {
        $query = DB::table('pengumuman')
            ->join('kategori', 'kategori.id_kategori', '=', 'pengumuman.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'pengumuman.id_user', 'LEFT')
            ->select('pengumuman.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->orderBy('id_pengumuman', 'DESC')
            ->paginate(25);
        return $query;
    }

    // listing
    public function pengumuman_update()
    {
        $query = DB::table('pengumuman')
            ->join('kategori', 'kategori.id_kategori', '=', 'pengumuman.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'pengumuman.id_user', 'LEFT')
            ->where('jenis_pengumuman', 'pengumuman')
            ->select('pengumuman.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->orderBy('id_pengumuman', 'DESC')
            ->paginate(25);
        return $query;
    }

    // author
    public function author($id_user)
    {
        $query = DB::table('pengumuman')
            ->join('kategori', 'kategori.id_kategori', '=', 'pengumuman.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'pengumuman.id_user', 'LEFT')
            ->select('pengumuman.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where('pengumuman.id_user', $id_user)
            ->orderBy('id_pengumuman', 'DESC')
            ->paginate(25);
        return $query;
    }

    public function status_pengumuman($status_pengumuman)
    {
        $query = DB::table('pengumuman')
             ->join('kategori', 'kategori.id_kategori', '=', 'pengumuman.id_kategori','LEFT')
            ->join('users', 'users.id_user', '=', 'pengumuman.id_user','LEFT')
            ->select('pengumuman.*', 'kategori.slug_kategori', 'kategori.nama_kategori','users.nama')
            ->where(array(  'pengumuman.status_pengumuman'         => $status_pengumuman))
            ->orderBy('id_pengumuman','DESC')
            ->paginate(25);
        return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('pengumuman')
            ->join('kategori', 'kategori.id_kategori', '=', 'pengumuman.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'pengumuman.id_user', 'LEFT')
            ->select('pengumuman.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where('pengumuman.judul_pengumuman', 'LIKE', "%{$keywords}%")
            ->orWhere('pengumuman.isi', 'LIKE', "%{$keywords}%")
            ->orderBy('id_pengumuman', 'DESC')
            ->paginate(25);
        return $query;
    }

    // kategori
    public function all_kategori($id_kategori)
    {
        $query = DB::table('pengumuman')
            ->join('kategori', 'kategori.id_kategori', '=', 'pengumuman.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'pengumuman.id_user', 'LEFT')
            ->select('pengumuman.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where(array('pengumuman.id_kategori'    => $id_kategori))
            ->orderBy('id_pengumuman', 'DESC')
            ->paginate(25);
        return $query;
    }

    // kategori


    // kategori
    public function jenis_pengumuman($jenis_pengumuman)
    {
        $query = DB::table('pengumuman')
            ->join('kategori', 'kategori.id_kategori', '=', 'pengumuman.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'pengumuman.id_user', 'LEFT')
            ->select('pengumuman.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where(array('pengumuman.jenis_pengumuman'         => $jenis_pengumuman))
            ->orderBy('id_pengumuman', 'DESC')
            ->paginate(25);
        return $query;
    }

    // kategori
    public function kategori_depan($id_kategori)
    {
        $query = DB::table('pengumuman')
            ->join('kategori', 'kategori.id_kategori', '=', 'pengumuman.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'pengumuman.id_user', 'LEFT')
            ->select('pengumuman.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where(array(
                'pengumuman.id_kategori'         => $id_kategori,
                'pengumuman.jenis_pengumuman'       => 'pengumuman',

            ))
            ->orderBy('id_pengumuman', 'DESC')
            ->paginate(12);
        return $query;
    }

    public function related_post()
    {
        $query = DB::table('pengumuman')
            ->join('kategori', 'kategori.id_kategori', '=', 'pengumuman.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'pengumuman.id_user', 'LEFT')
            ->select('pengumuman.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where('id_pengumuman', '!=', $this->id_pengumuman)
            ->inRandomOrder() // Ambil posting terkait secara acak
            ->take(3) // Ambil 3 posting terkait
            ->get();
        return $query;
    }

    // listing
    public function listing()
    {
        $query = DB::table('pengumuman')
            ->join('kategori', 'kategori.id_kategori', '=', 'pengumuman.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'pengumuman.id_user', 'LEFT')
            ->select('pengumuman.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where(array('pengumuman.jenis_pengumuman' => 'pengumuman'))
            ->orderBy('id_pengumuman', 'DESC')
            ->get();
        return $query;
    }

    // listing
    public function home()
    {
        $query = DB::table('pengumuman')
            ->join('kategori', 'kategori.id_kategori', '=', 'pengumuman.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'pengumuman.id_user', 'LEFT')
            ->select('pengumuman.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where(array('pengumuman.jenis_pengumuman' => 'pengumuman'))
            ->orderBy('id_pengumuman', 'DESC')
            ->limit(6)
            ->get();
        return $query;
    }

    // detail
    public function read($slug_pengumuman)
    {
        $query = DB::table('pengumuman')
            ->join('kategori', 'kategori.id_kategori', '=', 'pengumuman.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'pengumuman.id_user', 'LEFT')
            ->select('pengumuman.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where('pengumuman.slug_pengumuman', $slug_pengumuman)
            ->orderBy('id_pengumuman', 'DESC')
            ->first();
        return $query;
    }
     
     public function like($like)
     {
         $query = DB::table('pengumuman')
             ->join('users', 'users.id_user', '=', 'pengumuman.id_user', 'LEFT')
             ->select('pengumuman.*')
             ->where('pengumuman.like', $like)
             ->orderBy('id_pengumuman', 'DESC')
             ->first();
         return $query;
     }

    // detail
    public function detail($id_pengumuman)
    {
        $query = DB::table('pengumuman')
            ->join('kategori', 'kategori.id_kategori', '=', 'pengumuman.id_kategori', 'LEFT')
            ->join('users', 'users.id_user', '=', 'pengumuman.id_user', 'LEFT')
            ->select('pengumuman.*', 'kategori.slug_kategori', 'kategori.nama_kategori', 'users.nama')
            ->where('pengumuman.id_pengumuman', $id_pengumuman)
            ->orderBy('id_pengumuman', 'DESC')
            ->first();
        return $query;
    }
}

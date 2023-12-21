<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Prodi_model extends Model
{

    protected $table         = "prodi_staff";
    protected $primaryKey     = 'id_staff';

    // listing
    public function semua()
    {
        $query = DB::table('prodi_staff')
            ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'prodi_staff.id_kategori_staff', 'LEFT')
            ->select('prodi_staff.*', 'kategori_staff.slug_kategori_staff', 'kategori_staff.nama_kategori_staff')
            ->orderBy('prodi_staff.id_staff', 'DESC')
            ->get();
        return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('prodi_staff')
            ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'prodi_staff.id_kategori_staff', 'LEFT')
            ->select('prodi_staff.*', 'kategori_staff.slug_kategori_staff', 'kategori_staff.nama_kategori_staff')
            ->where('prodi_staff.nama_staff', 'LIKE', "%{$keywords}%")
            ->orWhere('prodi_staff.isi', 'LIKE', "%{$keywords}%")
            ->orderBy('id_staff', 'DESC')
            ->get();
        return $query;
    }

    // listing
    public function listing()
    {
        $query = DB::table('prodi_staff')
            ->join('users', 'users.id_user', '=', 'prodi_staff.id_user', 'LEFT')
            ->select('prodi_staff.*', 'prodi_staff.slug_staff ', 'prodi_staff.nama_staff ')
            ->where(array('prodi_staff.status_staff' => 'prodi_staff'))
            ->orderBy('id_staff', 'DESC')
            ->paginate(12);
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('prodi_staff')
            ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'prodi_staff.id_kategori_staff', 'LEFT')
            ->join('users', 'users.id_user', '=', 'prodi_staff.id_user', 'LEFT')
            ->select('prodi_staff.*', 'kategori_staff.slug_kategori_staff', 'kategori_staff.nama_kategori_staff', 'users.nama')

            ->orderBy('id_staff', 'DESC')
            ->limit(15)
            ->get();
        return $query;
    }

    // kategori
    public function kategori_staff($id_kategori_staff)
    {
        $query = DB::table('prodi_staff')
            ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'prodi_staff.id_kategori_staff', 'LEFT')
            ->select('prodi_staff.*', 'kategori_staff.slug_kategori_staff', 'kategori_staff.nama_kategori_staff')
            ->where(array(
                'prodi_staff.status_staff'         => 'Publish',
                'prodi_staff.id_kategori_staff'    => $id_kategori_staff
            ))
            ->orderBy('id_staff', 'DESC')
            ->get();
        return $query;
    }

    // Kategori
    public function kategori()
    {
        $query = DB::table('prodi_staff')
            ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'prodi_staff.id_kategori_staff')
            ->select('prodi_staff.*', 'kategori_staff.slug_kategori_staff', 'kategori_staff.nama_kategori_staff')
            ->where(array('prodi_staff.status_staff'         => 'Publish'))
            ->groupBy('prodi_staff.id_kategori_staff')
            ->orderBy('kategori_staff.urutan', 'ASC')
            ->get();
        return $query;
    }
    public function kategori_depan($id_kategori_staff)
    {
        $query = DB::table('prodi_staff')
            ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'prodi_staff.id_kategori_staff', 'LEFT')
            ->join('users', 'users.id_user', '=', 'prodi_staff.id_user', 'LEFT')
            ->select('prodi_staff.*', 'kategori_staff.slug_staff', 'kategori_staff.nama_kategori_staff', 'users.nama')
            ->where(array(
                'prodi_staff.id_kategori_staff'    => $id_kategori_staff,
               
            ))
            ->orderBy('id_staff', 'DESC')
            ->paginate(4);
        return $query;
    }


    // kategori
    public function all_kategori_staff($id_kategori_staff)
    {
        $query = DB::table('prodi_staff')
            ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'prodi_staff.id_kategori_staff', 'LEFT')
            ->select('prodi_staff.*', 'kategori_staff.slug_kategori_staff', 'kategori_staff.nama_kategori_staff')
            ->where(array('prodi_staff.id_kategori_staff'    => $id_kategori_staff))
            ->orderBy('id_staff', 'DESC')
            ->get();
        return $query;
    }

    // kategori
    public function status_staff($status_staff)
    {
        $query = DB::table('prodi_staff')
            ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'prodi_staff.id_kategori_staff', 'LEFT')
            ->select('prodi_staff.*', 'kategori_staff.slug_kategori_staff', 'kategori_staff.nama_kategori_staff')
            ->where(array('prodi_staff.status_staff'         => $status_staff))
            ->orderBy('id_staff', 'DESC')
            ->get();
        return $query;
    }

    // kategori
    public function detail_kategori_staff($id_kategori_staff)
    {
        $query = DB::table('prodi_staff')
            ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'prodi_staff.id_kategori_staff', 'LEFT')
            ->select('prodi_staff.*', 'kategori_staff.slug_kategori_staff', 'kategori_staff.nama_kategori_staff')
            ->where(array(
                'prodi_staff.status_staff'         => 'Publish',
                'prodi_staff.id_kategori_staff'    => $id_kategori_staff
            ))
            ->orderBy('id_staff', 'DESC')
            ->first();
        return $query;
    }

    // kategori
    public function detail_slug_kategori_staff($slug_kategori_staff)
    {
        $query = DB::table('prodi_staff')
            ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'prodi_staff.id_kategori_staff', 'LEFT')
            ->select('prodi_staff.*', 'kategori_staff.slug_kategori_staff', 'kategori_staff.nama_kategori_staff')
            ->where(array(
                'prodi_staff.status_staff'                  => 'Publish',
                'kategori_staff.slug_kategori_staff'  => $slug_kategori_staff
            ))
            ->orderBy('id_staff', 'DESC')
            ->first();
        return $query;
    }


    // kategori
    public function slug_kategori_staff($slug_kategori_staff)
    {
        $query = DB::table('prodi_staff')
            ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'prodi_staff.id_kategori_staff', 'LEFT')
            ->select('prodi_staff.*', 'kategori_staff.slug_kategori_staff', 'kategori_staff.nama_kategori_staff')
            ->where(array(
                'prodi_staff.status_staff'                  => 'Publish',
                'kategori_staff.slug_kategori_staff'  => $slug_kategori_staff
            ))
            ->orderBy('id_staff', 'DESC')
            ->get();
        return $query;
    }

    // detail
    public function read($slug_staff)
    {
        $query = DB::table('prodi_staff')
            ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'prodi_staff.id_kategori_staff', 'LEFT')
            ->select('prodi_staff.*', 'kategori_staff.slug_kategori_staff', 'kategori_staff.nama_kategori_staff')
            ->where('prodi_staff.slug_staff', $slug_staff)
            ->orderBy('id_staff', 'DESC')
            ->first();
        return $query;
    }

    // detail
    public function detail($id_staff)
    {
        $query = DB::table('prodi_staff')
            ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'prodi_staff.id_kategori_staff', 'LEFT')
            ->select('prodi_staff.*', 'kategori_staff.slug_kategori_staff', 'kategori_staff.nama_kategori_staff')
            ->where('prodi_staff.id_staff', $id_staff)
            ->orderBy('id_staff', 'DESC')
            ->first();
        return $query;
    }

    // Gambar
    public function gambar($id_staff)
    {
        $query = DB::table('gambar_staff')
            ->select('*')
            ->where('gambar_staff.id_staff', $id_staff)
            ->orderBy('id_staff', 'DESC')
            ->get();
        return $query;
    }
}

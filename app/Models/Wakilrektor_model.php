<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Wakilrektor_model extends Model
{

    protected $table         = "wakilrektor_staff";
    protected $primaryKey     = 'id_staff';

    // listing
    public function semua()
    {
        $query = DB::table('wakilrektor_staff')
            // ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'wakilrektor_staff.id_kategori_staff', 'LEFT')
            ->select('wakilrektor_staff.*')
            ->orderBy('wakilrektor_staff.id_staff', 'DESC')
            ->get();
        return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('wakilrektor_staff')
            // ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'wakilrektor_staff.id_kategori_staff', 'LEFT')
            ->select('wakilrektor_staff.*')
            ->where('wakilrektor_staff.nama_staff', 'LIKE', "%{$keywords}%")
            ->orWhere('wakilrektor_staff.isi', 'LIKE', "%{$keywords}%")
            ->orderBy('id_staff', 'DESC')
            ->get();
        return $query;
    }

    // listing
    public function listing()
    {
        $query = DB::table('wakilrektor_staff')
            ->join('users', 'users.id_user', '=', 'wakilrektor_staff.id_user', 'LEFT')
            ->select('wakilrektor_staff.*', 'wakilrektor_staff.slug_staff ', 'wakilrektor_staff.nama_staff ')
            ->where(array('wakilrektor_staff.status_staff' => 'Staff'))
            ->orderBy('id_staff', 'DESC')
            ->paginate(12);
        return $query;
    }
    // listing
    public function home()
    {
        $query = DB::table('wakilrektor_staff')
            // ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'wakilrektor_staff.id_kategori_staff', 'LEFT')
            ->join('users', 'users.id_user', '=', 'wakilrektor_staff.id_user', 'LEFT')
            ->select('wakilrektor_staff.*')

            ->orderBy('id_staff', 'DESC')
            ->limit(15)
            ->get();
        return $query;
    }

    // kategori
    // public function kategori_staff($id_kategori_staff)
    // {
    //     $query = DB::table('wakilrektor_staff')
    //         ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'wakilrektor_staff.id_kategori_staff', 'LEFT')
    //         ->select('wakilrektor_staff.*', 'kategori_staff.slug_kategori_staff', 'kategori_staff.nama_kategori_staff')
    //         ->where(array(
    //             'wakilrektor_staff.status_staff'         => 'Publish',
    //             'wakilrektor_staff.id_kategori_staff'    => $id_kategori_staff
    //         ))
    //         ->orderBy('id_staff', 'DESC')
    //         ->get();
    //     return $query;
    // }

    // // Kategori
    // public function kategori()
    // {
    //     $query = DB::table('wakilrektor_staff')
    //         ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'wakilrektor_staff.id_kategori_staff')
    //         ->select('wakilrektor_staff.*', 'kategori_staff.slug_kategori_staff', 'kategori_staff.nama_kategori_staff')
    //         ->where(array('wakilrektor_staff.status_staff'         => 'Publish'))
    //         ->groupBy('wakilrektor_staff.id_kategori_staff')
    //         ->orderBy('kategori_staff.urutan', 'ASC')
    //         ->get();
    //     return $query;
    // }
    // public function kategori_depan($id_kategori_staff)
    // {
    //     $query = DB::table('wakilrektor_staff')
    //         ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'wakilrektor_staff.id_kategori_staff', 'LEFT')
    //         ->join('users', 'users.id_user', '=', 'wakilrektor_staff.id_user', 'LEFT')
    //         ->select('wakilrektor_staff.*', 'kategori_staff.slug_staff', 'kategori_staff.nama_kategori_staff', 'users.nama')
    //         ->where(array(
    //             'wakilrektor_staff.id_kategori_staff'    => $id_kategori_staff,
               
    //         ))
    //         ->orderBy('id_staff', 'DESC')
    //         ->paginate(4);
    //     return $query;
    // }


    // // kategori
    // public function all_kategori_staff($id_kategori_staff)
    // {
    //     $query = DB::table('wakilrektor_staff')
    //         ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'wakilrektor_staff.id_kategori_staff', 'LEFT')
    //         ->select('wakilrektor_staff.*', 'kategori_staff.slug_kategori_staff', 'kategori_staff.nama_kategori_staff')
    //         ->where(array('wakilrektor_staff.id_kategori_staff'    => $id_kategori_staff))
    //         ->orderBy('id_staff', 'DESC')
    //         ->get();
    //     return $query;
    // }

    // kategori
    public function status_staff($status_staff)
    {
        $query = DB::table('wakilrektor_staff')
            // ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'wakilrektor_staff.id_kategori_staff', 'LEFT')
            ->select('wakilrektor_staff.*')
            ->where(array('wakilrektor_staff.status_staff'         => $status_staff))
            ->orderBy('id_staff', 'DESC')
            ->get();
        return $query;
    }

    // // kategori
    // public function detail_kategori_staff($id_kategori_staff)
    // {
    //     $query = DB::table('wakilrektor_staff')
    //         ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'wakilrektor_staff.id_kategori_staff', 'LEFT')
    //         ->select('wakilrektor_staff.*', 'kategori_staff.slug_kategori_staff', 'kategori_staff.nama_kategori_staff')
    //         ->where(array(
    //             'wakilrektor_staff.status_staff'         => 'Publish',
    //             'wakilrektor_staff.id_kategori_staff'    => $id_kategori_staff
    //         ))
    //         ->orderBy('id_staff', 'DESC')
    //         ->first();
    //     return $query;
    // }

    // // kategori
    // public function detail_slug_kategori_staff($slug_kategori_staff)
    // {
    //     $query = DB::table('wakilrektor_staff')
    //         ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'wakilrektor_staff.id_kategori_staff', 'LEFT')
    //         ->select('wakilrektor_staff.*', 'kategori_staff.slug_kategori_staff', 'kategori_staff.nama_kategori_staff')
    //         ->where(array(
    //             'wakilrektor_staff.status_staff'                  => 'Publish',
    //             'kategori_staff.slug_kategori_staff'  => $slug_kategori_staff
    //         ))
    //         ->orderBy('id_staff', 'DESC')
    //         ->first();
    //     return $query;
    // }


    // // kategori
    // public function slug_kategori_staff($slug_kategori_staff)
    // {
    //     $query = DB::table('wakilrektor_staff')
    //         ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'wakilrektor_staff.id_kategori_staff', 'LEFT')
    //         ->select('wakilrektor_staff.*', 'kategori_staff.slug_kategori_staff', 'kategori_staff.nama_kategori_staff')
    //         ->where(array(
    //             'wakilrektor_staff.status_staff'                  => 'Publish',
    //             'kategori_staff.slug_kategori_staff'  => $slug_kategori_staff
    //         ))
    //         ->orderBy('id_staff', 'DESC')
    //         ->get();
    //     return $query;
    // }

    // // detail
    // public function read($slug_staff)
    // {
    //     $query = DB::table('wakilrektor_staff')
    //         ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'wakilrektor_staff.id_kategori_staff', 'LEFT')
    //         ->select('wakilrektor_staff.*', 'kategori_staff.slug_kategori_staff', 'kategori_staff.nama_kategori_staff')
    //         ->where('wakilrektor_staff.slug_staff', $slug_staff)
    //         ->orderBy('id_staff', 'DESC')
    //         ->first();
    //     return $query;
    // }

    // detail
    public function detail($id_staff)
    {
        $query = DB::table('wakilrektor_staff')
            // ->join('kategori_staff', 'kategori_staff.id_kategori_staff', '=', 'wakilrektor_staff.id_kategori_staff', 'LEFT')
            ->select('wakilrektor_staff.*')
            ->where('wakilrektor_staff.id_staff', $id_staff)
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

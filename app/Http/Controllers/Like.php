<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Like extends Controller
{
    public function toggleLike( $id_pengumuman)
    {
        $user = DB::table('users')->first();
      
        $liked = DB::table('likes')
            ->where('id_user', $user->id_user)
            ->where('id_pengumuman', $id_pengumuman)
            ->exists();

        if ($liked) {
            // Unlike
            DB::table('likes')
                ->where('id_user', $user->id_user)
                ->where('id_pengumuman', $id_pengumuman)
                ->delete();

            DB::table('pengumuman')
                ->where('id_pengumuman', $id_pengumuman)
                ->decrement('likes');
        } else {
            // Like
            DB::table('likes')->insert([
                'id_user' => $user->id_user,
                'id_pengumuman' => $id_pengumuman,
            ]);

            DB::table('pengumuman')
                ->where('id_pengumuman', $id_pengumuman)
                ->increment('likes');
        }

        return redirect()->back();
    }
}

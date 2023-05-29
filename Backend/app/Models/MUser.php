<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MUser extends Model
{
    // mengambil semua data buku
    function viewData()
    {
        $query = DB::table('tb_buku')
        ->select("judul_buku AS judul","no_panggil","pengarang AS nama_pengarang","penerbit","deskripsi_fisik AS des_fisik","bahasa","isbn/issn","edisi","deskripsi_buku AS des_buku")
        ->orderBy("judul_buku")
        ->get();

        return $query;
    }
}

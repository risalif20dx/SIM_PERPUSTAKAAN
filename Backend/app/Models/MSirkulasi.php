<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MSirkulasi extends Model
{
    function viewData()
    {
        $query = DB::table('tb_sirkulasi')
        ->select("no_panggil", "id_anggota", "id_pustakawan", "waktu_pinjam", "waktu_kembali" )
        ->get();

        return $query;
    }

    function detailData($parameter)
    {
        $query = DB::table('tb_sirkulasi')
        ->select("no_panggil", "id_anggota", "id_pustakawan", "waktu_pinjam", "waktu_kembali" )
        ->where("no_panggil", "=", $parameter)
        ->orwhere("id_anggota", "=", $parameter)
        ->orwhere("id_pustakawan", "=", $parameter)
        ->get();

        return $query;
    }

    function deleteData($parameter)
    {
        $deleted = DB::table('tb_sirkulasi')
        ->where("no_panggil", "=", $parameter)
        ->orwhere("id_anggota", "=", $parameter)
        ->orwhere("id_pustakawan", "=", $parameter)
        ->delete();
    }

    function cekData($no_panggil, $id_anggota)
    {
        $query = DB::table('tb_sirkulasi')
        ->select("no_panggil", "id_anggota" )
        ->where("no_panggil", "=", $no_panggil)
        ->where("id_anggota", "=", $id_anggota)
        ->get();

        return $query;
    }

    function saveData($no_panggil, $id_anggota, $id_pustakawan, $waktu_pinjam)
    {
        $query = DB::table('tb_sirkulasi')
        ->insert([
            "no_panggil" => $no_panggil,
            "id_anggota" => $id_anggota,
            "id_pustakawan" => $id_pustakawan,
            "waktu_pinjam" => $waktu_pinjam
        ]);
    }

    function updateData($no_panggil, $id_anggota, $id_pustakawan, $waktu_pinjam, $waktu_kembali, $parameter)
    {
        $query = DB::table('tb_sirkulasi')
        ->where("no_panggil", "=", $parameter)
        ->orwhere("id_anggota", "=", $parameter)
        ->update([
            "no_panggil" => $no_panggil,
            "id_anggota" => $id_anggota,
            "id_pustakawan" => $id_pustakawan,
            "waktu_pinjam" => $waktu_pinjam,
            "waktu_kembali" => $waktu_kembali
        ]);
    }
}


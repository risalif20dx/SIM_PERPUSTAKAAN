<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MAnggota extends Model
{

    function view()
    {
        $query = DB::table('tb_anggota')
        ->select("nama","no_identitas", "status", "jabatan", "email", "alamat", "no_telepon")
        ->orderBy("nama")
        ->get();

        return $query;
    }

    function detailAnggota($parameter)
    {
        $query = DB::table('tb_anggota')
        ->select("nama","no_identitas", "status", "jabatan", "email", "alamat", "no_telepon")
        ->where("no_identitas", "=", $parameter)
        // tambakkan decode base64 nanti
        ->get();

        return $query;
    }

    function deleteAnggota($parameter)
    {
        $deleted = DB::table('tb_anggota')
        ->where("no_identitas", "=", $parameter)
        ->delete();
    }

    function saveData($nama, $no_identitas, $status, $jabatan, $email, $alamat, $no_telepon, $pass)
    {
        $query = DB::table('tb_anggota')
        ->insert([
            "nama" => $nama,
            "no_identitas" => $no_identitas,
            "status" => $status,
            "jabatan" => $jabatan,
            "email" => $email,
            "alamat" => $alamat,
            "no_telepon" => $no_telepon,
            "pass" => $pass
        ]);
    }

    function cekUpdate($parameter, $no_identitas)
    {
        // cari data 
        $query = DB::table('tb_anggota')
        ->select("no_identitas")
        ->where("no_identitas", "=", $no_identitas)
        //->whereRaw("TO_BASE64(nik) != '$nik_lama'")
        ->where("no_identitas", "!=", $parameter)
        ->get();
        // cara baca : cari data pada tb_buku dimana no_identitas tidak sama dengan parameter dan no_identitas sama dengan no_identitas baru 
        // jika ada maka bernilai 1 jika tidak bernila 0

        return $query;
    }

    function updateData($nama, $no_identitas, $status, $jabatan, $email, $alamat, $no_telepon, $pass, $parameter)
    {
        $query = DB::table('tb_anggota')
        ->where("no_identitas", "=", $parameter)
        ->update([
            "nama" => $nama,
            "no_identitas" => $no_identitas,
            "status" => $status,
            "jabatan" => $jabatan,
            "email" => $email,
            "alamat" => $alamat,
            "no_telepon" => $no_telepon,
            "pass" => $pass
        ]);
    }
}
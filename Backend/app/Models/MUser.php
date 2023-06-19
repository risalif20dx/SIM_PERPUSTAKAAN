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
        ->select("judul_buku AS judul","no_panggil","pengarang AS nama_pengarang","penerbit","deskripsi_fisik AS des_fisik","bahasa","isbn_issn","edisi","deskripsi_buku AS des_buku","sampul")
        ->orderBy("judul_buku")
        ->get();

        return $query;
    }

    // membuat fungsi untuk get buku berdasarkan no panggil
    function detailBuku($parameter)
    {
        $query = DB::table('tb_buku')
        ->select("judul_buku AS judul","no_panggil","pengarang AS nama_pengarang","penerbit","deskripsi_fisik AS des_fisik","bahasa","isbn_issn","edisi","deskripsi_buku AS des_buku","sampul")
        ->where("no_panggil", "=", $parameter)
        // tambakkan decode base64 nanti
        ->get();

        return $query;
    }

    function deleteBuku($parameter)
    {
        $deleted = DB::table('tb_buku')
        ->where("no_panggil", "=", $parameter)
        ->delete();
    }

    function saveData($no_panggil, $judul_buku, $pengarang, $penerbit, $deskripsi_fisik, $bahasa, $isbn_issn, $edisi, $deskripsi_buku, $sampul, $tahun_terbit, $jumlah)
    {
        DB::table('tb_buku')
        ->insert([
            "no_panggil" => $no_panggil,
            "judul_buku" => $judul_buku, 
            "pengarang" => $pengarang,
            "penerbit" => $penerbit,
            "deskripsi_fisik" => $deskripsi_fisik,
            "bahasa" => $bahasa, 
            "isbn_issn" => $isbn_issn,
            "edisi" => $edisi, 
            "deskripsi_buku" => $deskripsi_buku,
            "sampul" => $sampul,
            "tahun_terbit" => $tahun_terbit,
            "jumlah" => $jumlah
        ]);    
    }

    function cekUpdate($parameter, $no_panggil)
    {
        // cari data 
        $query = DB::table('tb_buku')
        ->select("no_panggil")
        ->where("no_panggil", "=", $no_panggil)
        //->whereRaw("TO_BASE64(nik) != '$nik_lama'")
        ->where("no_panggil", "!=", $parameter)
        ->get();
        // cara baca : cari data pada tb_buku dimana no_panggil tidak sama dengan parameter dan no_panggil sama dengan no_panggil baru 
        // jika ada maka bernilai 1 jika tidak bernila 0

        return $query;
    }

    function updateData($no_panggil, $judul_buku, $pengarang, $penerbit, $deskripsi_fisik, $bahasa, $isbn_issn, $edisi, $deskripsi_buku, $sampul, $parameter)
    {
        $query = DB::table('tb_buku')
        ->where("no_panggil", "=", $parameter)
        ->update([
            "no_panggil" => $no_panggil,
            "judul_buku" => $judul_buku, 
            "pengarang" => $pengarang,
            "penerbit" => $penerbit,
            "deskripsi_fisik" => $deskripsi_fisik,
            "bahasa" => $bahasa, 
            "isbn_issn" => $isbn_issn,
            "edisi" => $edisi, 
            "deskripsi_buku" => $deskripsi_buku,
            "sampul" => $sampul
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\MUser;
use Illuminate\Http\Request;

class User extends Controller
{
    function __construct()
    {
        $this->model = new MUser();
    }

    function view()
    {
        $data = $this->model->viewData();

        return response([
            "buku" => $data
        ],http_response_code());
    }

    function detail($parameter)
    {
        $data = $this->model->detailBuku($parameter);

        return response([
            "buku" => $data
        ],http_response_code());
    }

    // fungsi hapus data
    function delete($parameter)
    {
        // cek data dari tb_buku(no_panggil)
        $data = $this->model->detailBuku($parameter);

        // jika data ditemukan
        if (count($data) == 1) {
            // lakukan penghapusan data
            $this->model->deleteBuku($parameter);
            // buat pesan dan status hasil penghapusan data
            $status = 1;
            $pesan = "Data Berhasil dihapus";
        }
        // jika data tidak ditemukan
        else {
            // tampilkan pesan gagal di hapus
            $status = 0;
            $pesan = "Data Gagal dihapus ! (NIK Tidak ditemukan !)";
        }

        return response([
            "status" => $status,
            "pesan" => $pesan
        ],http_response_code());
    }

    function insert(Request $req)
    {
        // menampung data dari hasil input
        $data = array(
            "no_panggil" => $req->no_panggil,
            "judul_buku" => $req->judul_buku, 
            "pengarang" => $req->pengarang,
            "penerbit" => $req->penerbit,
            "deskripsi_fisik" => $req->deskripsi_fisik,
            "bahasa" => $req->bahasa, 
            "isbn_issn" => $req->isbn_issn,
            "edisi" => $req->edisi, 
            "deskripsi_buku" => $req->deskripsi_buku,
            "sampul" => $req->sampul,
            "tahun_terbit" =>$req->tahun_terbit,
            "jumlah" =>$req->jumlah
        );

        // cek data pada database
        $cek = $this->model->detailBuku($data["no_panggil"]);

        // jika data tidak ditemukan
        if (count($cek) == 0) {
            // ubah data
            $this->model->saveData(
                $data["no_panggil"],
                $data["judul_buku"],
                $data["pengarang"],
                $data["penerbit"],
                $data["deskripsi_fisik"],
                $data["bahasa"],
                $data["isbn_issn"],
                $data["edisi"],
                $data["deskripsi_buku"],
                $data["sampul"],
                $data["tahun_terbit"],
                $data["jumlah"]
            );
            // tampilkan pesan dan status
            $status = 1;
            $pesan = "Data Berhasil Ditambah";
        }
        // jika data tidak ditemukan
        else {
            // tampilkan pesan
            $status = 0;
            $pesan = "Data Gagal Ditambah(No Panggil Sudah Ada)";
        }

         return response([
            "status" => $status,
            "pesan" => $pesan
        ],http_response_code());
    }

    function update($parameter, Request $req)
    {
        // menampung data dari hasil input
        $data = array(
            "no_panggil" => $req->no_panggil,
            "judul_buku" => $req->judul_buku, 
            "pengarang" => $req->pengarang,
            "penerbit" => $req->penerbit,
            "deskripsi_fisik" => $req->deskripsi_fisik,
            "bahasa" => $req->bahasa, 
            "isbn_issn" => $req->isbn_issn,
            "edisi" => $req->edisi, 
            "deskripsi_buku" => $req->deskripsi_buku,
            "sampul" => $req->sampul
        );

        // cek data pada database
        $cek = $this->model->cekUpdate($parameter, $data["no_panggil"]);

        // jika data tidak ditemukan
        if (count($cek) == 0) {
            // ubah data
            $this->model->updateData(
                $data["no_panggil"],
                $data["judul_buku"],
                $data["pengarang"],
                $data["penerbit"],
                $data["deskripsi_fisik"],
                $data["bahasa"],
                $data["isbn_issn"],
                $data["edisi"],
                $data["deskripsi_buku"],
                $data["sampul"],
                $parameter
            );
            // tampilkan pesan dan status
            $status = 1;
            $pesan = "Data Berhasil Diubah";
        }
        // jika data tidak ditemukan
        else {
            // tampilkan pesan
            $status = 0;
            $pesan = "Data Gagal Diubah(NIK Sudah Ada)";
        }

         return response([
            "status" => $status,
            "pesan" => $pesan
        ],http_response_code());
    }
}

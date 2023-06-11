<?php 

namespace App\Http\Controllers;

use App\Models\MSirkulasi;
use Illuminate\Http\Request;

class Sirkulasi extends Controller
{
    function __construct()
    {
        $this->model = new MSirkulasi();
    }

    function view()
    {
        // tampung data dari dataBase
        $data = $this->model->viewData();

        // kirimkan data
        return response([
            "data_sirkulasi" => $data
        ], http_response_code());
    }

    function detail($parameter)
    {
        $data = $this->model->detailData($parameter);

         // kirimkan data
        return response([
            "data_sirkulasi" => $data
        ], http_response_code());
    }

    function delete($parameter)
    {
        // cek data sebelum dihapus
        $data = $this->model->detailData($parameter);

        // jika ada maka hapus
        if (count($data) >= 1) {
            // lakukan penghapusan data
            $data = $this->model->deleteData($parameter);

            // buat respon status
            $status = 1;
            $pesan = "Data Berhasil dihapus";
        } else {
             // tampilkan pesan gagal di hapus
            $status = 0;
            $pesan = "Data Gagal dihapus ! (data Tidak ditemukan !)";
        }

        return response([
            "status" => $status,
            "pesan" => $pesan
        ],http_response_code());
    }

    function insert(Request $req)
    {
        // tampung dahulu data dari request
        $data = [
            "no_panggil" => $req->no_panggil,
            "id_anggota" => $req->id_anggota,
            "id_pustakawan" => $req->id_pustakawan,
            "waktu_pinjam" => $req->waktu_pinjam
        ];

        // cek data apakah data sudah ada pada database
        $cek = $this->model->cekData($data["no_panggil"], $data["id_anggota"]);
        
        if (count($cek) >=1)
        {
            $status = 0;
            $pesan = "Data Sudah ada";
        } else {

            $this->model->saveData(
                $data['no_panggil'],
                $data['id_anggota'],
                $data['id_pustakawan'],
                $data['waktu_pinjam']
            );

            $status = 1;
            $pesan = "Data Berhasil disimpan";
        }

        return response([
            // "data_sirkulasi" => $cek
            "status" => $status,
            "pesan" => $pesan
        ], http_response_code());
    }

    function update($parameter, Request $req)
    {
        // tampung dahulu data dari request
        $data = [
            "no_panggil" => $req->no_panggil,
            "id_anggota" => $req->id_anggota,
            "id_pustakawan" => $req->id_pustakawan,
            "waktu_pinjam" => $req->waktu_pinjam,
            "waktu_kembali" => $req->waktu_kembali
        ];

        $data = $this->model->detailData($parameter);

        // jika ada maka hapus
        if (count($data) >= 1) {
            // lakukan penghapusan data
            //$data = $this->model->deleteData($parameter);

            // buat respon status
            $status = 1;
            $pesan = "Data ada";
        } else {
             // tampilkan pesan gagal di hapus
            $status = 0;
            $pesan = "Data tidak ada";
        }

        return response([
            "status" => $status,
            "pesan" => $pesan
        ],http_response_code());
    }
}
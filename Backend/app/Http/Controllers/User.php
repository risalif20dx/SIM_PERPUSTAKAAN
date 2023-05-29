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
}

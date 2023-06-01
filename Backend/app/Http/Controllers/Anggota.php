<?php

namespace App\Http\Controllers;

use App\Models\MAnggota;
use Illuminate\Http\Request;

class Anggota extends Controller
{
    function __construct()
    {
        $this->model = new MAnggota();
    }

    function view()
    {
        // arahkan pada method view pada model anggota
        $data = $this->model->view();
        
        // kirimkan respon
        return response([
            // isi respon berasal dari $data 
            "anggota" => $data
        ],http_response_code()); 
    }

    function detail($parameter)
    {
         $data = $this->model->detailAnggota($parameter);

        return response([
            "anggota" => $data
        ],http_response_code());
    }
    
    function delete($parameter)
    {
        // cek data dari tb_buku(no_identitas)
        $data = $this->model->detailAnggota($parameter);

        // jika data ditemukan
        if (count($data) == 1) {
            // lakukan penghapusan data
            $this->model->deleteAnggota($parameter);
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
            "nama" => $req->nama,
            "no_identitas" => $req->no_identitas,
            "status" => $req->status,
            "jabatan" => $req->jabatan,
            "email" => $req->email,
            "alamat" => $req->alamat,
            "no_telepon" => $req->no_telepon
        );

        // cek data pada database
        $cek = $this->model->detailAnggota($data["no_identitas"]);

        // jika data tidak ditemukan
        if (count($cek) == 0) {
            // ubah data
            $this->model->saveData(
                $data["nama"],
                $data["no_identitas"],
                $data["status"],
                $data["jabatan"],
                $data["email"],
                $data["alamat"],
                $data["no_telepon"]
            );
            // tampilkan pesan dan status
            $status = 1;
            $pesan = "Data Berhasil Ditambah";
        }
        // jika data tidak ditemukan
        else {
            // tampilkan pesan
            $status = 0;
            $pesan = "Data Gagal Ditambah(No identitas Sudah Ada)";
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
            "nama" => $req->nama,
            "no_identitas" => $req->no_identitas,
            "status" => $req->status,
            "jabatan" => $req->jabatan,
            "email" => $req->email,
            "alamat" => $req->alamat,
            "no_telepon" => $req->no_telepon
        );

        // cek data pada database
        $cek = $this->model->cekUpdate($parameter, $data["no_identitas"]);

        // jika data tidak ditemukan
        if (count($cek) == 0) {
            // ubah data
            $this->model->updateData(
                $data["nama"],
                $data["no_identitas"],
                $data["status"],
                $data["jabatan"],
                $data["email"],
                $data["alamat"],
                $data["no_telepon"],
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
            $pesan = "Data Gagal Diubah(No Identittas Sudah Ada)";
        }

         return response([
            "status" => $status,
            "pesan" => $pesan
        ],http_response_code());
    }

}
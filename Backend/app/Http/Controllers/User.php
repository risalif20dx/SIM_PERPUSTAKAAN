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
        $this->model = new MUser();
        $data = $this->model->viewData();

        return response([
            "buku" => $data
        ],http_response_code());
    }

}

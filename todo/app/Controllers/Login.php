<?php

namespace App\Controllers;

use Kint\Kint;

class Login extends BaseController
{
    public function index()
    {
        echo view("templates/head", ["title"=>"Login"]);
        $data["header"] = view("templates/header", ["subtitle"=>"Login"]);
        echo view('login', $data);
        echo view("templates/footer");
    }
}

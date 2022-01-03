<?php

namespace App\Controllers;

class Aufgaben extends BaseController
{
    public function index()
    {
        $data['header'] = view("templates/header", ["subtitle"=>"Aufgaben"]);
        $data['sidebar'] = view("templates/sidebar", ["page"=>"aufgaben"]);
        echo view("templates/head", ["title"=>"Aufgaben"]);
        echo view('aufgaben', $data);
        echo view("templates/footer");
    }
}

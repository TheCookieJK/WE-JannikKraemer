<?php


namespace App\Controllers;

class Projekte extends BaseController
{
    public function index()
    {
        $data['header'] = view("templates/header", ["subtitle"=>"Projekte"]);
        $data['sidebar'] = view("templates/sidebar", ["page"=>"projekte"]);
        echo view("templates/head", ["title"=>"Projekte"]);
        echo view('projekte', $data);
        echo view("templates/footer");
    }
}

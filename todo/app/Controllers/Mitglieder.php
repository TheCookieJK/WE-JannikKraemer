<?php


namespace App\Controllers;

class Mitglieder extends BaseController
{
    public function index()
    {
        $data["mitglieder"] =[
            [
                "id"=>1,
                "name"=>"Max Mustermann",
                "email"=>"mustermann@muster.de",
                "projektID"=>null
            ],
            [
                "id"=>2,
                "name"=>"Petra Müller",
                "email"=>"petra@mueller.de",
                "projektID"=>1
            ],
            [
                "id"=>3,
                "name"=>"Steve Jobs",
                "email"=>"steve@apple.com",
                "projektID"=>0
            ]
        ];
        $data['header'] = view("templates/header", ["subtitle"=>"Mitglieder"]);
        $data['sidebar'] = view("templates/sidebar", ["page"=>"personen"]);
        echo view("templates/head", ["title"=>"Mitglieder"]);
        echo view('personen', $data);
        echo view("templates/footer");
    }
}
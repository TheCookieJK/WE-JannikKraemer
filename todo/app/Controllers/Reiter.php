<?php

namespace App\Controllers;

class Reiter extends BaseController
{
    public function index()
    {

        $data["reiterListe"]  = [
            [
                "id"=>1,
                "name"=>"ToDo",
                "beschreibung"=>"Dinge die erledigt werden müssen."
            ],
            [
                "id"=>2,
                "name"=>"Erledigt",
                "beschreibung"=>"Dinge die erledigt sind."
            ],
            [
                "id"=>3,
                "name"=>"Verschoben",
                "beschreibung"=>"Die die später erledigt werden."
            ],
        ];

        $data['header'] = view("templates/header", ["subtitle"=>"Reiter"]);
        $data['sidebar'] = view("templates/sidebar", ["page"=>"reiter"]);
        echo view("templates/head", ["title"=>"Reiter"]);
        echo view('reiter', $data);
        echo view("templates/footer");
    }
}

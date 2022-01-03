<?php


namespace App\Controllers;

class Todos extends BaseController
{
    public function index()
    {
        $data['header'] = view("templates/header", ["subtitle"=>"Todos (Aktuelles Projekt)"]);
        $data['sidebar'] = view("templates/sidebar", ["page"=>"todo"]);
        echo view("templates/head", ["title"=>"Todos (Aktuelles Projekt)"]);
        echo view('todo', $data);
        echo view("templates/footer");
    }
}

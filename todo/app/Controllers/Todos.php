<?php


namespace App\Controllers;

use App\Models\ProjektModel;
use App\Models\ReiterModel;

class Todos extends BaseController
{
    public function index()
    {
        $projektModel = new ProjektModel();
        $projekt = $projektModel->where('id', session()->projekt)->first();
        $projektTitle = $projekt['name'] ?? '-';
        $data['header'] = view('templates/header', ['subtitle' =>$projektTitle]);
        $data['navbar'] = view('templates/navbar');

        $reiterModel = new ReiterModel();
        $data['todos'] = $reiterModel->getAllWithAufgaben(session()->projekt);

        echo view('templates/head', ['title' =>$projektTitle]);
        echo view('todo', $data);
        echo view('templates/footer');
    }
}

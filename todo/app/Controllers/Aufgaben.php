<?php

namespace App\Controllers;

use App\Models\AufgabenModel;
use App\Models\MitgliederAufgabenModel;
use App\Models\MitgliederModel;
use App\Models\ProjektModel;
use App\Models\ReiterModel;

class Aufgaben extends FormController
{
    protected $page = 'aufgaben';

    public function edit($id){
        $this->index($id);
    }

    public function index($id = null)
    {
        helper(['form', 'submit_feedback', 'delete_overlay']);
        $data['header'] = view('templates/header', ['subtitle' => 'Aufgaben']);
        $data['sidebar'] = view('templates/sidebar', ['page' => 'aufgaben']);
        $aufgabenModel = new AufgabenModel();
        if($id !== null){
            $data['ausgewaehlt'] = $aufgabenModel->getById($id);
        }
        $reiterModel = new ReiterModel();
        $mitgliederModel = new MitgliederModel();
        $data['reiter'] = $reiterModel->where('projekteid', session()->projekt)->findAll();
        $data['aufgaben'] = $aufgabenModel->getAllForProject(session()->projekt);
        $data['mitglieder'] = $mitgliederModel->getAllForProject(session()->projekt);
        echo view('templates/head', ['title' => 'Aufgaben']);
        echo view('aufgaben', $data);
        echo view('templates/footer');
    }

    public function store(){
        helper(['form', 'submit_feedback']);
        $validation = service('validation');


        if($validation->run($this->request->getPost(), 'storeaufgabe')){
            $aufgabenModel = new AufgabenModel();
            date_default_timezone_set('Europe/Luxembourg');
            $name = $this->request->getVar('name');
            $beschreibung = $this->request->getVar('beschreibung');
            $dueAt = $this->request->getVar('dueAt');
            $reiter = $this->request->getVar('reiter');
            $responsiblePerson = $this->request->getPost('responsiblePerson[]');
            $id = $this->request->getVar('id');
            $mitgliederAufgabenModel = new MitgliederAufgabenModel();


            $result = $this->submitToDB($aufgabenModel,$id, ['name' => $name, 'beschreibung' => $beschreibung, 'faelligkeitsdatum' =>$dueAt, 'reiterid' =>$reiter],['erstellungsdatum' =>date('Y-m-d H:i:s'), 'erstellerid' =>session()->id],true);
            if(is_numeric($result)){
                $id = $result;
            }
            $mitgliederAufgabenModel->upsert($id,$responsiblePerson);



        }else{
            submit_error('aufgaben', 'Fehler bei der Eingabe');
            set_input_error('aufgaben',$validation->getErrors());
        }
        return redirect()->back();
    }

    public function delete($id){
        helper('submit_feedback');
        if(!is_numeric($id)){die('Bad request');}
        $aufgabenModel = new AufgabenModel();
        $aufgabenModel->where('id', $id)->delete();
        submit_success('aufgaben-selector','Erfolgreich gelöscht');
        return redirect()->back();
    }
}

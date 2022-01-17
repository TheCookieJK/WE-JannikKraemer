<?php

namespace App\Controllers;

use App\Models\AufgabenModel;
use App\Models\MitgliederAufgabenModel;
use App\Models\MitgliederModel;
use App\Models\ProjektModel;
use App\Models\ReiterModel;

class Aufgaben extends BaseController
{
    public function edit($id){
        $this->index($id);
    }

    public function index($id = null)
    {
        helper(["form","submit_feedback","delete_overlay"]);
        $data['header'] = view("templates/header", ["subtitle"=>"Aufgaben"]);
        $data['sidebar'] = view("templates/sidebar", ["page"=>"aufgaben"]);
        $aufgabenModel = new AufgabenModel();
        if($id !== null){
            $data['ausgewaehlt'] = $aufgabenModel->getById($id);
        }
        $reiterModel = new ReiterModel();
        $mitgliederModel = new MitgliederModel();
        $data['reiter'] = $reiterModel->where('projekteid', session()->projekt)->findAll();
        $data['aufgaben'] = $aufgabenModel->getAllForProject(session()->projekt);
        $data['mitglieder'] = $mitgliederModel->getAllForProject(session()->projekt);
        echo view("templates/head", ["title"=>"Aufgaben"]);
        echo view('aufgaben', $data);
        echo view("templates/footer");
    }

    public function store(){
        helper("form");
        $validation = service("validation");


        if($validation->run($this->request->getPost(), "storeaufgabe")){
            $userid = session()->get('id');
            $aufgabenModel = new AufgabenModel();
            date_default_timezone_set('Europe/Luxembourg');
            $name = $this->request->getVar("name");
            $beschreibung = $this->request->getVar("beschreibung");
            $dueAt = $this->request->getVar("dueAt");
            $reiter = $this->request->getVar("reiter");
            $responsiblePerson = $this->request->getPost("responsiblePerson[]");
            $id = $this->request->getVar('id');
            $mitgliederAufgabenModel = new MitgliederAufgabenModel();
            if($id !== null && $id !== ''){
                // Update
                try {
                    $aufgabenModel->update($id, ["name" => $name, "beschreibung" => $beschreibung,"faelligkeitsdatum"=>$dueAt,"reiterid"=>$reiter]);

                } catch (\ReflectionException $e) {
                    submit_error('aufgaben', "Fehler beim updaten " . $e->getMessage());
                }
                submit_success("aufgaben","Gespeichert");
            }else{

                try{
                    $id = $aufgabenModel->insert(["name" => $name, "beschreibung" => $beschreibung,"erstellungsdatum"=>date("Y-m-d H:i:s"),"","faelligkeitsdatum"=>$dueAt,"reiterid"=>$reiter,"erstellerid"=>session()->id],true);
                } catch (\ReflectionException $e) {
                    session()->setFlashdata('aufgaben-fehler', "Fehler beim einfügen " . $e->getMessage());
                }
                session()->setFlashdata("aufgaben-success",  "Erstellt");
            }
            $mitgliederAufgabenModel->upsert($id,$responsiblePerson);



        }else{
            session()->setFlashdata("aufgaben-fehler", $validation->getErrors());

        }
        return redirect()->back();
    }

    public function delete($id){
        if(!is_numeric($id)){die("Bad request");}
        $aufgabenModel = new AufgabenModel();
        $aufgabenModel->where('id', $id)->delete();
        session()->setFlashdata('aufgaben-selector-success','Erfolgreich gelöscht');
        return redirect()->back();
    }
}

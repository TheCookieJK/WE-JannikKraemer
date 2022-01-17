<?php

namespace App\Controllers;

use App\Models\ReiterModel;

class Reiter extends FormController
{
    protected $page = "reiter";

    public function edit($id){
        $this->index($id);
    }

    public function index($id = null)
    {

        helper(['form','submit_feedback']);
        $reiterModel = new ReiterModel();
        $data["reiterListe"] = $reiterModel->where("projekteid", session()->projekt)->findAll();
        if($id !== null){
            $data["ausgewaehlt"] = $reiterModel->find($id);
        }
        $data['header'] = view("templates/header", ["subtitle"=>"Reiter"]);
        $data['sidebar'] = view("templates/sidebar", ["page"=>"reiter"]);
        $data["deleteOverlay"] = view("templates/delete_overlay", ["page"=>"reiter","name"=>"Reiter"]);
        echo view("templates/head", ["title"=>"Reiter"]);
        echo view('reiter', $data);
        echo view("templates/footer");
    }

    public function store(){
        helper('submit_feedback');
        $validation = service("validation");
        $reiterModel = new ReiterModel();
        d(session()->projekt);
        if($validation->run($this->request->getPost(), "storereiter")){

            $name = $this->request->getVar("name");
            $beschreibung = $this->request->getVar("beschreibung");
            $id = $this->request->getVar('id');

            $result = $this->submitToDB($reiterModel,$id,["name" => $name, "beschreibung" => $beschreibung],["projekteid"=>session()->projekt]);
        }else{
            submit_error("reiter", $validation->getErrors());
        }
        return redirect()->back();
    }

    public function delete($id){
        helper('submit_feedback');
        if(!is_numeric($id)){die("Bad request");}
        $reiterModel = new ReiterModel();
        $reiterModel->where('id', $id)->delete();
        submit_success("reiter", "Erfolgreich gelöscht");
        return redirect()->back();
    }
}

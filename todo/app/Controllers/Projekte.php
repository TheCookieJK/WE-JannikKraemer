<?php


namespace App\Controllers;

use App\Models\ProjektModel;

class Projekte extends FormController
{
    protected $page = 'projekt';

    public function edit($id){
        $this->index($id);
    }

    public function index($id = null)
    {
        helper(['form', 'submit_feedback', 'delete_overlay']);
        $data['header'] = view('templates/header', ['subtitle' => 'Projekte']);
        $data['sidebar'] = view('templates/sidebar', ['page' => 'projekte']);

        $projektModel = new ProjektModel();

        $data['projekte'] = $projektModel->findAll();

        if($id !== null){
            $data['selectedProjekt'] = $projektModel->find($id);
        }

        echo view('templates/head', ['title' => 'Projekte']);
        echo view('projekte', $data);
        echo view('templates/footer');
    }

    public function selectAction(){
        helper(['form', 'submit_feedback']);
        $validation = service('validation');

        if($validation->run($this->request->getPost(), 'selectproject')){
            if($this->request->getVar('select') !== null){
                $id = $this->request->getVar('project');
                $projektModel = new ProjektModel();
                $data = $projektModel->find($id);
                if($data){
                    d($data);
                    session()->set(['projekt' =>$data['id']]);
                    return redirect()->to(base_url(). '/todos');
                }


            }else if($this->request->getVar('edit') !== null){
                $id = $this->request->getVar('project');
                return redirect()->to(base_url() . '/projekte/edit/' .$id);
            }
        }
        submit_error('projekt-selector', 'Fehler bei der Auswahl des Projektes');
        return redirect()->back();
    }

    public function store(){
        helper(['form', 'submit_feedback']);
        $validation = service('validation');
        $userid = session()->get('id');
        $projektModel = new ProjektModel();

        if($validation->run($this->request->getPost(), 'storeproject')){

            $name = $this->request->getVar('name');
            $beschreibung = $this->request->getVar('beschreibung');
            $id = $this->request->getVar('id');

            $this->submitToDB($projektModel,$id,['name' =>$name, 'beschreibung' =>$beschreibung],['erstellerid' =>$userid]);
        }else{
           submit_error('projekt', $validation->getErrors());

        }
        return redirect()->back();
    }

    public function delete($id){
        helper('submit_feedback');
        if(!is_numeric($id)){die('Bad request');}
        $projektModel = new ProjektModel();
        $projektModel->where('id', $id)->delete();
        submit_success('projekt-selector', 'Erfolgreich gelöscht');
        if($id == session()->projekt){
            session()->set(['projekt'=>0]);
        }
        return redirect()->back();
    }
}

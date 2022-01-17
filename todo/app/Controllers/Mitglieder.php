<?php


namespace App\Controllers;

use App\Models\MitgliederModel;
use App\Models\ProjekteMitgliederModel;
use App\Models\ProjektModel;
use CodeIgniter\Controller;

class Mitglieder extends Controller
{
    public function edit($param) {
        $this->index($param);
    }

    public function index($id = null)
    {
        helper(['form']);
        $mitgliederModel = new MitgliederModel();
        $projekteModel = new ProjektModel();

        $projektid = 1;
        if(session()->has('projekt')){
            $projektid = session()->get('projekt');
        }

        $data["mitglieder"] = $mitgliederModel->getAllWithProject($projektid);
        $data["projekte"] = $projekteModel->findAll();
        $data["deleteOverlay"] = view("templates/delete_overlay", ["page"=>"mitglieder","name"=>"Mitglied"]);

        if($id !== null){
            $data['ausgewaehlt'] = $mitgliederModel->find($id);
        }

        $data['header'] = view("templates/header", ["subtitle"=>"Mitglieder"]);
        $data['sidebar'] = view("templates/sidebar", ["page"=>"personen"]);
        echo view("templates/head", ["title"=>"Mitglieder"]);
        echo view('personen', $data);
        echo view("templates/footer");
    }

    public function delete($id){
        if(!is_numeric($id)){die("Bad request");}
        $mitgliederModel = new MitgliederModel();
        $mitgliederModel->where('id', $id)->delete();
        return redirect()->back();
    }

    public function store(){
        helper('form');
        $mitgliederModel = new MitgliederModel();

        if($this->request->getMethod() != 'post'){
            die("Supported request type: post");
        }

        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $passwort = $this->request->getPost('password');
        $zugeordnetesProjekt = $this->request->getPost('assignedProject');


        $data = $mitgliederModel->where('email', $email)->first();
        if($data){
            //update
            $id = $this->request->getPost('id');
            if($id !== null && $id != ""){
                $data = [
                    'email'=>$email,
                    'username'=>$username
                ];
                if(session()->get('id') == $id){
                    if($passwort != "") {
                        $data["password"] = password_hash($passwort, PASSWORD_DEFAULT);
                    }
                }

                $mitgliederModel->update($id, $data);
                if($zugeordnetesProjekt !== null){
                    $projekteMitgliederModel = new ProjekteMitgliederModel();
                    $projekteMitgliederModel->upsert($zugeordnetesProjekt, $id);
                }

                session()->setFlashdata('mitglieder-success', 'Gespeichert');
            }else{
                session()->setFlashdata('mitglieder-fehler', 'E-Mail existiert bereits');
            }
        }else{
            // create new
            $neuesMitgliedId = $mitgliederModel->insert(['email'=>$email,'password'=>password_hash($passwort, PASSWORD_DEFAULT),'username'=>$username],true);
            if($zugeordnetesProjekt != 0){
                $projekteMitgliederModel = new ProjekteMitgliederModel();
                $projekteMitgliederModel->upsert($zugeordnetesProjekt, $neuesMitgliedId);
            }
        }
        return redirect()->back();
    }


}
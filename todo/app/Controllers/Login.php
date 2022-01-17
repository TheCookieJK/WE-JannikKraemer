<?php

namespace App\Controllers;

use App\Models\MitgliederModel;

class Login extends BaseController
{
    public function index()
    {
        if(session()->loggedin){
            return redirect()->to('/todos');
        }
        helper('form');
        echo view("templates/head", ["title"=>"Login"]);
        $data["header"] = view("templates/header", ["subtitle"=>"Login"]);
        echo view('login', $data);
        echo view("templates/footer");
    }

    public function auth(){
        helper('form');

        $validation = service('validation');
        if($this->request->getMethod() != 'post'){
            die("Supported request type: post");
        }
        $session = session();
        $mitgliederModel = new MitgliederModel();






        if($validation->run($this->request->getPost(), 'signin')){

            $email = $this->request->getVar('email');
            $passwort = $this->request->getVar('password');

            $data = $mitgliederModel->where('email', $email)->first();
            if($this->request->getVar('agb') == null){
                $session->setFlashdata('fehler', 'Bitte bestätige die AGBs und Datenschutzerklärung');
                return redirect()->back();
            }
            if($data){
                $dbPasswordHash = $data['password'];
                $passwordMatch = password_verify($passwort, $dbPasswordHash);

                if($passwordMatch){
                    $session->set(
                        [
                            'id'=>$data['id'],
                            'username'=>$data['username'],
                            'loggedin'=>true,
                            'projekt'=>0
                        ]
                    );
                    return redirect()->to('/projekte');
                }else{
                    $session->setFlashdata('fehler', 'Falsches Passwort');
                    return redirect()->back();
                }
            }else{
                $session->setFlashdata('fehler', 'Kein Konto mit dieser E-Mail gefunden');
                return redirect()->back();
            }
        }else{
            $session->setFlashdata('fehler',$validation->getErrors());
            return redirect()->back();
        }

    }
}

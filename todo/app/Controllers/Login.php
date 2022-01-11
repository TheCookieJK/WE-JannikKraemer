<?php

namespace App\Controllers;

use App\Models\MitgliederModel;
use Kint\Kint;

class Login extends BaseController
{
    public function index()
    {
        helper('form');
        echo view("templates/head", ["title"=>"Login"]);
        $data["header"] = view("templates/header", ["subtitle"=>"Login"]);
        echo view('login', $data);
        echo view("templates/footer");
    }

    public function auth(){
        helper('form');
        if($this->request->getMethod() != 'post'){
            die("Supported request type: post");
        }
        $session = session();
        $mitgliederModel = new MitgliederModel();



        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required'
        ];

        if($this->validate($rules)){

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
                            'projekt'=>1
                        ]
                    );
                    return redirect()->to('/todos');
                }else{
                    $session->setFlashdata('fehler', 'Falsches Passwort');
                    return redirect()->back();
                }
            }else{
                $session->setFlashdata('fehler', 'Kein Konto mit dieser E-Mail gefunden');
                return redirect()->back();
            }
        }else{
            $session->setFlashdata('fehler',implode("<br/> ",$this->validator->getErrors()));
            return redirect()->back();
        }

    }
}

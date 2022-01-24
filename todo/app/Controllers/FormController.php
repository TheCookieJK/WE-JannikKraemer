<?php

namespace App\Controllers;

use App\Models\AufgabenModel;
use App\Models\MitgliederAufgabenModel;
use App\Models\MitgliederModel;
use App\Models\ProjektModel;
use App\Models\ReiterModel;

class FormController extends BaseController
{
    protected $page = '';

    public function submitToDB($model, $id, $data, $insertData,$returnID=false){
        if($id !== null && $id !== ''){
            // Update
            try {
                $model->update($id, $data);
            } catch (\ReflectionException $e) {
                submit_error($this->page, 'Fehler beim Updaten. ' . $e->getMessage());
            }
            submit_success($this->page, 'Gespeichert');
        }else{

            try{
                $id = $model->insert(array_merge($data,$insertData),true);
            } catch (\ReflectionException $e) {
                submit_error($this->page, 'Fehler beim Einfügen. ' . $e->getMessage());
            }
            submit_success($this->page, 'Erstellt');
            if($returnID){
                return $id;
            }
        }

    }
}

<?php

namespace App\Models;
use CodeIgniter\Model;

class MitgliederAufgabenModel extends Model{

    protected $table = 'mitglieder_aufgaben';

    protected $allowedFields = [
        'aufgabenid',
        'mitgliederid'
    ];

    protected $useTimestamps = false;

    public function upsert($aufgabenid, $mitgliederids){
        $this->where('aufgabenid', $aufgabenid)->delete();

        $data = [];

        foreach($mitgliederids as $mitgliederid){
           array_push($data,['aufgabenid'=>$aufgabenid,'mitgliederid'=>$mitgliederid]);
        }
        $this->insertBatch($data);
    }
}
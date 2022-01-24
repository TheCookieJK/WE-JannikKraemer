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

    /**
     * speichert/updated einen Batch an AufgabenID und MitgliederId Tupel
     * @param $aufgabenid
     * @param $mitgliederids
     * @throws \ReflectionException
     */
    public function upsert($aufgabenid, $mitgliederids){
        if($mitgliederids == []){return false;}
        $this->where('aufgabenid', $aufgabenid)->delete();

        $data = [];

        foreach($mitgliederids as $mitgliederid){
           array_push($data,['aufgabenid'=>$aufgabenid,'mitgliederid'=>$mitgliederid]);
        }
        $this->insertBatch($data);
    }
}
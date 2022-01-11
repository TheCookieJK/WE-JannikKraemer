<?php

namespace App\Models;
use CodeIgniter\Model;

class ProjekteMitgliederModel extends Model{

    protected $table = 'projekte_mitglieder';

    protected $allowedFields = [
        'projekteid',
        'mitgliederid'
    ];

    protected $useTimestamps = false;

    public function upsert($projekteid, $mitgliederid){
        if($projekteid == 0){
            $this->where('mitgliederid',$mitgliederid)->delete();
            return;
        }
        $relation = $this->where('mitgliederid',$mitgliederid)->first();
        if($relation){
            $this->where('mitgliederid',$mitgliederid)->update(null,['projekteid'=>$projekteid,'mitgliederid'=>$mitgliederid]);
        }else{
            $this->insert(['projekteid'=>$projekteid,'mitgliederid'=>$mitgliederid]);
        }
    }
}
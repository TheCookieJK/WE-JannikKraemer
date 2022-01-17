<?php

namespace App\Models;
use CodeIgniter\Model;

class ReiterModel extends Model{

    protected $table = 'reiter';

    protected $allowedFields = [
        'id',
        'name',
        'beschreibung',
        'projekteid'
    ];

    protected $useTimestamps = false;

    public function getAllWithAufgaben($projekteid){
        $aufgaben = $this->db->table("(SELECT aufgaben.id,aufgaben.name,aufgaben.reiterid,group_concat((CASE WHEN mitglieder.username IS NULL THEN '-' ELSE mitglieder.username END) SEPARATOR ', ') as zugeordnet FROM aufgaben left join mitglieder_aufgaben on aufgaben.id = aufgabenid left join mitglieder on mitglieder.id = mitgliederid group by aufgaben.name order by aufgaben.id) aufgaben");
        $aufgaben->select("reiter.*, group_concat('<li class=list-group-item>',aufgaben.name ,' (', aufgaben.zugeordnet ,')</li>' SEPARATOR '') as aufgaben");
        $aufgaben->join("reiter", "aufgaben.reiterid = reiter.id","left");
        $aufgaben->where('projekteid',$projekteid);
        $aufgaben->groupBy('reiter.id');
        return $aufgaben->get()->getResultArray();
    }
}
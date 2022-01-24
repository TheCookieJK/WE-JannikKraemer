<?php

namespace App\Models;
use CodeIgniter\Model;

class AufgabenModel extends Model{

    protected $table = 'aufgaben';

    protected $allowedFields = [
        'id',
        'name',
        'beschreibung',
        'erstellungsdatum',
        'faelligkeitsdatum',
        'erstellerid',
        'reiterid'
    ];

    protected $useTimestamps = false;

    /**
     * Alle Aufgaben für ein Projekt (projekteid)
     * @param $projectid
     * @return array
     */
    public function getAllForProject($projectid){
        $reiter = $this->db->table('reiter');
        $reiter->select("aufgaben.*, reiter.name as reiter, group_concat(mitglieder.username SEPARATOR ', ') as person");
        $reiter->join('aufgaben', 'aufgaben.reiterid = reiter.id');
        $reiter->join('mitglieder_aufgaben','aufgaben.id = mitglieder_aufgaben.aufgabenid','left');
        $reiter->join('mitglieder', 'mitglieder.id = mitglieder_aufgaben.mitgliederid','left');
        $reiter->where('reiter.projekteid',$projectid);
        $reiter->groupBy('aufgaben.id');
        return $reiter->get()->getResultArray();
    }


    /**
     * Aufgabe bei ID
     * @param $id
     * @return array|object|null
     */
    public function getById($id){

        $this->select("aufgaben.*, reiter.name as reiter, group_concat(mitglieder.username SEPARATOR ',') as person");
        $this->where('aufgaben.id', $id);
        $this->join('reiter','reiter.id = reiterid');
        $this->join('mitglieder_aufgaben','aufgaben.id = mitglieder_aufgaben.aufgabenid','left');
        $this->join('mitglieder', 'mitglieder.id = mitglieder_aufgaben.mitgliederid','left');

        return $this->first();
    }
    
}
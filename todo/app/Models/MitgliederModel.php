<?php

namespace App\Models;
use CodeIgniter\Model;

class MitgliederModel extends Model{

    protected $table = 'mitglieder';

    protected $allowedFields = [
        'id',
        'username',
        'vorname',
        'nachname',
        'email',
        'password'
    ];

    protected $useTimestamps = false;

    /**
     * Alle Mitglieder inklusive projekteid
     * @return array
     */
    public function getAllWithProject(){
        return $this->select('id,username,email,projekteid')->join('projekte_mitglieder','projekte_mitglieder.mitgliederid = id','left')->findAll();
    }

    /**
     * Alle Mitglieder für eine projekteid
     * @param $project
     * @return array
     */
    public function getAllForProject($project){
        return $this->select('id,username,email,projekteid')->join('projekte_mitglieder','projekte_mitglieder.mitgliederid = id')->where('projekteid',$project)->findAll();
    }
}
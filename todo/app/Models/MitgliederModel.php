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

    public function getAllWithProject(){
        return $this->select("id,username,email,projekteid")->join('projekte_mitglieder','projekte_mitglieder.mitgliederid = id','left')->findAll();
    }
}
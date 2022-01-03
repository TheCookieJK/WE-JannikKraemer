<?php

namespace App\Models;
use CodeIgniter\Model;

class FirstModel extends Model{

    public function getData(): array
    {
        return $this->db->query('SELECT * FROM personen order by Name')->getResultArray();
    }
}
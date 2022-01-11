<?php

namespace App\Models;
use CodeIgniter\Model;

class ProjektModel extends Model{

    protected $table = 'projekte';

    protected $allowedFields = [
        'id',
        'name',
        'beschreibung',
        'erstellerid'
    ];

    protected $useTimestamps = false;

}
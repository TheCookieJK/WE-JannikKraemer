<?php


namespace App\Controllers;

use App\Models\FirstModel;

class First extends BaseController
{
    /**
     * @var FirstModel
     */
    private $firstmodel;

    public function __construct()
    {
        $this->firstmodel = new FirstModel();
    }

    public function index()
    {
        ?>
        <h1> No index </h1>
        <?php
    }

    public function table_dyn()
    {
        $data['personen'] = $this->firstmodel->getData();
        echo view('pages/table_dyn.php', $data);
    }

}

<?php

    $mitglieder = [
        [
            'id' =>1,
            'name' => 'Max Mustermann',
            'email' => 'mustermann@muster.de',
            'projektID' =>null
        ],
        [
            'id' =>2,
            'name' => 'Petra Müller',
            'email' => 'petra@mueller.de',
            'projektID' =>1
        ],
        [
            'id' =>3,
            'name' => 'Steve Jobs',
            'email' => 'steve@apple.com',
            'projektID' =>0
        ],
    ];

    function getAllMitglieder(){
        global $mitglieder;
        return $mitglieder;
    }

    function getMitgliedById($id){

        global $mitglieder;

        $found = null;
        $count = 0;
        while($found == null && $count < count($mitglieder)){
            if(isset($mitglieder[$count]['id']) && $mitglieder[$count]['id'] == $id){
                $found = $mitglieder[$count];
            }
            $count++;
        }
        return $found;
    }

    print_r(getMitgliedById(3));
?>
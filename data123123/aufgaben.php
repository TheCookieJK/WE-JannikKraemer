<?php

    $aufgaben = [
        [
            'id' =>1,
            'bezeichnung' => 'HTML Datei erstellen',
            'beschreibung' => 'HTML Datei erstellen',
            'reiterID' =>0,
            'personenID' =>1
        ],

    ];

    function getAllAufgaben(){
        global $aufgaben;
        return $aufgaben;
    }




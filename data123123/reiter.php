<?php
    $reiter = ['ToDo', 'Erledigt', 'Verschoben'];

    function getAllReiter(){
        global $reiter;
        return $reiter;
    }

    function getReiterById($id){
        global $reiter;
        return ($id > 0 && isset($reiter[$id-1]) ) ? $reiter[$id-1] : null;
    }

?>
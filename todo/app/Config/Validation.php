<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
        MultiSelectRule::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------

    public $signin = [
        'email'     => 'required|valid_email',
        'password'  => 'required',
        'agb'       => 'required'
    ];

    public $signin_errors = [
        'email'=>[
            'required' => 'Bitte geben Sie Ihre E-Mail ein.',
            'valid_email' => 'Bitte geben Sie eine gültige E-Mail an.',
        ],
        'password'=>[
            'required' => 'Bitte geben Sie ein Passwort ein.'
        ],
        'agb'=>[
            'required' => 'Die AGB muss bestätigt werden.'
        ]
    ];

    public $storeproject = [
        'name'  => 'required|string',
        'beschreibung' => 'required|string',
        'id'    => 'if_exist|integer'
    ];
    public $storeproject_errors = [
        'name'=>[
            'required' => 'Bitte geben Sie einen Namen an.',
        ],
        'beschreibung'=>[
            'required' => 'Bitte geben Sie eine Beschreibung ein.'
        ]
    ];

    public $selectproject = [
        'project' => 'required|integer'
    ];

    public $storeaufgabe = [
        'name' => 'required',
        'beschreibung' => 'required',
        'dueAt' => 'required',
        'reiter'=> 'required',
        'responsiblePerson'=>'multi_select',
    ];

    public $storeaufgabe_errors = [
        'name'=>[
            'required' => 'Bitte geben Sie einen Namen ein.',
        ],
        'beschreibung'=>[
            'required' => 'Bitte geben Sie eine Beschreibung ein.'
        ],
        'dueAt'=>[
            'required' => 'Bitte geben Sie ein Datum ein.'
        ],
        'reiter'=>[
            'required' => 'Bitte wählen Sie ein Reiter aus.'
        ],
        'responsiblePerson'=>[
            'multi_select' => 'Ungültige Werte.'
        ]
    ];

    public $storereiter = [
        'name'  => 'required|string',
        'beschreibung' => 'required|string',
        'id'    => 'if_exist|integer'
    ];

    public $storereiter_errors = [
        'name'=>[
            'required' => 'Bitte geben Sie einen Namen an.',
        ],
        'beschreibung'=>[
            'required' => 'Bitte geben Sie eine Beschreibung ein.'
        ]
    ];
}

class MultiSelectRule{
    public function multi_select($arr): bool{
        if(!isset($_POST['responsiblePerson'])){
            return true;
        }
        $data = $_POST['responsiblePerson'];
       if(!is_array($data)){ return false; }

        if(empty($data)){
            return false;
        }

        foreach($data as $key=>$value){
            if(!is_numeric($value)){
                return false;
            }
        }
        return true;
    }
}
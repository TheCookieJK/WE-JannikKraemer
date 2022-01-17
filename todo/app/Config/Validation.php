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

    public $selectproject = [
        "project" => "required|integer"
    ];

    public $storeaufgabe = [
        'name' => 'required',
        'beschreibung' => 'required',
        'dueAt' => 'required',
        'reiter'=> 'required',
        'responsiblePerson'=>'required|multi_select',
    ];

    public $storereiter = [
        'name'  => 'required|string',
        'beschreibung' => 'required|string',
        'id'    => 'if_exist|integer'
    ];
}

class MultiSelectRule{
    public function multi_select($arr): bool{
        $data = $_POST["responsiblePerson"];
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
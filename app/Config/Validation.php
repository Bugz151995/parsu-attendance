<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;
use \App\Validation\LoginRules;
use \App\Validation\CheckEnrollmentCode;

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
        LoginRules::class,
        CheckEnrollmentCode::class,
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
        'custom_list'   => '\App\Views\custom_errors\list',
        'custom_single' => '\App\Views\custom_errors\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
    public $loginRules = [
        'username' => [
            'label' => 'Username',
            'rules' => 'required|check_username[username]',
            'errors' => [
                'check_username' => 'The username is invalid.'
            ]
        ],
        'password' => [
            'label' => 'Password',
            'rules' => 'required|auth[username, password]',
            'errors' => [
                'auth' => 'The password is incorrect.'
            ]
        ]
    ];

    public $enrollmentRules = [
        'code' => [
            'label' => 'Enrollment Code',
            'rules' => 'check_code[code]',
            'errors' => [
                'check_code' => 'The enrollment code is incorrect.'
            ]
        ],
    ];
}

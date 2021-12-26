<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use \App\Filters\AuthFilter;
use \App\Filters\RoleCheckFilter;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'       => CSRF::class,
        'toolbar'    => DebugToolbar::class,
        'honeypot'   => Honeypot::class,
        'auth'       => AuthFilter::class,
        'role_check' => RoleCheckFilter::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [
        'auth' => [
            'before' => [
                'home', 'home/*',
                'schedule', 'schedule/*',
                'overview', 'overview/*',
                
                'a/home', 'a/home/*',
                'a/programs', 'a/programs/*',
                'a/courses', 'a/courses/*',
                'a/class', 'a/class/*',
                'a/faculty', 'a/faculty/*',
                'a/students', 'a/student/*s',
                'a/schedules', 'a/schedules/*',
                'a/report', 'a/report/*',
                'a/users', 'a/users/*',

                'f/home', 'f/home/*',
                'f/class', 'f/class/*',
                'f/check_attendance', 'f/check_attendance/*',
                'f/report', 'f/report/*',
            ]
        ]
    ];
}

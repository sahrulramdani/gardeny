<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;
use App\Filters\Admin;
use App\Filters\Pengelola;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'login'         => Login::class,
        'admin'         => Admin::class,
        'pengelola'     => Pengelola::class
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            'admin' => [
                'except' => ['login/*', 'login', '/', '/home', 'beranda/' ,'tanaman/', 'about/', 'learn/', 'learn/*']
            ],
            'pengelola' => [
                'except' => ['login/*', 'login', '/', '/home', 'beranda/' ,'tanaman/', 'about/', 'learn/', 'learn/*']
            ]
        ],
        'after' => [
            'admin' => [
                'except' => ['dashboard/', 'pengelola/', 'pengelola/*', 'tanaman/', 'tanaman/*', 'lokasi/', 'lokasi/*', 'lokasi/lokasi', 'lokasi/sublokasi' , 'laporan/', 'laporan/*', 'perawatan/', 'perawatan/*', 'klasifikasi/', 'klasifikasi/*', 'klasifikasi/genus', 'klasifikasi/famili', 'klasifikasi/spesies', 'profil/', 'beranda/' ,'tanaman/', 'about/', 'learn/', 'learn/*']
            ],
            'pengelola' => [
                'except' => ['dashboard/', 'tanaman/', 'tanaman/*', 'lokasi/', 'lokasi/*', 'lokasi/lokasi', 'lokasi/sublokasi' , 'laporan/', 'laporan/*', 'perawatan/', 'perawatan/*', 'klasifikasi/', 'klasifikasi/*', 'klasifikasi/genus', 'klasifikasi/famili', 'klasifikasi/spesies', 'profil/', 'beranda/' ,'tanaman/', 'about/', 'learn/', 'learn/*']
            ]
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
    public $filters = [];
}
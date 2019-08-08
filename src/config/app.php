<?php
namespace App;

use App\Providers\MenuServiceProvider;
use App\Providers\PostTypeServiceProvider;

return [
    'providers'     => [
        MenuServiceProvider::class,
        PostTypeServiceProvider::class,
    ]
];

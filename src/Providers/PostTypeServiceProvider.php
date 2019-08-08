<?php
namespace App\Providers;
use PostTypes\PostType;

class PostTypeServiceProvider
{
    public function __construct()
    {
        $this->register();
    }

    private function register()
    {
        $kavel = new PostType('kavel');
        
        $kavel->icon('dashicons-admin-multisite');

        $kavel->taxonomy('type');

        $kavel->register();
    }
}

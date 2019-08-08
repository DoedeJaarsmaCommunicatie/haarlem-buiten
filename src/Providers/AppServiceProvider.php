<?php
namespace App\Providers;

use App\Controllers\Meta\KavelController;

class AppServiceProvider
{
    protected $providers;
    public function __construct()
    {
        $providers = include get_stylesheet_directory() . '/src/config/app.php';
        $this->providers = $providers['providers'];
        $this->boot();
        $this->registers();
    }
    
    public function boot(): void
    {
        foreach ($this->providers as $provider) {
            new $provider();
        }
    }

    public function registers(): void
    {
        add_action(
            'after_setup_theme',
            static function () {
                \Carbon_Fields\Carbon_Fields::boot();
            }
        );
        
        new KavelController();
    }
}

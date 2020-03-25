<?php
namespace App\Providers;
use PostTypes\PostType;
use PostTypes\Taxonomy;

class PostTypeServiceProvider
{
    public function __construct()
    {
        $this->register();
    }

    private function register()
    {
        $bouwnummer = new PostType('bouwnummer');
        $bouwnummer->icon('dashicons-admin-multisite');
        $bouwnummer->options([
            'rewrite'   => [
                'slug'  => 'bouwnummer'
            ],
	        'supports' => [
	        	'title',
		        'editor',
		        'thumbnail'
	        ]
        ]);
        $bouwnummer->taxonomy('type');
        $bouwnummer->register();

        $loc = new Taxonomy('type');
        $loc->options([
            'hierarchical'  => true
        ]);

        $loc->register();
    }
}

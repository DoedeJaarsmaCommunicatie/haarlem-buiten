<?php
namespace App\Controllers\Meta;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class KavelController
{
    public function __construct()
    {
    	add_action('carbon_fields_register_fields', [ $this, 'register']);
    }
    
    public function register(): void
    {
	   Container::make('post_meta', __('Bouwnummer informatie'))
		   ->where('post_type', '=', 'bouwnummer')
		   ->add_fields(
		   	[
		   	    Field::make('checkbox', 'is_mirrored', __('Is gespiegeld')),
		   	    Field::make('checkbox', 'is_cornered', __('Is hoekwoning')),
		   		
		   		Field::make('text', 'plot_area', __('Kaveloppervlakte'))
			        ->set_attribute('placeholder', __('ca. 166')),
			    
                Field::make('image', 'plot_map', __('Kavel plattegrond')),
			    
                Field::make('image', 'plot_overview', __('Kavel overzicht'))
		    ]
		   );
    }
}

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
	   Container::make('post_meta', __('Kavel informatie'))
		   ->where('post_type', '=', 'kavel')
		   ->add_fields(
		   	[
		   		Field::make('text', 'kavel_woonoppervlakte', __('Woonoppervlakte'))
			        ->set_attribute('placeholder', __('ca. 166')),
			    
			    Field::make('text', 'kavel_grootte', __('Kavelgrootte'))
			        ->set_attribute('placeholder', __('ca. 240')),
			    
			    Field::make('complex', 'kavel_specificaties', __('Algemene specificaties'))
			        ->add_fields([
			        	Field::make('text', 'waarde', __('Specificatie'))
			        ]),
			    Field::make('complex', 'kavel_plattegronden', __('Plattegronden'))
			        ->add_fields([
			        	Field::make('text', 'omschrijving', __('Omschrijving')),
			        	Field::make('image', 'afbeelding', __('Afbeelding'))
			        ])
		    ]
		   );
    }
}

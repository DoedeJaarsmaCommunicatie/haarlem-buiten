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
		   		Field::make('image', 'custom_image_plan', __('Plattegrond')),


		   		Field::make('text', 'plot_area', __('Kaveloppervlakte'))
			        ->set_attribute('placeholder', __('ca. 166')),

                Field::make('image', 'plot_map', __('Kavel plattegrond')),

                Field::make('image', 'plot_overview', __('Kavel overzicht')),
			    Field::make('checkbox', 'is_sold', 'Is verkocht'),
			    Field::make('checkbox', 'is_under_reservation', 'Onder voorbehoud'),
			    Field::make('checkbox', 'is_under_option', 'Is onder optie'),
		    ]
		   );

	   Container::make('post_meta', __('Bouwnummer prijs'))
		   ->where('post_type', '=', 'bouwnummer')
		   ->add_fields(
		   	[
		   		Field::make('text', 'price', __('Prijs'))
			        ->set_attribute('placeholder', 'xxx.xxx')
			        ->set_help_text('Voer een bedrag in zonder euro teken.'),

			    Field::make('text', 'price_extra', __('Extra over prijs'))
		    ]
		   );
    }
}

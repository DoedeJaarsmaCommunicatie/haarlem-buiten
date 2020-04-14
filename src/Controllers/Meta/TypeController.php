<?php

namespace App\Controllers\Meta;


use Carbon_Fields\Container;
use Carbon_Fields\Field;

class TypeController
{
    public function __construct()
    {
        add_action('carbon_fields_register_fields', [ $this, 'register' ]);
    }

    public function register(): void
    {
        Container::make('term_meta', __('Type informatie'))
            ->where('term_taxonomy', '=', 'type')
            ->add_fields(
                [
                    Field::make('text', 'living_area', __('Woonoppervlak'))
                        ->set_attribute('placeholder', __('ca. 175')),

                    Field::make('text', 'extra_attributes', __('Extra informatie')),

                    Field::make('text', 'impression_title', __('Titel (type)'))
                        ->set_attribute('placeholder', __('Zoals: Vrijstaande woning')),

	                Field::make('media_gallery', 'type_download', __('Downloads'))
	                    ->set_duplicates_allowed(false)
                ]
            );

        Container::make('term_meta', __('Type afbeeldingen'))
	        ->where('term_taxonomy', '=', 'type')
	        ->add_fields(
	        	[
			        Field::make('image', 'image_drawing', __('Exterieur impressie')),
			        Field::make('image', 'image_interior', __('Interieur impressie')),

			        Field::make('image', 'image_header', __('Header afbeelding')),

			        Field::make('image', 'image_impression', __('Sfeer afbeelding')),

			        Field::make('image', 'image_theme', __('Afbeelding thema')),

			        Field::make('image', 'image_plan', __('Plattegrond')),
		        ]
	        );
    }
}

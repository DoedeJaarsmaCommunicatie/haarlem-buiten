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
                	Field::make('text', 'total_area', __('Woningoppervlakte totaal')),
                    Field::make('text', 'living_area', __('Oppervlakte wonen'))
                        ->set_attribute('placeholder', __('175')),

                    Field::make('text', 'storage_area', __('Oppervlakte berging'))
	                    ->set_attribute('placeholder', __('12'))
	                    ->set_help_text('Dit wordt alleen getoond als dit veld is ingevuld'),

                    Field::make('text', 'storage_attic_area', __('Oppervlakte bergzolder'))
	                    ->set_attribute('placeholder','24')
	                    ->set_help_text('Dit wordt alleen getoond als dit veld is ingevuld'),

                    Field::make('text', 'extra_attributes', __('Extra informatie')),

                    Field::make('text', 'impression_title', __('Titel (type)'))
                        ->set_attribute('placeholder', __('Zoals: Vrijstaande woning'))
                ]
            );

        Container::make('term_meta', __('Downloads'))
	        ->where('term_taxonomy', '=' ,'type')
	        ->add_fields([
		        Field::make('file', 'type_download', __('Download')),

		        Field::make('text', 'type_download_title', __('Download title'))
	        ]);

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

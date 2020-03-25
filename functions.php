<?php

include_once get_stylesheet_directory() . '/vendor/autoload.php';

add_theme_support('custom-logo');
add_theme_support('post-thumbnails', ['post', 'page', 'bouwnummer']);

\Timber\Timber::$locations = [
    get_stylesheet_directory() . '/templates/',
];

function haarlembuiten_register_elementor_locations($elementor_theme_manager)
{
    $elementor_theme_manager->register_all_core_location();
}
add_action('elementor/theme/register_locations', 'haarlembuiten_register_elementor_locations');

$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/DoedeJaarsmaCommunicatie/haarlem-buiten/',
    __FILE__,
    'haarlembuiten'
);

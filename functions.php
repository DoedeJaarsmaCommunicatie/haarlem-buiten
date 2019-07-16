<?php

include_once get_stylesheet_directory() . '/vendor/autoload.php';

add_theme_support('custom-logo');

\Timber\Timber::$locations = [
    get_stylesheet_directory() . '/templates/',
];

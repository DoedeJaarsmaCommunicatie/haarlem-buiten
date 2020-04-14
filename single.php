<?php

use App\Post;
use Timber\Image;
use Timber\Timber;

$context = Timber::get_context();

$context ['post'] = new Post();

$templates = [
	'views/single/' . $context[ 'post' ]->post_type . '/' . $context[ 'post' ]->id . '.twig',
	'views/single/' . $context[ 'post' ]->post_type . '/' . $context[ 'post' ]->slug . '.twig',
	'views/single/' . $context[ 'post' ]->id . '.twig',
	'views/single/' . $context[ 'post' ]->slug . '.twig',
	'views/single/' . $context[ 'post' ]->post_type . '.twig',
	'views/single.twig',
	'views/index.twig'
];

if ($context['post']->post_type === 'bouwnummer') {
    $term = $context['post']->terms('type')[0];
    $context['term'] = $term;
    $context['plot_map'] = new Image($context['post']->get_field('plot_map'));
    $context['plot_overview'] = new Image($context['post']->get_field('plot_overview'));
	$context['price_info'] = [
		'price' => $context['post']->get_field('price'),
		'info' => $context['post']->get_field('price_extra')
	];

    $type = explode(' ', $term);

    $context['type_side'] = $type[0];
    unset($type[0]);
    $context['type_denom'] = implode(' ', $type);

    if ($context['post']->thumbnail()) {
	    $image_header = $context['post']->thumbnail();
    } else {
    	$image_header = new Image(carbon_get_term_meta($term->term_id, 'image_drawing'));
    }

    $context['header_image'] = [
        'drawing' => $image_header,
        'animals' => new Image(carbon_get_term_meta($term->term_id, 'image_header'))
    ];

    $context['impression_interior'] = new Image(carbon_get_term_meta($term->term_id, 'image_interior'));
    $context['impression_title'] = carbon_get_term_meta($term->term_id, 'impression_title');
    $context['living_area'] = carbon_get_term_meta($term->term_id, 'living_area');
    $context['extra_attributes'] = carbon_get_term_meta($term->term_id, 'extra_attributes');

    $context['floor_plan'] = new Image(carbon_get_term_meta($term->term_id, 'image_plan'));
    $context['image_theme'] = new Image(carbon_get_term_meta($term->term_id, 'image_theme'));
    $context['image_impression'] = new Image(carbon_get_term_meta($term->term_id, 'image_impression'));
    $context['downloads'] = carbon_get_term_meta($term->term_id, 'type_download');
}

return Timber::render(
	$templates,
	$context
);

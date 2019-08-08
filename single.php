<?php

use Timber\Post;
use Timber\Timber;

$context = Timber::get_context();

$context ['post'] = new Post();

return Timber::render(
	[
		'views/single/' . $context[ 'post' ]->post_type . '/' . $context[ 'post' ]->id . '.twig',
		'views/single/' . $context[ 'post' ]->post_type . '/' . $context[ 'post' ]->slug . '.twig',
		'views/single/' . $context[ 'post' ]->id . '.twig',
		'views/single/' . $context[ 'post' ]->slug . '.twig',
		'views/single/' . $context[ 'post' ]->post_type . '.twig',
		'views/single.twig',
		'views/index.twig'
	],
	$context
);

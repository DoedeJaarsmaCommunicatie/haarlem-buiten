<?php

$context = \Timber\Timber::get_context();

$context ['post'] = new \Timber\Post();

$templates = [
	'views/index.twig'
];

if (post_password_required($context['post']->id)) {
	array_unshift($templates, 'views/single/password.html.twig');
}

return \Timber\Timber::render(
    $templates,
    $context
);

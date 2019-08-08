<?php

$context = \Timber\Timber::get_context();

$context ['post'] = new \Timber\Post();

return \Timber\Timber::render(
    [
        'views/index.twig',
    ],
    $context
);

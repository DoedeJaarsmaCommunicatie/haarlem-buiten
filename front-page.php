<?php

$context = \Timber\Timber::get_context();

$context ['post'] = new \Timber\Post();

\Timber\Timber::render([
    'views/front-page.twig',
    'views/index.twig'
], $context);

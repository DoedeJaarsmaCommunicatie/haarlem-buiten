<?php

$context = \Timber\Timber::get_context();

return \Timber\Timber::render(
    [
        'views/index.twig',
    ],
    $context
);

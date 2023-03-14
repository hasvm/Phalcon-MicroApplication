<?php

use Phalcon\Loader;

$loader = new Loader();
$loader->registerNamespaces(
  [
    'Api\Services'    => realpath(__DIR__ . '/../services/'),
    'Api\Controllers' => realpath(__DIR__ . '/../controllers/'),
    'Api\Models'      => realpath(__DIR__ . '/../models/'),
  ]
);

$loader->register();
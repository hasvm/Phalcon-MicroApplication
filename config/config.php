<?php

use Phalcon\Config;

return new Config(
    [
        'database' => [
            'host' => 'mysql',
            'username' => 'api_challenge',
            'password' => '5PdZ46faeaYrNeW22R3UATRUj',
            'dbname' => 'api_challenge',
        ],

        'application' => [
            'controllersDir' => "../api/controllers/",
            'modelsDir' => "../api/models/",
            'baseUri' => "/",
        ],
    ]
);
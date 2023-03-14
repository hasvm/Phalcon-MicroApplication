<?php

  use Phalcon\Mvc\Micro;

  $config = require('./config/config.php');

  require('./config/loader.php');

  $di = require('./config/di.php');

  $app = new Micro();

  $app->setDI($di);

  require('./config/routes.php');

  $app->handle();
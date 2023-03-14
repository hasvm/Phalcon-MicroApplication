<?php

use Phalcon\DI\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Http\Response;

$di = new FactoryDefault();

$di->setShared('config', $config);

$di->set(
  "db",
  function () use ($config) {
      return new Mysql(
        [
          "host"     => $config->database->host,
          "username" => $config->database->username,
          "password" => $config->database->password,
          "dbname"   => $config->database->dbname,
        ]
      );
  }
);

return $di;
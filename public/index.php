<?php

use App\core\Router;
use App\core\RoutersFilter;

require '../vendor/autoload.php';
session_start();
$test = new RoutersFilter();
// dump($test->get());
Router::run();
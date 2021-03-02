<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


use App\Application;

require 'vendor/autoload.php';

echo json_encode((new Application())->execute());
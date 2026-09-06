<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager as Capsule;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad(); 

require_once dirname(__DIR__) . '/config/database.php';

$container = require_once dirname(__DIR__) . '/config/container.php';

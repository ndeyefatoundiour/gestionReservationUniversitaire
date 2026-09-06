<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Illuminate\Database\Capsule\Manager as Capsule; 

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions([
    
    'app.debug' => (bool) ($_ENV['APP_DEBUG'] ?? false),
    'app.env'   => $_ENV['APP_ENV'] ?? 'production',

    Capsule::class => function () {
        return Capsule::class;
    }
]);

return $containerBuilder->build();

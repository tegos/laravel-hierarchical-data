<?php

declare(strict_types=1);

$path = base_path('routes/api-v1');

$routeFiles = glob($path . '/*.php');

foreach ($routeFiles as $routeFile) {
    require $routeFile;
}

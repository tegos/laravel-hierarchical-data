<?php

declare(strict_types=1);
use App\Providers\AppServiceProvider;
use App\Providers\RouteServiceProvider;
use App\Providers\TelescopeServiceProvider;

return [
    AppServiceProvider::class,
    RouteServiceProvider::class,
    TelescopeServiceProvider::class,
];

<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Actions\Catalog\ListCategoryRandomPathAction;
use Illuminate\Console\Command;

final class CategoryRandomPath extends Command
{
    protected $signature = 'catalog:category-random-path';

    protected $description = 'Random category paths';

    public function handle(ListCategoryRandomPathAction $listCategoryRandomPathAction): int
    {
        $categoryPaths = $listCategoryRandomPathAction->handle();

        $this->info(json_encode($categoryPaths, JSON_PRETTY_PRINT));

        return self::SUCCESS;
    }
}

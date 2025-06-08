<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Actions\Catalog\ListCategoryTreeAdjacencyAction;
use App\Actions\Catalog\ListCategoryTreeNestedSetAction;
use App\Actions\Catalog\ListCategoryTreeRecursiveAction;
use Illuminate\Console\Command;
use Illuminate\Support\Benchmark;

final class CategoryBenchmarkTree extends Command
{
    protected $signature = 'catalog:category-benchmark-tree';

    protected $description = 'Benchmark different category tree implementation strategies';

    public function handle(
        ListCategoryTreeRecursiveAction $listCategoryTreeRecursiveAction,
        ListCategoryTreeAdjacencyAction $listCategoryTreeAdjacencyAction,
        ListCategoryTreeNestedSetAction $listCategoryTreeNestedSetAction,
    ): int
    {
        $measures = Benchmark::measure([
            class_basename(ListCategoryTreeRecursiveAction::class) => fn() => $listCategoryTreeRecursiveAction->handle(),
            class_basename(ListCategoryTreeAdjacencyAction::class) => fn() => $listCategoryTreeAdjacencyAction->handle(),
            class_basename(ListCategoryTreeNestedSetAction::class) => fn() => $listCategoryTreeNestedSetAction->handle(),
        ], 100);

        $this->table(array_keys($measures), [$measures]);

        return self::SUCCESS;
    }
}

<?php

declare(strict_types=1);

namespace App\Actions\Catalog;

use App\Actions\Actionable;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

final class ListCategoryTreeAdjacencyAction implements Actionable
{
    public function handle(): Collection
    {
        return Category::tree()->get()->toTree();
    }
}

<?php

declare(strict_types=1);

namespace App\Actions\Catalog;

use App\Actions\Actionable;
use App\Models\CategoryNode;
use Kalnoy\Nestedset\Collection;

final class ListCategoryTreeNestedSetAction implements Actionable
{
    public function handle(): Collection
    {
        /** @var Collection $categories */
        $categories = CategoryNode::query()->get();

        return $categories->toTree();
    }
}

<?php

namespace App\Actions\Catalog;

use App\Actions\Actionable;
use App\Models\Category;
use App\Models\CategoryNode;
use Illuminate\Database\Eloquent\Collection;

final class ListCategoryTreeNestedSetAction implements Actionable
{
    public function handle(): Collection
    {
        return CategoryNode::query()->get()->toTree();
    }
}

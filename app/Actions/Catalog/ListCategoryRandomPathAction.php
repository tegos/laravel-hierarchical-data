<?php

declare(strict_types=1);

namespace App\Actions\Catalog;

use App\Actions\Actionable;
use App\Models\Category;
use App\Models\CategoryNode;
use Illuminate\Support\Collection;

final class ListCategoryRandomPathAction implements Actionable
{
    public function handle(): Collection
    {
        $depth3Categories = CategoryNode::withDepth()->having('depth', '=', 2)->get()->random(10);

        $categoryPaths = Collection::make();

        foreach ($depth3Categories as $category) {
            $ancestorsAndSelf = Category::query()->find($category->id)->ancestorsAndSelf()->get()->reverse();
            $path = $ancestorsAndSelf->map(fn($ancestor) => $ancestor->name)->implode(' → ');
            $categoryPaths->push($path);
        }

        return $categoryPaths;
    }
}

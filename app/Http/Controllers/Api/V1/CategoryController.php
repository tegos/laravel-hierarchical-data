<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Catalog\ListCategoryTreeAdjacencyAction;
use App\Actions\Catalog\ListCategoryTreeRecursiveAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class CategoryController extends Controller
{
    public function treeRecursive(ListCategoryTreeRecursiveAction $listCategoryTreeRecursiveAction): AnonymousResourceCollection
    {
        $categories = $listCategoryTreeRecursiveAction->handle();

        return CategoryResource::collection($categories);
    }

    public function treeAdjacency(ListCategoryTreeAdjacencyAction $listCategoryTreeAdjacencyAction): AnonymousResourceCollection
    {
        $categories = $listCategoryTreeAdjacencyAction->handle();

        return CategoryResource::collection($categories);
    }
}

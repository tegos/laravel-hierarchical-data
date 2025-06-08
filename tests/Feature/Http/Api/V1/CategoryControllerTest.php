<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Api\V1;

use App\Http\Resources\CategoryResource;
use Database\Factories\CategoryFactory;
use Tests\TestCase;

final class CategoryControllerTest extends TestCase
{
    public function test_tree_recursive_returns_category_resource_collection(): void
    {
        $categories = CategoryFactory::new()->count(5)->create();

        $response = $this->getJson(route('api-v1:catalog.categories.tree.recursive'));

        $response->assertOk()
            ->assertJson(CategoryResource::collection($categories)->response()->getData(true));
    }

    public function test_tree_adjacency_returns_category_resource_collection(): void
    {
        $categories = CategoryFactory::new()->count(5)->create();

        $response = $this->getJson(route('api-v1:catalog.categories.tree.adjacency'));

        $response->assertOk()
            ->assertJson(CategoryResource::collection($categories)->response()->getData(true));
    }

    public function test_tree_nested_set_returns_category_resource_collection(): void
    {
        $categories = CategoryFactory::new()->count(5)->create();

        $response = $this->getJson(route('api-v1:catalog.categories.tree.nested.set'));

        $response->assertOk()
            ->assertJson(CategoryResource::collection($categories)->response()->getData(true));
    }
}

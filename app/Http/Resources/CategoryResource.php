<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class CategoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        /** @var Category $resource */
        $resource = $this->resource;

        return [
            'id' => $resource->id,
            'name' => $resource->name,
            'slug' => $resource->slug,
            'parent_id' => $resource->parent_id,
            'children' => CategoryResource::collection($this->whenLoaded('children')),
        ];
    }
}

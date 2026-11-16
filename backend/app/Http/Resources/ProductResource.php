<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'origin' => $this->origin,
            'region' => $this->region,
            'type' => $this->type,
            'detail' => $this->detail,
            'description' => $this->description,
            'image' => $this->image,
            'stock' => $this->whenLoaded('packages', fn () => $this->packages->sum('stock')),
            'category' => new CategoryResource($this->whenLoaded('category')),
            'packages' => ProductPackageResource::collection($this->whenLoaded('packages')),
        ];
    }
}

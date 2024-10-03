<?php
// ProdcutResouce.php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CategoryResource;

class ProdcutResouce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "price" => $this->price,
            "description" => $this->description,
            "image" => $this->when(filled($this->image), $this->image),
            "tags" => TagResource::collection($this->tags),
            // Only return specific fields of category to avoid circular reference
            "category" => new CategoryResource($this->whenLoaded('category')),
        ];
    }
}

<?php

namespace App\Http\Resources\products;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $category=Category::findOrFail($this->category_id);
        return [
            'id'=>$this->id,
            'product_name'=>$this->product_name,
            'category_id'=>$this->category_id,
            'quantity'=>$this->quantity,
            'price'=>$this->price,
            'category_name'=>$category->category_name,
            'image'=>$this->image
        ];
    }
}

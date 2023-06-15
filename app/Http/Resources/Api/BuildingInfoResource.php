<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BuildingInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        //  return parent::toArray($request);
        return [
            'id' =>   $this->id,
            'index' =>   $this->item[0]->index,
            'name' =>   @$this->item[0]->name,
            'value' =>   @$this->value,
            'description' =>   @$this->description,
            'category_order' =>   $this->item[0]->category->order_column . ' ' . $this->item[0]->category->name,
            'category_name' =>   $this->item[0]->category->name,


        ];
    }
}

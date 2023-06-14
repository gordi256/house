<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InfoItemListResource extends JsonResource
{



    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        // return parent::toArray($request);
        return [
            'id' =>   $this->id,
            'name' =>   $this->name,
            // 'unit' =>  $this->unit,
            // 'index' =>   $this->category->id . '.' . $this->order_column,
            // 'rate' =>   $this->rate,
            'edit_link' => @$this->edit_link,
            'trashed' => @$this->trashed(),

        ];
    }
}

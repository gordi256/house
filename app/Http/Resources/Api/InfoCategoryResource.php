<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InfoCategoryResource extends JsonResource
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
            'item_count' =>   $this->item_count,
            'edit_link' => @$this->edit_link,
            'show_link' => @$this->show_link,
            'trashed' => @$this->trashed(),
        ];
    }
}

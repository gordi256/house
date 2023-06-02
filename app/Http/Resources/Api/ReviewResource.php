<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'creator' =>   @$this->creator->fio,
            'edit_link' => @$this->edit_link,
            'building' => @$this->building->name,
            'review_total' => @$this->review_total,
            'check_color' => @$this->check_color,
            'created_at' => @$this->created_at->diffForHumans(),
            'trashed' => @$this->trashed(),

        ];
    }
}

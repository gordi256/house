<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BuildingResource extends JsonResource
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
            'organization' =>   $this->organization,
            'edit_link' => @$this->edit_link,
            'show_link' => @$this->show_link,

            'review_count' => @$this->review_count,
            'report_link' => @$this->report_link,
            'new_report_link' => @$this->new_report_link,
            'trashed' => @$this->trashed(),

        ];
    }
}

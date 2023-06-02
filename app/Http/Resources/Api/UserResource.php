<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

    //    return parent::toArray($request);
        return [
            'id' =>   $this->id,
            'name' =>   $this->last_name . " " . $this->first_name . " " . $this->patronymic,
            'organization' =>   $this->organization,
            'role' =>   $this->user_roles,
            'email' =>   $this->email,

            'edit_link' => @$this->edit_link,
            'report_link' => @$this->report_link,
            'trashed' => @$this->trashed(),

        ];
    }
}

<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{

    // ТЕСТОВЫЙ! НЕ ИСПОЛЬЗОВАТЬ!


    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $check = array("Да", "Нет", "Отсутствует");
        $unit_type = array("м2", "м3", "шт", "");
        // return parent::toArray($request);
        return [
            'id' =>   $this->id,
            'name' =>   $this->name,
            'unit_type' =>   $unit_type[array_rand($unit_type, 1)], //$this->unit_type,
            'category_name' =>   $this->category->name,
            'index' =>   $this->category->id . '.' . $this->order_column,
            'step' => rand(1, 10), // @$this->saldo,
            'price' =>   $this->order_column . '000',

            'check' => $check[array_rand($check, 1)],
            'edit_link' => @$this->edit_link,
            'trashed' => @$this->trashed(),

        ];
    }
}

<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $check = array("Да", "Нет", "Отсутствует");
        $unit_type = array("м2", "м3", "шт", "");



        //    return parent::toArray($request); //
        //


        return [
            'id' =>   $this->id,
            'name' =>  $this->item->name,
            'unit' =>  $this->unit,
            'category_order' =>   $this->item->category->order_column . ' ' . $this->item->category->name,
            'category_name' =>   $this->item->category->name,
            'index' =>   $this->index,
            'rating' =>  $this->rating,
            'price' =>   $this->rate,
            'value' =>   $this->value,
            'description' =>   $this->description,
            'summa' => number_format(round($this->value  * $this->rate, 2), 2, '.', '') ,
            'photo_count' => $this->getMedia('images')->count(),
            'check' => $this->check,
            'check_text' => $this->check,

            'modal_link' => json_encode(['item' => $this->id]),
            // 'modal_link'=> json_encode(['item' => $this->id])  ,
            'edit_link' => @$this->edit_link,

        ];
    }
}

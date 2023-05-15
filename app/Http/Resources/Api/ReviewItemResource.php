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
            'unit' =>  $this->item->unit,
            'category_order' =>   $this->item->category->order_column . ' ' . $this->item->category->name,
            'category_name' =>   $this->item->category->name,
            'index' =>   $this->item->category->id . '.' . $this->item->order_column,
            'rating' =>  $this->rating,
            'price' =>   $this->rate,
            'value' =>   $this->value,
            'description' =>   $this->description,
            'summa' =>  round($this->value  * $this->rate, 2),
            // 'check' => $check[array_rand($check, 1)],
            'check' => $this->check,
            'modal_link'=> json_encode(['item' => $this->id])  , 
            // 'modal_link'=> json_encode(['item' => $this->id])  ,
            'edit_link' => @$this->edit_link,

        ];
    }
}

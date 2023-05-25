<?php

namespace App\Http\Livewire;

use App\Models\ReviewItem;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditItem extends  Component
{
    use WithFileUploads;

    public $photos = [];
    public $modalFormVisible = false;

    public $item_id, $check, $item_name, $rating, $rate, $description, $conclusion, $value, $unit;
    protected $listeners = ['edit_item' => 'editItem'];


    private function resetInputFields()
    {
        $this->item_id =  '';
        $this->item_name =  '';
        $this->check =  '';
        $this->rating =  '';
        $this->description =  '';
        $this->rate =  '';
        $this->conclusion =  '';
        $this->value =  '';
        $this->unit =  '';
    }

    public function editItem($item_id)
    {

        $item = ReviewItem::where('id', $item_id)->with('item')->first();
        $this->item_id = $item_id;
        $this->unit = $item->item->unit;
        $this->item_name = $item->item->name;
        $this->check = $item->check;
        $this->rating = $item->rating;
        $this->description = $item->description;
        $this->rate = $item->rate;
        $this->conclusion = $item->conclusion;
        $this->value = $item->value;

        $this->openModal();
        // }
    }

    public function openModal()
    {
        $this->dispatchBrowserEvent('openModal');
    }

    public function closeModal()
    {
        $this->dispatchBrowserEvent('closeModal');
    }

    public function render()
    {
        $this->modalFormVisible = false;
        return view('livewire.edit-item');
    }

    public function store()
    {
        // $this->validate([
        //     'name' => 'required|min:5',
        //     'price' => 'required',
        //     'currency_id' => 'required',
        // ]);


        $item = ReviewItem::find($this->item_id);
        $item->update([
            'check' => $this->check,
            'description' => $this->description,
            'rating' => $this->rating,
            'rate' => $this->rate,
            'value' => $this->value,
            'unit' => $this->unit,
            'conclusion' => $this->conclusion,
        ]);



        // $this->updateMode = false;
        $this->resetInputFields();
        // $this->dispatchBrowserEvent('alert', [
        //     'type' => 'success',
        //     'message' => "Опция сохранена!"
        // ]);
        $this->dispatchBrowserEvent('reloadTable');

        $this->dispatchBrowserEvent('closeModal');
    }
}

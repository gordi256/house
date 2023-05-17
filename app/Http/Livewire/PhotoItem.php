<?php

namespace App\Http\Livewire;

use App\Models\ReviewItem;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PhotoItem extends  Component
{
    use WithFileUploads;

    public $photos = [];

    public $images = [];

    public $modalFormVisible = false;

    public $item_id,  $item,  $media_id, $check, $item_name, $rating, $rate, $description, $conclusion, $value;
    protected $listeners = ['photo_item' => 'photoItem'];


    private function resetInputFields()
    {
        $this->item =  '';
        $this->item_id =  '';
        $this->item_name =  '';
        $this->photos =  '';
    }

    public function photoItem($item_id)
    {
        $item = ReviewItem::where('id', $item_id)->with('item')->first();
        $this->item= $item;
        $this->item_id = $item_id;
        $this->item_name = $item->item->name;

        $this->images = $item->getMedia('images');
        // dd($this->images);
        $this->openModal();
    }

    public function openModal()
    {
        $this->dispatchBrowserEvent('openModalPhoto');
    }

    public function closeModal()
    {
        $this->dispatchBrowserEvent('closeModalPhoto');
    }

    public function render()
    {
        $this->modalFormVisible = false;

        return view('livewire.bootstrap-modal', ['images' => $this->images]);
    }

    public function delete($media_id)
    {
        // dd($media_id);
        // Media::delete($media_id);


        $media = Media::find($media_id);
        $media->delete();
        $this->images =  $this->item->getMedia('images');
    }

    public function upload()
    {

        $this->validate([
            'photos.*' => 'image|mimes:jpeg,png,jpg|max:10240', // 10MB Max
        ]);

        $item = ReviewItem::find($this->item_id);
        // $item = ReviewItem::find($this->item_id);

        // dd($item, $this->photos);

        foreach ($this->photos as $photo) {
            $item
                ->addMedia($photo)
                ->toMediaCollection('images');
        }



        $this->images = $item->getMedia('images');


        // $this->updateMode = false;
        // $this->resetInputFields();
        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Фото сохранено!"
        ]);
        $this->dispatchBrowserEvent('reloadTable');

        $this->dispatchBrowserEvent('closeModal');
    }
}

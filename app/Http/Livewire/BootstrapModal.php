<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BootstrapModal extends Component
{
    public $modal= true;
    public $item_id;
    // protected $listeners = ['say-hello' => 'sayHello'];
    // public function sayHello($item_id)
    // {
    //     return view('livewire.bootstrap-modal');

    //     // your code here
    // }
    public function render()
    {
        return view('livewire.edit-item');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowComentarioPost extends Component
{
    public $post;

    protected $listeners = ['render' => 'render'];

    public function render()
    {
        return view('livewire.show-comentario-post');
    }
}

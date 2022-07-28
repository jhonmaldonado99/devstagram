<?php

namespace App\Http\Livewire;

use App\Models\Comentario;
use Livewire\Component;

class ComentarioPost extends Component
{
    public $post;
    public $comentario;

    protected $rules = [
        'comentario' => 'required|max:255'
    ];

    public function comentar()
    {
        // Validar comentario
        $this->validate();

        // Almacenar el resultado
        Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $this->post->id,
            'comentario' => $this->comentario,
        ]);

        $this->reset([
            'comentario'
        ]);

        $this->emit('render');

        // Imprimir un mensaje
        return 'Comentario realizado correctamente';
    }

    public function render()
    {
        return view('livewire.comentario-post');
    }
}

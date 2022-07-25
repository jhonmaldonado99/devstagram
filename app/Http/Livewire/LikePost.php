<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    // Los atribujos definidos en esta clase se pasan automáticamente a la vista
    // Nota: Que loco xD
    public $post;
    public $isLiked;
    public $likes;

    // mount() funciona como un constructor en livewire
    public function mount($post)
    {
        $this->isLiked = $post->checkLike(auth()->user());
        $this->likes = $post->likes->count();
    }

    public function like()
    {
        if ($this->post->checkLike( auth()->user() )) {
            $this->post->likes()->where('user_id', auth()->user()->id)->delete();
            $this->isLiked = false;
            $this->likes--;
        } else {
            $this->post->likes()->create([
                'user_id' => auth()->user()->id
            ]);
            $this->isLiked = true;
            $this->likes++;
        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
 
<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // invoke funciona como un constructor
    public function __invoke()
    {
        // Obtener a quienes seguimos
        $ids = auth()->user()->followings->pluck('id')->toArray();

        // whereIn se usa para filtrar usando un arreglo 
        // latest() Es para ordenar del más nuevo al más viejo
        $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20);

        return view('home', [
            'posts' => $posts
        ]);
    }
}
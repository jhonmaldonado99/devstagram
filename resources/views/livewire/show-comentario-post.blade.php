<div>
    <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll">

        @if ($post->comentarios->count())
            @foreach ($post->comentarios as $comentario)
                <div class="p-5 border-gray-300 border-b">
                    <a href="{{ route('posts.index', $comentario->user) }}" class="font-bold">
                        {{ $comentario->user->username }}
                    </a>
                    <p>{{ $comentario->comentario }}</p>
                    <p class="text-sm text-gray">{{ $comentario->created_at->diffForHumans() }}</p>
                </div>
            @endforeach
        @else
            <p class="p-10 text-center">No hay comentarios aún</p>
        @endif

    </div>
</div>

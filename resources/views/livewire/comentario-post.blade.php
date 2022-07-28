<div>
    @auth
        <p class="text-xl font-bold text-center mb-4">Agrega un Nuevo Comentario</p>

        @if (session('mensaje'))
            <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                {{ session('mensaje') }}
            </div>
        @endif

        <form wire:submit.prevent="comentar">
            <div class="mb-5">
                <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">Añade un
                    Comentario:</label>
                <textarea wire:model.defer="comentario" id="comentario" placeholder="Descripción de la publicación"
                    class="border p-3 w-full rounded-lg @error('comentario') border-red-400 @enderror"></textarea>
                @error('comentario')
                    <p class="bg-red-400 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <input type="submit" value="Comentar"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
        </form>
    @endauth
</div>

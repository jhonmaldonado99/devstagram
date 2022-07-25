<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        // Tomamos la imagen 
        $imagen = $request->file('file');

        // Crear nombre único para la imagen
        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        // Cortar Imagen
        $imagenServidor = Image::make($imagen);
        $imagenServidor->fit(1000, 1000);

        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
        $imagenServidor->save($imagenPath);




        return response()->json(['imagen' => $nombreImagen]);
    }
}

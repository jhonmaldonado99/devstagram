<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function store(User $user)
    {
        // Attach es como el `CREATE` que se usa en relaciones de muchos a muchos
        $user->followers()->attach( auth()->user()->id );

        return back();
    }

    public function destroy(User $user)
    {
        // Detach es como el `DESTROY` que se usa en relaciones de muchos a muchos
        $user->followers()->detach( auth()->user()->id );

        return back();
    }
}

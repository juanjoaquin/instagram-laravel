<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'username' => 'required|unique:users|min:4|max:20|not_in:twitter,editar-perfil|', 
        ]);

        if($request->imagen) {
            $imagen = $request->file('imagen');
    
            $nombreImagen = Str::uuid() . '.' . $imagen->extension();

            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000, 1000, null, 'center');

            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
        } 

        $user = User::find(auth()->user()->id);

        $user->username = $request->username;
        $user->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        $user->save();

        return redirect()->route('posts.index', $user->username);

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy("titulo", "asc")->paginate(6);
        return view("blogs.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("blogs.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->titulo = $request->input("titulo");
        $post->descripcion = $request->input("descripcion");
        $post->id_usuario = auth()->id(); // Asigna el post creado al usuario que lo ha creado

        if ($request->hasFile('imagen')) {
            if ($post->imagen) {
                Storage::disk('public')->delete($post->imagen);
            }
            $post->imagen = $request->file('imagen')->store('posts', 'public');
        }

        $post->save(); // Guardamos el usuario
        return redirect()->route('blogs.index')
            ->with('mensaje', 'Se ha creado el post correctamente'); // Nos vamos a la lista de posts
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view("blogs.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);

        if ($post->usuario->id != Auth::user()->id) {
            abort(403, 'NO tienes permiso a esta página');
        }
        return view("blogs.edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        $post = Post::findOrFail($id); // Busca la id de ese post

        $post->titulo = $request->input('titulo');
        $post->descripcion = $request->input('descripcion');

        if ($request->hasFile('imagen')) {
            if ($post->imagen) {
                Storage::disk('public')->delete($post->imagen);
            }
            $post->imagen = $request->file('imagen')->store('posts', 'public');
        }

        if ($post->usuario->id != Auth::user()->id) {
            abort(403, 'NO tienes permiso a esta página');
        }

        $post->save(); // Guardamos el producto

        return redirect()->route('blogs.index')
            ->with('mensaje', 'Se ha actualizado el post correctamente'); // Nos vamos a la lista de posts
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->imagen) {
            Storage::disk('public')->delete($post->imagen);
        }

        if ($post->usuario->id != Auth::user()->id) {
            abort(403, 'NO tienes permiso a esta página');
        }

        $post->delete();
        return redirect()->route('blogs.index')
            ->with('mensaje', 'Se ha eliminado el post correctamente');
    }


    public function search(Request $request)
    {
        $search = $request->get('search');

        $posts = Post::with('usuario')
            ->where('titulo', 'like', '%' . $search . '%')
            ->orWhere('descripcion', 'like', '%' . $search . '%')
            ->orWhereHas('usuario', function ($query) use ($search) {
                $query->where('login', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at', 'DESC')
            ->paginate(5);

        $posts->appends(['search' => $search]);

        return view('blogs.index', compact('posts', 'search'));
    }


    // Si no estamos logueado, no nos va a dejar entrar a ningun link de blog, excepto el de index y show
    public function __construct()
    {
        $this->middleware(
            'auth',
            ['except' => ['index', 'show', 'search']]
        );
    }
}

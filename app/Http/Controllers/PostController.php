<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Agregamos
use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class PostController extends Controller
{

 
    function __construct()
    {
         $this->middleware('permission:ver-post|crear-post|editar-post|borrar-post', ['only' => ['index']]);
         $this->middleware('permission:crear-post', ['only' => ['create','store']]);
         $this->middleware('permission:editar-post', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-post', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
       $post = post::latest()->paginate(5);
        return view('posts.index',compact('post'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

       // $post = Post::all();
        //return view('posts.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('posts.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //dd($request->hasFile('imagen')); //featured

        request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen'=>'required|image|mimes:jpeg,png,svg|max:1024',
        ]);
    
        $post = $request->all();

        if($imagen = $request->file('imagen')){
            $rutaGuardarimagen = 'imagenes/';
            $imagenPost = $request->descripcion.".". $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarimagen, $imagenPost);
            $post['imagen'] = "$imagenPost";
        }

        Post::create($post);
    
        return redirect()->route('posts.index')
                        ->with('success','Publicación creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): View
    {
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
    {
        return view('posts.editar',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'imagen'=>'',
        ]);

        $posteo = $request->all();

        if($imagen = $request->file('imagen')){
            $rutaGuardarimagen = 'imagenes/';
            $imagenPost = $request->descripcion.".". $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarimagen, $imagenPost);
            $posteo['imagen'] = "$imagenPost";
        }else{
            unset($posteo['imagen']);
        }
    
        $post->update($posteo);
    
        return redirect()->route('posts.index')
                        ->with('success','Publicacion actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post): RedirectResponse
    {
        $post->delete();
    
        return redirect()->route('posts.index')
                        ->with('success','Publicacion eliminada exitosamente');
    }
}

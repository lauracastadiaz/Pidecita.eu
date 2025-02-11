<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    /*TABLA CONTENIDO =  
    Este controlador define los métodos para manejar las operaciones CRUD en los posts. 
    Está correctamente implementada y hace uso del modelo Post para interactuar con la base de datos
    */

    //get - obtener contenido
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    //post - crear contenido

    public function store(Request $request)
    {
        
        $post = Post::create($request->all());
        return response()->json($post, 201);
    }

    //get - mostrar contenido

    public function show($id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }

    //put - actualizar contenido
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());

        return response()->json($post,200);
    }

    //delete - borrar contenido
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json(null, 204);
    }
}


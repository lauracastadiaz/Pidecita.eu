<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    //get - obtener usuarios
    public function index()
    {
        //$user=User::all();
        $user = Auth::user();
        $usuarios = User::where('user_id', $user->user_id)
        ->paginate(10);
        $search=request()->query('search');

        return view('usuarios.index', compact('usuarios', 'search'));
    }

    //post crear usuarios

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|max:255',

        // ]);

        // $user = Auth::user(); // Obtener el usuario autenticado actualmente
        // $request['user_id'] = $user->id; // Asignar el ID del usuario actual al campo user_id

        // $usuario = User::create($request->all());
        // return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente');

        // Validar los datos del formulario de registro
        $request->validate([
            'rol' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        // Obtener el ID del usuario administrador autenticado
        $user = Auth::user();

        // Crear el nuevo usuario con los datos del formulario
        $usuario = new User();
        $usuario->user_id = $user -> user_id;
        $usuario->rol = $request->input('rol');
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->password = bcrypt($request->input('password'));
        $usuario->save();


        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente');


    }

    //put - actualizar usuarios

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',

        ]);

        $usuario = User::find($id);
        $usuario->update($request->all());

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente');

    }


    //delete - borrar usuario

    public function destroy($id)
    {

        $usuario = User::find($id);

        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente');

    }



    //others

    public function create()
    {
        return view('usuarios.create');
    }


    public function show($id)
    {
        $usuario = User::find($id);
        return view('usuarios.show', compact('usuario'));
    }

    public function edit($id)
    {

        $usuario = User::find($id);
        return view('usuarios.edit', compact('usuario'));

    }

    public function search(Request $request)
    {
        $search = $request->query('search');
        $user = Auth::user();
        $usuarios = User::where('user_id', $user->user_id)
        ->where(function($query) use ($search) {

            $query->where('name', 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%")
            ->orWhere('password', 'like', "%$search%")
            ->orWhere('rol', 'like', "%$search%");
            
           
        })->paginate(10);

    
       return view('usuarios.index', compact('search', 'usuarios'));

    }




}
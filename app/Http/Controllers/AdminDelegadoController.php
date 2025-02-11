<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rol;
use Illuminate\Http\Request;

class AdminDelegadoController extends Controller
{
    //manejar el registro del administrador delegado:
    
    // public function store(Request $request){
    //     dd($request->all());
    //     $request->validate([
    //         'user_id' => 'required|exists:users,id',
    // ]);

    // $user = User::findOrFail($request->user_id);
    // $rol = Rol::where('name', 'admin_delegado')->first();

    // if($rol){
    //     $user->roles()->sync($rol->id);
    // } else {
    //     $rol = Rol::create(['name' => 'admin_delegado']);
    //     $user->roles()->attach($rol->id);
    // }

    // return redirect()->back()->with('success', 'Usuario registrado como administrador delegado');

    // }
}

<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use App\Models\Medico;
use App\Models\Centro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EspecialidadController extends Controller
{
    //get - obtener especialidad
    public function index()
    {
        //filtrar por usuario autenticado
        $user = Auth::user();
        $especialidades = Especialidad::with('medicos', 'centros')
        ->where('user_id', $user->user_id)
        ->paginate(10);
        $search=request()->query('search');

        //$especialidades = Especialidad::all();

        return view('especialidades.index', compact('especialidades', 'search'));
    }

    //post - crear especialidad


    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'duracion' => 'required',
            


        ]);

         // Obtener el usuario autenticado
    $user = Auth::user();

    // Crear la especialidad con el user_id del usuario autenticado
    $especialidad = new Especialidad();
    $especialidad->nombre = $request->nombre;
    $especialidad->descripcion = $request->descripcion;
    $especialidad->duracion = $request->duracion;
    $especialidad->user_id = $user->user_id; // Asignar el user_id del usuario autenticado

     // Guardar el centro en la base de datos
     $especialidad->save();
     
        // asociar medico 

        if($request->has('medicos')){
            $especialidad->medicos()->attach($request->medicos);
        }
        
        //asociar centro
        if($request->has('centros')){
            $especialidad->centros()->attach($request->centros);
        }

        return redirect()->route('especialidades.index')->with('success', 'Especialidad creada correctamente');
    }

    //put - actualizar especialidad

    public function update(Request $request, $id)
    {

        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'duracion' => 'required',
            

        ]);

        $especialidad = Especialidad::find($id);
        $especialidad->update($request->all());

        // asociar medico 

        if($request->has('medicos')){
            $especialidad->medicos()->sync($request->medicos);
        }
        
        //asociar centro
        if($request->has('centros')){
            $especialidad->centros()->sync($request->centros);
        }
        


        return redirect()->route('especialidades.index')->with('success', 'Especialidad actualizada correctamente');
    }

    // delete - borrar especialidad

    public function destroy($id)
    {

        $especialidad = Especialidad::find($id);

        // Desvincular médicos asociados si existen
        if ($especialidad->medicos()->exists()) {
        $especialidad->medicos()->detach();
        }
        // Desvincular centros asociados
        if ($especialidad->centros()->exists()) {
        $especialidad->centros()->detach();
        }

        //Eliminar especialidad
        $especialidad->delete();

        return redirect()->route('especialidades.index')->with('success', 'Especialidad borrada correctamente');

    }

    //others
    public function create()
    {
        // $medicos = Medico::all();
        // $centros = Centro::all();

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Obtener todos los médicos creados por el usuario autenticado
        $medicos = Medico::where('user_id', $user->user_id)->get();

        // Obtener todos los centros creados por el usuario autenticado
        $centros = Centro::where('user_id', $user->user_id)->get();


        return view('especialidades.create', ['medicos' => $medicos, 'centros' => $centros]);
    }

    public function show($id)
    {
        $especialidad = Especialidad::find($id);

        return view('especialidades', compact('especialidad'));
    }

    public function edit($id)
    {
        // $especialidad = Especialidad::with('centros', 'medicos')->find($id);
        // $medicos = Medico::all();
        // $centros = Centro::all();

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Obtener todas las especialidades con sus medicos y centros asociados
        $especialidad= Especialidad::with('medicos', 'centros')->find($id);

        // Obtener todos los médicos creados por el usuario autenticado
        $medicos = Medico::where('user_id', $user->user_id)->get();

        // Obtener todos los centros creados por el usuario autenticado
        $centros = Centro::where('user_id', $user->user_id)->get();



        return view('especialidades.edit', compact('especialidad', 'medicos', 'centros'));
    }



    //buscar

    public function search(Request $request){
        $search = $request->query('search');
        $user = Auth::user();
        $especialidades = Especialidad::with('medicos', 'centros')
        ->where('user_id', $user->user_id)
        ->where(function($query) use ($search) {

            $query->where('nombre', 'like', "%$search%")
            ->orWhere('descripcion', 'like', "%$search%")
            ->orWhere('duracion', 'like', "%$search%")
            ->orWhereHas('medicos', function($query) use ($search) {
                $query->where('nombre', 'like', "%$search%");
            })
            ->orWhereHas('centros', function($query) use ($search) {
                $query->where('nombre', 'like', "%$search%");
            });
        })->paginate(10);

       
       return view('especialidades.index', compact('search', 'especialidades'));

    }

    

}

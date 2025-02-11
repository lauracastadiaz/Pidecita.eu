<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Especialidad;
use App\Models\Centro;
use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CentroController extends Controller
{

    //get - obtener centro
    public function index()
    {

        //filtrar por usuario
        $user = Auth::user();
        $centros = Centro::with('medicos', 'especialidades', 'horario')
            ->where('user_id', $user->user_id)
            ->paginate(10);
        $search = request()->query('search');


        //$centros = Centro::all();
        return view('centros.index', compact('centros', 'search'));
    }

    //post - crear centro


    public function store(Request $request)
    {

        
        $request->validate([
            'nombre' => 'required|max:255',
            'direccion' => 'required',
        ]);

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Crear el centro con el user_id del usuario autenticado
        $centro = new Centro();
        $centro->nombre = $request->nombre;
        $centro->direccion = $request->direccion;
        $centro->user_id = $user->user_id; // Asignar el user_id del usuario autenticado

        // Guardar el centro en la base de datos
        $centro->save();

        // Guardar los horarios en la tabla horarios
        $horarios = new Horario();
        $horarios->centro_id = $centro->id;

        // Procesar y asignar horarios para cada día
        $dias = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];
        foreach ($dias as $dia) {
            if ($request->has('descanso_' . $dia)) {
                $horarios->$dia=['de'=>['00:00'],'a'=>['00:00']];
            } else {
                $horarios->$dia = ($request->$dia);
            }
        }

        // Convertir las fechas de descanso en fechas prohibidas
        $dias_descanso = [];
        foreach ($dias as $dia) {
            if ($request->has('descanso_' . $dia)) {
                $dias_descanso[] = $dia;
            }
        }
        $horarios->dias_descanso = ($dias_descanso);

        //Obtención de datos del request
        $fechas_excepcionales = explode(', ', $request->input('fechas_excepcionales', ''));
        $fechas_no_disponibles = explode(', ', $request->input('fechas_no_disponibles', ''));

       
        $horarios->fechas_excepcionales = ($fechas_excepcionales);
        $horarios->fechas_no_disponibles = ($fechas_no_disponibles);

       // dd($horarios);
        $horarios->save();

        // Asociar médicos si se proporcionan
        if ($request->has('medicos')) {
            $centro->medicos()->attach($request->medicos);
        }

        // Asociar especialidades si se proporcionan
        if ($request->has('especialidades')) {
            $centro->especialidades()->attach($request->especialidades);
        }




        return redirect()->route('centros.index')->with('success', 'Centro creado correctamente');
    }




    //put - actualizar centro

    public function update(Request $request, $id)
    {

        $request->validate([
            'nombre' => 'required|max:255',
            'direccion' => 'required'

        ]);

        $centro = Centro::find($id);
        $centro->update($request->all());

        // Buscar o crear el registro de horarios
        $horarios = Horario::firstOrNew(['centro_id' => $id]);

        // Actualizar horarios 
        $dias = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];

        foreach ($dias as $dia) {
            if ($request->has('descanso_' . $dia)) {
                $horarios->$dia = ['de' => ['00:00'], 'a' => ['00:00']];
            } else {
                $horarios->$dia = ($request->input($dia, []));
            }
        }

        $dias_descanso = [];
        foreach ($dias as $dia) {
            if ($request->has('descanso_' . $dia)) {
                $dias_descanso[] = $dia;
            }
        }
        $horarios->dias_descanso = ($dias_descanso);


        $fechas_excepcionales = explode(', ', $request->input('fechas_excepcionales', ''));
        $fechas_no_disponibles = explode(', ', $request->input('fechas_no_disponibles', ''));

        $horarios->fechas_excepcionales = ($fechas_excepcionales);
        $horarios->fechas_no_disponibles = ($fechas_no_disponibles);

        //dd($request->all());
        //dd($horarios);
        $horarios->save();


        //asociar medico si se proporciona

        if ($request->has('medicos')) {
            $centro->medicos()->sync($request->medicos);
        }
        //asociar especialidad si se proporciona

        if ($request->has('especialidades')) {
            $centro->especialidades()->sync($request->especialidades);
        }


        return redirect()->route('centros.index')->with('success', 'Centro actualizado correctamente');

    }

    // delete - borrar centro

    public function destroy($id)
    {

        $centro = Centro::find($id);

        //desvincular médicos asociados si existen
        if ($centro->medicos()->exists()) {
            $centro->medicos()->detach();
        }


        //desvincular especialidades asociadas si existen
        if ($centro->especialidades()->exists()) {
            $centro->especialidades()->detach();
        }
        //borrar centro
        $centro->delete();

        return redirect()->route('centros.index')->with('success', 'Centro borrado correctamente');

    }


    //others
    public function create()
    {
        // $especialidades = Especialidad::all();
        // $medicos = Medico::all();

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Obtener las especialidades creadas por el usuario autenticado
        $especialidades = Especialidad::where('user_id', $user->user_id)->get();

        // Obtener los médicos creados por el usuario autenticado
        $medicos = Medico::where('user_id', $user->user_id)->get();

        return view('centros.create', ['especialidades' => $especialidades, 'medicos' => $medicos]);


    }

    public function show($id)
    {
        $centro = Centro::find($id);

        return view('centros.show', compact('centro'));
    }

    public function edit($id)
    {
        // Obtener el centro con sus médicos y especialidades asociadas
        $centro = Centro::find($id);

        // Obtener todos los médicos creados por el usuario autenticado
        $user = Auth::user();
        //$medicos = Medico::where('user_id', $user->user_id)->get();

        // Obtener todas las especialidades creadas por el usuario autenticado
        //$especialidades = Especialidad::where('user_id', $user->user_id)->get();

        // Obtener los horarios asociados al centro
        //$horarios = Horario::where('centro_id', $id)->get();


        return view('centros.edit', compact('centro'));
    }


    //buscar

    public function search(Request $request)
    {
        $search = $request->query('search');
        $user = Auth::user();
        $centros = Centro::
            where('user_id', $user->user_id)
            ->where(function ($query) use ($search) {

                $query->where('nombre', 'like', "%$search%")
                    ->orWhere('direccion', 'like', "%$search%")
                    ->orWhereHas('especialidades', function ($query) use ($search) {
                        $query->where('nombre', 'like', "%$search%");
                    })
                    ->orWhereHas('medicos', function ($query) use ($search) {
                        $query->where('nombre', 'like', "%$search%");
                    });
            })->paginate(10);


        return view('centros.index', compact('search', 'centros'));

    }


//     public function getHorarios(Request $request)
// {
//     $centroId = $request->centro_id;
    
//     // Obtener el centro con los horarios asociados
//     $centro = Centro::with('horario')->find($centroId);
    
//     // Obtener los horarios del centro
//     $horarios = $centro->horarios; 
    
//     return response()->json($horarios);
// }


   






}
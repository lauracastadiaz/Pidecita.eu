<?php

namespace App\Http\Controllers;

use App\Models\HorarioProfesional;
use Illuminate\Http\Request;
use App\Models\Medico;
use App\Models\Horario;
use App\Models\Especialidad;
use App\Models\Centro;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class MedicoController extends Controller
{


    //get - obtener medico
    public function index()
    {
        // $medicos = Medico::all();

        // Obtener el usuario autenticado
        $user = auth()->user();
        $medicos = Medico::with('especialidades', 'centros')
            ->where('user_id', $user->user_id)
            ->paginate(10);
        $search = request()->query('search');

        return view('medicos.index', compact('medicos', 'search'));
    }

    //post - crear medicos


    public function store(Request $request)
    {


        //dd($request->all());
        $request->validate([
            'nombre' => 'required|max:255',
            'telefono' => 'required',
            'email' => 'required',
            'direccion' => 'required',
            'nif' => 'required',


        ]);

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Crear el medico con el user_id del usuario autenticado
        $medico = new Medico();
        $medico->nombre = $request->nombre;
        $medico->telefono = $request->telefono;
        $medico->email = $request->email;
        $medico->direccion = $request->direccion;
        $medico->nif = $request->nif;
        $medico->user_id = $user->user_id; // Asignar el user_id del usuario autenticado

        // Guardar el centro en la base de datos
        $medico->save();

       

        // Procesar y guardar los horarios del médico en la tabla horarios_profesionales
        $centros = $request->input('centros', []);
        
        foreach ($centros as $centro_id) {
            $horarios_profesionales = new HorarioProfesional();
            $horarios_profesionales->medico_id = $medico->id;
            $horarios_profesionales->centro_id = $centro_id;
        }

        // Procesar y asignar horarios para cada día
        $dias = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];
        foreach ($dias as $dia) {
            if ($request->has('descanso_' . $dia)) {
                $horarios_profesionales->$dia = ['de' => ['00:00'], 'a' => ['00:00']];
            } else {
                $horarios_profesionales->$dia = ([
                    'de' => $request->input('horarios_profesionales.' . $dia . '.de', []),
                    'a' => $request->input('horarios_profesionales.' . $dia . '.a', [])
                ]);
            }
        }


        $dias_descanso = [];
        foreach ($dias as $dia) {
            if ($request->has('descanso_' . $dia)) {
                $dias_descanso[] = $dia;
            }
        }
        $horarios_profesionales->dias_descanso = $dias_descanso;

        //Obtención de datos del request
        $fechas_excepcionales = explode(', ', $request->input('fechas_excepcionales', ''));
        $fechas_no_disponibles = explode(', ', $request->input('fechas_no_disponibles', ''));


        $horarios_profesionales->fechas_excepcionales = $fechas_excepcionales;
        $horarios_profesionales->fechas_no_disponibles = $fechas_no_disponibles;

        //dd($horarios_profesionales);


       
        // Guardar los horarios en la base de datos
        $horarios_profesionales->save();
        
         // Asociar centro si se proporciona
         if ($request->has('centros')) {
            $medico->centros()->attach($request->centros);
        }

        
        // Asociar especialidad si se proporciona
        if ($request->has('especialidades')) {
            $medico->especialidades()->attach($request->especialidades);
        }

        

        return redirect()->route('medicos.index')->with('success', 'Médico creado correctamente');

    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'nombre' => 'required|max:255',
            'telefono' => 'required',
            'email' => 'required',
            'direccion' => 'required',
            'nif' => 'required',


        ]);

        $medico = Medico::find($id);
        $medico->update($request->all());

        $horarios_profesionales = HorarioProfesional::firstOrNew(['medico_id' => $id]);

        // Actualizar horarios 
        $dias = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];
       
        foreach ($dias as $dia) {
            if ($request->has('descanso_' . $dia)) {
                $horarios_profesionales->$dia = ['de' => ['00:00'], 'a' => ['00:00']];
            } else {
                $horarios_profesionales->$dia = ([
                    'de' => $request->input('horarios_profesionales.' . $dia . '.de', []),
                    'a' => $request->input('horarios_profesionales.' . $dia . '.a', [])
                ]);
            }
        }

        $dias_descanso = [];
        foreach ($dias as $dia) {
            if ($request->has('descanso_' . $dia)) {
                $dias_descanso[] = $dia;
            }
        }
        $horarios_profesionales->dias_descanso = $dias_descanso;

        //Obtención de datos del request
        $fechas_excepcionales = explode(', ', $request->input('fechas_excepcionales', ''));
        $fechas_no_disponibles = explode(', ', $request->input('fechas_no_disponibles', ''));


        $horarios_profesionales->fechas_excepcionales = $fechas_excepcionales;
        $horarios_profesionales->fechas_no_disponibles = $fechas_no_disponibles;
       

        $horarios_profesionales->save();
        
        // Asociar centro si se proporciona
        if ($request->has('centros')) {
            $medico->centros()->sync($request->centros);
        }

        // Asociar especialidad si se proporciona
        if ($request->has('especialidades')) {
            $medico->especialidades()->sync($request->especialidades);
        }


        return redirect()->route('medicos.index')->with('success', 'Medico actualizado correctamente');


        
    }

    // delete - borrar medico

    public function destroy($id)
    {

        $medico = Medico::find($id);

        // Desvincular centros asociados si existen

        if ($medico->centros()->exists()) {
            $medico->centros()->detach();
        }


        // Desvincular especialidades asociadas si existen
        if ($medico->especialidades()->exists()) {
            $medico->especialidades()->detach();
        }

        $medico->delete();

        return redirect()->route('medicos.index')->with('success', 'Medico borrado correctamente');



        // $medico = Medico::findOrFail($id);
        // $medico->delete();

        // return response()->json(null, 204);
    }


    //others
    public function create()
    {
        // $especialidades = Especialidad::all();
        // $centros = Centro::all();


        // Obtener el usuario autenticado
        $user = Auth::user();

        //Obtener las especialidades creadas por el usuario autenticado
        $especialidades = Especialidad::where('user_id', $user->user_id)->get();

        //Obtener los centros creados por el usuario autenticado
        $centros = Centro::where('user_id', $user->user_id)->get();

        // Obtener los horarios agrupados por centro_id
        // $horarios = Horario::all()->groupBy('centro_id');

       
       // return view('medicos.create', ['especialidades' => $especialidades, 'centros' => $centros, 'horarios' => $horarios]);
        return view('medicos.create', ['especialidades' => $especialidades, 'centros' => $centros]);
    }

    public function show($id)
    {
        $medico = Medico::find($id);

        return view('medicos.show', compact('medico'));
    }

    public function edit($id)
    {
        // $medico = Medico::with('centros', 'especialidades')->find($id);
        // $especialidades = Especialidad::all();
        // $centros = Centro::all();

        $medico = Medico::find($id);
        // Obtener el usuario autenticado
        $user = Auth::user();

        //Obtener el profesional con sus centros y especialidades
        //$medico = Medico::with('especialidades', 'centros')->find($id);

        //Obtener las especialidades creadas por el usuario autenticado
        //$especialidades = Especialidad::where('user_id', $user->user_id)->get();

        //Obtener los centros creados por el usuario autenticado
       // $centros = Centro::where('user_id', $user->user_id)->get();



        return view('medicos.edit', compact('medico'));
    }

    //buscar

    public function search(Request $request)
    {
        $search = $request->query('search');
        $user = Auth::user();
        $medicos = Medico::with('especialidades', 'centros')
            ->where('user_id', $user->user_id)
            ->where(function ($query) use ($search) {

                $query->where('nombre', 'like', "%$search%")
                    ->orWhere('telefono', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhere('nif', 'like', "%$search%")
                    ->orWhere('direccion', 'like', "%$search%")
                    ->orWhereHas('especialidades', function ($query) use ($search) {
                        $query->where('nombre', 'like', "%$search%");
                    })
                    ->orWhereHas('centros', function ($query) use ($search) {
                        $query->where('nombre', 'like', "%$search%");
                    });
            })->paginate(10);


        return view('medicos.index', compact('search', 'medicos'));

    }
    // public function getHorariosCentro($centro_id)
    // {
    //     $horarios = Horario::where('centro_id', $centro_id)->first();
    //     return response()->json($horarios);
    // }
    
}
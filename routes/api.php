<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\CentroController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//devuelve el usuario autenticado actualmente. 
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* agregar algo asi: Route::get('/posts', 'PostController@index');

*/




//rutas para las operaciones CRUD - https://pidecita.eu/api/posts

//Route::middleware('auth:api')->group(function () { //requerir que los usuarios estén autenticados antes de acceder a LAS RUTAS.

Route::get('/posts', [ApiController::class, 'index']);
Route::post('/posts', [ApiController::class, 'store']);
Route::get('/posts/{id}', [ApiController::class, 'show']);
Route::put('/posts/{id}', [ApiController::class, 'update']);
Route::delete('/posts/{id}', [ApiController::class, 'destroy']);
//});


//https://pidecita.eu/api/Medicos 
//probamos si recoge los datos la api

// Route::get('/medicos', function(){
//     return 'obteniendo medicos';
//  });

// Route::post('/medicos/create', function(){
//     return 'creando medicos';
//  });

// Route::get('/medicos/get/{id}', function(){
//         return 'Obteniendo un estudiante';
//      });
// Route::put('/medicos/update/{id}', function(){
//         return 'actualizando estudiante';
//      });
// Route::delete('/medicos/delete/{id}', function(){
//         return 'borrando estudiante';
//      });


//rutas de prueba
// Route::prefix('medicos')->group(function () {
//     Route::get('/', [MedicoController::class, 'index'])->name('medicos.index');
//     // Route::get('Detail', [MedicoController::class, 'show']);
//     Route::post('/create', [MedicoController::class, 'store'])->name('medicos.create');
//     Route::get('/show/{id}', [MedicoController::class, 'show'])->name('medicos.show');
//     Route::put('/update/{id}', [MedicoController::class, 'update'])->name('medicos.update');
//     Route::delete('/delete/{id}', [MedicoController::class, 'destroy'])->name('medicos.destroy');
// });



// Route::get('/medicos', [MedicoController::class, 'index'])->name('medicos.index');
// Route::post('/medicos/create', [MedicoController::class, 'store'])->name('medicos.create');
// Route::get('/medicos/get/{id}', [MedicoController::class, 'show'])->name('medicos.show');
// Route::put('/medicos/update/{id}', [MedicoController::class, 'update'])->name('medicos.update');
// Route::delete('/medicos/delete/{id}', [MedicoController::class, 'destroy'])->name('medicos.destroy');



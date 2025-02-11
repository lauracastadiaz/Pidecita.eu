<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Models\User;
use App\Models\Centro;
use App\Models\Horario;
use App\Http\Controllers\ContactanosController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\VerificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\CentroController;


require __DIR__ . '/auth.php';
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which 
| contains the "web" middleware group. Now create something great!
|
| dirige las solicitudes HTTP a las vistas correspondientes 
| en función de la URL solicitada, lo que permite la navegación y la interacción del usuario
*/

// index routing via Route feature
//Route::redirect('/', '/Dashboards/Patient');

//cover
Route::get('/', function () {
    return view('home');
});

//auth
// Route::view('/login', 'auth.login');
// Route::view('/register', 'auth.register');
// Route::view('/reset', 'auth.passwords.reset');

//Auth::routes();

// Rutas para el controlador de autenticación
// Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
// Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');
// Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

// Rutas para el controlador de registro
// Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register');


// Rutas para el olvido de contraseña

// Route::get('/forgot-password', function () {
//     return view('auth.passwords.email');
// })->middleware('guest')->name('password.request');

// Route::post('/forgot-password', function (Request $request) {
//     $request->validate(['email' => 'required|email']);

//     $status = Password::sendResetLink(
//         $request->only('email')
//     );

//     return $status === Password::RESET_LINK_SENT
//         ? view('auth.passwords.email_sent')->with(['status' => __($status)])
//         : back()->withErrors(['email' => __($status)]);
// })->middleware('guest')->name('password.email');


// Rutas restablecer la contraseña 
// Route::get('/reset', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');


// GET para mostrar el formulario
// Route::get('/password/reset/{token}', function (string $token) {
//     return view('auth.passwords.reset', ['token' => $token]);
// })->middleware('guest')->name('password.reset');

// // POST para procesar el formulario)
// Route::post('/password/reset', function (Request $request) {
//     $request->validate([
//         'token' => 'required',
//         'email' => 'required|email',
//         'password' => 'required|min:8|confirmed',
//     ]);

//     $status = Password::reset(
//         $request->only('email', 'password', 'password_confirmation', 'token'),
//         function ($user, $password) {
//             // Asegurémonos de que el usuario exista
//             if ($user === null) {
//                 return back()->withErrors(['email' => [trans('passwords.user')]]);
//             }

//             // Guardar la nueva contraseña
//             $user->password = Hash::make($password);
//             $user->setRememberToken(Str::random(60));

//             // Si hay algún problema al guardar, devolvemos un error
//             if (!$user->save()) {
//                 return back()->withErrors(['email' => [trans('passwords.failed')]]);
//             }

//             event(new PasswordReset($user));
//         }
//     );

//     return $status === Password::PASSWORD_RESET
//         ? redirect()->route('password.reset.confirm')
//         : back()->withErrors(['email' => [__($status)]]);
// })->middleware('guest')->name('password.update');


// Rutas para verificar email 
// Route::get('/email/verify', [VerificationController::class, 'show'])
//     ->middleware(['auth'])
//     ->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
//     ->middleware(['auth', 'signed'])
//     ->name('verification.verify');

// Route::post('/email/resend', [VerificationController::class, 'resend'])
//     ->middleware(['auth', 'throttle:6,1'])
//     ->name('verification.resend');

//Ruta para registro correcto
//Route::get('/registration/success', [VerifyEmailController::class, 'registrationSuccess'])->name('registration.success');

// // Ruta para contraseña cambiada correctamente
// Route::view('/password/reset/success', 'auth.passwords.confirm')->name('password.reset.confirm');



/**-----------------------------------------
 * OTRAS RUTAS DE AUTENTICACIÓN
 * -----------------------------------------
 */

//Ruta para registro correcto
Route::view('/registration/success', 'auth.registration_success')->name('registration.success');

Route::view('/newPassword', 'auth.newPassword')->name('newPassword');










/**--------------------------------------
 * PÁGINA DE INICIO
 * --------------------------------------
 */

// Rutas para el formulario de contacto

Route::get('contacto', function () {
    return view('contact');
});


Route::get('contacto', [ContactanosController::class, 'index'])->name('contactanos.index');
Route::post('contacto', [ContactanosController::class, 'store'])->name('contactanos.store');

            //terminos y condiciones
Route::get('terminos', function () {
    return view('terminos');
});
            //el gracias por contactar (al enviarlo)

Route::get('thankyou', function () {
    return view('thankyou');
})->name('thankyou');


//Ruta para el blog
Route::get('blog', function () {
    return view('blog');
});
    //blog detail
    
    Route::get('blog_detail', function () {
        return view('blog_detail');
    });

//Ruta precios
//Route::get('/pricing', 'PricingController@index')->name('pricing.index');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/', [HomeController::class, 'mostrarPrecios'])->name('home');






/*
|--------------------------------------------------------------------------
| Pages
|--------------------------------------------------------------------------
|
*/
Route::prefix('Dashboards')->group(function () {
    Route::redirect('/', '/Dashboards/Dashboards');
    Route::view('Dashboards', 'dashboards/dashboards');
    // Route::view('Patient', 'dashboards/patient');
    // Route::view('Doctor', 'dashboards/doctor');
});




// Route::prefix('Results')->group(function () {
//     Route::view('/', 'results/index');
//     Route::view('Detail', 'results/detail');
// });
// Route::view('Prescriptions', 'prescriptions');
// Route::prefix('Doctors')->group(function () {
//     Route::view('/', 'doctors/index');
//     Route::view('Detail', 'doctors/detail');
// });
// Route::view('Consult', 'consult');
// Route::view('Guidebook', 'guidebook');
// Route::prefix('Articles')->group(function () {
//     Route::view('/', 'articles/index');
//     Route::view('Detail', 'articles/detail');
// });


// Route::prefix('Medicos')->group(function () {
//     Route::view('/', 'doctors/index');
//     Route::view('Detail', 'doctors/detail');
// });
// Route::prefix('Centros')->group(function () {
//     Route::view('/', 'centros/index');
//     // Route::view('Detail', 'listado/centros/detail');
// });
// Route::prefix('Especialidades')->group(function () {
//     Route::view('/', 'especialidades/index');
//     // Route::view('Detail', 'listado/doctors/detail');
// });

Route::prefix('Appointments')->group(function () {
    Route::view('/', 'appointments/index');
   Route::view('New', 'appointments/new');
});
Route::prefix('Articles')->group(function () {
    Route::view('/', 'articles/index');
   Route::view('Detail', 'articles/detail');
});

Route::view('Settings', 'settings');




/*
|--------------------------------------------------------------------------
| Paginas dentro de Dashboard al pulsar en la imagen del usuario
|--------------------------------------------------------------------------
|
*/

// Ruta temas
Route::get('temas', function () {
    return view('temas');
});


//Ruta usuario

Route::get('usuario', function () {
    return view('usuario');
});


//Ruta Calendario

Route::get('calendar', function () {
    return view('calendar');
});


//Ruta preferencias

Route::get('preferencias', function () {
    return view('preferencias');
});


//Ruta seguridad

Route::get('seguridad', function () {
    return view('seguridad');
});

//Ruta facturacion

Route::get('facturacion', function () {
    return view('facturacion');
});


//Ruta Dispositivos

Route::get('dispositivos', function () {
    return view('dispositivos');
});

//Ruta Ayuda

Route::get('ayuda', function () {
    return view('ayuda');
});

//Ruta Memoria

Route::get('memoria', function () {
    return view('memoria');
});

//Ruta Idioma

Route::get('idioma', function () {
    return view('idioma');
});

//Ruta Ajustes

Route::get('ajustes', function () {
    return view('ajustes');
});

//Ruta Docs

Route::get('docs', function () {
    return view('docs');
});

/**
 * dentro de appointments
 */

//Ruta reseña

Route::get('reseña', function () {
    return view('reseña');
});



/**
 * RUTAS CRUD MEDICOS
 */

 // devuelve a la pagina principal con todos los creados
Route::get('/medicos', MedicoController::class .'@index')->name('medicos.index');
// devuelve un formulario que añade un medico
Route::get('/medicos/create', MedicoController::class . '@create')->name('medicos.create');
// añade un medico a la database
Route::post('/medicos/store', MedicoController::class .'@store')->name('medicos.store');
// devuelve una pagina que un médico
Route::get('/medicos/{id}', MedicoController::class .'@show')->name('medicos.show');
// devuelve el formulario para editar el medico
Route::get('/medicos/{id}/edit', MedicoController::class .'@edit')->name('medicos.edit');
// actualiza un medico
Route::put('/medicos/update/{id}', MedicoController::class .'@update')->name('medicos.update');
// borra un medico
Route::delete('/medicos/delete/{id}', MedicoController::class .'@destroy')->name('medicos.destroy');

/**
 * RUTAS CRUD ESPECIALIDADES
 */

 // devuelve a la pagina principal con todos los creados
 Route::get('/especialidades', EspecialidadController::class .'@index')->name('especialidades.index');
 // devuelve un formulario que añade una especialidad
 Route::get('/especialidades/create', EspecialidadController::class . '@create')->name('especialidades.create');
 // añade una especialidad a la database
 Route::post('/especialidades/store', EspecialidadController::class .'@store')->name('especialidades.store');
 // devuelve una pagina que una especialidad
 Route::get('/especialidades/{id}', EspecialidadController::class .'@show')->name('especialidades.show');
 // devuelve el formulario para editar una especialidad
 Route::get('/especialidades/{id}/edit', EspecialidadController::class .'@edit')->name('especialidades.edit');
 // actualiza una especialidad
 Route::put('/especialidades/update/{id}', EspecialidadController::class .'@update')->name('especialidades.update');
 // borra una especialidad
 Route::delete('/especialidades/delete/{id}', EspecialidadController::class .'@destroy')->name('especialidades.destroy');
 
 
/**
 * RUTAS CRUD CENTROS
 */

 // devuelve a la pagina principal con todos los creados
 Route::get('/centros', CentroController::class .'@index')->name('centros.index');
 // devuelve un formulario que añade una especialidad
 Route::get('/centros/create', CentroController::class . '@create')->name('centros.create');
 // añade una especialidad a la database
 Route::post('/centros/store', CentroController::class .'@store')->name('centros.store');
 // devuelve una pagina que una especialidad
 Route::get('/centros/{id}', CentroController::class .'@show')->name('centros.show');
 // devuelve el formulario para editar una especialidad
 Route::get('/centros/{id}/edit', CentroController::class .'@edit')->name('centros.edit');
 // actualiza una especialidad
 Route::put('/centros/update/{id}', CentroController::class .'@update')->name('centros.update');
 // borra una especialidad
 Route::delete('/centros/delete/{id}', CentroController::class .'@destroy')->name('centros.destroy');
 
 /**
  * RUTAS USER
  */

Route::get('/usuarios', UserController::class .'@index')->name('usuarios.index');
 // devuelve un formulario que añade un usuario
Route::get('/usuarios/create', UserController::class . '@create')->name('usuarios.create');
//  // añade un usuario a la database
Route::post('/usuarios/store', UserController::class .'@store')->name('usuarios.store');
//  // devuelve una pagina que un usuario
Route::get('/usuarios/{id}', UserController::class .'@show')->name('usuarios.show');
//  // devuelve el formulario para editar un usuario
Route::get('/usuarios/{id}/edit', UserController::class .'@edit')->name('usuarios.edit');
//  // actualiza un usuario
Route::put('/usuarios/update/{id}', UserController::class .'@update')->name('usuarios.update');
//  // borra un usuario
Route::delete('/usuarios/delete/{id}', UserController::class .'@destroy')->name('usuarios.destroy');


/**
 * RUTAS ROLES
 */

 //Route::post('/usuarios/store', [AdminDelegadoController::class, 'store'])->name('usuarios.store')->middleware('auth', 'VerificarAdminMaestro');







 /**
  * RUTAS SEARCH
  */

  //ruta para la busqueda de médicos
  Route::get('/search_medico', [MedicoController::class, 'search'])->name('medicos.search');
  //ruta para la busqueda de especialidades
  Route::get('/search_especialidad', [EspecialidadController::class, 'search'])->name('especialidades.search');
  //ruta para la busqueda de los centros
  Route::get('/search_centro', [CentroController::class, 'search'])->name('centros.search');
  //ruta para la busqueda de los usuarios
  Route::get('/search_usuario', [UserController::class, 'search'])->name('usuarios.search');


  /**
   * RUTAS HORARIOS DE LOS CENTROS
   */

Route::get('/{id}/horarios', function ($id) {
    $centro = Centro::find($id);
    return Horario::where('centro_id', $centro->id)->get();
});
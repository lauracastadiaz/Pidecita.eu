<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::VERIFICATION;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    } 


    /**
     * Muestra el aviso de verificación de correo electrónico.
     */

     public function show(){
        return view('auth.verify');
     }

     /**
      * Marca la dirección de correo electrónico del usuario autenticado como verificada.
      */

      public function verify(Request $request){

        if ($request->route('id') != $request->user()->getKey()) {
            throw new AuthorizationException;
        }

        if ($request->user()->hasVerifiedEmail()) {
            return redirect($this->redirectPath())->with('verified', true);
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }
        
        return redirect()->route('registration.success');
      }

      /**
       * Vuelve a enviar la notificación de verificación por correo electrónico.
       */
    
       public function resend(Request $request)
       {
           if ($request->user()->hasVerifiedEmail()) {
               return redirect($this->redirectPath());
           }
   
           $request->user()->sendEmailVerificationNotification();
   
           return back()->with('resent', true);
       }

       public function registrationSuccess()
{
    return view('auth.registration_success');
}
   
   

}
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageMail;
use Illuminate\Http\Request;

class ContactanosController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {

        // Comprobamos si se está recibiendo correctamente la solicitud
        // dd($request->all());

        //validar datos
        $validatedData = $request->validate([
            'contactName' => 'required|string',
            'contactEmail' => 'required|email',
            'contactPhone' => 'nullable|string',
            'contactMessage' => 'required|string',
        ]);

        // Verifiquemos si los datos validados son correctos
        // dd($validatedData);

        //Envia el correo electrónico con los datos del formulario
        Mail::to('info@pidecita.eu')->send(new ContactMessageMail($validatedData));

        // Verificar si se está enviando correctamente el correo electrónico
        //dd('Correo electrónico enviado correctamente');
        // if (Mail::failures()) {
        //     dd('Error al enviar el correo electrónico');
        // } else {
        //     dd('Correo electrónico enviado correctamente');
        // }

        // Si se marca el checkbox 'checkCopia', enviar una copia del correo al correo introducido por el usuario
        if ($request->has('checkCopia') && $request->input('checkCopia') == 'on') {
            $userEmail = $request->input('contactEmail');
            Mail::to($userEmail)->send(new ContactMessageMail($validatedData));
        }


        // Redirigir al usuario a una página de agradecimiento
        return redirect()->route('thankyou')->with('success', '¡Tu mensaje ha sido enviado con éxito!');

    }
}
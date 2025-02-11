<?php

namespace App\Http\Controllers;
use App\Models\Precio;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function mostrarPrecios()
{
    $precios = Precio::all();
    //dd($precios); //Esto muestra los datos de precios para verificar si se están recuperando correctamente
    return view('home', ['precios' => $precios]);
}

}

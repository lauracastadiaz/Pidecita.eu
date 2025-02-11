<?php

namespace App\Http\Controllers;
use App\Models\Precio;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $precios = Precio::all();

        return view('/', ['precios' => $precios]);
    }
}

@extends('layouts.app')
@php
$html_tag_data = [
"override" => '{ "attributes" : { "placement" : "vertical", "layout":"boxed", "color" : "light-green" },
"storagePrefix" : "starter-project", "showSettings" : true }'
];
$title = 'Usuarios';
$description = 'Usuarios';
$breadcrumbs = ["/" => "Inicio", "/usuarios" => "Usuarios"]
@endphp
@extends('layout', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
<link rel="stylesheet" href="/css/vendor/fullcalendar.min.css" />
@endsection

@section('js_vendor')
<script src="/js/vendor/Chart.bundle.min.js"></script>
<script src="/js/vendor/chartjs-plugin-rounded-bar.min.js"></script>
<script src="/js/vendor/chartjs-plugin-crosshair.js"></script>
<script src="/js/vendor/fullcalendar/main.min.js"></script>
@endsection

@section('js_page')
<script src="/js/cs/charts.extend.js"></script>
<script src="/js/pages/dashboards.doctor.js"></script>
@endsection

@section('content')
<div class="container">
    <!-- Title and Top Buttons Start -->
    <div class="page-title-container">
        <div class="row">
            <!-- Title Start -->
            <div class="col-12 col-md-7">
                <a href="Dashboards" class="muted-link pb-1 d-inline-block breadcrumb-back">
                    <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                    <span class="text-small align-middle">Atrás</span>
                </a>
                <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                @include('_layout.breadcrumb', ['breadcrumbs' => $breadcrumbs])
            </div>
            <!-- Title End -->
        </div>
    </div>

    <!-- Controls Start -->
    <div class="row mb-2">
        <!-- Search Start -->
        <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
            <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
                <input class="form-control" placeholder="Search" />
                <span class="search-magnifier-icon">
                    <i data-acorn-icon="search"></i>
                </span>
                <span class="search-delete-icon d-none">
                    <i data-acorn-icon="close"></i>
                </span>
            </div>
        </div>
        <!-- Search End -->
    </div>

<!--Button de añadir usuario start -->
    <!-- Botón para crear un usuario centro -->
    <div class="col-12 text-end mb-2">
        <a href="{{ route('usuarios.create') }}" class="btn btn-primary">Añadir Usuario</a>
    </div>
    <!--Button de añadir usuario end -->

    <!--Listado de usuarios start -->
    <h1>Listado de Usuarios</h1>
    @if ($usuarios->isEmpty())
    <p>No hay usuarios registrados.</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                
               
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->nombre }}</td>
               
                



                <td>
                    <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('¿Estás seguro de que quieres borrar este usuario?')">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif


    <!-- Listado de Usuarios End -->













    <!-- Listado de Médicos End -->

    <!--cargar más start -->
    <div class="row">
        <div class="col-12 text-center">
            <button class="btn btn-outline-primary sw-25">Cargar Más</button>
        </div>
    </div>

    <!-- cargar más end -->

</div>


@endsection
@extends('layouts.app')
@php
    $html_tag_data = [
        "override" => '{ "attributes" : { "placement" : "vertical", "layout":"boxed", "color" : "light-green" },
    "storagePrefix" : "starter-project", "showSettings" : true }'
    ];
    $title = 'Usuarios';
    $description = 'Usuarios';
    $breadcrumbs = ["Dashboards/Dashboards" => "Inicio", "/usuarios" => "Usuarios"]
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

                <form action="{{ route('usuarios.search') }}" method="get" class="input-group">
                    <input class="form-control" name="search" placeholder="Buscar"
                        value="{{ isset($search) ? $search : '' }}" />
                    <button type="submit" class="btn">
                        <span class="search-magnifier-icon">
                            <i data-acorn-icon="search"></i>
                        </span>
                    </button>
                    <button type="button" class="btn" onclick="clearSearch()">
                        <span class="search-delete-icon">
                            <i data-acorn-icon="close"></i>
                        </span>
                    </button>
                </form>
            </div>
        </div>
        <!-- Search End -->

        <!-- Add Professional Button Start -->
        <div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-end mb-1">
            <div class="d-inline-block">
                <div class="col-12 text-end mb-2">
                    <a href="{{ route('usuarios.create') }}" class="btn btn-primary">Añadir Usuario</a>
                </div>
            </div>
        </div>
        <!-- Add Professional Button End -->
    </div>
    <!-- Controls End -->

    <script>
        function clearSearch() {
            document.querySelector('input[name="search"]').value = '';
        }
    </script>

    <!--Listado de usuarios start -->
    <h1>Listado de Usuarios</h1>
    @if ($search !== null || $usuarios->isNotEmpty())
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Id de Usuario</th>
                    <th>Acciones</th>


                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $key => $usuario)
                    <tr>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->rol }}</td>
                        <td>{{ $usuario->user_id }}</td>





                        <td>

                            @if($key > 0)
                                <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-primary">Editar</a>
                            @endif
                            <!-- Mostrar botón de borrar solo si no es el primer usuario o el usuario autenticado -->
                            @if($key > 0 && $usuario->id !== Auth::user()->id)
                                <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('¿Estás seguro de que quieres borrar definitivamente este usuario?')">Borrar</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay usuarios registrados.</p>

    @endif


    <!-- Listado de Usuarios End -->

    <!--Pagination start -->
    <div class="card-body">
        {{ $usuarios->links() }}
    </div>
    <!--Pagination end -->










    <!-- Listado de Médicos End -->

    <!--cargar más start -->
    <!-- <div class="row">
        <div class="col-12 text-center">
            <button class="btn btn-outline-primary sw-25">Cargar Más</button>
        </div>
    </div> -->

    <!-- cargar más end -->

</div>


@endsection
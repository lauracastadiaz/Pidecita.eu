@extends('layouts.app')
@php
    $html_tag_data = [
        "override" => '{ "attributes" : { "placement" : "vertical", "layout":"boxed", "color" : "light-green" },
        "storagePrefix" : "starter-project", "showSettings" : true }'
    ];
    $title = 'Centros';
    $description = 'Centros';
    $breadcrumbs = ["/" => "Inicio", "/centros" => "Centros"]
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

                <form action="{{ route('centros.search')}}" method="get" class="input-group">
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
                    <a href="{{ route('centros.create') }}" class="btn btn-primary">Añadir Centro</a>
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

    <h1>Listado de Centros</h1>
    @if ($search !== null || $centros->isNotEmpty())

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Profesionales</th>
                    <th>Especialidades</th>
                    <th>Acciones</th>



                </tr>
            </thead>
            <tbody>
                @foreach ($centros as $centro)
                    <tr>
                        <td>{{ $centro->nombre }}</td>
                        <td>{{ $centro->direccion }}</td>

                        <td>
                            @if ($centro->medicos->isNotEmpty())
                                @foreach ($centro->medicos as $medico)
                                    {{ $medico->nombre}}
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            @else
                                N/A
                            @endif
                        </td>
                        <td>

                            @if ($centro->especialidades->isNotEmpty())
                                @foreach ($centro->especialidades as $especialidad)
                                    {{ $especialidad->nombre }}
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            @else
                                N/A
                            @endif
                        </td>
                        
                        

                        <td>
                            <a href="{{ route('centros.edit', $centro->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('centros.destroy', $centro->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Estás seguro de que quieres borrar este centro?')">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay centros registrados.</p>

    @endif


    <!-- Pagination Start -->
    <div class="card-body">
        {{ $centros->links() }}
    </div>
    <!-- Pagination End -->

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
@extends('layouts.app')
@php
    $html_tag_data = [
        "override" => '{ "attributes" : { "placement" : "vertical", "layout":"boxed", "color" : "light-green"
                                }, "storagePrefix" : "starter-project", "showSettings" : true }'
    ];
    $title = 'Especialidades';
    $description = 'especialidades';
    $breadcrumbs = ["Dashboards/Dashboards" => "Inicio", "/especialidades" => "Especialidades"]
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
<script src="/js/vendor/jquery.barrating.min.js"></script>
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
        </div>
    </div>

    <!-- Controls Start -->
    <div class="row mb-2">
        <!-- Search Start -->
        <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
            <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">

                <form action="{{ route('especialidades.search')}}" method="get" class="input-group">
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

        <!--Button de añadir especialidad start -->
        <div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-end mb-1">
            <div class="d-inline-block">
                <div class="col-12 text-end mb-2">
                    <a href="{{ route('especialidades.create') }}" class="btn btn-primary">Añadir Especialidad</a>
                </div>
            </div>
        </div>
        <!--Button de añadir profesional end -->

    </div>
    <!-- Controls End -->



    <!--script para el search -->
    <script>
        function clearSearch() {
            document.querySelector('input[name="search"]').value = '';
        }
    </script>



    <!-- Listado de especialidades Start -->

    <h1>Listado de Especialidades</h1>
    @if ($search !== null || $especialidades->isNotEmpty())

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Duración</th>
                    <th>Profesionales</th>
                    <th>Centros</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($especialidades as $especialidad)
                    <tr>
                        <td>{{ $especialidad->nombre }}</td>
                        <td>{{ $especialidad->descripcion }}</td>
                        <td>{{ $especialidad->duracion }}</td>
                        <td>
                            @if ($especialidad->medicos->isNotEmpty())
                                @foreach ($especialidad->medicos as $medico)
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
                            @if ($especialidad->centros->isNotEmpty())
                                @foreach ($especialidad->centros as $centro)
                                    {{ $centro->nombre}}
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            @else
                                N/A
                            @endif

                        </td>
                        <td>
                            <a href="{{ route('especialidades.edit', $especialidad->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('especialidades.destroy', $especialidad->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Estás seguro de que quieres borrar esta especialidad?')">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>



    @else
        <p>No hay especialidades registradas.</p>

    @endif

    <!--Pagination start-->
    <div class="card-body">
        {{ $especialidades->links() }}
    </div>
    <!--Pagination end-->

    <!-- Listado de especialidades End -->

    <!--cargar más start -->
    <!-- <div class="row">
        <div class="col-12 text-center">
            <button class="btn btn-outline-primary sw-25" id="btn-cargar-mas">Cargar Más</button>
        </div>
    </div> -->

    <!-- cargar más end -->



</div>
@endsection
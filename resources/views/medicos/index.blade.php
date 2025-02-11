@extends('layouts.app')
@php
    $html_tag_data = [
        "override" => '{ "attributes" : { "placement" : "vertical", "layout":"boxed", "color" : "light-green" },
    "storagePrefix" : "starter-project", "showSettings" : true }'
    ];
    $title = 'Profesionales';
    $description = 'Medical Assistant';
    $breadcrumbs = ["Dashboards/Dashboards" => "Inicio", "/medicos" => "Profesionales"]
@endphp
@extends('layout', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
@endsection

@section('js_vendor')
<script src="/js/vendor/jquery.barrating.min.js"></script>
@endsection

@section('js_page')
<script src="/js/pages/doctors.js"></script>

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
    <!-- Title and Top Buttons End -->

    <!-- Controls Start -->
    <div class="row mb-2">
        <!-- Search Start -->
        <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
            <div class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">

                <form action="{{ route('medicos.search') }}" method="get" class="input-group">
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
                    <a href="{{ route('medicos.create') }}" class="btn btn-primary">Añadir Profesional</a>
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


    <!-- Listado de Médicos Start -->

    <h1>Listado de Profesionales</h1>
    @if ($search != null || $medicos->isNotEmpty())
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>NIF</th>
                    <th>Direccion</th>
                    <th>Especialidades</th>
                    <th>Centro</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($medicos as $medico)
                    <tr>
                        <td>{{ $medico->nombre }}</td>
                        <td>{{ $medico->telefono }}</td>
                        <td>{{ $medico->email }}</td>
                        <td>{{ $medico->nif }}</td>
                        <td>{{ $medico->direccion }}</td>


                        <td>
                            @if ($medico->especialidades->isNotEmpty())
                                @foreach ($medico->especialidades as $especialidad)
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
                            @if ($medico->centros->isNotEmpty())
                                @foreach ($medico->centros as $centro)
                                    {{ $centro->nombre }}
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            @else
                                N/A
                            @endif
                        </td>




                        <td>
                            <a href="{{ route('medicos.edit', $medico->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('medicos.destroy', $medico->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Estás seguro de que quieres borrar este médico?')">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay profesionales registrados.</p>

    @endif


    <!-- Listado de Médicos End -->

    <!--Pagination start-->
    <div class="card-body">
        {{ $medicos->links() }}
    </div>
    <!-- pagination end-->


    <!--cargar más start -->
    <!-- <div class="row">
        <div class="col-12 text-center">
            <button class="btn btn-outline-primary sw-25">Cargar Más</button>
        </div>
    </div> -->

    <!-- cargar más end -->

</div>
@endsection
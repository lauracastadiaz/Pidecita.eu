@extends('layouts.app')
@php
$html_tag_data = ["override"=>'{ "attributes" : { "placement" : "vertical", "layout":"boxed", "color" : "light-green" },
"storagePrefix" : "starter-project", "showSettings" : true }'];
$title = 'Profesionales';
$description= 'Medical Assistant';
$breadcrumbs = ["/"=>"Inicio","/Medicos"=>"Profesionales"]
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

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
                    <span class="text-small align-middle">Inicio</span>
                </a>
                <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                @include('_layout.breadcrumb',['breadcrumbs'=>$breadcrumbs])
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

        <div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-end mb-1">
            <div class="d-inline-block">
                <!-- Export Dropdown Start -->
                <div class="d-inline-block">
                    <button class="btn p-0" data-bs-toggle="dropdown" type="button" data-bs-offset="0,3">
                        <span class="btn btn-icon btn-icon-only btn-foreground-alternate shadow dropdown"
                            data-bs-delay="0" data-bs-placement="top" data-bs-toggle="tooltip" title="Export">
                            <i data-acorn-icon="download"></i>
                        </span>
                    </button>
                    <div class="dropdown-menu shadow dropdown-menu-end">
                        <button class="dropdown-item export-copy" type="button">Copiar</button>
                        <button class="dropdown-item export-excel" type="button">Excel</button>
                        <button class="dropdown-item export-cvs" type="button">Cvs</button>
                    </div>
                </div>
                <!-- Export Dropdown End -->

                <!-- Length Start -->
                <div class="dropdown-as-select d-inline-block ms-1" data-childSelector="span">
                    <button class="btn p-0 shadow" type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" data-bs-offset="0,3">
                        <span class="btn btn-foreground-alternate dropdown-toggle" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-delay="0" title="Item Count">
                            10 Elementos
                        </span>
                    </button>
                    <div class="dropdown-menu shadow dropdown-menu-end">
                        <a class="dropdown-item" href="#">5 Elementos </a>
                        <a class="dropdown-item active" href="#">10 Elementos</a>
                        <a class="dropdown-item" href="#">20 Elementos</a>
                    </div>
                </div>
                <!-- Length End -->


                <!--Button de añadir profesional start -->
                <!-- Botón para crear un nuevo médico -->
                <div class="col-12 text-end mb-2">
                <a class="navbar-brand h1" href="{{ route('medicos.index') }}">CRUDPosts</a>
                    <a href="{{ route('medicos.create') }}" class="btn btn-primary">Añadir Médico</a>
                </div>
                <!--Button de añadir profesional end -->



            </div>
        </div>
    </div>
    <!-- Controls End -->

    <!-- Listado de Médicos Start -->

    <h1>Listado de Médicos</h1>
    @if ($medicos->isEmpty())
    <p>No hay médicos registrados.</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Especialidad</th>
                <th>NIF</th>
                <th>Direccion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicos as $medico)
            <tr>
                <td>{{ $medico->nombre }}</td>
                <td>{{ $medico->telefono }}</td>
                <td>{{ $medico->email }}</td>
                <td>{{ $medico->especialidad }}</td>
                <td>{{ $medico->NIF }}</td>
                <td>{{ $medico->direccion }}</td>
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
    @endif

    <div class="card-body">
            {{ $medicos->links() }}
    </div>

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
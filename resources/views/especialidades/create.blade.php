@extends('layouts.app')
@php
$html_tag_data = ['override' => '{ "attributes" : { "placement" : "vertical", "layout":"boxed", "color" : "light-green" }, "storagePrefix" : "starter-project", "showSettings" : true }'];
$title = 'Detalles de la Especialidad';
$description = 'Medical Assistant';
@endphp

@extends('layout', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
@endsection

@section('js_vendor')
<script src="/js/vendor/jquery.barrating.min.js"></script>
@endsection

@section('js_page')
<script src="/js/pages/doctors.detail.js"></script>
@endsection

@section('content')
<div class="container">
    <!-- Title and Top Buttons Start -->
    <div class="page-title-container">
        <div class="row">
            <!-- Title Start -->
            <div class="col-12 col-md-7">
                <a href="{{ route('especialidades.index') }}" class="muted-link pb-1 d-inline-block breadcrumb-back">
                    <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                    <span class="text-small align-middle">Atrás</span>
                </a>
                <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
            </div>
            <!-- Title End -->
        </div>
    </div>
    <!-- Title and Top Buttons End -->

    <!-- Formulario de Registro de Especialidades -->
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Formulario de Registro de Especialidad
                </div>
                <div class="card-body">
                    <form action="{{ route('especialidades.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input class="form-control" id="descripcion" name="descripcion"></input>
                        </div>
                        <div class="mb-3">
                            <label for="duracion" class="form-label">Duración</label>
                            <input type="text" class="form-control" id="duracion" name="duracion" required>
                        </div>
                        <div class="mb-3">
                            <label for="medico_id" class="form-label">Profesional Asociado:</label>
                            <select class="form-control" id="medico_id" name="medicos[]" multiple>
                                @foreach ($medicos as $medico)
                                <option value="{{ $medico->id }}">{{ $medico->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="centro_id" class="form-label">Centros Asociados:</label>
                            <select class="form-control" id="centro_id" name="centros[]" multiple>
                                @foreach ($centros as $centro)
                                <option value="{{ $centro->id }}">{{ $centro->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Campo de formulario oculto para user_id -->
                      <!--   <input type="hidden" name="user_id" value="{{ auth()->id() }}"> -->
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Formulario de Registro de Especialidades End -->
</div>
@endsection

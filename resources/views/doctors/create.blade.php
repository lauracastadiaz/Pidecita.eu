@extends('layouts.app')
@php
$html_tag_data = ["override"=>'{ "attributes" : { "placement" : "vertical", "layout":"boxed", "color" : "light-green" },
"storagePrefix" : "starter-project", "showSettings" : true }'];
$title = 'Detalles del Doctor';
$description= 'Medical Assistant';
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

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
                <a href="/Medicos" class="muted-link pb-1 d-inline-block breadcrumb-back">
                    <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                    <span class="text-small align-middle">Inicio</span>
                </a>
                <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
            </div>
            <!-- Title End -->
        </div>
    </div>
    <!-- Title and Top Buttons End -->

    <!-- Formulario de Registro de Médico -->
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Formulario de Registro de Médico
                </div>
                <div class="card-body">
                    <form action="{{ route('medicos.create') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="especialidad" class="form-label">Especialidad</label>
                            <input type="text" class="form-control" id="especialidad" name="especialidad">
                        </div>
                        <div class="mb-3">
                            <label for="nif" class="form-label">NIF</label>
                            <input type="nif" class="form-control" id="nif" name="nif">
                        </div>
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="direccion" class="form-control" id="direccion" name="direccion">
                        </div>
                        <!-- Campo de formulario oculto para user_id -->
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Formulario de Registro de Médico End -->



</div>



@endsection
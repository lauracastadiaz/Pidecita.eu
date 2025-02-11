@extends('layouts.app')
@php 
$html_tag_data = [
"override" => '{ "attributes" : { "placement" : "vertical", "layout":"boxed", "color" : "light-green" },
"storagePrefix" : "starter-project", "showSettings" : true }'
];
$title = 'Detalles del Centro';
$description = 'Medical Assistant';
@endphp 
@extends('layout', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('js_vendor')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="/js/vendor/jquery.barrating.min.js"></script>
@endsection

@section('js_page')
<script src="/js/pages/doctors.detail.js"></script>
<script src="/js/pages/horas.js"></script>
<script src="/js/forms/plus.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#diasNoDisponibles", {
            mode: "multiple",
            dateFormat: "Y-m-d",
            locale: "es" 
        });

        flatpickr("#diasExcepcionales", {
            mode: "multiple",
            dateFormat: "Y-m-d",
            locale: "es"
        });
    });
</script>
@endsection

@section('content')
<div class="container">
    <!-- Title and Top Buttons Start -->
    <div class="page-title-container">
        <div class="row">
            <!-- Title Start -->
            <div class="col-12 col-md-7">
                <a href="{{ route('centros.index') }}" class="muted-link pb-1 d-inline-block breadcrumb-back">
                    <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                    <span class="text-small align-middle">Atrás</span>
                </a>
                <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
            </div>
            <!-- Title End -->
        </div>
    </div>
    <!-- Title and Top Buttons End -->

    <!-- Formulario de Registro de Centros -->
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Formulario de Registro de Centros
                </div>
                <div class="card-body">
                    <form action="{{ route('centros.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                        </div>

                        <div class="mb-3">
                            <label for="especialidad_id" class="form-label">Especialidades Asociadas:</label>
                            <select class="form-control" id="especialidad_id" name="especialidades[]" multiple>
                                @foreach ($especialidades as $especialidad)
                                <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="medico_id" class="form-label">Profesionales Asociados:</label>
                            <select class="form-control" id="medico_id" name="medicos[]" multiple>
                                @foreach ($medicos as $medico)
                                <option value="{{ $medico->id }}">{{ $medico->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <hr><br>
                        <div class="mb-3">
                            <label class="form-label">
                                <i data-acorn-icon="alarm" class="me-2" data-acorn-size="17"></i>
                                Horarios del Centro
                            </label>

                            <table id="horariosCentro" class="table table-caption">
                                <tbody>
                                    @foreach(['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo']
                                    as $dia)
                                    <tr>

                                        <td class="p-2"><strong>{{ ucfirst($dia) }}</strong></td>
                                        <td class="p-2">De:</td>
                                        <td class="p-2">
                                            <select class="form-control selectHoras" name="{{ strtolower($dia) }}[de][]"
                                                data-horarios="06:00,14:00">
                                            </select>
                                        </td>
                                        <td class="p-2">a:</td>
                                        <td class="p-2">
                                            <select class="form-control selectHoras" name="{{ strtolower($dia) }}[a][]"
                                                data-horarios="06:00,14:00">
                                            </select>
                                        </td>
                                        <td class="p-2">
                                            <button
                                                class="btn btn-icon btn-icon-only btn-outline-primary mb-1 add-row-btn"
                                                type="button">
                                                <i data-acorn-icon="plus"></i>
                                            </button>
                                        </td>
                                        <td class="p-2">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                    name="descanso_{{ strtolower($dia) }}"
                                                    id="descanso_{{ strtolower($dia) }}" />
                                                <label class="form-check-label" for="descanso_{{ strtolower($dia) }}">Es
                                                    Día de Descanso</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>

                                    </tr>
                                    @endforeach

                                    <tr>
                                        <td colspan="7" class="p-2">
                                            <label class="form-label">
                                                <i data-acorn-icon="calendar" class="me-2" data-acorn-size="17"></i>
                                                Días No Disponibles
                                            </label>
                                            <input type="text" id="diasNoDisponibles" class="form-control mb-3"
                                                name="fechas_no_disponibles">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="p-2">
                                            <label class="form-label">
                                                <i data-acorn-icon="calendar" class="me-2" data-acorn-size="17"></i>
                                                Días Excepcionales
                                            </label>
                                            <input type="text" id="diasExcepcionales" class="form-control mb-3"
                                                name="fechas_excepcionales">
                                                <!-- <button type="button" class="btn btn-secondary" id="agregar_horario">Agregar Horario</button> -->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Formulario de Registro de Centros End -->
</div>

@endsection
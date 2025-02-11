@extends('layouts.app')
@php
$html_tag_data = [
    "override" => '{ "attributes" : { "placement" : "vertical", "layout":"boxed", "color" : "light-green" },
    "storagePrefix" : "starter-project", "showSettings" : true }'
];
$title = 'Detalles del Profesional';
$description = 'Asistente Médico';
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
<script src="/js/pages/flatpickr.js"></script>
<script src="/js/pages/horas_medico.js"></script>
<script src="/js/forms/plus_profesionales.js"></script>

@endsection

@section('content')
<div class="container">
    <div class="page-title-container">
        <div class="row">
            <div class="col-12 col-md-7">
                <a href="{{ route('medicos.index') }}" class="muted-link pb-1 d-inline-block breadcrumb-back">
                    <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                    <span class="text-small align-middle">Atrás</span>
                </a>
                <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Formulario de Registro del Profesional
                </div>
                <div class="card-body">
                    <form action="{{ route('medicos.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="nif" class="form-label">NIF</label>
                            <input type="text" class="form-control" id="nif" name="nif" required>
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
                            <label for="centro_id" class="form-label">Centros Asociados:</label>
                            <select class="form-control" id="centro_id" name="centros[]" multiple>
                                @foreach ($centros as $centro)
                                <option value="{{ $centro->id }}">{{ $centro->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <hr><br>
                        <div class="mb-3">
                            <label class="form-label">
                                <i data-acorn-icon="alarm" class="me-2" data-acorn-size="17"></i>
                                Horarios del Profesional
                            </label>
                            <table id="horariosProfesional" class="table table-caption">
                                <thead>
                                    <tr>
                                        <th>Día</th>
                                        <th>Centro</th>
                                        <th></th>
                                        <th>Inicio</th>
                                        <th></th>
                                        <th>Fin</th>
                                        <th></th>
                                        <th>Descanso</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo']
                                    as $dia)
                                    <tr>
                                        <td class="p-2"><strong>{{ ucfirst($dia) }}</strong></td>
                                        <td>
                                            <div class="mb-3">
                                                <select class="form-control"
                                                    name="centros_{{ strtolower($dia) }}">
                                                    <option value="">--Seleccione un centro--</option>
                                                    @foreach ($centros as $centro)
                                                    <option value="{{ $centro->id }}">
                                                        {{ $centro->nombre }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td class="p-2">De:</td>
                                        <td class="p-2">
                                            <select class="form-control selectHoras" id="{{ strtolower($dia) }}_de"
                                                name="horarios_profesionales[{{ strtolower($dia) }}][de][]">
                                                <option value="">Seleccionar opción</option>
                                            </select>
                                        </td>
                                        <td class="p-2">a:</td>
                                        <td class="p-2">
                                            <select class="form-control selectHoras" id="{{ strtolower($dia) }}_a"
                                                name="horarios_profesionales[{{ strtolower($dia) }}][a][]">
                                                <option value="">Seleccionar opción</option>
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
                                    @endforeach
                                    <tr>
                                        <td colspan="8" class="p-2">
                                            <label class="form-label">
                                                <i data-acorn-icon="calendar" class="me-2" data-acorn-size="17"></i>
                                                Días No Disponibles
                                            </label>
                                            <input type="text" id="diasNoDisponibles" class="form-control mb-3"
                                                name="fechas_no_disponibles">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="8" class="p-2">
                                            <label class="form-label">
                                                <i data-acorn-icon="calendar" class="me-2" data-acorn-size="17"></i>
                                                Días Excepcionales
                                            </label>
                                            <input type="text" id="diasExcepcionales" class="form-control mb-3"
                                                name="fechas_excepcionales">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

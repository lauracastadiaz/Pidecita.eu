@extends('layouts.app')
@php
$html_tag_data = [
"override" => '{ "attributes" : { "placement" : "vertical", "layout":"boxed", "color" : "light-green" },
"storagePrefix" : "starter-project", "showSettings" : true }'
];
$title = 'Centros';
$description = 'Medical Assistant';
$breadcrumbs = ["/" => "Inicio", "/medicos" => "Profesionales"]
@endphp
@extends('layout', ['html_tag_data' => $html_tag_data, 'title' => $title, 'description' => $description])

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('js_vendor')
<script src="/js/vendor/jquery.barrating.min.js"></script>
<script src="/js/cs/scrollspy.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endsection

@section('js_page')
<script src="/js/pages/doctors.js"></script>
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
                @include('_layout.breadcrumb', ['breadcrumbs' => $breadcrumbs])
            </div>
            <!-- Title End -->
        </div>
    </div>
    <!-- Title and Top Buttons End -->

    <div class="card-body">
        <h3>Actualizar Centro</h3>
        <form action="{{ route('centros.update', $centro->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $centro->nombre }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $centro->direccion }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="medico_id" class="form-label">Profesional Asociado:</label>
                <select class="form-control" id="medico_id" name="medicos[]" multiple>
                    @foreach (\App\Models\Medico::all() as $medico)
                    <option value="{{ $medico->id }}" {{ $centro->medicos->contains($medico->id) ? 'selected' : '' }}>
                        {{ $medico->nombre }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="especialidad_id" class="form-label">Especialidad Asociada:</label>
                <select class="form-control" id="especialidad_id" name="especialidades[]" multiple>
                    @foreach (\App\Models\Especialidad::all() as $especialidad)
                    <option value="{{ $especialidad->id }}"
                        {{ $centro->especialidades->contains($especialidad->id) ? 'selected' : '' }}>
                        {{ $especialidad->nombre }}
                    </option>
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

                <table id="horariosCentro" class="table table-caption bg-outline-primary">
                    <tbody>

                        @foreach(['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'] as $dia)

                        @php
                        $horarioDia = $centro->horario->$dia ?? ['de' => ['00:00'], 'a' => ['00:00']];
                        @endphp


                        @foreach($horarioDia['de'] as $key => $value)

                        <tr>
                            <td class="p-2">
                                @if ($key == 0)
                                <strong>{{ ucfirst($dia) }}</strong>
                                @endif
                            </td>
                            <td class="p-2">De:</td>
                            <td class="p-2">
                                <select class="form-control selectHoras" name="{{ strtolower($dia) }}[de][]"
                                    data-horarios="06:00,14:00" data-hora="{{$value}}">


                                </select>
                            </td>
                            <td class="p-2">a:</td>
                            <td class="p-2">
                                <select class="form-control selectHoras" name="{{ strtolower($dia) }}[a][]"
                                    data-horarios="06:00,14:00" data-hora="{{$centro->horario->$dia['a'][$key] ?? '00:00' }}">
                                </select>
                            </td>
                            <td class="p-2">
                                @if ($loop->last)
                                <button class="btn btn-icon btn-icon-only btn-outline-primary mb-1 add-row-btn"
                                    type="button">
                                    <i data-acorn-icon="plus"></i>
                                </button>
                                @endif

                            </td>
                            <td class="p-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox"
                                        name="descanso_{{ strtolower($dia) }}" id="descanso_{{ strtolower($dia) }}" value="1"  {{ $centro->horario && in_array(strtolower($dia), $centro->horario->dias_descanso ?? []) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="descanso_{{ strtolower($dia) }}">Es
                                        Día de Descanso</label>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endforeach

                        <tr>
                            <td colspan="7" class="p-2">
                                <label class="form-label">
                                    <i data-acorn-icon="calendar" class="me-2" data-acorn-size="17"></i>
                                    Días No Disponibles
                                </label>
                                <input type="text" id="diasNoDisponibles" class="form-control mb-3"
                                    name="fechas_no_disponibles"
                                    value="{{ $centro->horario ? implode(', ', $centro->horario->fechas_no_disponibles) : '' }}">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7" class="p-2">
                                <label class="form-label">
                                    <i data-acorn-icon="calendar" class="me-2" data-acorn-size="17"></i>
                                    Días Excepcionales
                                </label>
                                <input type="text" id="diasExcepcionales" class="form-control mb-3"
                                    name="fechas_excepcionales"
                                    value="{{ $centro->horario ? implode(', ', ($centro->horario->fechas_excepcionales)) : '' }}">
                            </td>
                        </tr>
                    </tbody>
                </table>



            </div>

            <!-- Campo de formulario oculto para user_id -->
            <!--  <input type="hidden" name="user_id" value="{{ auth()->id() }}"> -->
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>



</div>

@endsection
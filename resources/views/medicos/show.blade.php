@extends('layouts.app')
@php
$html_tag_data = ["override"=>'{ "attributes" : { "placement" : "vertical", "layout":"boxed", "color" : "light-green" },
"storagePrefix" : "starter-project", "showSettings" : true }'];
$title = 'Profesionales';
$description= 'Medical Assistant';
$breadcrumbs = ["/"=>"Inicio","/medicos"=>"Profesionales"]
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
                <a href="{{ route('medicos.index') }}" class="muted-link pb-1 d-inline-block breadcrumb-back">
                    <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                    <span class="text-small align-middle">Atrás</span>
                </a>
                <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                @include('_layout.breadcrumb',['breadcrumbs'=>$breadcrumbs])
            </div>
            <!-- Title End -->
        </div>
    </div>
    <!-- Title and Top Buttons End -->

    <div class="card-body">
        <a href="{{ route('medicos.index') }}"></a>
        <div class="col ">
            <a class="btn btn-sm btn-success" href="{{ route('medicos.create') }}">Añadir Médico</a>
        </div>

        <div class="card-footer">
            <a href="{{ route('medicos.edit', $medico->id) }}" class="btn btn-primary btn-sm">Editar</a>
            <form action="{{ route('medicos.destroy', $medico->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
            </form>
        </div>
    </div>



</div>

@endsection
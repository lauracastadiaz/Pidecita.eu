@extends('layouts.app')
@php
$html_tag_data = ["override"=>'{ "attributes" : { "placement" : "vertical", "layout":"boxed", "color" : "light-green" },
"storagePrefix" : "starter-project", "showSettings" : true }'];
$title = 'Detalles del Usuario';
$description= 'Formulario de registro de usuarios';
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
                <a href="{{ route('usuarios.index') }}" class="muted-link pb-1 d-inline-block breadcrumb-back">
                    <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                    <span class="text-small align-middle">Atrás</span>
                </a>
                <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
            </div>
            <!-- Title End -->
        </div>
    </div>
    <!-- Title and Top Buttons End -->

    <!-- Formulario de Registro de Usuario -->
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Formulario de Registro de Usuarios
                </div>
                <div class="card-body">
                    <form action="{{ route('usuarios.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="rol" class="form-label">Rol</label>
                            <input type="text" class="form-control" id="rol" name="rol" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre Completo</label>
                            <input class="form-control" type="text" name="name"
                                value="{{ old('name') }}" required />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control" type="email" name="email" value="{{ old('email') }}" required />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input class="form-control" name="password" type="password" required autocomplete="new-password" />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Confirmar Contraseña</label>
                            <input class="form-control" name="password_confirmation" type="password" required />
                        </div>



                        <!-- Campo de formulario oculto para user_id -->
                        <!-- <input type="hidden" name="user_id" value="{{ auth()->id() }}"> -->
                        <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Formulario de Registro de Usuario End -->



</div>



@endsection
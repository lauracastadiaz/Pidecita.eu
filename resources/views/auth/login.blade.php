@php
$html_tag_data = ["override"=>'{ "attributes" : { "placement" : "vertical", "layout":"boxed", "color" : "light-green"
}}'];
$title = 'Login Page';
$description = 'Login Page';
$img_bg = "bg-green.webp";
@endphp
@extends('layout_full',['title'=>$title, 'description'=>$description])
@section('css')
@endsection

@section('js_vendor')
<script src="/js/vendor/jquery.validate/jquery.validate.min.js"></script>
<script src="/js/vendor/jquery.validate/additional-methods.min.js"></script>
@endsection

@section('js_page')
<script src="/js/pages/auth.login.js"></script>
@endsection

@section('content_left')
<div class="min-h-100 d-flex align-items-center">
    <div class="w-100 w-lg-75 w-xxl-50">
        <div>
            <div class="mb-5">
                <h1 class="display-3 text-dark">Multiple Concepts</h1>
                <h1 class="display-3 text-dark">Ready for Your Project</h1>
            </div>
            <p class="h6 text-dark lh-1-5 mb-5">
                Dynamically target high-payoff intellectual capital for customized technologies. Objectively integrate
                emerging core competencies before
                process-centric communities...
            </p>
            <div class="mb-5">
                <a class="btn btn-lg btn-outline-dark" href="/">Learn More</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content_right')
<div
    class="sw-lg-70 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border">
    <div class="sw-lg-50 px-5">
        <div class="sh-11">
            <a href="/">
                <div class="logo-default"></div>
            </a>
        </div>
        <div class="mb-5">
            <h2 class="cta-1 mb-0 text-primary">Bienvenido,</h2>
            <h2 class="cta-1 text-primary">Iniciar Sesión</h2>
        </div>
        <div class="mb-5">

            <p class="h6">
                Si todavía no eres miembro
                <a href="/register">registrarse</a>
                .
            </p>
        </div>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        {{-- Validation Errors --}}
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div>
            <form id="loginForm" class="tooltip-end-bottom" method='post' novalidate>
                @csrf
                <div class="mb-3 filled form-group tooltip-end-top">
                    <i data-acorn-icon="email"></i>
                    <input class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" />
                </div>
                <div class="mb-3 filled form-group tooltip-end-top">
                    <i data-acorn-icon="lock-off"></i>
                    <input class="form-control pe-7" name="password" type="password" placeholder="Contraseña" />
                    <a class="text-small position-absolute t-3 e-3" href="{{ route('password.request') }}">¿Olvidó la
                        contraseña?</a>
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Iniciar Sesión</button>
            </form>
        </div>
    </div>
</div>
@endsection
@php
    $html_tag_data = ["override"=>'{ "attributes" : { "placement" : "vertical", "layout":"boxed", "color" : "light-green"  }}'];
    $title = 'Forgot Password Page';
    $description = 'Forgot Password Page';
	$img_bg = "bg-purple-1.webp";
@endphp
@extends('layout_full',['title'=>$title, 'description'=>$description])
@section('css')
@endsection

@section('js_vendor')
    <script src="/js/vendor/jquery.validate/jquery.validate.min.js"></script>
    <script src="/js/vendor/jquery.validate/additional-methods.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/pages/auth.forgotpassword.js"></script>
@endsection

@section('content_left')
    <div class="min-h-100 d-flex align-items-center">
        <div class="w-100 w-lg-75 w-xxl-50">
            <div>
                <div class="mb-5">
                    <h1 class="display-3 text-light">Multiple Niches</h1>
                    <h1 class="display-3 text-light">Ready for Your Project</h1>
                </div>
                <p class="h6 text-light lh-1-5 mb-5">
                    Dynamically target high-payoff intellectual capital for customized technologies. Objectively integrate emerging core competencies before
                    process-centric communities...
                </p>
                <div class="mb-5">
                    <a class="btn btn-lg btn-outline-light" href="/">Learn More</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content_right')
    <div class="sw-lg-70 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border">
        <div class="sw-lg-50 px-5">
            <div class="sh-11">
                <a href="/">
                    <div class="logo-default"></div>
                </a>
            </div>
            <div class="mb-5">
                <h2 class="cta-1 mb-0 text-primary">¿Olvidó Su Contraseña?</h2>
                <h2 class="cta-1 text-primary">Restablezca aquí</h2>
            </div>
            <div class="mb-5">
                <p class="h6">Por favor, introduzca el email para restablecer contraseña.</p>
                <p class="h6">
                    Si ya eres miembro, por favor
                    <a href="/login">inicie sesión</a>
                    .
                </p>
            </div>
            <div>
                <form id="forgotPasswordForm" class="tooltip-end-bottom" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-3 filled form-group tooltip-end-top">
                        <i data-acorn-icon="email"></i>
                        <input  id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary">Enviar Email</button>
                </form>
            </div>
            
        </div>
    </div>
@endsection
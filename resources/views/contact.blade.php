@php
$html_tag_data = ["override"=>'{ "attributes" : { "placement" : "horizontal", "layout":"boxed", "color" : "light-green"
}, "storagePrefix" : "starter-project", "showSettings" : false }'];
$title = 'Contacta con Pidecita';
$description= 'Ponte en contacto con nosotros para resolver tus dudas o dejarnos tus sugerencias.';
$breadcrumbs = ["/"=>"Inicio","/contacto"=>"Contacto"]
@endphp
@extends('layout_home',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
<link rel="stylesheet" href="/css/vendor/select2.min.css" />
<link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css" />
<link rel="stylesheet" href="/css/vendor/bootstrap-datepicker3.standalone.min.css" />

@endsection

@section('js_page')
<script src="/js/forms.js"></script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <!-- Title Start -->
            <section class="scroll-section" id="title">
                <div class="page-title-container">
                    <h1 class="mb-0 pb-0 display-4">{{ $title }}</h1>
                    @include('_layout.breadcrumb',['breadcrumbs'=>$breadcrumbs])
                </div>
            </section>
            <!-- Title End -->

            <!-- Content Start -->
            <div>
                <div class="card mb-5">
                    <div class="card-body">
                        <p class="mb-0">{{ $description }}</p>
                    </div>
                </div>

                <!-- Validation Errors -->

                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <!-- Contact Start -->
                <section class="scroll-section" id="contact">
                    <h2 class="small-title">Contacto</h2>
                    <form action="{{ route('contactanos.store') }}" method="POST" class="card mb-5 tooltip-end-top"
                        id="contactForm">
                        @csrf
                        <div class="card-body">
                            <p class="text-alternate mb-4">¡Nos encantaría conocer su opinión!</p>
                            <div class="mb-3 filled">
                                <i data-acorn-icon="user"></i>
                                <input class="form-control" placeholder="Name" name="contactName" value="{{ old('contactName') }}" required />
                            </div>
                            <div class="mb-3 filled">
                                <i data-acorn-icon="email"></i>
                                <input class="form-control" placeholder="Email" name="contactEmail" value="{{ old('contactEmail') }}" required />
                            </div>
                            <div class="mb-3 filled">
                                <i data-acorn-icon="phone"></i>
                                <input class="form-control" placeholder="Phone" name="contactPhone" value="{{ old('contactPhone') }}" required />
                            </div>
                            <div class="mb-3 filled">
                                <textarea placeholder="Message" class="form-control" name="contactMessage" value="{{ old('contactMessage') }}" 
                                    rows="2"></textarea>
                                <i data-acorn-icon="notebook-1"></i>
                            </div>
                            <div class="mb-3 position-relative form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="registerCheck"
                                        name="checkTerminos" required />
                                    <label class="form-check-label" for="registerCheck">
                                        He leído y acepto
                                        <a href="/terminos" target="_blank">los términos y condiciones</a>
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3 position-relative form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="copyCheck" name="checkCopia" />
                                    <label class="form-check-label" for="copyCheck">
                                        Deseo recibir una copia del formulario de contacto
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-0 pt-0 d-flex justify-content-end align-items-center">
                            <div>
                                <button class="btn btn-icon btn-icon-end btn-primary" type="submit">
                                    <span>Enviar Mensaje</span>
                                    <i data-acorn-icon="chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </section>
                <!-- Contact End -->
            </div>
            <!-- Content End -->
        </div>
    </div>
    @endsection
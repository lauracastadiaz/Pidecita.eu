@php
$html_tag_data = ["override"=>'{ "attributes" : { "placement" : "horizontal", "layout":"boxed", "color" : "light-green"  }, "storagePrefix" : "starter-project", "showSettings" : false }'];
$title = 'Pidecita';
$description= 'Mejora tu negocio médico fácil y rápido';
$breadcrumbs = ["/"=>"Inicio"]
@endphp
@extends('layout_home',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
<!--iconos bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">

@endsection

@section('js_vendor')
@endsection

@section('js_page')
    <script src="/js/pages/horizontal.js"></script>

@endsection

@section('content')
    <div class="container">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row">
                <!-- Title Start -->
                <div class="col-12 col-md-7">
                    <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                    @include('_layout.breadcrumb',['breadcrumbs'=>$breadcrumbs])
                </div>
                <!-- Title End -->
            </div>
        </div> 
        <!-- Title and Top Buttons End -->
 
        



        <!-- Content Start -->
        <div class="card mb-2">
            <div class="card-body h-100">{{ $description }}</div>
        </div> 

        <!-- CARD HOME START -->
        <div>
            @include('_layout.card_home')
        </div>
        <!-- CARD HOME END -->

        <!-- Planes start -->
        <div>
            @include('_layout.pricing')
        </div>
        <!--Planes end -->

        
        
        <!-- Content End -->
    </div>
@endsection
@extends('layouts.app')
@php
$html_tag_data = ["override"=>'{ "attributes" : { "placement" : "vertical", "layout":"boxed", "color" : "light-green"  }, "storagePrefix" : "starter-project", "showSettings" : true }'];
$title = 'Reseña';
$description= 'Reseña';
$breadcrumbs = ["/"=>"Appoinments","/reseña"=>"Reseña"]
@endphp
@extends('layout',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description])

@section('css')
    <link rel="stylesheet" href="/css/vendor/fullcalendar.min.css" />
@endsection

@section('js_vendor')
    <script src="/js/vendor/Chart.bundle.min.js"></script>
    <script src="/js/vendor/chartjs-plugin-rounded-bar.min.js"></script>
    <script src="/js/vendor/chartjs-plugin-crosshair.js"></script>
    <script src="/js/vendor/fullcalendar/main.min.js"></script>
@endsection

@section('js_page')
    <script src="/js/cs/charts.extend.js"></script>
    <script src="/js/pages/dashboards.doctor.js"></script>
@endsection

@section('content')
<div class="container">
    <!-- Title and Top Buttons Start -->
    <div class="page-title-container">
        <div class="row g-0">
            <div class="col-auto mb-2 mb-md-0 me-auto">
                <div class="w-auto sw-md-30">
                    <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                    @include('_layout.breadcrumb',['breadcrumbs'=>$breadcrumbs])
                </div>
            </div>
        </div>
        <section class="scroll-section" id="contact">
                        <h2 class="small-title">Escribe una reseña</h2>
                        <form class="card mb-5 tooltip-end-top" id="contactForm" novalidate>
                            <div class="card-body">
                                <p class="text-alternate mb-4">Queremos saber tu opinión</p>
                                <div class="mb-3 filled">
                                    <i data-acorn-icon="user"></i>
                                    <input class="form-control" placeholder="Name" name="contactName" />
                                </div>
                                <div class="mb-3 filled">
                                    <i data-acorn-icon="email"></i>
                                    <input class="form-control" placeholder="Email" name="contactEmail" />
                                </div>
                                <div class="mb-3 filled">
                                    <i data-acorn-icon="phone"></i>
                                    <input class="form-control" placeholder="Phone" name="contactPhone" />
                                </div>
                                <div class="mb-3 filled w-100">
                                    <i data-acorn-icon="category"></i>
                                    <select id="contactDepartment" name="contactDepartment" data-placeholder="Department">
                                        <option label="&nbsp;"></option>
                                        <option value="Sales">Sales</option>
                                        <option value="Human Resources">Human Resources</option>
                                        <option value="Accounting">Accounting</option>
                                    </select>
                                </div>
                                <div class="mb-3 filled">
                                    <textarea placeholder="Message" class="form-control" name="contactMessage" rows="2"></textarea>
                                    <i data-acorn-icon="notebook-1"></i>
                                </div>
                            </div>
                            <div class="card-footer border-0 pt-0 d-flex justify-content-end align-items-center">
                                <div>
                                    <button class="btn btn-icon btn-icon-end btn-primary" type="submit">
                                        <span>Send</span>
                                        <i data-acorn-icon="chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </section>
    </div>
</div>
@endsection
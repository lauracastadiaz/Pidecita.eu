@extends('layouts.app')
@php
$html_tag_data = ["override"=>'{ "attributes" : { "placement" : "vertical", "layout":"boxed", "color" : "light-green" },
"storagePrefix" : "starter-project", "showSettings" : true }'];
$title = 'Ajustes';
$description= 'Ajustes';
$breadcrumbs = ["/"=>"Usuario","/ajustes"=>"Ajustes"]
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
                <a href="Dashboards" class="muted-link pb-1 d-inline-block breadcrumb-back">
                    <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                    <span class="text-small align-middle">Inicio</span>
                </a>
                <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                @include('_layout.breadcrumb', ['breadcrumbs' => $breadcrumbs])
                </div>
            </div>
        </div>

        <div class="row gx-5">
            <div class="col-xl-8">
                <!-- Profile Start -->
                <h2 class="small-title">Perfil</h2>
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <div class="sw-6 sw-xl-14">
                                    <img src="/img/profile/profile-1.webp" class="img-fluid rounded-100" alt="thumb" />
                                </div>
                            </div>
                            <div class="col d-flex flex-column justify-content-between">
                                <div class="d-flex flex-row justify-content-between">
                                    <div>
                                        <div class="h5 mb-0 mt-2">{{ Auth::user()->name }}</div>
                                        <div class="text-muted mb-2">Highschool Teacher</div>
                                    </div>
                                    <button class="btn btn-outline-primary btn-icon btn-icon-start" type="button">
                                        <i data-acorn-icon="edit"></i>
                                        <span>Editar</span>
                                    </button>
                                </div>
                                <div class="d-flex mb-1">
                                    <div class="me-3 me-md-7">
                                        <p class="text-small text-muted mb-1">GRUPO SANGUÍNEO</p>
                                        <p class="mb-0">A+</p>
                                    </div>
                                    <div class="me-3 me-md-7">
                                        <p class="text-small text-muted mb-1">EDAD</p>
                                        <p class="mb-0">27</p>
                                    </div>
                                    <div class="me-3 me-md-7">
                                        <p class="text-small text-muted mb-1">PESO</p>
                                        <p class="mb-0">64</p>
                                    </div>
                                    <div>
                                        <p class="text-small text-muted mb-1">ALTURA</p>
                                        <p class="mb-0">1.68</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Profile End -->

                <!-- Personal Information Start -->
                <h2 class="small-title">Información Personal</h2>
                <div class="card mb-5">
                    <div class="card-body">
                        <form>
                            <div class="mb-3 row">
                                <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Nombre</label>
                                <div class="col-sm-8 col-md-9 col-lg-10">
                                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Usuario</label>
                                <div class="col-sm-8 col-md-9 col-lg-10">
                                    <input type="text" class="form-control" value="writerofrohan" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Compañía</label>
                                <div class="col-sm-8 col-md-9 col-lg-10">
                                    <input type="text" class="form-control" value="Colored Strategies" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Dirección</label>
                                <div class="col-sm-8 col-md-9 col-lg-10">
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Día de Nacimiento</label>
                                <div class="col-sm-8 col-md-9 col-lg-10">
                                    <input type="text" class="form-control date-picker-close" id="birthday"
                                        value="08/08/1988" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Género</label>
                                <div class="col-sm-8 col-md-9 col-lg-10">
                                    <select class="select-single-no-search" data-width="100%" id="genderSelect">
                                        <option label="&nbsp;"></option>
                                        <option value="1">Mujer</option>
                                        <option value="2">Hombre</option>
                                        <option value="3">Otro</option>
                                        <option value="4">Ninguno</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Bio</label>
                                <div class="col-sm-8 col-md-9 col-lg-10">
                                    <textarea class="form-control" rows="3">I'm a Cyborg, But That's OK</textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8 col-md-9 col-lg-10">
                                    <input type="email" class="form-control" value="{{ Auth::user()->email }}" />
                                </div>
                            </div>
                            <div class="mb-3 row mt-5">
                                <div class="col-sm-8 col-md-9 col-lg-10 ms-auto">
                                    <button type="submit" class="btn btn-outline-primary">Actualizar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Personal Information End -->

                <!-- Contact Start -->
                <h2 class="small-title">Contacto</h2>
                <div class="card mb-5">
                    <div class="card-body">
                        <form>
                            <div class="mb-3 row">
                                <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Email Principal</label>
                                <div class="col-sm-8 col-md-9 col-lg-10">
                                    <input type="email" class="form-control" value="{{ Auth::user()->email }}"
                                        disabled />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Email Secundario</label>
                                <div class="col-sm-8 col-md-9 col-lg-10">
                                    <input type="email" class="form-control" value="lisajackson@gmail.com" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-lg-2 col-md-3 col-sm-4 col-form-label">Telf</label>
                                <div class="col-sm-8 col-md-9 col-lg-10">
                                    <input type="text" class="form-control" value="+6443884455" />
                                </div>
                            </div>
                            <div class="mb-3 row mt-5">
                                <div class="col-sm-8 col-md-9 col-lg-10 ms-auto">
                                    <button type="submit" class="btn btn-outline-primary">Actualizar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Contact End -->
            </div>
            <div class="col-xl-4">
                <!-- Payment Methods Start -->
                <div class="d-flex justify-content-between">
                    <h2 class="small-title">Forma de Pago</h2>
                    <button class="btn btn-icon btn-icon-start btn-xs btn-background-alternate p-0 text-small pe-1"
                        type="button">
                        <i data-acorn-icon="edit" class="align-middle me-1" data-acorn-size="14"></i>
                        <span class="align-bottom">Editar</span>
                    </button>
                </div>
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="text-primary mb-1">Visa</div>
                            <div>xxxx-xxxx-xxxx-4294</div>
                            <div class="text-muted">Added on 17.02.2021</div>
                            <div class="text-muted">Active</div>
                        </div>
                        <div class="mb-4">
                            <div class="text-primary mb-1">Master Card</div>
                            <div>xxxx-xxxx-xxxx-4354</div>
                            <div class="text-muted">Added on 11.02.2021</div>
                            <div class="text-muted">Active</div>
                        </div>
                        <div>
                            <div class="text-primary mb-1">Paypal</div>
                            <div>aliciaowens@gmail.com</div>
                            <div class="text-muted">Added on 04.01.2021</div>
                            <div class="text-muted">Inactive</div>
                        </div>
                    </div>
                </div>
                <!-- Payment Methods End -->

                <!-- Billing History Start -->
                <div class="d-flex justify-content-between">
                    <h2 class="small-title">Historial de Facturas</h2>
                    <button class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small"
                        type="button">
                        <span class="align-bottom">Ver Todas</span>
                        <i data-acorn-icon="chevron-right" class="align-middle" data-acorn-size="12"></i>
                    </button>
                </div>
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="text-primary mb-1">17.07.2021</div>
                            <div>$ 19.99</div>
                            <div class="text-muted">Pago Mensual</div>
                        </div>
                        <div class="mb-4">
                            <div class="text-primary mb-1">08.06.2021</div>
                            <div>$ 3,529.05</div>
                            <div class="text-muted">Chequeo</div>
                        </div>
                        <div class="mb-4">
                            <div class="text-primary mb-1">28.06.2021</div>
                            <div>$ 144.33</div>
                            <div class="text-muted">Control Médico</div>
                        </div>
                        <div class="mb-4">
                            <div class="text-primary mb-1">11.06.2021</div>
                            <div>$ 114.21</div>
                            <div class="text-muted">Ánalisis</div>
                        </div>
                        <div>
                            <div class="text-primary mb-1">10.05.2021</div>
                            <div>$ 331.24</div>
                            <div class="text-muted">Examen Físico</div>
                        </div>
                    </div>
                </div>
                <!-- Billing History End -->
            </div>




        </div>
    </div>
</div>
@endsection
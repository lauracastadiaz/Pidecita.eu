@extends('layouts.app')
@php
$html_tag_data = ["override"=>'{ "attributes" : { "placement" : "vertical", "layout":"boxed", "color" : "light-green"  }, "storagePrefix" : "starter-project", "showSettings" : true }'];
$title = 'Facturación';
$description= 'Facturacion';
$breadcrumbs = ["/"=>"Cuenta","/facturacion"=>"Facturación"]
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
    <div class="row">
            <!-- Title Start -->
            <div class="col-12 col-md-7">
                <a href="Dashboards" class="muted-link pb-1 d-inline-block breadcrumb-back">
                    <i data-acorn-icon="chevron-left" data-acorn-size="13"></i>
                    <span class="text-small align-middle">Inicio</span>
                </a>
                <h1 class="mb-0 pb-0 display-4" id="title">{{ $title }}</h1>
                @include('_layout.breadcrumb', ['breadcrumbs' => $breadcrumbs])
            </div>
        </div>

        <!-- Personal Start -->
        <section class="scroll-section" id="personal">
                        <h2 class="small-title">Personal</h2>
                        <form class="tooltip-end-top" id="personalForm" novalidate>
                            <div class="card mb-5">
                                <div class="card-body">
                                    <p class="text-alternate mb-4">
                                        Cheesecake chocolate carrot cake pie lollipop lemon drops toffee lollipop. Oat cake jujubes chupa chups cotton candy sugar plum.
                                        Jujubes wafer topping biscuit lemon drops jelly-o muffin.
                                    </p>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" name="personalName" />
                                                <span>FULL NAME</span>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" name="personalSocialSecurityNumber" />
                                                <span>SOCIAL SECURITY NUMBER</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" name="personalPhone" />
                                                <span>PHONE</span>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" name="personalEmail" />
                                                <span>EMAIL</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" name="personalBirthday" required id="personalBirthday" />
                                                <span>BIRTHDAY</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3 top-label">
                                                <select class="form-control" name="personalGender" id="personalGender">
                                                    <option label="&nbsp;"></option>
                                                    <option value="Female">Female</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                                <span>GENDER</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3 top-label">
                                                <select class="form-control" name="personalFiling" id="personalFiling">
                                                    <option label="&nbsp;"></option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                </select>
                                                <span>FILING STATUS</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-0 pt-0 d-flex justify-content-end align-items-center">
                                    <div>
                                        <button class="btn btn-icon btn-icon-end btn-primary" type="submit">
                                            <span>Save</span>
                                            <i data-acorn-icon="chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                    <!-- Personal End -->

                    
                    <!-- Address Start -->
                    <section class="scroll-section" id="address">
                        <h2 class="small-title">Address</h2>
                        <form class="tooltip-end-top" id="addressForm">
                            <div class="card mb-5">
                                <div class="card-body">
                                    <p class="text-alternate mb-4">
                                        Cheesecake chocolate carrot cake pie lollipop lemon drops toffee lollipop. Oat cake jujubes chupa chups cotton candy sugar plum.
                                        Jujubes wafer topping biscuit lemon drops jelly-o muffin.
                                    </p>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" name="addressFirstName" />
                                                <span>FIRST NAME</span>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" name="addressLastName" />
                                                <span>LAST NAME</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" name="addressPhone" />
                                                <span>PHONE</span>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" name="addressCompany" />
                                                <span>COMPANY(OPTIONAL)</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="mb-3 top-label">
                                                <select data-width="100%" id="addressState" name="addressState"></select>
                                                <span>STATE</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="mb-3 top-label">
                                                <select data-width="100%" id="addressCity" name="addressCity"></select>
                                                <span>CITY</span>
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="mb-3 top-label">
                                                <input class="form-control" name="addressZipCode" />
                                                <span>ZIP CODE</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <div class="mb-3 top-label">
                                                <textarea class="form-control" rows="2" name="addressDetail"></textarea>
                                                <span>DETAIL</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-0 pt-0 d-flex justify-content-end align-items-center">
                                    <div>
                                        <button class="btn btn-icon btn-icon-end btn-primary" type="submit">
                                            <span>Save</span>
                                            <i data-acorn-icon="chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                    <!-- Address End -->
        
                    <!-- Date Start -->
                    <section class="scroll-section" id="date">
                        <h2 class="small-title">Date</h2>
                        <div class="card mb-5">
                            <div class="card-body">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Date</label>
                                        <input type="text" class="form-control" id="dateMask" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Initial Value</label>
                                        <input type="text" class="form-control" value="02.02.2000" id="dateInitialMask" />
                                    </div>
                                    <div>
                                        <label class="form-label">Date Chars</label>
                                        <input type="text" class="form-control" id="dateCharMask" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                    <!-- Date End -->

                    <!-- Hour Start -->
                    <section class="scroll-section" id="hour">
                        <h2 class="small-title">Hour</h2>
                        <div class="card mb-5">
                            <div class="card-body">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Hour</label>
                                        <input type="text" class="form-control" id="hourMask" />
                                    </div>
                                    <div>
                                        <label class="form-label">Hour 12(AM-PM)</label>
                                        <input type="text" class="form-control" id="hourMaskAMPM" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                    <!-- Hour End -->

                    <!-- Phone Start -->
                    <section class="scroll-section" id="phone">
                        <h2 class="small-title">Phone</h2>
                        <div class="card mb-5">
                            <div class="card-body">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">International</label>
                                        <input type="text" class="form-control" id="hourInternationalMask" />
                                    </div>
                                    <div>
                                        <label class="form-label">Domestic</label>
                                        <input type="text" class="form-control" id="hourDomesticMask" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                    <!-- Phone End -->

                    <!-- Number Start -->
                    <section class="scroll-section" id="number">
                        <h2 class="small-title">Number</h2>
                        <div class="card mb-5">
                            <div class="card-body">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Number</label>
                                        <input type="text" class="form-control" id="maskNumber" />
                                        <div class="form-text">Only number</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Large Number</label>
                                        <input type="text" class="form-control" id="maskNumberLarge" />
                                        <div class="form-text">Between -10000-10000</div>
                                    </div>
                                    <div>
                                        <label class="form-label">Small Number</label>
                                        <input type="text" class="form-control" id="maskNumberSmall" />
                                        <div class="form-text">Between 0-9</div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                    <!-- Number End -->

                    <!-- Mask in Mask Start -->
                    <section class="scroll-section" id="maskInMask">
                        <h2 class="small-title">Mask in Mask</h2>
                        <div class="card mb-5">
                            <div class="card-body">
                                <form>
                                    <div>
                                        <label class="form-label">Currency</label>
                                        <input type="text" class="form-control" id="maskCurrency" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                    <!-- Mask in Mask End -->

                    <!-- Credit Card Start -->
                    <section class="scroll-section" id="creditCard">
                        <h2 class="small-title">Credit Card</h2>
                        <div class="card mb-5">
                            <div class="card-body">
                                <form>
                                    <div>
                                        <label class="form-label">Card Number</label>
                                        <input type="text" class="form-control" id="maskCreditCard" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                    <!-- Credit Card End -->

                    <!-- Complex Values Start -->
                    <section class="scroll-section" id="complexValues">
                        <h2 class="small-title">Complex Values</h2>
                        <div class="card mb-5">
                            <div class="card-body">
                                <form>
                                    <div>
                                        <label class="form-label">Fill in the Blanks</label>
                                        <input type="text" class="form-control" id="maskComplex" />
                                        <small class="form-text text-muted">Values are year(YY), month(MM), and one of the three of 'TV', 'HD' or 'VR'</small>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                    <!-- Complex Values End -->

                    <!-- Function Start -->
                    <section class="scroll-section" id="function">
                        <h2 class="small-title">Function</h2>
                        <div class="card mb-5">
                            <div class="card-body">
                                <form>
                                    <div>
                                        <label class="form-label">Grow</label>
                                        <input type="text" class="form-control" id="maskFunction" />
                                        <small class="form-text text-muted">Accepts growing values from 0 to 9.</small>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                    <!-- Function End -->

                    <!-- Prepare Start -->
                    <section class="scroll-section" id="prepare">
                        <h2 class="small-title">Prepare</h2>
                        <div class="card mb-5">
                            <div class="card-body">
                                <form>
                                    <div>
                                        <label class="form-label">Uppercase</label>
                                        <input type="text" class="form-control" id="maskUppercase" />
                                        <small class="form-text text-muted">Convert to text-uppercase.</small>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                    <!-- Prepare End -->

                    <!-- Get the Value Start -->
                    <section class="scroll-section" id="getTheValue">
                        <h2 class="small-title">Get the Value</h2>
                        <div class="card mb-5">
                            <div class="card-body">
                                <input type="text" class="form-control mb-1" id="maskGetValue" />
                                <div class="mb-1">
                                    <button class="btn btn-outline-primary" id="logButton" type="button">Log Value</button>
                                </div>
                                <div>
                                    <button class="btn btn-outline-primary" id="logUnmaskedButton" type="button">Log Unmasked Value</button>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Get the Value End -->

                    <!-- Top Label Start -->
                    <section class="scroll-section" id="topLabel">
                        <h2 class="small-title">Top Label</h2>
                        <div class="card mb-5">
                            <div class="card-body">
                                <label class="top-label mb-0 w-100">
                                    <input type="text" class="form-control" id="maskTopLabel" />
                                    <span>DATE</span>
                                </label>
                            </div>
                        </div>
                    </section>
                    <!-- Top Label End -->

                    <!-- Filled Start -->
                    <section class="scroll-section" id="filled">
                        <h2 class="small-title">Filled</h2>
                        <div class="card mb-5">
                            <div class="card-body">
                                <div class="filled mb-0 w-100">
                                    <i data-acorn-icon="calendar"></i>
                                    <input type="text" class="form-control" id="maskFilled" />
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Filled End -->

                    <!-- Top Label Start -->
                    <section class="scroll-section" id="floatingLabel">
                        <h2 class="small-title">Floating Label</h2>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-floating mb-0 w-100">
                                    <input type="text" class="form-control" id="maskFloatingLabel" />
                                    <label>Date</label>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Top Label End -->
                </div>
                <!-- Content End -->
            </div>

            




    </div>
</div>
@endsection
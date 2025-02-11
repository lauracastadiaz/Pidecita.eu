<div class="nav-content d-flex">
    <!-- Logo Start -->
    <div class="logo position-relative">
        <a href="/">
            <!-- Logo can be added directly -->
            <img src="/img/logopidecitaa.png" alt="logo" style="max-height:70px" />

            <!-- Or added via css to provide different ones for different color themes -->
            <!-- <div class="img"></div> -->
        </a>
    </div>
    <!-- Logo End -->

    <!-- User Menu Start -->
    <div class="user-container d-flex">
        <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="profile" alt="{{ Auth::user()->name }}" src="/img/profile/profile-1.webp" />
            <div class="name">{{ Auth::user()->name }}</div>
        </a>
        
        <div class="dropdown-menu dropdown-menu-end user-menu wide">
            <div class="row mb-3 ms-0 me-0">
                <div class="col-12 ps-1 mb-2">
                    <div class="text-extra-small text-primary">CUENTA</div>
                </div>
                <div class="col-6 ps-1 pe-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="/usuario">Usuario</a>
                        </li>
                        <li>
                            <a href="/preferencias">Preferencias</a>
                        </li>
                        <li>
                            <a href="/calendar">Calendario</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 pe-1 ps-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="/seguridad">Seguridad</a>
                        </li>
                        <li>
                            <a href="/facturacion">Facturación</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row mb-1 ms-0 me-0">
                <div class="col-12 p-1 mb-2 pt-2">
                    <div class="text-extra-small text-primary">APLICACIÓN</div>
                </div>
                <div class="col-6 ps-1 pe-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="/temas">Temas</a>
                        </li>
                        <li>
                            <a href="/idioma">Idioma</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 pe-1 ps-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="/dispositivos">Dispositivos</a>
                        </li>
                        <li>
                            <a href="/memoria">Memoria</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row mb-1 ms-0 me-0">
                <div class="col-12 p-1 mb-3 pt-3">
                    <div class="separator-light"></div>
                </div>
                <div class="col-6 ps-1 pe-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="/ayuda">
                                <i data-acorn-icon="help" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Ayuda</span>
                            </a>
                        </li>
                        <li>
                            <a href="/docs">
                                <i data-acorn-icon="file-text" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Docs</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 pe-1 ps-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="/ajustes">
                                <i data-acorn-icon="gear" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Ajustes</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                                <strong class="align-middle">{{ __('Logout') }}</strong>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- User Menu End -->

    <!-- Icons Menu Start -->
    <ul class="list-unstyled list-inline text-center menu-icons">
        <li class="list-inline-item">
            <a href="#" data-bs-toggle="modal" data-bs-target="#searchPagesModal">
                <i data-acorn-icon="search" data-acorn-size="18"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#" id="pinButton" class="pin-button">
                <i data-acorn-icon="lock-on" class="unpin" data-acorn-size="18"></i>
                <i data-acorn-icon="lock-off" class="pin" data-acorn-size="18"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#" id="colorButton">
                <i data-acorn-icon="light-on" class="light" data-acorn-size="18"></i>
                <i data-acorn-icon="light-off" class="dark" data-acorn-size="18"></i>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#" data-bs-toggle="dropdown" data-bs-target="#notifications" aria-haspopup="true" aria-expanded="false" class="notification-button">
                <div class="position-relative d-inline-flex">
                    <i data-acorn-icon="bell" data-acorn-size="18"></i>
                    <span class="position-absolute notification-dot rounded-xl"></span>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end wide notification-dropdown scroll-out" id="notifications">
                <div class="scroll">
                    <ul class="list-unstyled border-last-none">
                        <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                            <img src="/img/profile/profile-1.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                            <div class="align-self-center">
                                <a href="#">Joisse Kaycee just sent a new comment!</a>
                            </div>
                        </li>
                        <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                            <img src="/img/profile/profile-2.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                            <div class="align-self-center">
                                <a href="#">New order received! It is total $147,20.</a>
                            </div>
                        </li>
                        <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                            <img src="/img/profile/profile-3.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                            <div class="align-self-center">
                                <a href="#">3 items just added to wish list by a user!</a>
                            </div>
                        </li>
                        <li class="pb-3 pb-3 border-bottom border-separator-light d-flex">
                            <img src="/img/profile/profile-6.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                            <div class="align-self-center">
                                <a href="#">Kirby Peters just sent a new message!</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
    <!-- Icons Menu End -->

    <!-- Menu Start -->
    <div class="menu-container flex-grow-1">
        <ul id="menu" class="menu">
            <li>
                <a href="#dashboards" data-href="/Dashboards/Patient">
                    <i data-acorn-icon="home-garage" class="icon" data-acorn-size="18"></i>
                    <span class="label">Dashboards</span>
                </a>
                <ul id="dashboards">
                    <!-- <li>
                        <a href="/Dashboards/Patient">
                            <span class="label">Paciente</span>
                        </a> -->
                    </li>
                    <li>
                        <a href="/Dashboards">
                            <span class="label">Dashboard</span>
                        </a>
                    </li>

                    <!--
                    <li>
                        <a href="/Dashboards/Doctor">
                            <span class="label">Doctor</span>
                        </a>
                    </li> -->
                </ul>
            </li>
            <!-- <li>
                <a href="/Appointments">
                    <i data-acorn-icon="calendar" class="icon" data-acorn-size="18"></i>
                    <span class="label">Citas</span>
                </a>
            </li>
            <li>
                <a href="/Results">
                    <i data-acorn-icon="form-check" class="icon" data-acorn-size="18"></i>
                    <span class="label">Resultados</span>
                </a>
            </li>
            <li>
                <a href="/Prescriptions">
                    <i data-acorn-icon="inbox" class="icon" data-acorn-size="18"></i>
                    <span class="label">Prescripciones</span>
                </a>
            </li>
            <li>
                <a href="/Doctors">
                    <i data-acorn-icon="health" class="icon" data-acorn-size="18"></i>
                    <span class="label">Doctores</span>
                </a>
            </li>
            <li>
                <a href="/Consult">
                    <i data-acorn-icon="messages" class="icon" data-acorn-size="18"></i>
                    <span class="label">Dudas</span>
                </a>
            </li>
            <li>
                <a href="/Guidebook">
                    <i data-acorn-icon="book-open" class="icon" data-acorn-size="18"></i>
                    <span class="label">Manual</span>
                </a>
            </li> -->

            <li>
                <a href="/usuarios">
                    <i data-acorn-icon="user" class="icon" data-acorn-size="18"></i>
                    <span class="label">Usuarios</span>
                </a>
            </li>

            <li>
                <a href="/centros">
                    <i data-acorn-icon="hospital" class="icon" data-acorn-size="18"></i>
                    <span class="label">Centros</span>
                </a>
            </li>
            <li>
                <a href="/medicos">
                    <i data-acorn-icon="doctor" class="icon" data-acorn-size="18"></i>
                    <span class="label">Profesionales</span>
                </a>
            </li>
            <li>
                <a href="/especialidades">
                    <i data-acorn-icon="blood" class="icon" data-acorn-size="18"></i>
                    <span class="label">Especialidades</span>
                </a>
            </li>

            <li>
                <a href="/Appointments">
                    <i data-acorn-icon="calendar" class="icon" data-acorn-size="18"></i>
                    <span class="label">Citas</span>
                </a>
            </li>



            <li>
                <a href="/Articles">
                    <i data-acorn-icon="book" class="icon" data-acorn-size="18"></i>
                    <span class="label">Artículos</span>
                </a>
            </li>
            <li>
                <a href="/Settings">
                    <i data-acorn-icon="gear" class="icon" data-acorn-size="18"></i>
                    <span class="label">Ajustes</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- Menu End -->

    <!-- Mobile Buttons Start -->
    <div class="mobile-buttons-container">
        <!-- Menu Button Start -->
        <a href="#" id="mobileMenuButton" class="menu-button">
            <i data-acorn-icon="menu"></i>
        </a>
        <!-- Menu Button End -->
    </div>
    <!-- Mobile Buttons End -->
</div>
<div class="nav-shadow"></div>

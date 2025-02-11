<div class="nav-content d-flex">
    <!-- Logo Start -->
    <div class="logo position-relative">
        <a href="/">
            <!-- Logo can be added directly -->
            <img src="/img/logopidecitaa.png" alt="logo" style="max-height:70px" />

            <!-- Or added via css to provide different ones for different color themes -->
            <!--<div class="img"></div>-->
        </a>
    </div>
    <!-- Logo End -->
    <?php if(auth()->guard()->guest()): ?>
    <?php else: ?>
    <!-- User Menu Start -->
    <div class="user-container d-flex">
        <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <img class="profile" alt="<?php echo e(Auth::user()->name); ?>" src="/img/profile/profile-8.webp" />
            <div class="name"><?php echo e(Auth::user()->name); ?></div>
        </a>
        <div class="dropdown-menu dropdown-menu-end user-menu wide">
            <div class="row mb-3 ms-0 me-0">
                <div class="col-12 ps-1 mb-2">
                    <div class="text-extra-small text-primary">CUENTA</div>
                </div>
                <div class="col-6 ps-1 pe-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">Info</a>
                        </li>
                        <li>
                            <a href="#">Preferencias</a>
                        </li>
                        <li>
                            <a href="#">Calendario</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 pe-1 ps-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">Seguridad</a>
                        </li>
                        <li>
                            <a href="#">Facturación</a>
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
                            <a href="#">Temas</a>
                        </li>
                        <li>
                            <a href="#">Idioma</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 pe-1 ps-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">Dispositivos</a>
                        </li>
                        <li>
                            <a href="#">Memoria</a>
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
                            <a href="#">
                                <i data-acorn-icon="help" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Ayuda</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i data-acorn-icon="file-text" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Docs</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 pe-1 ps-1">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">
                                <i data-acorn-icon="gear" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle">Ajustes</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('logout')); ?>"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                                <span class="align-middle"><?php echo e(__('Logout')); ?></span>
                            </a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- User Menu End -->
    <!-- <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <?php echo e(Auth::user()->name); ?>

        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                <?php echo e(__('Logout')); ?>

            </a>

            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                <?php echo csrf_field(); ?>
            </form>
        </div>
    </li> -->
    <?php endif; ?>


    <!-- Icons Menu Start -->
    <!-- <ul class="list-unstyled list-inline text-center menu-icons">
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
    </ul> -->
    <!-- Icons Menu End -->

    <!-- Menu Start -->
    <div class="menu-container flex-grow-1">
        <ul id="menu" class="menu">
            <li>
                <a href="/" data-href="/Dashboards/Patient">
                    <i data-acorn-icon="home-garage" class="icon" data-acorn-size="18"></i>
                    <span class="label">Inicio</span>
                </a>
                <!-- <ul id="dashboards">
                    <li>
                        <a href="/Dashboards/Patient">
                            <span class="label">Paciente</span>
                        </a>
                    </li>
                    <li>
                        <a href="/Dashboards/Doctor">
                            <span class="label">Doctor</span>
                        </a>
                    </li>
                </ul> -->
            </li>
            <!-- <li>
                <a href="#">
                    <i data-acorn-icon="inbox" class="icon" data-acorn-size="18"></i>
                    <span class="label">Planes</span>
                </a>
            </li> -->
            <!-- <li>
                <a href="#">
                    <i data-acorn-icon="calendar" class="icon" data-acorn-size="18"></i>
                    <span class="label">Sobre Nosotros</span>
                </a>
            </li> -->

            <!-- <li>
                <a href="/Results">
                    <i data-acorn-icon="form-check" class="icon" data-acorn-size="18"></i>
                    <span class="label">Results</span>
                </a>
            </li> -->

            <!-- <li>
                <a href="/Doctors">
                    <i data-acorn-icon="health" class="icon" data-acorn-size="18"></i>
                    <span class="label">Doctores</span>
                </a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="/contacto">
                    <i data-acorn-icon="messages" class="icon" data-acorn-size="18"></i>
                    <span class="label"><?php echo e(__('Contacto')); ?></span></a>
            </li>
            <!-- <li>
                <a href="#">
                    <i data-acorn-icon="book-open" class="icon" data-acorn-size="18"></i>
                    <span class="label">Manual</span>
                </a>
            </li>  -->
            <li>
                <a class="nav-link" href="/blog">
                    <i data-acorn-icon="book" class="icon" data-acorn-size="18"></i>
                    <span class="label"><?php echo e(__('blog')); ?></span>
                </a>
            </li>
            <!-- <li>
                <a href="/Settings">
                    <i data-acorn-icon="gear" class="icon" data-acorn-size="18"></i>
                    <span class="label">Ajustes</span>
                </a>
            </li> -->

        </ul>
    </div>
    <!--Autenticación links -->

    <div class="menu-container">

        <ul id="menu" class="menu list-unstyled list-inline text-center menu-icons ml-auto">
            <?php if(auth()->guard()->guest()): ?>
            <?php if(Route::has('login')): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('login')); ?>">
                    <i data-acorn-icon="login" class="icon" data-acorn-size="18"></i>
                    <span class="label"><?php echo e(__('Iniciar Sesión')); ?></span>
                </a>
            </li>
            <?php endif; ?>

            <?php if(Route::has('register')): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('register')); ?>">
                    <i data-acorn-icon="user" class="icon" data-acorn-size="18"></i>
                    <span class="label"><?php echo e(__('Registrarse')); ?></span>
                </a>
            </li>
            <?php endif; ?>
            <?php endif; ?>

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
<div class="nav-shadow"></div><?php /**PATH /var/www/vhosts/pidecita.eu/httpdocs/resources/views/_layout/nav_home.blade.php ENDPATH**/ ?>
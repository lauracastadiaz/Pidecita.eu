<?php
$html_tag_data = ["override" => '{ "attributes" : { "placement" : "vertical", "layout":"boxed", "color" : "light-green"
}}'];
$title = 'Register Page';
$description = 'Register Page';
$img_bg = "bg-purple-2.webp";
?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js_vendor'); ?>
<script src="/js/vendor/jquery.validate/jquery.validate.min.js"></script>
<script src="/js/vendor/jquery.validate/additional-methods.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js_page'); ?>
<script src="/js/pages/auth.register.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_left'); ?>
<div class="min-h-100 d-flex align-items-center">
    <div class="w-100 w-lg-75 w-xxl-50">
        <div>
            <div class="mb-5">
                <h1 class="display-3 text-light">Multiple Niches</h1>
                <h1 class="display-3 text-light">Ready for Your Project</h1>
            </div>
            <p class="h6 text-light lh-1-5 mb-5">
                Dynamically target high-payoff intellectual capital for customized technologies. Objectively integrate
                emerging core competencies before
                process-centric communities...
            </p>
            <div class="mb-5">
                <a class="btn btn-lg btn-outline-light" href="/">Learn More</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_right'); ?>
<div
    class="sw-lg-70 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border">
    <div class="sw-lg-50 px-5">
        <div class="sh-11">
            <a href="/">
                <div class="logo-default"></div>
            </a>
        </div>
        <div class="mb-5">
            <h2 class="cta-1 mb-0 text-primary">Registrarse</h2>
            <h2 class="cta-1 text-primary"></h2>
        </div>
        <div class="mb-5">
            <p class="h6">Por favor, use el formulario para registrarse</p>
            <p class="h6">
                Si ya eres miembro, por favor
                <a href="<?php echo e(route('login')); ?>">inicie Sesión</a>
                .
            </p>
        </div>
        <!-- Validation Errors -->
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.auth-validation-errors','data' => ['class' => 'mb-4','errors' => $errors]]); ?>
<?php $component->withName('auth-validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'mb-4','errors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors)]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

        <div>
            <form id="registerForm" class="tooltip-end-bottom" method="POST" action="<?php echo e(route('register')); ?>">
                <?php echo csrf_field(); ?>
                <div class="mb-3 filled form-group tooltip-end-top">
                    <i data-acorn-icon="user"></i>
                    <input class="form-control" placeholder="Nombre" type="text" name="name" :value="old('name')" required autofocus />
                </div>
                <div class="mb-3 filled form-group tooltip-end-top">
                    <i data-acorn-icon="email"></i>
                    <input class="form-control" placeholder="Email" type="email" name="email" :value="old('email')" required />
                </div>
                <div class="mb-3 filled form-group tooltip-end-top">
                    <i data-acorn-icon="lock-off"></i>
                    <input class="form-control" name="password" type="password" placeholder="Contraseña" required autocomplete="new-password" />
                </div>
                <div class="mb-3 filled form-group tooltip-end-top">
                    <i data-acorn-icon="lock-off"></i>
                    <input class="form-control" name="password_confirmation" type="password"
                        placeholder="Confirmar Contraseña" required />
                </div>
                <div class="mb-3 position-relative form-group">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="registerCheck" name="checkTerminos" required />
                        <label class="form-check-label" for="registerCheck">
                            He leído y acepto
                            <a href="/terminos" target="_blank">los términos y condiciones</a>
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-primary"><?php echo e(__('Register')); ?></button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout_full', ['title' => $title, 'description' => $description], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/pidecita.eu/httpdocs/resources/views/auth/register.blade.php ENDPATH**/ ?>
<!-- Plans Start -->

<h2 class="small-title">Elige el plan que mejor se adapte a tus necesidades</h2>
<div class="mb-5">
    <div class="row row-cols-1 row-cols-lg-3 g-2">
        <?php $__currentLoopData = $precios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $precio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="col">
            <div class="card h-100 hover-scale-up">
                <div class="card-body pb-0">
                    <div class="d-flex flex-column align-items-center mb-4">
                        <div
                            class="bg-gradient-light sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center mb-2">
                            <i class="bi-file-earmark-person text-white"></i>
                        </div>
                        <div class="cta-4 text-primary mb-1"><?php echo e($precio->nombre); ?></div>
                        <div class="text-muted sh-3 line-through"><?php echo e($precio->precio_anterior); ?>€</div>
                        <div class="display-4"><?php echo e($precio->precio_actual); ?>€</div>
                        <div class="text-small text-muted mb-1">User/Month</div>
                    </div>
                    <p class="text-alternate mb-4">

                        <?php echo e($precio->descripcion); ?>

                    </p>
                    <p class="text-alternate mb-4">

                        <?php echo e($precio->descripcion_detallada); ?>

                    </p>
                </div>
                <div class="card-footer pt-0 border-0">
                    <div class="mb-4">
                    <?php $__currentLoopData = json_decode($precio->caracteristicas, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caracteristica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row g-0 mb-2">
                            <div class="col-auto">
                                <div class="sw-3 me-1">
                                    <i class="d-inline-block text-primary align-top" data-acorn-icon="<?php echo e($caracteristica['icono']); ?>"
                                        data-acorn-size="17"></i>
                                </div>
                            </div>
                            <div class="col lh-1-25 text-alternate"><?php echo e($caracteristica['texto']); ?></div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="/register"
                            class="btn btn-icon btn-icon-start btn-foreground hover-outline stretched-link">
                            <i data-acorn-icon="chevron-right"></i>
                            <span>Empieza Ahora</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>



        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>
<!-- Plans End --><?php /**PATH /var/www/vhosts/pidecita.eu/httpdocs/resources/views/_layout/pricing.blade.php ENDPATH**/ ?>
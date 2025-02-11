<?php if(isset($breadcrumbs)): ?>
    <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
        <ul class="breadcrumb pt-0">
            <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="breadcrumb-item"><a href="<?php echo e(url($key)); ?>"><?php echo e($value); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </nav>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/pidecita.eu/httpdocs/resources/views/_layout/breadcrumb.blade.php ENDPATH**/ ?>
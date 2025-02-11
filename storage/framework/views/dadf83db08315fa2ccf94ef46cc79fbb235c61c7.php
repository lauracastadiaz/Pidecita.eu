<!DOCTYPE html>
<html lang="es" data-url-prefix="/" data-footer="true"
<?php if(isset($html_tag_data)): ?>
    <?php $__currentLoopData = $html_tag_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    data-<?php echo e($key); ?>='<?php echo e($value); ?>'
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
>

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title><?php echo e($title); ?></title>
    <meta name="description" content="<?php echo e($description); ?>"/>
    <?php echo $__env->make('_layout.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
<div id="root">
    <div id="nav" class="nav-container d-flex" <?php if(isset($custom_nav_data)): ?> <?php $__currentLoopData = $custom_nav_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    data-<?php echo e($key); ?>="<?php echo e($value); ?>"
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    >
        <?php echo $__env->make('_layout.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <?php echo $__env->make('_layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php echo $__env->make('_layout.modal_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('_layout.modal_search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('_layout.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH /var/www/vhosts/pidecita.eu/httpdocs/resources/views/layout.blade.php ENDPATH**/ ?>
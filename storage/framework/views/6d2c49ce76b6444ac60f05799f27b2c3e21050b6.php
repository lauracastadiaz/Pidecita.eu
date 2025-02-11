<!DOCTYPE html>
<html lang="es" data-url-prefix="/"
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
<body class="h-100">
<div id="root" class="h-100">
    <!-- Background Start -->
    <div class="fixed-background" style="background: url(../img/<?php echo e($img_bg); ?>) !important;"></div>
    <!-- Background End -->

    <div class="container-fluid p-0 h-100 position-relative">
        <div class="row g-0 h-100">
            <!-- Left Side Start -->
            <div class="offset-0 col-12 d-none d-lg-flex offset-md-1 col-lg h-lg-100">
                <?php echo $__env->yieldContent('content_left'); ?>
            </div>
            <!-- Left Side End -->

            <!-- Right Side Start -->
            <div class="col-12 col-lg-auto h-100 pb-4 px-4 pt-0 p-lg-0">
                <?php echo $__env->yieldContent('content_right'); ?>
            </div>
            <!-- Right Side End -->
        </div>
    </div>
</div>
<?php echo $__env->make('_layout.modal_settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('_layout.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH /var/www/vhosts/pidecita.eu/httpdocs/resources/views/layout_full.blade.php ENDPATH**/ ?>
<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <!--<script src="<?php echo e(asset('js/app.js')); ?>" defer></script>-->
 

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!--<link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">-->
    <link rel="stylesheet" href="/assets/styles.css">

    <!--iconos bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">

    <!--para plantillas-->
    <?php
    $html_tag_data = [];
    $title = 'Home';
    $description = 'Inicio';
    ?>
</head>
</html><?php /**PATH /var/www/vhosts/pidecita.eu/httpdocs/resources/views/layouts/app.blade.php ENDPATH**/ ?>

<?php
$html_tag_data = ["override"=>'{ "attributes" : { "placement" : "horizontal", "layout":"boxed", "color" : "light-green"  }, "storagePrefix" : "starter-project", "showSettings" : false }'];
$title = 'Pidecita';
$description= 'Mejora tu negocio médico fácil y rápido';
$breadcrumbs = ["/"=>"Inicio"]
?>


<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js_vendor'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js_page'); ?>
    <script src="/js/pages/horizontal.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <!-- Title and Top Buttons Start -->
        <div class="page-title-container">
            <div class="row">
                <!-- Title Start -->
                <div class="col-12 col-md-7">
                    <h1 class="mb-0 pb-0 display-4" id="title"><?php echo e($title); ?></h1>
                    <?php echo $__env->make('_layout.breadcrumb',['breadcrumbs'=>$breadcrumbs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <!-- Title End -->
            </div>
        </div> 
        <!-- Title and Top Buttons End -->
 
        



        <!-- Content Start -->
        <div class="card mb-2">
            <div class="card-body h-100"><?php echo e($description); ?></div>
        </div> 

        <!-- CARD HOME START -->
        <div>
            <?php echo $__env->make('_layout.card_home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <!-- CARD HOME END -->

        <!-- Planes start -->
        <div>
            <?php use App\Http\Controllers\PricingController; ?>
            <?php echo $__env->make('_layout.pricing', ["precios" =>\PricingController::index], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
        </div>
        <!--Planes end -->

        
        
        <!-- Content End -->
    </div>
<?php $__env->stopSection(); ?>

          
<?php echo $__env->make('layout_home',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/pidecita.eu/httpdocs/resources/views/welcome.blade.php ENDPATH**/ ?>
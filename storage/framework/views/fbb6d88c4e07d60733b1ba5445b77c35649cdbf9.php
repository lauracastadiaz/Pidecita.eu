<?php
    $html_tag_data = ["override"=>'{ "attributes" : { "placement" : "horizontal", "layout":"boxed", "color" : "light-green"  }, "storagePrefix" : "starter-project", "showSettings" : false }'];
    $title = 'Gracias por contactar con Pidecita';
    $description= '';
    $breadcrumbs = ["/"=>"Inicio","/thankyou"=>"Thankyou"]
?>


<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js_vendor'); ?>
<script src="/js/cs/scrollspy.js"></script>
<script src="/js/vendor/lolight-1.3.0.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js_page'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Text Content Start -->
<section class="scroll-section" id="textContent">
    <h2 class="small-title"></h2>
    <div class="card mb-5">
        <div class="card-body d-flex flex-column scroll-out">
            <div class="scroll sh-50">
                <h3 class="card-title mb-4">Gracias por contactar con Pidecita</h3>
                <div class="heading"></div>
                <p>
                Tu mensaje ha sido enviado con éxito. 
                    <strong>Nos pondremos en contacto contigo lo antes posible</strong>
                </p>
                    <a href="/" class="btn btn-lg btn-gradient-primary">Volver a Inicio</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Text Content End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout_home',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/pidecita.eu/httpdocs/resources/views/thankyou.blade.php ENDPATH**/ ?>
<?php
$html_tag_data = ["override"=>'{ "attributes" : { "placement" : "horizontal", "layout":"boxed", "color" : "light-green"
}, "storagePrefix" : "starter-project", "showSettings" : false }'];
$title = 'Terminos y Condiciones';
$description= '';
$breadcrumbs = ["/"=>"Inicio","/terminos"=>"Terminos"]
?>



<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="/css/vendor/select2.min.css" />
<link rel="stylesheet" href="/css/vendor/select2-bootstrap4.min.css" />
<link rel="stylesheet" href="/css/vendor/bootstrap-datepicker3.standalone.min.css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js_page'); ?>
<script src="/js/forms.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- Text Only Start -->
<section class="scroll-section" id="textOnly">
    <h2 class="small-title">Términos y Condiciones</h2>
    <div class="card mb-5">
        <div class="card-body">
            <h4 class="mb-3">Términos y Condiciones</h4>
            <div>
                <p>
                    Toffee croissant icing toffee. Sweet roll chupa chups marshmallow muffin liquorice chupa chups
                    soufflé bonbon. Liquorice gummi bears
                    cake donut chocolate lollipop gummi bears. Cotton candy cupcake ice cream gummies dessert muffin
                    chocolate jelly. Danish brownie
                    chocolate bar lollipop cookie tootsie roll candy canes. Jujubes lollipop cheesecake gummi bears
                    cheesecake. Cake jujubes soufflé.
                </p>
                <p>
                    Cake chocolate bar biscuit sweet roll liquorice jelly jujubes. Gingerbread icing macaroon bear claw
                    jelly toffee. Chocolate cake
                    marshmallow muffin wafer. Pastry cake tart apple pie bear claw sweet. Apple pie macaroon sesame
                    snaps cotton candy jelly
                    <u>pudding lollipop caramels</u>
                    marshmallow. Powder halvah dessert ice cream. Carrot cake gingerbread chocolate cake tootsie roll.
                    Oat cake jujubes jelly-o jelly
                    chupa chups lollipop jelly wafer soufflé.
                </p>
                <h6 class="mb-3 mt-5 text-alternate">Sesame Snaps Lollipop Macaroon</h6>
                <p>
                    Jelly-o jelly oat cake cheesecake halvah. Cupcake sweet roll donut. Sesame snaps lollipop macaroon.
                    <a href="#">Icing tiramisu</a>
                    oat cake chocolate cake marzipan pudding danish gummies. Dragée liquorice jelly beans jelly jelly
                    sesame snaps brownie. Cheesecake
                    chocolate cake sweet roll cupcake dragée croissant muffin. Lemon drops cupcake croissant liquorice
                    donut cookie cake. Gingerbread
                    biscuit bear claw marzipan tiramisu topping. Jelly-o croissant chocolate bar gummi bears dessert
                    lemon drops gingerbread croissant.
                    Donut candy jelly.
                </p>
                <ul class="list-unstyled">
                    <li>Croissant</li>
                    <li>Sesame snaps</li>
                    <li>Ice cream</li>
                    <li>Candy canes</li>
                    <li>Lemon drops</li>
                </ul>
                <h6 class="mb-3 mt-5 text-alternate">Muffin Sweet Roll Apple Pie</h6>
                <p>
                    Carrot cake gummi bears wafer sesame snaps soufflé cheesecake cheesecake cake. Sweet roll apple pie
                    tiramisu bonbon sugar plum muffin
                    sesame snaps chocolate. Lollipop sweet roll gingerbread halvah sesame snaps powder. Wafer halvah
                    chocolate soufflé icing. Cotton candy
                    danish lollipop jelly-o candy caramels.
                </p>
            </div>
        </div>
        
    </div>
</section>
<!-- Text Only End -->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout_home',['html_tag_data'=>$html_tag_data, 'title'=>$title, 'description'=>$description], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/pidecita.eu/httpdocs/resources/views/terminos.blade.php ENDPATH**/ ?>
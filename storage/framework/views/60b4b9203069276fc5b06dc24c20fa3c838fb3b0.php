<?php
$html_tag_data = ["override" => '{ "attributes" : { "placement" : "vertical", "layout":"boxed", "color" : "light-green"
}}'];
$title = 'Verify Page';
$description = 'Verify Page';
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

        <div class="row justify-content-center">
            <div class="mb-5">
                <div class="card">
                    <div class="cta-1 text-primary"><?php echo e(__('Verify Your Email Address')); ?></div>

                    <div class="card-body">
                        <?php if(session('status') == 'verification-link-sent'): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(__('A fresh verification link has been sent to your email address.')); ?>

                        </div>
                        <?php endif; ?>

                        <?php echo e(__('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.')); ?>

                        <div> <br>
                        <form class="d-inline" method="POST" action="<?php echo e(route('verification.send')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit"
                                class="btn btn-lg btn-primary"><?php echo e(__('Resend Verification Email')); ?></button>.
                        </form>
                        </div>
                        <div> <br>
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>

                            <button type="submit" class="btn btn-sm btn-secondary">
                                <?php echo e(__('Log out')); ?>

                            </button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout_full', ['title' => $title, 'description' => $description], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/pidecita.eu/httpdocs/resources/views/auth/verify-email.blade.php ENDPATH**/ ?>
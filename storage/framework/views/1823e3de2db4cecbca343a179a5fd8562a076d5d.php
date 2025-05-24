<?php $__env->startSection('title', \App\CPU\translate('Forgot Password')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <style>
        .text-primary {
            color: <?php echo e($web_config['primary_color']); ?>  !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php ($verification_by=\App\CPU\Helpers::get_business_settings('forgot_password_verification')); ?>
    <!-- Page Content-->
    <div class="container py-4 py-lg-5 my-4">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <h2 class="h3 mb-4"><?php echo e(\App\CPU\translate('Forgot your password')); ?>?</h2>
                <p class="font-size-md"><?php echo e(\App\CPU\translate('Change your password in three easy steps. This helps to keep your new password secure')); ?>

                    .</p>
                <?php if($verification_by=='email'): ?>
                    <ol class="list-unstyled font-size-md">
                        <li><span
                                class="text-primary mr-2"><?php echo e(\App\CPU\translate('1')); ?>.</span><?php echo e(\App\CPU\translate('Fill in your email address below')); ?>

                            .
                        </li>
                        <li><span
                                class="text-primary mr-2"><?php echo e(\App\CPU\translate('2')); ?>.</span><?php echo e(\App\CPU\translate('We will email you a temporary code')); ?>

                            .
                        </li>
                        <li><span
                                class="text-primary mr-2"><?php echo e(\App\CPU\translate('3')); ?>.</span><?php echo e(\App\CPU\translate('Use the code to change your password on our secure website')); ?>

                            .
                        </li>
                    </ol>
                    <div class="card py-2 mt-4">
                        <form class="card-body needs-validation" action="<?php echo e(route('customer.auth.forgot-password')); ?>"
                              method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="recover-email"><?php echo e(\App\CPU\translate('Enter your email address')); ?></label>
                                <input class="form-control" type="email" name="identity" id="recover-email" required>
                                <div
                                    class="invalid-feedback"><?php echo e(\App\CPU\translate('Please provide valid email address')); ?>

                                    .
                                </div>
                            </div>
                            <button class="btn btn-primary"
                                    type="submit"><?php echo e(\App\CPU\translate('Get new password')); ?></button>
                        </form>
                    </div>
                <?php else: ?>
                    <div class="card py-2 mt-4">
                        <form class="card-body needs-validation" action="<?php echo e(route('customer.auth.forgot-password')); ?>"
                              method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="recover-email"><?php echo e(\App\CPU\translate('Enter your phone number')); ?></label>
                                <input class="form-control" type="text" name="identity" required>
                                <div
                                    class="invalid-feedback"><?php echo e(\App\CPU\translate('Please provide valid phone number')); ?>

                                </div>
                            </div>
                            <button class="btn btn-primary"
                                    type="submit"><?php echo e(\App\CPU\translate('proceed')); ?></button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\XAMMP\htdocs\GarmentsBridge\resources\views/customer-view/auth/recover-password.blade.php ENDPATH**/ ?>
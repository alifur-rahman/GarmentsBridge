<?php $__env->startSection('title',\App\CPU\translate('Contact Us')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta property="og:image" content="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="og:title" content="Contact <?php echo e($web_config['name']->value); ?> "/>
    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:description" content="<?php echo substr($web_config['about']->value,0,100); ?>">

    <meta property="twitter:card" content="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="twitter:title" content="Contact <?php echo e($web_config['name']->value); ?>"/>
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="twitter:description" content="<?php echo substr($web_config['about']->value,0,100); ?>">

    <style>
        .headerTitle {
            font-size: 25px;
            font-weight: 700;
            margin-top: 2rem;
        }

        .for-contac-image {
            padding: 6%;
        }

        .for-send-message {
            padding: 26px;
            margin-bottom: 2rem;
            margin-top: 2rem;
        }

        @media (max-width: 600px) {
            .sidebar_heading {
                background: <?php echo e($web_config['primary_color']); ?>


            }

            .headerTitle {

                font-weight: 700;
                margin-top: 1rem;
            }

            .sidebar_heading h1 {
                text-align: center;
                color: aliceblue;
                padding-bottom: 17px;
                font-size: 19px;
            }
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container rtl">
        <div class="row">
            <div class="col-md-12 sidebar_heading text-center mb-2">
                <h1 class="h3  mb-0 folot-left headerTitle"><?php echo e(\App\CPU\translate('contact_us')); ?></h1>
            </div>
        </div>
    </div>

    <!-- Split section: Map + Contact form-->
    <div class="container rtl" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
        <div class="row no-gutters">
            <div class="col-lg-6 iframe-full-height-wrap ">
                <img style="" class="for-contac-image" src="<?php echo e(asset("public/assets/front-end/png/contact.png")); ?>" alt="">
            </div>
            <div class="col-lg-6 for-send-message px-4 px-xl-5  box-shadow-sm">
                <h2 class="h4 mb-4 text-center"
                    style="color: #030303; font-weight:600;"><?php echo e(\App\CPU\translate('send_us_a_message')); ?></h2>
                    <form action="<?php echo e(route('contact.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group">
                                <label ><?php echo e(\App\CPU\translate('your_name')); ?></label>
                                <input class="form-control name" name="name" type="text" placeholder="John Doe" required>

                              </div>
                            </div>
                          <div class="col-sm-6">
                              <div class="form-group">
                                <label for="cf-email"><?php echo e(\App\CPU\translate('email_address')); ?></label>
                                <input class="form-control email" name="email" type="email" placeholder="johndoe@email.com" required >

                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="cf-phone"><?php echo e(\App\CPU\translate('your_phone')); ?></label>
                                <input class="form-control mobile_number"  type="text" name="mobile_number" placeholder="<?php echo e(\App\CPU\translate('Contact Number')); ?>" required>

                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="cf-subject"><?php echo e(\App\CPU\translate('Subject')); ?>:</label>
                                <input class="form-control subject" type="text" name="subject"  placeholder="<?php echo e(\App\CPU\translate('Short title')); ?>" required>

                              </div>
                            </div>
                             <div class="col-md-12">
                            <div class="form-group">
                              <label for="cf-message"><?php echo e(\App\CPU\translate('Message')); ?></label>
                              <textarea class="form-control message" name="message"  rows="6" required></textarea>
                            </div>
                          </div>
                        </div>
                        <div class=" ">
                          <button class="btn btn-primary" type="submit"  id="submit"><?php echo e(\App\CPU\translate('send')); ?></button>
                      </div>
                    </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\XAMMP\htdocs\GarmentsBridge\resources\views/web-views/contacts.blade.php ENDPATH**/ ?>
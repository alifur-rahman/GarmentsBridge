

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title><?php echo e(\App\CPU\translate('Admin | Login')); ?></title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180"
    href="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['fav_icon']->value); ?>">
<link rel="icon" type="image/png" sizes="32x32"
    href="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['fav_icon']->value); ?>">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&amp;display=swap" rel="stylesheet">
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/back-end')); ?>/css/vendor.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/back-end')); ?>/vendor/icon-set/style.css">
    <!-- CSS Front Template -->
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/back-end')); ?>/css/theme.minc619.css?v=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/back-end')); ?>/css/toastr.css">
</head>

<body>

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main" class="main">
    <div class="position-fixed top-0 right-0 left-0 bg-img-hero"
         style="height: 32rem; background-image: url(<?php echo e(asset('public/assets/admin')); ?>/svg/components/abstract-bg-4.svg);">
        <!-- SVG Bottom Shape -->
        <figure class="position-absolute right-0 bottom-0 left-0">
            <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1921 273">
                <polygon fill="#fff" points="0,273 1921,273 1921,0 "/>
            </svg>
        </figure>
        <!-- End SVG Bottom Shape -->
    </div>

    <!-- Content -->
    <div class="container py-5 py-sm-7">
        <label class="badge badge-soft-success float-right" style="z-index: 9;position: absolute;right: 0.5rem;top: 0.5rem;"><?php echo e(\App\CPU\translate('Software version')); ?> : <?php echo e(env('SOFTWARE_VERSION')); ?></label>
        <?php ($e_commerce_logo=\App\Model\BusinessSetting::where(['type'=>'company_web_logo'])->first()->value); ?>
        <a class="d-flex justify-content-center mb-5" href="javascript:">
            <img class="z-index-2" src="<?php echo e(asset("storage/app/public/company/".$e_commerce_logo)); ?>" alt="Logo"
                 onerror="this.src='<?php echo e(asset('public/assets/back-end/img/400x400/img2.jpg')); ?>'"
                 style="width: 8rem;">
        </a>

        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <!-- Card -->
                <div class="card card-lg mb-5">
                    <div class="card-body">
                        <!-- Form -->
                        <form id="form-id" action="<?php echo e(route('admin.auth.login')); ?>" method="post">
                            <?php echo csrf_field(); ?>

                            <div class="text-center">
                                <div class="mb-5">
                                    <h1 class="display-4"><?php echo e(\App\CPU\translate('sign_in')); ?></h1><br>
                                    <span>(<?php echo e(\App\CPU\translate('Admin or Employee Login')); ?>)</span>
                                </div>
                            </div>

                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="input-label" for="signinSrEmail"><?php echo e(\App\CPU\translate('your_email')); ?></label>

                                <input type="email" class="form-control form-control-lg" name="email" id="signinSrEmail"
                                       tabindex="1" placeholder="email@address.com" aria-label="email@address.com"
                                       required data-msg="Please enter a valid email address.">
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="input-label" for="signupSrPassword" tabindex="0">
                                    <span class="d-flex justify-content-between align-items-center">
                                      <?php echo e(\App\CPU\translate('password')); ?>

                                    </span>
                                </label>

                                <div class="input-group input-group-merge">
                                    <input type="password" class="js-toggle-password form-control form-control-lg"
                                           name="password" id="signupSrPassword" placeholder="8+ characters required"
                                           aria-label="8+ characters required" required
                                           data-msg="Your password is invalid. Please try again."
                                           data-hs-toggle-password-options='{
                                                     "target": "#changePassTarget",
                                            "defaultClass": "tio-hidden-outlined",
                                            "showClass": "tio-visible-outlined",
                                            "classChangeTarget": "#changePassIcon"
                                            }'>
                                    <div id="changePassTarget" class="input-group-append">
                                        <a class="input-group-text" href="javascript:">
                                            <i id="changePassIcon" class="tio-visible-outlined"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Checkbox -->
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="termsCheckbox"
                                           name="remember">
                                    <label class="custom-control-label text-muted" for="termsCheckbox">
                                        <?php echo e(\App\CPU\translate('remember_me')); ?>

                                    </label>
                                </div>
                            </div>
                            <!-- End Checkbox -->
                            
                            <?php ($recaptcha = \App\CPU\Helpers::get_business_settings('recaptcha')); ?>
                            <?php if(isset($recaptcha) && $recaptcha['status'] == 1): ?>
                                <div id="recaptcha_element" style="width: 100%;" data-type="image"></div>
                                <br/>
                            <?php else: ?>
                                <div class="row p-2">
                                    <div class="col-6 pr-0">
                                        <input type="text" class="form-control form-control-lg" name="custome_recaptcha"
                                               id="custome_recaptcha" required placeholder="<?php echo e(\App\CPU\translate('Enter recaptcha value')); ?>" style="border: none" autocomplete="off">
                                    </div>
                                    <div class="col-6" style="background-color: #FFFFFF; border-radius: 5px;">
                                        <img src="<?php echo $custome_recaptcha->inline(); ?>" style="width: 100%; border-radius: 4px;"/>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <button type="submit" class="btn btn-lg btn-block btn-primary"><?php echo e(\App\CPU\translate('sign_in')); ?></button>
                        </form>
                        <!-- End Form -->
                    </div>
                    <?php if(env('APP_MODE')=='demo'): ?>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-10">
                                    <span><?php echo e(\App\CPU\translate('Email')); ?> : <?php echo e(\App\CPU\translate('admin@admin.com')); ?></span><br>
                                    <span><?php echo e(\App\CPU\translate('Password')); ?> : <?php echo e(\App\CPU\translate('12345678')); ?></span>
                                </div>
                                <div class="col-2">
                                    <button class="btn btn-primary" onclick="copy_cred()"><i class="tio-copy"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>
    <!-- End Content -->
</main>
<!-- ========== END MAIN CONTENT ========== -->


<!-- JS Implementing Plugins -->
<script src="<?php echo e(asset('public/assets/back-end')); ?>/js/vendor.min.js"></script>

<!-- JS Front -->
<script src="<?php echo e(asset('public/assets/back-end')); ?>/js/theme.min.js"></script>
<script src="<?php echo e(asset('public/assets/back-end')); ?>/js/toastr.js"></script>
<?php echo Toastr::message(); ?>


<?php if($errors->any()): ?>
    <script>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        toastr.error('<?php echo e($error); ?>', Error, {
            CloseButton: true,
            ProgressBar: true
        });
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </script>
<?php endif; ?>

<!-- JS Plugins Init. -->
<script>
    $(document).on('ready', function () {
        // INITIALIZATION OF SHOW PASSWORD
        // =======================================================
        $('.js-toggle-password').each(function () {
            new HSTogglePassword(this).init()
        });

        // INITIALIZATION OF FORM VALIDATION
        // =======================================================
        $('.js-validate').each(function () {
            $.HSCore.components.HSValidation.init($(this));
        });
    });
</script>


<?php if(isset($recaptcha) && $recaptcha['status'] == 1): ?>
    <script type="text/javascript">
        var onloadCallback = function () {
            grecaptcha.render('recaptcha_element', {
                'sitekey': '<?php echo e(\App\CPU\Helpers::get_business_settings('recaptcha')['site_key']); ?>'
            });
        };
    </script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
    <script>
        $("#form-id").on('submit',function(e) {
            var response = grecaptcha.getResponse();

            if (response.length === 0) {
                e.preventDefault();
                toastr.error("<?php echo e(\App\CPU\translate('Please check the recaptcha')); ?>");
            }
        });
    </script>
<?php endif; ?>


<?php if(env('APP_MODE')=='demo'): ?>
    <script>
        function copy_cred() {
            $('#signinSrEmail').val('admin@admin.com');
            $('#signupSrPassword').val('12345678');
            toastr.success('Copied successfully!', 'Success!', {
                CloseButton: true,
                ProgressBar: true
            });
        }
    </script>
<?php endif; ?>

<!-- IE Support -->
<script>
    if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="<?php echo e(asset('public/assets/admin')); ?>/vendor/babel-polyfill/polyfill.min.js"><\/script>');
</script>
</body>
</html>

<?php /**PATH E:\XAMMP\htdocs\GarmentsBridge\resources\views/admin-views/auth/login.blade.php ENDPATH**/ ?>
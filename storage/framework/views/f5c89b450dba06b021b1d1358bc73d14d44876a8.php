<?php $__env->startSection('title',\App\CPU\translate('All Seller Page')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta property="og:image" content="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="og:title" content="Brands of <?php echo e($web_config['name']->value); ?> "/>
    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:description" content="<?php echo substr($web_config['about']->value,0,100); ?>">

    <meta property="twitter:card" content="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="twitter:title" content="Brands of <?php echo e($web_config['name']->value); ?>"/>
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="twitter:description" content="<?php echo substr($web_config['about']->value,0,100); ?>">
    <style>
        .page-item.active .page-link {
            background-color: <?php echo e($web_config['primary_color']); ?>    !important;
        }

        .page-item.active > .page-link {
            box-shadow: 0 0 black !important;
        }

        .btnF {
            cursor: pointer;
        }

        .list-link:hover {
            color: #030303 !important;
        }
        .seller_div {
            background: #fcfcfc no-repeat padding-box;
            border: 1px solid #e2f0ff;
            border-radius: 5px;
            opacity: 1;
            padding: 5px;
        }

    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page Content-->
    <div class="container mb-md-4">
        <div class="row mt-3 mb-3 border-bottom">
            <div class="col-md-8">
                <h4 class="mt-2"><?php echo e(\App\CPU\translate('Sellers')); ?></h4>
            </div>
            <div class="col-md-4">
                <form action="<?php echo e(route('search-shop')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control"  placeholder="<?php echo e(\App\CPU\translate('Shop name')); ?>" name="shop_name" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit"><?php echo e(\App\CPU\translate('Search')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <!-- Content  -->
            <section class="col-lg-12">
                <!-- Products grid-->
                <div class="row mx-n2" style="min-height: 200px">
                    <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-2 col-md-3 col-sm-4 col-6 px-2 pb-4 text-center">
                            <div class="card-body shadow">
                                <a href="<?php echo e(route('shopView',['id'=>$seller['id']])); ?>">
                                    <img style="vertical-align: middle;height: 6rem; border-radius: 3%;"
                                         onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                         src="<?php echo e(asset("storage/app/public/shop/$seller->image")); ?>"
                                         alt="<?php echo e($seller->name); ?>">
                                    <div class="text-center text-dark">
                                        <span class="text-center font-weight-bold small p-1"><?php echo e(Str::limit($seller->name, 14)); ?></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="row mx-n2">
                    <div class="col-md-12">
                        <center>
                            <?php echo e($sellers->links()); ?>

                        </center>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('public/assets/front-end')); ?>/vendor/nouislider/distribute/nouislider.min.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\XAMMP\htdocs\GarmentsBridge\resources\views/web-views/sellers.blade.php ENDPATH**/ ?>
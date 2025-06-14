<!-- Header -->
<div class="card-header">
    <h5 class="card-header-title">
        <i class="tio-align-to-top"></i> <?php echo e(\App\CPU\translate('top_selling_products')); ?>

    </h5>
    <i class="tio-gift" style="font-size: 45px"></i>
</div>
<!-- End Header -->

<!-- Body -->
<div class="card-body">
    <div class="row">
        <?php $__currentLoopData = $top_sell; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(isset($item->product)): ?>
                <div class="col-md-4 col-6 mt-2"
                     onclick="location.href='<?php echo e(route('admin.product.view',[$item['product_id']])); ?>'"
                     style="cursor: pointer;padding-right: 6px;padding-left: 6px">
                    <div class="grid-card">
                        <div class="label_1 row-center">
                            <div class="px-1"><?php echo e(\App\CPU\translate('sold')); ?> : </div>
                            <div><?php echo e($item['count']); ?></div>
                        </div>
                        <div class="text-center mt-3">
                            <img style="height: 90px"
                                 src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($item->product['thumbnail']); ?>"
                                 onerror="this.src='<?php echo e(asset('public/assets/back-end/img/160x160/img2.jpg')); ?>'"
                                 alt="<?php echo e($item->product->name); ?> image">
                        </div>
                        <div class="text-center mt-2">
                            <span class=""
                                  style="font-size: 10px"><?php echo e(substr($item->product['name'],0,20)); ?> <?php echo e(strlen($item->product['name'])>20?'...':''); ?></span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<!-- End Body -->
<?php /**PATH E:\XAMMP\htdocs\garments-bridge\resources\views/admin-views/partials/_top-selling-products.blade.php ENDPATH**/ ?>
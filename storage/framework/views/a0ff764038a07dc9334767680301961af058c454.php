<?php $__env->startSection('title', \App\CPU\translate('Coupon Edit')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <link href="<?php echo e(asset('public/assets/back-end')); ?>/css/select2.min.css" rel="stylesheet"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
    <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><i class="tio-edit"></i> <?php echo e(\App\CPU\translate('Coupon')); ?> <?php echo e(\App\CPU\translate('update')); ?></h1>
                </div>
            </div>
        </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <form action="<?php echo e(route('admin.coupon.update',[$c['id']])); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label  for="name"><?php echo e(\App\CPU\translate('Type')); ?></label>
                                    <select class="form-control" name="coupon_type"
                                            style="width: 100%" required>
                                        
                                        <option value="discount_on_purchase" <?php echo e($c['coupon_type']=='discount_on_purchase'?'selected':''); ?>><?php echo e(\App\CPU\translate('Discount on Purchase')); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="name"><?php echo e(\App\CPU\translate('Title')); ?></label>
                                    <input type="text" name="title" class="form-control" id="title" value="<?php echo e($c['title']); ?>"
                                        placeholder="<?php echo e(\App\CPU\translate('Title')); ?>" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="name"><?php echo e(\App\CPU\translate('Code')); ?></label>
                                    <input type="text" name="code" value="<?php echo e($c['code']); ?>"
                                           class="form-control" id="code"
                                           placeholder="" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-6">
                                <div class="form-group">
                                    <label for="name"><?php echo e(\App\CPU\translate('start_date')); ?></label>
                                    <input type="date" name="start_date" class="form-control" id="start date" value="<?php echo e(date('Y-m-d',strtotime($c['start_date']))); ?>"
                                        placeholder="<?php echo e(\App\CPU\translate('start date')); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="form-group">
                                    <label for="name"><?php echo e(\App\CPU\translate('expire_date')); ?></label>
                                    <input type="date" name="expire_date" class="form-control" id="expire date" value="<?php echo e(date('Y-m-d',strtotime($c['expire_date']))); ?>"
                                           placeholder="<?php echo e(\App\CPU\translate('expire date')); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="form-group">
                                    <label  for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('limit')); ?> <?php echo e(\App\CPU\translate('for')); ?> <?php echo e(\App\CPU\translate('same')); ?> <?php echo e(\App\CPU\translate('user')); ?></label>
                                        <input type="number" name="limit" value="<?php echo e($c['limit']); ?>" id="coupon_limit" class="form-control" placeholder="<?php echo e(\App\CPU\translate('EX')); ?>: <?php echo e(\App\CPU\translate('10')); ?>">
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="form-group">
                                    <label  for="name"><?php echo e(\App\CPU\translate('discount_type')); ?></label>
                                    <select class="form-control" name="discount_type"
                                            onchange="checkDiscountType(this.value)"
                                            style="width: 100%">
                                        <option value="amount" <?php echo e($c['discount_type']=='amount'?'selected':''); ?>><?php echo e(\App\CPU\translate('Amount')); ?></option>
                                        <option value="percentage" <?php echo e($c['discount_type']=='percentage'?'selected':''); ?>><?php echo e(\App\CPU\translate('percentage')); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-6">
                                <div class="form-group">
                                    <label for="name"><?php echo e(\App\CPU\translate('Discount')); ?></label>
                                    <input type="number" min="1" max="1000000" name="discount" class="form-control" id="discount" value="<?php echo e($c['discount_type']=='amount'?\App\CPU\Convert::default($c['discount']):$c['discount']); ?>"
                                           placeholder="<?php echo e(\App\CPU\translate('discount')); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <label for="name"><?php echo e(\App\CPU\translate('minimum_purchase')); ?></label>
                                <input type="number" min="1" max="1000000" name="min_purchase" class="form-control" id="minimum purchase" value="<?php echo e(\App\CPU\Convert::default($c['min_purchase'])); ?>"
                                        placeholder="<?php echo e(\App\CPU\translate('minimum purchase')); ?>" required>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="form-group">
                                    <label for="name"><?php echo e(\App\CPU\translate('maximum_discount')); ?></label>
                                    <input type="number" min="1" max="1000000" name="max_discount" class="form-control" id="maximum discount" value="<?php echo e(\App\CPU\Convert::default($c['max_discount'])); ?>"
                                           placeholder="<?php echo e(\App\CPU\translate('maximum discount')); ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('Submit')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        function checkDiscountType(val) {
            if (val == 'amount') {
                $('#max-discount').hide()
            } else if (val == 'percentage') {
                $('#max-discount').show()
            }
        }
    </script>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/js/select2.min.js"></script>
    <script>
        $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-responsive").select2({
            width: 'resolve'
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\XAMMP\htdocs\GarmentsBridge\resources\views/admin-views/coupon/edit.blade.php ENDPATH**/ ?>
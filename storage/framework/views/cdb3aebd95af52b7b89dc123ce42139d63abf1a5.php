<?php $__env->startSection('title', \App\CPU\translate('Withdraw information View')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/back-end/css/croppie.css')); ?>" rel="stylesheet">

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(\App\CPU\translate('Dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item"
                    aria-current="page"><?php echo e(\App\CPU\translate('Withdraw')); ?></li>
            </ol>
        </nav>

        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-header p-3">
                        <h3 class="text-center text-capitalize">
                            <?php echo e(\App\CPU\translate('seller')); ?> <?php echo e(\App\CPU\translate('Withdraw')); ?> <?php echo e(\App\CPU\translate('information')); ?>

                        </h3>

                        <i class="tio-wallet-outlined" style="font-size: 30px"></i>
                    </div>
                    <div class="card-body" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                        <div class="row">
                            <div class="col-4">
                                <div class="flex-start">
                                    <div><h5 class="text-capitalize"><?php echo e(\App\CPU\translate('amount')); ?> : </h5></div>
                                    <div class="mx-1"><h5><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\Convert::default($seller->amount))); ?></h5></div>
                                </div>
                                <div class="flex-start">
                                    <div><h5><?php echo e(\App\CPU\translate('request_time')); ?> : </h5></div>
                                    <div class="mx-1"><?php echo e($seller->created_at); ?></div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="flex-start">
                                    <div><?php echo e(\App\CPU\translate('Note')); ?> :</div>
                                    <div class="mx-1"><?php echo e($seller->transaction_note); ?></div>
                                </div>
                            </div>
                            <div class="col-4">
                                <?php if($seller->approved== 0): ?>
                                    <button type="button" class="btn btn-success float-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>" data-toggle="modal"
                                            data-target="#exampleModal"><?php echo e(\App\CPU\translate('proceed')); ?>

                                        <i class="tio-arrow-forward"></i>
                                    </button>
                                <?php else: ?>
                                    <div class="text-center float-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>">
                                        <?php if($seller->approved==1): ?>
                                            <label class="badge badge-success p-2 rounded-bottom">
                                                <?php echo e(\App\CPU\translate('Approved')); ?>

                                            </label>
                                        <?php else: ?>
                                            <label class="badge badge-danger p-2 rounded-bottom">
                                                <?php echo e(\App\CPU\translate('Denied')); ?>

                                            </label>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="min-height: 260px;">
                    <div class="card-header">
                        <h3 class="h3 mb-0"><?php echo e(\App\CPU\translate('my_bank_info')); ?> </h3>
                        <i class="tio tio-dollar-outlined"></i>
                    </div>
                    <div class="card-body" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                        <div class="col-md-8 mt-2">
                            <div class="flex-start">
                                <div><h4><?php echo e(\App\CPU\translate('bank_name')); ?> : </h4></div>
                                <div class="mx-1"><h4><?php echo e($seller->seller->bank_name ? $seller->seller->bank_name : 'No Data found'); ?></h4></div>
                            </div>
                            <div class="flex-start">
                                <div><h6><?php echo e(\App\CPU\translate('Branch')); ?> : </h6></div>
                                <div class="mx-1"><h6><?php echo e($seller->seller->branch ? $seller->seller->branch : 'No Data found'); ?></h6></div>
                            </div>
                            <div class="flex-start">
                                <div><h6><?php echo e(\App\CPU\translate('holder_name')); ?> : </h6></div>
                                <div class="mx-1"><h6><?php echo e($seller->seller->holder_name ? $seller->seller->holder_name : 'No Data found'); ?></h6></div>
                            </div>
                            <div class="flex-start">
                                <div><h6><?php echo e(\App\CPU\translate('account_no')); ?> : </h6></div>
                                <div class="mx-1"><h6><?php echo e($seller->seller->account_no ? $seller->seller->account_no : 'No Data found'); ?></h6></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($seller->seller->shop): ?>
                <div class="col-md-4">
                    <div class="card" style="min-height: 260px;">
                        <div class="card-header">
                            <h3 class="h3 mb-0"><?php echo e(\App\CPU\translate('Shop')); ?> <?php echo e(\App\CPU\translate('info')); ?></h3>
                            <i class="tio tio-shop-outlined"></i>
                        </div>
                        <div class="card-body" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                            <div class="flex-start">
                                <div><h5><?php echo e(\App\CPU\translate('seller_b')); ?> : </h5></div>
                                <div class="mx-1"><h5><?php echo e($seller->seller->shop->name); ?></h5></div>
                            </div>
                            <div class="flex-start">
                                <div><h5><?php echo e(\App\CPU\translate('Phone')); ?> : </h5></div>
                                <div class="mx-1"><h5><?php echo e($seller->seller->shop->contact); ?></h5></div>
                            </div>
                            <div class="flex-start">
                                <div><h5><?php echo e(\App\CPU\translate('address')); ?> : </h5></div>
                                <div class="mx-1"><h5><?php echo e($seller->seller->shop->address); ?></h5></div>
                            </div>
                            <div class="flex-start">
                                <div><h5 class="text-capitalize badge badge-success"><?php echo e(\App\CPU\translate('balance')); ?> : </h5></div>
                                <div class="mx-1"><h5><?php echo e(\App\CPU\Convert::default($seller->seller->wallet->balance)); ?> <?php echo e(\App\CPU\currency_symbol()); ?></h5></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-md-4">
                <div class="card" style="min-height: 260px;">
                    <div class="card-header">
                        <h3 class="h3 mb-0 "> <?php echo e(\App\CPU\translate('Seller')); ?> <?php echo e(\App\CPU\translate('info')); ?></h3>
                        <i class="tio tio-user-big-outlined"></i>
                    </div>
                    <div class="card-body" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                        <div class="flex-start">
                            <div><h5><?php echo e(\App\CPU\translate('name')); ?> : </h5></div>
                            <div class="mx-1"><h5><?php echo e($seller->seller->f_name); ?> <?php echo e($seller->seller->l_name); ?></h5></div>
                        </div>
                        <div class="flex-start">
                            <div><h5><?php echo e(\App\CPU\translate('Email')); ?> : </h5></div>
                            <div class="mx-1"><h5><?php echo e($seller->seller->email); ?></h5></div>
                        </div>
                        <div class="flex-start">
                            <div><h5><?php echo e(\App\CPU\translate('Phone')); ?> : </h5></div>
                            <div class="mx-1"><h5><?php echo e($seller->seller->phone); ?></h5></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?php echo e(\App\CPU\translate('Withdraw request process')); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo e(route('admin.sellers.withdraw_status',[$seller['id']])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label"><?php echo e(\App\CPU\translate('Request')); ?>:</label>
                                    <select name="approved" class="custom-select" id="inputGroupSelect02">
                                        <option value="1"><?php echo e(\App\CPU\translate('Approve')); ?></option>
                                        <option value="2"><?php echo e(\App\CPU\translate('Deny')); ?></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label"><?php echo e(\App\CPU\translate('Note about transaction or request')); ?>:</label>
                                    <textarea class="form-control" name="note" id="message-text"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(\App\CPU\translate('Close')); ?></button>
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

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\XAMMP\htdocs\GarmentsBridge\resources\views/admin-views/seller/withdraw-view.blade.php ENDPATH**/ ?>
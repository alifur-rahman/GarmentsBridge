<?php $__env->startSection('title',$seller->shop ? $seller->shop->name : \App\CPU\translate("shop name not found")); ?>
<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('css_or_js'); ?>
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 48px;
            height: 23px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 15px;
            width: 15px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #377dff;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #377dff;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        #banner-image-modal .modal-content {
            width: 1116px !important;
            margin-left: -264px !important;
        }

        @media (max-width: 768px) {
            #banner-image-modal .modal-content {
                width: 698px !important;
                margin-left: -75px !important;
            }


        }

        @media (max-width: 375px) {
            #banner-image-modal .modal-content {
                width: 367px !important;
                margin-left: 0 !important;
            }

        }

        @media (max-width: 500px) {
            #banner-image-modal .modal-content {
                width: 400px !important;
                margin-left: 0 !important;
            }


        }


    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a
                        href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(\App\CPU\translate('Dashboard')); ?></a>
                </li>
                <li class="breadcrumb-item" aria-current="page"><?php echo e(\App\CPU\translate('Seller_details')); ?></li>
            </ol>
        </nav>

        <!-- Page Heading -->
        <div class="flex-between d-sm-flex row align-items-center justify-content-between mb-2 mx-1">
            <div>
                <a href="<?php echo e(route('admin.sellers.seller-list')); ?>"
                   class="btn btn-primary mt-3 mb-3"><?php echo e(\App\CPU\translate('Back_to_seller_list')); ?></a>
            </div>
            <div>
                <?php if($seller->status=="pending"): ?>
                    <div class="mt-4 pr-2">
                        <div class="flex-start">
                            <div class="mx-1"><h4><i class="tio-shop-outlined"></i></h4></div>
                            <div><?php echo e(\App\CPU\translate('Seller_request_for_open_a_shop.')); ?></div>
                        </div>
                        <div class="text-center">
                            <form class="d-inline-block" action="<?php echo e(route('admin.sellers.updateStatus')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($seller->id); ?>">
                                <input type="hidden" name="status" value="approved">
                                <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('Approve')); ?></button>
                            </form>
                            <form class="d-inline-block" action="<?php echo e(route('admin.sellers.updateStatus')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($seller->id); ?>">
                                <input type="hidden" name="status" value="rejected">
                                <button type="submit" class="btn btn-danger"><?php echo e(\App\CPU\translate('reject')); ?></button>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <!-- Page Header -->
        <div class="page-header">
            <div class="flex-between row mx-1">
                <div>
                    <h1 class="page-header-title"><?php echo e($seller->shop ? $seller->shop->name : "Shop Name : Update Please"); ?></h1>
                </div>

            </div>
            <!-- Nav Scroller -->
            <div class="js-nav-scroller hs-nav-scroller-horizontal">
                <!-- Nav -->
                <ul class="nav nav-tabs page-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link "
                           href="<?php echo e(route('admin.sellers.view',$seller->id)); ?>"><?php echo e(\App\CPU\translate('Shop')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link "
                           href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'order'])); ?>"><?php echo e(\App\CPU\translate('Order')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'product'])); ?>"><?php echo e(\App\CPU\translate('Product')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'setting'])); ?>"><?php echo e(\App\CPU\translate('Setting')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active"
                           href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'transaction'])); ?>"><?php echo e(\App\CPU\translate('Transaction')); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?php echo e(route('admin.sellers.view',['id'=>$seller->id, 'tab'=>'review'])); ?>"><?php echo e(\App\CPU\translate('Review')); ?></a>
                    </li>

                </ul>
                <!-- End Nav -->
            </div>
            <!-- End Nav Scroller -->
        </div>
        <!-- End Page Header -->

        <div class="content container-fluid p-0">
            <div class="row" style="margin-top: 20px">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="flex-between justify-content-between align-items-center flex-grow-1">
                                <h3 class="text-capitalize"><?php echo e(\App\CPU\translate('transaction_table')); ?>

                                    <span class="badge badge-soft-dark mx-2"><?php echo e($transactions->total()); ?></span>

                                </h3>
                                <div class="col-md-5 ">
                                    <form action="<?php echo e(url()->current()); ?>" method="GET">
                                        <!-- Search -->
                                        <div class="input-group input-group-merge input-group-flush">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="tio-search"></i>
                                                </div>
                                            </div>
                                            <input id="datatableSearch_" type="search" name="search"
                                                   class="form-control"
                                                   placeholder="<?php echo e(\App\CPU\translate('Search by orders id or transaction id')); ?>"
                                                   aria-label="Search orders" value="<?php echo e($search); ?>"
                                                   required>
                                            <button type="submit"
                                                    class="btn btn-primary"><?php echo e(\App\CPU\translate('search')); ?></button>
                                        </div>
                                        <!-- End Search -->
                                    </form>
                                </div>
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="row">

                                        <div class="col-md-8">

                                            <select class="form-control" name="status">

                                                <option class="text-center" value="0" selected disabled>
                                                    ---<?php echo e(\App\CPU\translate('select_status')); ?>---
                                                </option>
                                                <option class="text-left text-capitalize"
                                                        value="disburse" <?php echo e($status == 'disburse'? 'selected' : ''); ?> ><?php echo e(\App\CPU\translate('disburse')); ?> </option>
                                                <option class="text-left text-capitalize"
                                                        value="hold" <?php echo e($status == 'hold'? 'selected' : ''); ?>><?php echo e(\App\CPU\translate('hold')); ?></option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit"
                                                    class="btn btn-success"><?php echo e(\App\CPU\translate('filter')); ?></button>
                                        </div>

                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="card-body" style="padding: 0">
                            <div class="table-responsive">
                                <table id="datatable"
                                       style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                                       class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                                       style="width: 100%">
                                    <thead class="thead-light">
                                    <tr>
                                        <th><?php echo e(\App\CPU\translate('SL#')); ?></th>
                                        
                                        <th><?php echo e(\App\CPU\translate('seller_name')); ?></th>
                                        <th><?php echo e(\App\CPU\translate('customer_name')); ?></th>
                                        <th><?php echo e(\App\CPU\translate('order_id')); ?></th>
                                        <th><?php echo e(\App\CPU\translate('transaction_id')); ?></th>
                                        <th><?php echo e(\App\CPU\translate('order_amount')); ?></th>
                                        <th><?php echo e(\App\CPU\translate('seller_amount')); ?></th>
                                        <th><?php echo e(\App\CPU\translate('admin_commission')); ?></th>
                                        <th><?php echo e(\App\CPU\translate('received_by')); ?></th>
                                        <th><?php echo e(\App\CPU\translate('delivered_by')); ?></th>
                                        <th><?php echo e(\App\CPU\translate('delivery_charge')); ?></th>
                                        <th><?php echo e(\App\CPU\translate('payment_method')); ?></th>
                                        <th><?php echo e(\App\CPU\translate('tax')); ?></th>
                                        <th><?php echo e(\App\CPU\translate('status')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($transactions->firstItem()+$key); ?></td>
                                            
                                            <td>
                                                <?php if($transaction['seller_is'] == 'admin'): ?>

                                                    <?php echo e(App\Model\BusinessSetting::where(['type' => 'company_name'])->first()->value); ?>

                                                <?php else: ?>
                                                    <?php echo e(App\Model\Seller::find($transaction['seller_id'])->f_name); ?> <?php echo e(App\Model\Seller::find($transaction['seller_id'])->l_name); ?>

                                                <?php endif; ?>

                                            </td>
                                            <td>
                                                <?php echo e(App\User::find($transaction['customer_id'])->f_name??''); ?> <?php echo e(App\User::find($transaction['customer_id'])->l_name??''); ?>


                                            </td>
                                            <td><?php echo e($transaction['order_id']); ?></td>
                                            <td><?php echo e($transaction['transaction_id']); ?></td>
                                            <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($transaction['order_amount']))); ?></td>
                                            <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($transaction['seller_amount']))); ?></td>
                                            <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($transaction['admin_commission']))); ?></td>
                                            <td><?php echo e($transaction['received_by']); ?></td>
                                            <td><?php echo e($transaction['delivered_by']); ?></td>
                                            <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($transaction['delivery_charge']))); ?></td>
                                            <td><?php echo e(str_replace('_',' ',$transaction['payment_method'])); ?></td>
                                            <td><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($transaction['tax']))); ?></td>
                                            <td>
                                                <?php if($transaction['status'] == 'disburse'): ?>
                                                    <span class="badge badge-soft-success  ">

                                                    <?php echo e($transaction['status']); ?>

                                            </span>
                                                <?php else: ?>
                                                    <span class="badge badge-soft-warning ">
                                                <?php echo e($transaction['status']); ?>

                                            </span>
                                                <?php endif; ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <?php if(count($transactions)==0): ?>
                                    <div class="text-center p-4">
                                        <img class="mb-3"
                                             src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg"
                                             alt="Image Description" style="width: 7rem;">
                                        <p class="mb-0"><?php echo e(\App\CPU\translate('No_data_to_show')); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <?php echo e($transactions->links()); ?>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('script_2'); ?>
    <script>
        function status_filter(type) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '<?php echo e(route('admin.withdraw.status-filter')); ?>',
                data: {
                    withdraw_status_filter: type
                },
                beforeSend: function () {
                    $('#loading').show()
                },
                success: function (data) {
                    location.reload();
                },
                complete: function () {
                    $('#loading').hide()
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\XAMMP\htdocs\GarmentsBridge\resources\views/admin-views/seller/view/transaction.blade.php ENDPATH**/ ?>
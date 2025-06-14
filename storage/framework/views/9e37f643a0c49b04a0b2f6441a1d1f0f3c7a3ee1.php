<?php $__env->startSection('title', \App\CPU\translate('Product in Wishlist Report')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <style>
        .dataTables_info {
            margin-bottom: 20px;
            border-top: 1px solid;
            padding-top: 20px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <!-- Nav -->
            <div class="js-nav-scroller hs-nav-scroller-horizontal">
                <ul class="nav nav-tabs page-header-tabs" id="projectsTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:"><?php echo e(\App\CPU\translate('Product in wishlist report')); ?></a>
                    </li>
                </ul>
            </div>
            <!-- End Nav -->
        </div>
        <!-- End Page Header -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <form style="width: 100%;" id="filter-form">
                            <?php echo csrf_field(); ?>
                            <div class="row text-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>">
                                <div class="col-2">
                                    <div class="form-group ">
                                        <label for="exampleInputEmail1"><?php echo e(\App\CPU\translate('Seller')); ?></label>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <select
                                            class="js-select2-custom form-control"
                                            name="seller_id">
                                            <option value="all"><?php echo e(\App\CPU\translate('All')); ?></option>
                                            <option value="in_house" selected><?php echo e(\App\CPU\translate('In-House')); ?></option>
                                            <?php $__currentLoopData = \App\Model\Seller::where(['status'=>'approved'])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($seller['id']); ?>">
                                                    <?php echo e($seller['f_name']); ?> <?php echo e($seller['l_name']); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6 col-md-2">
                                    <button type="button" onclick="filter_form()" class="btn btn-primary btn-block">
                                        <?php echo e(\App\CPU\translate('Filter')); ?>

                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body" id="products-table" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"></div>
                </div>
            </div>
        </div>
        <!-- End Stats -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        function filter_form() {
            var formData = new FormData(document.getElementById('filter-form'));
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '<?php echo e(route('admin.stock.piw-filter')); ?>',
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (data) {
                    $('#products-table').html(data.view)
                },
                complete: function () {
                    $('#loading').hide();
                }
            });
        };
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script_2'); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            filter_form();
            $('input').addClass('form-control');
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\XAMMP\htdocs\GarmentsBridge\resources\views/admin-views/report/product-in-wishlist.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title',\App\CPU\translate('Deliveryman List')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><i class="tio-filter-list"></i>
                        <?php echo e(\App\CPU\translate('deliveryman')); ?> <?php echo e(\App\CPU\translate('list')); ?>

                        ( <?php echo e($delivery_men->total()); ?> )
                    </h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <!-- Card -->
                <div class="card">
                    <!-- Header -->
                    <div class="card-header">
                        <div class="flex-start">
                            <div>
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <!-- Search -->
                                    <div class="input-group input-group-merge input-group-flush">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="search" class="form-control"
                                               placeholder="Search" aria-label="Search" value="<?php echo e($search); ?>" required>
                                        <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('search')); ?></button>

                                    </div>
                                    <!-- End Search -->
                                </form>
                            </div>
                        </div>
                        <a href="<?php echo e(route('admin.delivery-man.add')); ?>" class="btn btn-primary pull-right"><i
                                class="tio-add-circle"></i> <?php echo e(\App\CPU\translate('add')); ?> <?php echo e(\App\CPU\translate('deliveryman')); ?>

                        </a>
                    </div>
                    <!-- End Header -->

                    <!-- Table -->
                    <div class="table-responsive datatable-custom">
                        <table
                            class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
                            <thead class="thead-light">
                            <tr>
                                <th><?php echo e(\App\CPU\translate('#')); ?></th>
                                <th style="width: 30%"><?php echo e(\App\CPU\translate('name')); ?></th>
                                <th style="width: 25%"><?php echo e(\App\CPU\translate('image')); ?></th>
                                <th><?php echo e(\App\CPU\translate('email')); ?></th>
                                <th><?php echo e(\App\CPU\translate('phone')); ?></th>
                                <th><?php echo e(\App\CPU\translate('status')); ?></th>
                                <th><?php echo e(\App\CPU\translate('action')); ?></th>
                            </tr>
                            </thead>

                            <tbody id="set-rows">
                            <?php $__currentLoopData = $delivery_men; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$dm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($delivery_men->firstitem()+$key); ?></td>
                                    <td>
                                        <span class="d-block font-size-sm text-body">
                                            <?php echo e($dm['f_name'].' '.$dm['l_name']); ?>

                                        </span>
                                    </td>
                                    <td>
                                        <div style="overflow-x: hidden;overflow-y: hidden">
                                            <img width="60" style="border-radius: 50%;height: 60px; width: 60px;"
                                                 onerror="this.src='<?php echo e(asset('public/assets/back-end/img/160x160/img1.jpg')); ?>'"
                                                 src="<?php echo e(asset('storage/app/public/delivery-man')); ?>/<?php echo e($dm['image']); ?>">
                                        </div>
                                    </td>
                                    <td>
                                        <?php echo e($dm['email']); ?>

                                    </td>
                                    <td>
                                        <?php echo e($dm['phone']); ?>

                                    </td>
                                    <td>
                                        <label class="switch switch-status">
                                            <input type="checkbox" class="status"
                                                   id="<?php echo e($dm['id']); ?>" <?php echo e($dm->is_active == 1?'checked':''); ?>>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <!-- Dropdown -->
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                <i class="tio-settings"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item"
                                                   href="<?php echo e(route('admin.delivery-man.edit',[$dm['id']])); ?>"><?php echo e(\App\CPU\translate('edit')); ?></a>
                                                <a class="dropdown-item" href="javascript:"
                                                   onclick="form_alert('delivery-man-<?php echo e($dm['id']); ?>','Want to remove this information ?')"><?php echo e(\App\CPU\translate('delete')); ?></a>
                                                <form action="<?php echo e(route('admin.delivery-man.delete',[$dm['id']])); ?>"
                                                      method="post" id="delivery-man-<?php echo e($dm['id']); ?>">
                                                    <?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- End Dropdown -->
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <hr>

                        <div class="page-area">
                            <table>
                                <tfoot>
                                <?php echo $delivery_men->links(); ?>

                                </tfoot>
                            </table>
                        </div>

                    </div>
                    <!-- End Table -->
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script>
        $(document).on('change', '.status', function () {
            var id = $(this).attr("id");
            if ($(this).prop("checked") == true) {
                var status = 1;
            } else if ($(this).prop("checked") == false) {
                var status = 0;
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.delivery-man.status-update')); ?>",
                method: 'POST',
                data: {
                    id: id,
                    status: status
                },
                success: function (data) {
                    toastr.success('<?php echo e(\App\CPU\translate('Status updated successfully')); ?>');
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\XAMMP\htdocs\GarmentsBridge\resources\views/admin-views/delivery-man/list.blade.php ENDPATH**/ ?>
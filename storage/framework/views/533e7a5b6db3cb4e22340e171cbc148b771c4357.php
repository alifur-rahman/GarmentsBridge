<?php $__env->startSection('title', \App\CPU\translate('Contact List')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(\App\CPU\translate('Dashboard')); ?></a></li>
            <li class="breadcrumb-item" aria-current="page"><?php echo e(\App\CPU\translate('Customer Message')); ?></li>
        </ol>
    </nav>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-black-50"><?php echo e(\App\CPU\translate('Customer')); ?> <?php echo e(\App\CPU\translate('Message')); ?> <?php echo e(\App\CPU\translate('List')); ?></h1>
    </div>

    <div class="row" style="margin-top: 20px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    <div class="row justify-content-between align-items-center flex-grow-1">
                        <div class="flex-start col-lg-3 mb-3 mb-lg-0">
                            <h5><?php echo e(\App\CPU\translate('Customer')); ?> <?php echo e(\App\CPU\translate('Message')); ?> <?php echo e(\App\CPU\translate('table')); ?> </h5>
                            <h5 style="color: red; margin-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 5px">(<?php echo e($contacts->total()); ?>)</h5>
                        </div>
                        <div class="col-lg-6">
                            <!-- Search -->
                            <form action="<?php echo e(url()->current()); ?>" method="GET">
                                <div class="input-group input-group-merge input-group-flush">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="tio-search"></i>
                                        </div>
                                    </div>
                                    <input id="datatableSearch_" type="search" name="search" class="form-control"
                                        placeholder="<?php echo e(\App\CPU\translate('Search_by_Name_or_Mobile_No_or_Email')); ?>" aria-label="Search orders" value="<?php echo e($search); ?>" required>
                                    <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('search')); ?></button>
                                </div>
                            </form>
                            <!-- End Search -->
                        </div>
                    </div>
                </div>
                <div class="card-body" style="padding: 0">
                    <div class="table-responsive">
                        <table id="datatable" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                               class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                               style="width: 100%">
                            <thead class="thead-light">
                            <tr>
                                <th><?php echo e(\App\CPU\translate('SL')); ?>#</th>
                                <th><?php echo e(\App\CPU\translate('Name')); ?></th>
                                <th><?php echo e(\App\CPU\translate('mobile_no')); ?></th>
                                <th><?php echo e(\App\CPU\translate('Email')); ?></th>
                                <th><?php echo e(\App\CPU\translate('Subject')); ?></th>
                                <th><?php echo e(\App\CPU\translate('action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($contacts->firstItem()+$k); ?></td>
                                    <td><?php echo e($contact['name']); ?></td>
                                    <td><?php echo e($contact['mobile_number']); ?></td>
                                    <td><?php echo e($contact['email']); ?></td>
                                    <td><?php echo e($contact['subject']); ?></td>
                                    <td>

                                        <div class="dropdown">
                                            <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                <i class="tio-settings"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" style="cursor: pointer;"
                                                href="<?php echo e(route('admin.contact.view',$contact->id)); ?>"> <?php echo e(\App\CPU\translate('View')); ?></a>
                                                <a class="dropdown-item delete" style="cursor: pointer;"
                                                id="<?php echo e($contact['id']); ?>"> <?php echo e(\App\CPU\translate('Delete')); ?></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <?php echo e($contacts->links()); ?>

                </div>
                <?php if(count($contacts)==0): ?>
                    <div class="text-center p-4">
                        <img class="mb-3" src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg" alt="Image Description" style="width: 7rem;">
                        <p class="mb-0"><?php echo e(\App\CPU\translate('No_data_to_show')); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <!-- Page level plugins -->
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
        $(document).on('click', '.delete', function () {
            var id = $(this).attr("id");
            Swal.fire({
                title: '<?php echo e(\App\CPU\translate('Are_you_sure_delete_this')); ?>?',
                text: "<?php echo e(\App\CPU\translate('You_will_not_be_able_to_revert_this')); ?>!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '<?php echo e(\App\CPU\translate('Yes')); ?>, <?php echo e(\App\CPU\translate('delete_it')); ?>!'
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "<?php echo e(route('admin.contact.delete')); ?>",
                        method: 'POST',
                        data: {id: id},
                        success: function () {
                            toastr.success('<?php echo e(\App\CPU\translate('Contact_deleted_successfully')); ?>');
                            location.reload();
                        }
                    });
                }
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\XAMMP\htdocs\GarmentsBridge\resources\views/admin-views/contacts/list.blade.php ENDPATH**/ ?>
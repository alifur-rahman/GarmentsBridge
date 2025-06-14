<?php $__env->startSection('title', \App\CPU\translate('Flash Deal')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <link href="<?php echo e(asset('public/assets/back-end/css/tags-input.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/select2/css/select2.min.css')); ?>" rel="stylesheet">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(\App\CPU\translate('Dashboard')); ?></a></li>
            <li class="breadcrumb-item" aria-current="page"><?php echo e(\App\CPU\translate('flash_deal')); ?></li>
            <li class="breadcrumb-item"><?php echo e(\App\CPU\translate('Add new')); ?></li>
        </ol>
    </nav>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <?php echo e(\App\CPU\translate('deal_form')); ?>

                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('admin.deal.flash')); ?>" method="post" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php ($language=\App\Model\BusinessSetting::where('type','pnc_language')->first()); ?>
                        <?php ($language = $language->value ?? null); ?>
                        <?php ($default_lang = 'en'); ?>

                        <?php ($default_lang = json_decode($language)[0]); ?>
                        <ul class="nav nav-tabs mb-4">
                            <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item">
                                    <a class="nav-link lang_link <?php echo e($lang == $default_lang? 'active':''); ?>"
                                       href="#"
                                       id="<?php echo e($lang); ?>-link"><?php echo e(\App\CPU\Helpers::get_language_name($lang).'('.strtoupper($lang).')'); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>

                        <div class="form-group">
                            <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row <?php echo e($lang != $default_lang ? 'd-none':''); ?> lang_form" id="<?php echo e($lang); ?>-form">
                                    <input type="text" name="deal_type" value="flash_deal"  class="d-none">
                                    <div class="col-md-12">
                                        <label for="name"><?php echo e(\App\CPU\translate('Title')); ?> (<?php echo e(strtoupper($lang)); ?>)</label>
                                        <input type="text" name="title[]" class="form-control" id="title"
                                               placeholder="<?php echo e(\App\CPU\translate('Ex')); ?> : <?php echo e(\App\CPU\translate('LUX')); ?>"
                                               <?php echo e($lang == $default_lang? 'required':''); ?>>
                                    </div>
                                </div>
                                <input type="hidden" name="lang[]" value="<?php echo e($lang); ?>" id="lang">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label for="name"><?php echo e(\App\CPU\translate('start_date')); ?></label>
                                    <input type="date" name="start_date" required class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="name"><?php echo e(\App\CPU\translate('end_date')); ?></label>
                                    <input type="date" name="end_date" required class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12" style="padding-top: 20px;">
                                    <label for="name"><?php echo e(\App\CPU\translate('Upload')); ?> <?php echo e(\App\CPU\translate('Image')); ?></label><span class="badge badge-soft-danger">( <?php echo e(\App\CPU\translate('ratio')); ?> 5:1 )</span>
                                    <div class="custom-file" style="text-align: left">
                                        <input type="file" name="image" id="customFileUpload" class="custom-file-input"
                                            accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                        <label class="custom-file-label" for="customFileUpload"><?php echo e(\App\CPU\translate('choose')); ?> <?php echo e(\App\CPU\translate('file')); ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <center>
                                        <img style="width: auto;border: 1px solid; border-radius: 10px; max-height:200px;" id="viewer"
                                            src="<?php echo e(asset('public\assets\back-end\img\1920x400\img2.jpg')); ?>" alt="banner image"/>
                                    </center>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer pl-0">
                            <button type="submit"
                                    class="btn btn-primary "><?php echo e(\App\CPU\translate('save')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 20px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="flex-between row justify-content-between align-items-center flex-grow-1 mx-1">
                        <div class="flex-between">
                            <div><h5><?php echo e(\App\CPU\translate('flash_deal_table')); ?></h5></div>
                            <div class="mx-1"><h5 style="color: red;">(<?php echo e($flash_deal->total()); ?>)</h5></div>
                        </div>
                        <div style="width: 40vw;">
                            <!-- Search -->
                            <form action="<?php echo e(url()->current()); ?>" method="GET">
                                <div class="input-group input-group-merge input-group-flush">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="tio-search"></i>
                                        </div>
                                    </div>
                                    <input id="datatableSearch_" type="search" name="search" class="form-control"
                                        placeholder="<?php echo e(\App\CPU\translate('Search by Title')); ?>" aria-label="Search orders" value="<?php echo e($search); ?>" required>
                                    <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('search')); ?></button>
                                </div>
                            </form>
                            <!-- End Search -->
                        </div>
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
                                <th><?php echo e(\App\CPU\translate('SL')); ?>#</th>
                                <th><?php echo e(\App\CPU\translate('Title')); ?></th>
                                <th><?php echo e(\App\CPU\translate('Start')); ?></th>
                                <th><?php echo e(\App\CPU\translate('end')); ?></th>
                                <th></th>
                                <th><?php echo e(\App\CPU\translate('status')); ?></th>
                                <th style="width: 50px"><?php echo e(\App\CPU\translate('action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $flash_deal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($flash_deal->firstItem()+ $k); ?></th>
                                    <td><?php echo e($deal['title']); ?></td>
                                    <td><?php echo e($deal['start_date']); ?></td>
                                    <td><?php echo e($deal['end_date']); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('admin.deal.add-product',[$deal['id']])); ?>"
                                           class="btn btn-primary btn-sm">
                                            <?php echo e(\App\CPU\translate('Add Product')); ?>

                                        </a>
                                    </td>
                                    <td>
                                        <label class="switch">
                                            <input type="checkbox" class="status"
                                                   id="<?php echo e($deal['id']); ?>" <?php echo e($deal->status == 1?'checked':''); ?>>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.deal.update',[$deal['id']])); ?>"
                                           class="btn btn-primary btn-sm">
                                            <?php echo e(\App\CPU\translate('Edit')); ?>

                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer">
                    <?php echo e($flash_deal->links()); ?>

                </div>
                <?php if(count($flash_deal)==0): ?>
                    <div class="text-center p-4">
                        <img class="mb-3" src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg" alt="Image Description" style="width: 7rem;">
                        <p class="mb-0"><?php echo e(\App\CPU\translate('No data to show')); ?></p>
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

    <script src="<?php echo e(asset('public/assets/back-end')); ?>/js/select2.min.js"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileUpload").change(function () {
            readURL(this);
        });

        $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-responsive").select2({
            width: 'resolve'
        });

        // Call the dataTables jQuery plugin
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });

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
                url: "<?php echo e(route('admin.deal.status-update')); ?>",
                method: 'POST',
                data: {
                    id: id,
                    status: status
                },
                success: function () {
                    toastr.success('<?php echo e(\App\CPU\translate('Status updated successfully')); ?>');
                    location.reload();
                }
            });
        });

    </script>

    <!-- Page level custom scripts -->

    <script>
        $(document).ready(function () {
            // color select select2
            $('.color-var-select').select2({
                templateResult: colorCodeSelect,
                templateSelection: colorCodeSelect,
                escapeMarkup: function (m) {
                    return m;
                }
            });

            function colorCodeSelect(state) {
                var colorCode = $(state.element).val();
                if (!colorCode) return state.text;
                return "<span class='color-preview' style='background-color:" + colorCode + ";'></span>" + state.text;
            }
        });
    </script>

    <script>
        $(".lang_link").click(function (e) {
            e.preventDefault();
            $(".lang_link").removeClass('active');
            $(".lang_form").addClass('d-none');
            $(this).addClass('active');

            let form_id = this.id;
            let lang = form_id.split("-")[0];
            console.log(lang);
            $("#" + lang + "-form").removeClass('d-none');
            if (lang == '<?php echo e($default_lang); ?>') {
                $(".from_part_2").removeClass('d-none');
            } else {
                $(".from_part_2").addClass('d-none');
            }
        });

        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\XAMMP\htdocs\GarmentsBridge\resources\views/admin-views/deal/flash-index.blade.php ENDPATH**/ ?>
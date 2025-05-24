<?php $__env->startSection('title',\App\CPU\translate('Add new delivery-man')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <h1 class="page-header-title"><i class="tio-add-circle-outlined"></i> <?php echo e(\App\CPU\translate('add')); ?> <?php echo e(\App\CPU\translate('new')); ?> <?php echo e(\App\CPU\translate('deliveryman')); ?></h1>
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row gx-2 gx-lg-3">
            <div class="col-sm-12 col-lg-12 mb-3 mb-lg-2">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.delivery-man.store')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('first')); ?> <?php echo e(\App\CPU\translate('name')); ?></label>
                                        <input type="text" name="f_name" class="form-control" placeholder="<?php echo e(\App\CPU\translate('first')); ?> <?php echo e(\App\CPU\translate('name')); ?>"
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('last')); ?> <?php echo e(\App\CPU\translate('name')); ?></label>
                                        <input type="text" name="l_name" class="form-control" placeholder="<?php echo e(\App\CPU\translate('last')); ?> <?php echo e(\App\CPU\translate('name')); ?>"
                                               required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('email')); ?></label>
                                        <input type="email" name="email" class="form-control" placeholder="Ex : ex@example.com"
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('phone')); ?></label>
                                        <input type="text" name="phone" class="form-control" placeholder="Ex : 017********"
                                               required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('identity')); ?> <?php echo e(\App\CPU\translate('type')); ?></label>
                                        <select name="identity_type" class="form-control">
                                            <option value="passport"><?php echo e(\App\CPU\translate('passport')); ?></option>
                                            <option value="driving_license"><?php echo e(\App\CPU\translate('driving')); ?> <?php echo e(\App\CPU\translate('license')); ?></option>
                                            <option value="nid"><?php echo e(\App\CPU\translate('nid')); ?></option>
                                            <option value="company_id"><?php echo e(\App\CPU\translate('company')); ?> <?php echo e(\App\CPU\translate('id')); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('identity')); ?> <?php echo e(\App\CPU\translate('number')); ?></label>
                                        <input type="text" name="identity_number" class="form-control"
                                               placeholder="Ex : DH-23434-LS"
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('identity')); ?> <?php echo e(\App\CPU\translate('image')); ?></label>
                                        <div>
                                            <div class="row" id="coba"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="input-label" for="exampleFormControlInput1"><?php echo e(\App\CPU\translate('password')); ?></label>
                                <input type="text" name="password" class="form-control" placeholder="Ex : password"
                                       required>
                            </div>

                            <div class="form-group">
                                <label><?php echo e(\App\CPU\translate('deliveryman')); ?> <?php echo e(\App\CPU\translate('image')); ?></label><small style="color: red">* ( <?php echo e(\App\CPU\translate('ratio')); ?> 1:1 )</small>
                                <div class="custom-file">
                                    <input type="file" name="image" id="customFileEg1" class="custom-file-input"
                                           accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" required>
                                    <label class="custom-file-label" for="customFileEg1"><?php echo e(\App\CPU\translate('choose')); ?> <?php echo e(\App\CPU\translate('file')); ?></label>
                                </div>
                                <hr>
                                <center>
                                    <img style="height: 200px;border: 1px solid; border-radius: 10px;" id="viewer"
                                         src="<?php echo e(asset('public/assets/back-end/img/900x400/img1.jpg')); ?>" alt="delivery-man image"/>
                                </center>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary"><?php echo e(\App\CPU\translate('submit')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
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

        $("#customFileEg1").change(function () {
            readURL(this);
        });
    </script>

    <script src="<?php echo e(asset('public/assets/back-end/js/spartan-multi-image-picker.js')); ?>"></script>
    <script type="text/javascript">
        $(function () {
            $("#coba").spartanMultiImagePicker({
                fieldName: 'identity_image[]',
                maxCount: 5,
                rowHeight: '120px',
                groupClassName: 'col-2',
                maxFileSize: '',
                placeholderImage: {
                    image: '<?php echo e(asset('public/assets/back-end/img/400x400/img2.jpg')); ?>',
                    width: '100%'
                },
                dropFileLabel: "Drop Here",
                onAddRow: function (index, file) {

                },
                onRenderedPreview: function (index) {

                },
                onRemoveRow: function (index) {

                },
                onExtensionErr: function (index, file) {
                    toastr.error('Please only input png or jpg type file', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                },
                onSizeErr: function (index, file) {
                    toastr.error('File size too big', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\XAMMP\htdocs\GarmentsBridge\resources\views/admin-views/delivery-man/index.blade.php ENDPATH**/ ?>
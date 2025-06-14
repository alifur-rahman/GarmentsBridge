<table class="table" id="datatable">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">
            <?php echo e(\App\CPU\translate('Product Name')); ?> <label class="badge badge-success ml-3" style="cursor: pointer"><?php echo e(\App\CPU\translate('Asc/Dsc')); ?></label>
        </th>
        <th scope="col">
            <?php echo e(\App\CPU\translate('Total in Wishlist')); ?> <label class="badge badge-success ml-3" style="cursor: pointer"><?php echo e(\App\CPU\translate('Asc/Dsc')); ?></label>
        </th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th scope="row"><?php echo e($key+1); ?></th>
            <td><?php echo e($data['name']); ?></td>
            <td><?php echo e($data->wish_list->count()); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function () {
        $('input').addClass('form-control');
    });

    // INITIALIZATION OF DATATABLES
    // =======================================================
    var datatable = $.HSCore.components.HSDatatables.init($('#datatable'), {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
                className: 'd-none'
            },
            {
                extend: 'excel',
                className: 'd-none'
            },
            {
                extend: 'csv',
                className: 'd-none'
            },
            {
                extend: 'pdf',
                className: 'd-none'
            },
            {
                extend: 'print',
                className: 'd-none'
            },
        ],
        select: {
            style: 'multi',
            selector: 'td:first-child input[type="checkbox"]',
            classMap: {
                checkAll: '#datatableCheckAll',
                counter: '#datatableCounter',
                counterInfo: '#datatableCounterInfo'
            }
        },
        language: {
            zeroRecords: '<div class="text-center p-4">' +
                '<img class="mb-3" src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg" alt="Image Description" style="width: 7rem;">' +
                '<p class="mb-0">No data to show</p>' +
                '</div>'
        }
    });

    $('#export-copy').click(function () {
        datatable.button('.buttons-copy').trigger()
    });

    $('#export-excel').click(function () {
        datatable.button('.buttons-excel').trigger()
    });

    $('#export-csv').click(function () {
        datatable.button('.buttons-csv').trigger()
    });

    $('#export-pdf').click(function () {
        datatable.button('.buttons-pdf').trigger()
    });

    $('#export-print').click(function () {
        datatable.button('.buttons-print').trigger()
    });

    $('.js-datatable-filter').on('change', function () {
        var $this = $(this),
            elVal = $this.val(),
            targetColumnIndex = $this.data('target-column-index');

        datatable.column(targetColumnIndex).search(elVal).draw();
    });

    $('#datatableSearch').on('search', function () {
        datatable.search('').draw();
    });
</script>
<?php /**PATH E:\XAMMP\htdocs\GarmentsBridge\resources\views/admin-views/report/partials/products-wishlist-table.blade.php ENDPATH**/ ?>
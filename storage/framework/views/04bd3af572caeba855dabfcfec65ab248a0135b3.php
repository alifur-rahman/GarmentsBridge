<?php $__env->startSection('title', \App\CPU\translate('Earning Report')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="media mb-3">
                <!-- Avatar -->
                <div class="avatar avatar-xl avatar-4by3 <?php echo e(Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'); ?>">
                    <img class="avatar-img" src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/earnings.png"
                         alt="Image Description">
                </div>
                <!-- End Avatar -->

                <div class="media-body">
                    <div class="row">
                        <div class="row col-lg mb-3 mb-lg-0 <?php echo e(Session::get('direction') === "rtl" ? 'mr-2' : 'ml-2'); ?>" style="display: block; text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                            <div>
                                <h1 class="page-header-title"><?php echo e(\App\CPU\translate('Earning')); ?> <?php echo e(\App\CPU\translate('Report')); ?>  <?php echo e(\App\CPU\translate('Overview')); ?> </h1>
                            </div>

                            <div class="row align-items-center">
                                <div class="flex-between col-auto">
                                    <h5 class="text-muted <?php echo e(Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'); ?>"><?php echo e(\App\CPU\translate('Admin')); ?> : </h5>
                                    <h5 class="text-muted"><?php echo e(auth('admin')->user()->name); ?></h5>
                                </div>

                                <div class="col-auto">
                                    <div class="row align-items-center g-0">
                                        <h5 class="text-muted col-auto <?php echo e(Session::get('direction') === "rtl" ? 'pl-2' : 'pr-2'); ?>"><?php echo e(\App\CPU\translate('Date')); ?></h5>

                                        <!-- Flatpickr -->
                                        <h5 class="text-muted">( <?php echo e(session('from_date')); ?> - <?php echo e(session('to_date')); ?> )</h5>
                                        <!-- End Flatpickr -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-auto">
                            <div class="d-flex">
                                <a class="btn btn-icon btn-primary rounded-circle" href="<?php echo e(route('admin.dashboard')); ?>">
                                    <i class="tio-home-outlined"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Media -->

            <!-- Nav -->
            <!-- Nav -->
            <div class="js-nav-scroller hs-nav-scroller-horizontal">
            <span class="hs-nav-scroller-arrow-prev" style="display: none;">
              <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                <i class="tio-chevron-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>"></i>
              </a>
            </span>

                <span class="hs-nav-scroller-arrow-next" style="display: none;">
              <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                <i class="tio-chevron-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>"></i>
              </a>
            </span>

                <ul class="nav nav-tabs page-header-tabs" id="projectsTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:"><?php echo e(\App\CPU\translate('Overview')); ?></a>
                    </li>
                </ul>
            </div>
            <!-- End Nav -->
        </div>
        <!-- End Page Header -->

        <div class="row border-bottom border-right border-left border-top">
            <div class="col-lg-12">
                <form action="<?php echo e(route('admin.report.set-date')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label"><?php echo e(\App\CPU\translate('show_data_by_date_range')); ?></label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <input type="date" name="from" id="from_date"
                                       class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <input type="date" name="to" id="to_date"
                                       class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary btn-block"><?php echo e(\App\CPU\translate('Show')); ?></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <?php
                $from = session('from_date');
               $to = session('to_date');
               $total_tax=\App\Model\OrderTransaction::where(['status'=>'disburse'])
               ->whereBetween('created_at', [$from, $to])
               ->sum('tax');
               if($total_tax==0){
                   $total_tax=0.01;
               }
            ?>
            <?php
                $total_earning =\App\Model\OrderTransaction::where(['status'=>'disburse'])
               ->whereBetween('created_at', [$from, $to])
               ->sum('order_amount');
            if($total_earning==0){
                $total_earning=.01;
            }
            ?>
            <?php
                $total_commission =\App\Model\OrderTransaction::where(['status'=>'disburse'])
               ->whereBetween('created_at', [$from, $to])
               ->sum('admin_commission');
            if($total_commission==0){
                $total_commission=.01;
            }
            ?>
            <?php
                $total = $total_earning+$total_tax + $total_commission;
            ?>

            <div class="col-sm-3 col-lg-4 mb-3 mb-lg-6">
            <!-- Card -->
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <!-- Media -->
                                <div class="media">
                                    <i class="tio-dollar-outlined nav-icon"></i>

                                    <div class="media-body">
                                        <h4 class="mb-1"><?php echo e(\App\CPU\translate('Total')); ?> <?php echo e(\App\CPU\translate('earning')); ?> </h4>
                                        <span class="font-size-sm text-success">
                                          <i class="tio-trending-up"></i> <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($total_earning))); ?>

                                        </span>
                                    </div>

                                </div>
                                <!-- End Media -->
                            </div>

                            <div class="col-auto">
                                <!-- Circle -->
                                <div class="js-circle"
                                     data-hs-circles-options='{
                                       "value": <?php echo e($total_earning=='.01'?0:round((($total_earning)/$total)*100)); ?>,
                                       "maxValue": 100,
                                       "duration": 2000,
                                       "isViewportInit": true,
                                       "colors": ["#e7eaf3", "green"],
                                       "radius": 25,
                                       "width": 3,
                                       "fgStrokeLinecap": "round",
                                       "textFontSize": 14,
                                       "additionalText": "%",
                                       "textClass": "circle-custom-text",
                                       "textColor": "green"
                                     }'></div>
                                <!-- End Circle -->
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                </div>
                <!-- End Card -->
            </div>

            <div class="col-sm-3 col-lg-4 mb-3 mb-lg-6">
                <!-- Card -->
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <!-- Media -->
                                <div class="media">
                                    <i class="tio-money nav-icon"></i>

                                    <div class="media-body">
                                        <h4 class="mb-1"><?php echo e(\App\CPU\translate('Total')); ?> <?php echo e(\App\CPU\translate('Tax')); ?> </h4>
                                        <span class="font-size-sm text-warning">
                                          <i class="tio-trending-up"></i>  <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($total_tax))); ?>

                                        </span>
                                    </div>
                                </div>
                                <!-- End Media -->
                            </div>

                            <div class="col-auto">
                                <!-- Circle -->
                                <div class="js-circle"
                                     data-hs-circles-options='{
                           "value": <?php echo e($total_tax=='0.01'?0:round(((abs($total_tax))/$total)*100)); ?>,
                           "maxValue": 100,
                           "duration": 2000,
                           "isViewportInit": true,
                           "colors": ["#e7eaf3", "#ec9a3c"],
                           "radius": 25,
                           "width": 3,
                           "fgStrokeLinecap": "round",
                           "textFontSize": 14,
                           "additionalText": "%",
                           "textClass": "circle-custom-text",
                           "textColor": "#ec9a3c"
                         }'></div>
                                <!-- End Circle -->
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <div class="col-sm-3 col-lg-4 mb-3 mb-lg-6">
                <!-- Card -->
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <!-- Media -->
                                <div class="media">
                                    <i class="tio-money nav-icon"></i>

                                    <div class="media-body">
                                        <h4 class="mb-1"><?php echo e(\App\CPU\translate('Total')); ?> <?php echo e(\App\CPU\translate('commission')); ?> </h4>
                                        <span class="font-size-sm text-primary">
                                          <i class="tio-trending-up"></i>  <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($total_commission))); ?>

                                        </span>
                                    </div>
                                </div>
                                <!-- End Media -->
                            </div>

                            <div class="col-auto">
                                <!-- Circle -->
                                <div class="js-circle"
                                     data-hs-circles-options='{
                           "value": <?php echo e($total_commission=='0.01'?0:round(((abs($total_commission))/$total)*100)); ?>,
                           "maxValue": 100,
                           "duration": 2000,
                           "isViewportInit": true,
                           "colors": ["#e7eaf3", "#355db5"],
                           "radius": 25,
                           "width": 3,
                           "fgStrokeLinecap": "round",
                           "textFontSize": 14,
                           "additionalText": "%",
                           "textClass": "circle-custom-text",
                           "textColor": "#355db5"
                         }'></div>
                                <!-- End Circle -->
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
        <!-- End Stats -->
        <hr>
        <!-- Card -->
        <div class="card mb-3 mb-lg-5 border-top border-left border-right border-bottom">
            <!-- Header -->
            <div class="card-header">
                <?php
                    $total_sold=\App\Model\OrderTransaction::where(['status'=>'disburse'])->whereBetween('created_at', [date('y-01-01'), date('y-12-31')])->sum('order_amount');
                    $t=\App\Model\OrderTransaction::where(['status'=>'disburse'])->whereBetween('created_at', [date('y-01-01'), date('y-12-31')])->sum('tax');
                    $c=\App\Model\OrderTransaction::where(['status'=>'disburse'])->whereBetween('created_at', [date('y-01-01'), date('y-12-31')])->sum('admin_commission');
                    $t_c_t = $total_sold +$t +$c;
                ?>
                <div class="flex-start">
                    <h6 class="card-subtitle mt-1"><?php echo e(\App\CPU\translate('total_sale_of')); ?> <?php echo e(date('Y')); ?> :</h6>
                    <h6><span class="h3 <?php echo e(Session::get('direction') === "rtl" ? 'mr-sm-2' : 'ml-sm-2'); ?>"> <?php echo e(\App\CPU\BackEndHelper::usd_to_currency($total_sold)." "); ?></span></h6>
                    <h6><span class="h3 <?php echo e(Session::get('direction') === "rtl" ? 'mr-sm-2' : 'ml-sm-2'); ?>"> <?php echo e(\App\CPU\BackEndHelper::currency_symbol()); ?></span></h6>
                </div>

                <!-- Unfold -->
                <div class="hs-unfold">
                    <a class="js-hs-unfold-invoker btn btn-white"
                       href="<?php echo e(route('admin.orders.list',['all'])); ?>">
                        <i class="tio-shopping-cart-outlined <?php echo e(Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'); ?>"></i> <?php echo e(\App\CPU\translate('Orders')); ?>

                    </a>
                </div>
                <!-- End Unfold -->
            </div>
            <!-- End Header -->

        <?php
            $sold=[];
                for ($i=1;$i<=12;$i++){
                    $from = date('Y-'.$i.'-01');
                    $to = date('Y-'.$i.'-30');
                    $sold[$i]=\App\Model\OrderTransaction::where(['status'=>'disburse'])->whereBetween('created_at', [$from, $to])->sum('order_amount');
                }
        ?>

        <?php
            $tax=[];
                for ($i=1;$i<=12;$i++){
                    $from = date('Y-'.$i.'-01');
                    $to = date('Y-'.$i.'-30');
                    $tax[$i]=\App\Model\OrderTransaction::where(['status'=>'disburse'])->whereBetween('created_at', [$from, $to])->sum('tax');
                }
        ?>
        <?php
            $commission=[];
                for ($i=1;$i<=12;$i++){
                    $from = date('Y-'.$i.'-01');
                    $to = date('Y-'.$i.'-30');
                    $commission[$i]=\App\Model\OrderTransaction::where(['status'=>'disburse'])->whereBetween('created_at', [$from, $to])->sum('admin_commission');
                }
        ?>


        <!-- Body -->
            <div class="card-body">
                <!-- Bar Chart -->
                <div class="chartjs-custom" style="height: 18rem;">
                    <canvas class="js-chart"
                            data-hs-chartjs-options='{
                        "type": "line",
                        "data": {
                           "labels": ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                           "datasets": [{
                            "data": [<?php echo e($sold[1]); ?>,<?php echo e($sold[2]); ?>,<?php echo e($sold[3]); ?>,<?php echo e($sold[4]); ?>,<?php echo e($sold[5]); ?>,<?php echo e($sold[6]); ?>,<?php echo e($sold[7]); ?>,<?php echo e($sold[8]); ?>,<?php echo e($sold[9]); ?>,<?php echo e($sold[10]); ?>,<?php echo e($sold[11]); ?>,<?php echo e($sold[12]); ?>],
                            "backgroundColor": ["rgba(55, 125, 255, 0)", "rgba(255, 255, 255, 0)"],
                            "borderColor": "green",
                            "borderWidth": 2,
                            "pointRadius": 0,
                            "pointBorderColor": "#fff",
                            "pointBackgroundColor": "green",
                            "pointHoverRadius": 0,
                            "hoverBorderColor": "#fff",
                            "hoverBackgroundColor": "#377dff"
                          },
                          {
                            "data": [<?php echo e($tax[1]); ?>,<?php echo e($tax[2]); ?>,<?php echo e($tax[3]); ?>,<?php echo e($tax[4]); ?>,<?php echo e($tax[5]); ?>,<?php echo e($tax[6]); ?>,<?php echo e($tax[7]); ?>,<?php echo e($tax[8]); ?>,<?php echo e($tax[9]); ?>,<?php echo e($tax[10]); ?>,<?php echo e($tax[11]); ?>,<?php echo e($tax[12]); ?>],
                            "backgroundColor": ["rgba(0, 201, 219, 0)", "rgba(255, 255, 255, 0)"],
                            "borderColor": "#ec9a3c",
                            "borderWidth": 2,
                            "pointRadius": 0,
                            "pointBorderColor": "#fff",
                            "pointBackgroundColor": "#ec9a3c",
                            "pointHoverRadius": 0,
                            "hoverBorderColor": "#fff",
                            "hoverBackgroundColor": "#00c9db"
                          },
                          {
                            "data": [<?php echo e($commission[1]); ?>,<?php echo e($commission[2]); ?>,<?php echo e($commission[3]); ?>,<?php echo e($commission[4]); ?>,<?php echo e($commission[5]); ?>,<?php echo e($commission[6]); ?>,<?php echo e($commission[7]); ?>,<?php echo e($commission[8]); ?>,<?php echo e($commission[9]); ?>,<?php echo e($commission[10]); ?>,<?php echo e($commission[11]); ?>,<?php echo e($commission[12]); ?>],
                            "backgroundColor": ["rgba(0, 201, 219, 0)", "rgba(255, 255, 255, 0)"],
                            "borderColor": "#355db5",
                            "borderWidth": 2,
                            "pointRadius": 0,
                            "pointBorderColor": "#fff",
                            "pointBackgroundColor": "#355db5",
                            "pointHoverRadius": 0,
                            "hoverBorderColor": "#fff",
                            "hoverBackgroundColor": "#00c9db"
                          }]
                        },
                        "options": {
                          "gradientPosition": {"y1": 200},
                           "scales": {
                              "yAxes": [{
                                "gridLines": {
                                  "color": "#e7eaf3",
                                  "drawBorder": false,
                                  "zeroLineColor": "#e7eaf3"
                                },
                                "ticks": {
                                  "min": 0,
                                  "max": <?php echo e($t_c_t); ?>,
                                  "stepSize": <?php echo e(round($t_c_t/5)); ?>,
                                  "fontColor": "#97a4af",
                                  "fontFamily": "Open Sans, sans-serif",
                                  "padding": 10,
                                  "postfix": " <?php echo e(\App\CPU\BackEndHelper::currency_symbol()); ?>"
                                }
                              }],
                              "xAxes": [{
                                "gridLines": {
                                  "display": false,
                                  "drawBorder": false
                                },
                                "ticks": {
                                  "fontSize": 12,
                                  "fontColor": "#97a4af",
                                  "fontFamily": "Open Sans, sans-serif",
                                  "padding": 5
                                }
                              }]
                          },
                          "tooltips": {
                            "prefix": "",
                            "postfix": "",
                            "hasIndicator": true,
                            "mode": "index",
                            "intersect": false,
                            "lineMode": true,
                            "lineWithLineColor": "rgba(19, 33, 68, 0.075)"
                          },
                          "hover": {
                            "mode": "nearest",
                            "intersect": true
                          }
                        }
                      }'>
                    </canvas>
                </div>
                <!-- End Bar Chart -->
            </div>
            <!-- End Body -->
        </div>
        <!-- End Card -->
        <!-- End Row -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('script_2'); ?>

    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/chart.js/dist/Chart.min.js"></script>
    <script
        src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/chartjs-chart-matrix/dist/chartjs-chart-matrix.min.js"></script>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/js/hs.chartjs-matrix.js"></script>

    <script>
        $(document).on('ready', function () {

            // INITIALIZATION OF FLATPICKR
            // =======================================================
            $('.js-flatpickr').each(function () {
                $.HSCore.components.HSFlatpickr.init($(this));
            });


            // INITIALIZATION OF NAV SCROLLER
            // =======================================================
            $('.js-nav-scroller').each(function () {
                new HsNavScroller($(this)).init()
            });


            // INITIALIZATION OF DATERANGEPICKER
            // =======================================================
            $('.js-daterangepicker').daterangepicker();

            $('.js-daterangepicker-times').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('hour'),
                endDate: moment().startOf('hour').add(32, 'hour'),
                locale: {
                    format: 'M/DD hh:mm A'
                }
            });

            var start = moment();
            var end = moment();

            function cb(start, end) {
                $('#js-daterangepicker-predefined .js-daterangepicker-predefined-preview').html(start.format('MMM D') + ' - ' + end.format('MMM D, YYYY'));
            }

            $('#js-daterangepicker-predefined').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);

            cb(start, end);


            // INITIALIZATION OF CHARTJS
            // =======================================================
            $('.js-chart').each(function () {
                $.HSCore.components.HSChartJS.init($(this));
            });

            var updatingChart = $.HSCore.components.HSChartJS.init($('#updatingData'));

            // Call when tab is clicked
            $('[data-toggle="chart"]').click(function (e) {
                let keyDataset = $(e.currentTarget).attr('data-datasets')

                // Update datasets for chart
                updatingChart.data.datasets.forEach(function (dataset, key) {
                    dataset.data = updatingChartDatasets[keyDataset][key];
                });
                updatingChart.update();
            })


            // INITIALIZATION OF MATRIX CHARTJS WITH CHARTJS MATRIX PLUGIN
            // =======================================================
            function generateHoursData() {
                var data = [];
                var dt = moment().subtract(365, 'days').startOf('day');
                var end = moment().startOf('day');
                while (dt <= end) {
                    data.push({
                        x: dt.format('YYYY-MM-DD'),
                        y: dt.format('e'),
                        d: dt.format('YYYY-MM-DD'),
                        v: Math.random() * 24
                    });
                    dt = dt.add(1, 'day');
                }
                return data;
            }

            $.HSCore.components.HSChartMatrixJS.init($('.js-chart-matrix'), {
                data: {
                    datasets: [{
                        label: 'Commits',
                        data: generateHoursData(),
                        width: function (ctx) {
                            var a = ctx.chart.chartArea;
                            return (a.right - a.left) / 70;
                        },
                        height: function (ctx) {
                            var a = ctx.chart.chartArea;
                            return (a.bottom - a.top) / 10;
                        }
                    }]
                },
                options: {
                    tooltips: {
                        callbacks: {
                            title: function () {
                                return '';
                            },
                            label: function (item, data) {
                                var v = data.datasets[item.datasetIndex].data[item.index];

                                if (v.v.toFixed() > 0) {
                                    return '<span class="font-weight-bold">' + v.v.toFixed() + ' hours</span> on ' + v.d;
                                } else {
                                    return '<span class="font-weight-bold">No time</span> on ' + v.d;
                                }
                            }
                        }
                    },
                    scales: {
                        xAxes: [{
                            position: 'bottom',
                            type: 'time',
                            offset: true,
                            time: {
                                unit: 'week',
                                round: 'week',
                                displayFormats: {
                                    week: 'MMM'
                                }
                            },
                            ticks: {
                                "labelOffset": 20,
                                "maxRotation": 0,
                                "minRotation": 0,
                                "fontSize": 12,
                                "fontColor": "rgba(22, 52, 90, 0.5)",
                                "maxTicksLimit": 12,
                            },
                            gridLines: {
                                display: false
                            }
                        }],
                        yAxes: [{
                            type: 'time',
                            offset: true,
                            time: {
                                unit: 'day',
                                parser: 'e',
                                displayFormats: {
                                    day: 'ddd'
                                }
                            },
                            ticks: {
                                "fontSize": 12,
                                "fontColor": "rgba(22, 52, 90, 0.5)",
                                "maxTicksLimit": 2,
                            },
                            gridLines: {
                                display: false
                            }
                        }]
                    }
                }
            });


            // INITIALIZATION OF CLIPBOARD
            // =======================================================
            $('.js-clipboard').each(function () {
                var clipboard = $.HSCore.components.HSClipboard.init(this);
            });


            // INITIALIZATION OF CIRCLES
            // =======================================================
            $('.js-circle').each(function () {
                var circle = $.HSCore.components.HSCircles.init($(this));
            });
        });
    </script>

    <script>
        $('#from_date,#to_date').change(function () {
            let fr = $('#from_date').val();
            let to = $('#to_date').val();
            if (fr != '' && to != '') {
                if (fr > to) {
                    $('#from_date').val('');
                    $('#to_date').val('');
                    toastr.error('<?php echo e(\App\CPU\translate('Invalid date range')); ?>!', Error, {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            }

        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\XAMMP\htdocs\GarmentsBridge\resources\views/admin-views/report/earning-index.blade.php ENDPATH**/ ?>
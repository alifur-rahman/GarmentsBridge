<?php $__env->startSection('title', \App\CPU\translate('Order Details')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <style>
        .sellerName {
            height: fit-content;
            margin-top: 10px;
            margin-left: 10px;
            font-size: 16px;
            border-radius: 25px;
            text-align: center;
            padding-top: 10px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header d-print-none p-3" style="background: white">
            <div class="row align-items-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter">
                            <li class="breadcrumb-item"><a class="breadcrumb-link"
                                                           href="<?php echo e(route('admin.orders.list',['status'=>'all'])); ?>"><?php echo e(\App\CPU\translate('Orders')); ?></a>
                            </li>
                            <li class="breadcrumb-item active"
                                aria-current="page"><?php echo e(\App\CPU\translate('Order')); ?> <?php echo e(\App\CPU\translate('details')); ?> </li>
                        </ol>
                    </nav>

                    <div class="d-sm-flex align-items-sm-center">
                        <h1 class="page-header-title"><?php echo e(\App\CPU\translate('Order')); ?> #<?php echo e($order['id']); ?></h1>

                        <?php if($order['payment_status']=='paid'): ?>
                            <span class="badge badge-soft-success ml-sm-3">
                                <span class="legend-indicator bg-success"></span><?php echo e(\App\CPU\translate('Paid')); ?>

                            </span>
                        <?php else: ?>
                            <span class="badge badge-soft-danger ml-sm-3">
                                <span class="legend-indicator bg-danger"></span><?php echo e(\App\CPU\translate('Unpaid')); ?>

                            </span>
                        <?php endif; ?>

                        <?php if($order['order_status']=='pending'): ?>
                            <span class="badge badge-soft-info ml-2 ml-sm-3 text-capitalize">
                              <span class="legend-indicator bg-info text"></span><?php echo e(str_replace('_',' ',$order['order_status'])); ?>

                            </span>
                        <?php elseif($order['order_status']=='failed'): ?>
                            <span class="badge badge-danger ml-2 ml-sm-3 text-capitalize">
                              <span class="legend-indicator bg-info"></span><?php echo e(str_replace('_',' ',$order['order_status'])); ?>

                            </span>
                        <?php elseif($order['order_status']=='processing' || $order['order_status']=='out_for_delivery'): ?>
                            <span class="badge badge-soft-warning ml-2 ml-sm-3 text-capitalize">
                              <span class="legend-indicator bg-warning"></span><?php echo e(str_replace('_',' ',$order['order_status'])); ?>

                            </span>
                        <?php elseif($order['order_status']=='delivered' || $order['order_status']=='confirmed'): ?>
                            <span class="badge badge-soft-success ml-2 ml-sm-3 text-capitalize">
                              <span class="legend-indicator bg-success"></span><?php echo e(str_replace('_',' ',$order['order_status'])); ?>

                            </span>
                        <?php else: ?>
                            <span class="badge badge-soft-danger ml-2 ml-sm-3 text-capitalize">
                              <span class="legend-indicator bg-danger"></span><?php echo e(str_replace('_',' ',$order['order_status'])); ?>

                            </span>
                        <?php endif; ?>
                        <span class="ml-2 ml-sm-3">
                        <i class="tio-date-range"></i> <?php echo e(date('d M Y H:i:s',strtotime($order['created_at']))); ?>

                        </span>

                        <?php if(\App\CPU\Helpers::get_business_settings('order_verification')): ?>
                            <span class="ml-2 ml-sm-3">
                                <b>
                                    <?php echo e(\App\CPU\translate('order_verification_code')); ?> : <?php echo e($order['verification_code']); ?>

                                </b>
                            </span>
                        <?php endif; ?>

                        <div class="hs-unfold ml-2">
                            <select class="form-control" name="delivery_man_id" onchange="addDeliveryMan(this.value)">
                                <option
                                    value="0"><?php echo e(\App\CPU\translate('select')); ?> <?php echo e(\App\CPU\translate('deliveryman')); ?></option>
                                <?php $__currentLoopData = $delivery_men; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deliveryMan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        value="<?php echo e($deliveryMan['id']); ?>" <?php echo e($order['delivery_man_id']==$deliveryMan['id']?'selected':''); ?>>
                                        <?php echo e($deliveryMan['f_name'].' '.$deliveryMan['l_name']); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mt-2">
                        <a class="text-body mr-3" target="_blank"
                           href=<?php echo e(route('admin.orders.generate-invoice',[$order['id']])); ?>>
                            <i class="tio-print mr-1"></i> <?php echo e(\App\CPU\translate('Print')); ?> <?php echo e(\App\CPU\translate('invoice')); ?>

                        </a>

                        <?php if(isset($shipping_address['latitude']) && isset($shipping_address['longitude'])): ?>
                            <button class="btn btn-xs btn-secondary" data-toggle="modal" data-target="#locationModal"><i
                                    class="tio-map"></i> <?php echo e(\App\CPU\translate('show_locations_on_map')); ?></button>
                        <?php else: ?>
                            <button class="btn btn-xs btn-warning"><i
                                    class="tio-map"></i> <?php echo e(\App\CPU\translate('shipping_address_has_been_given_below')); ?>

                            </button>
                        <?php endif; ?>
                    </div>

                    <div class="row">
                        <div class="col-6 mt-4">
                            <label class="badge badge-info"><?php echo e(\App\CPU\translate('linked_orders')); ?>

                                : <?php echo e($linked_orders->count()); ?></label><br>
                            <?php $__currentLoopData = $linked_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linked): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('admin.orders.details',[$linked['id']])); ?>"
                                   class="btn btn-secondary"><?php echo e(\App\CPU\translate('ID')); ?>

                                    :<?php echo e($linked['id']); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="col-6">
                            <div class="hs-unfold float-right">
                                <div class="dropdown">
                                    <select name="order_status" onchange="order_status(this.value)"
                                            class="status form-control"
                                            data-id="<?php echo e($order['id']); ?>">

                                        <option
                                            value="pending" <?php echo e($order->order_status == 'pending'?'selected':''); ?> > <?php echo e(\App\CPU\translate('Pending')); ?></option>
                                        <option
                                            value="confirmed" <?php echo e($order->order_status == 'confirmed'?'selected':''); ?> > <?php echo e(\App\CPU\translate('Confirmed')); ?></option>
                                        <option
                                            value="processing" <?php echo e($order->order_status == 'processing'?'selected':''); ?> ><?php echo e(\App\CPU\translate('Processing')); ?> </option>
                                        <option class="text-capitalize"
                                                value="out_for_delivery" <?php echo e($order->order_status == 'out_for_delivery'?'selected':''); ?> ><?php echo e(\App\CPU\translate('out_for_delivery')); ?> </option>
                                        <option
                                            value="delivered" <?php echo e($order->order_status == 'delivered'?'selected':''); ?> ><?php echo e(\App\CPU\translate('Delivered')); ?> </option>
                                        <option
                                            value="returned" <?php echo e($order->order_status == 'returned'?'selected':''); ?> > <?php echo e(\App\CPU\translate('Returned')); ?></option>
                                        <option
                                            value="failed" <?php echo e($order->order_status == 'failed'?'selected':''); ?> ><?php echo e(\App\CPU\translate('Failed')); ?> </option>
                                        <option
                                            value="canceled" <?php echo e($order->order_status == 'canceled'?'selected':''); ?> ><?php echo e(\App\CPU\translate('Canceled')); ?> </option>
                                    </select>
                                </div>
                            </div>
                            <div class="hs-unfold float-right pr-2">
                                <div class="dropdown">
                                    <select name="payment_status" class="payment_status form-control"
                                            data-id="<?php echo e($order['id']); ?>">

                                        <option
                                            onclick="route_alert('<?php echo e(route('admin.orders.payment-status',['id'=>$order['id'],'payment_status'=>'paid'])); ?>','Change status to paid ?')"
                                            href="javascript:"
                                            value="paid" <?php echo e($order->payment_status == 'paid'?'selected':''); ?> >
                                            <?php echo e(\App\CPU\translate('Paid')); ?>

                                        </option>
                                        <option value="unpaid" <?php echo e($order->payment_status == 'unpaid'?'selected':''); ?> >
                                            <?php echo e(\App\CPU\translate('Unpaid')); ?>

                                        </option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Unfold -->
                </div>
            </div>
        </div>

        <!-- End Page Header -->

        <div class="row" id="printableArea">
            <div class="col-lg-8 mb-3 mb-lg-0">
                <!-- Card -->
                <div class="card mb-3 mb-lg-5">
                    <!-- Header -->
                    <div class="card-header" style="display: block!important;">
                        <div class="row">
                            <div class="col-12 pb-2 border-bottom">
                                <h4 class="card-header-title">
                                    <?php echo e(\App\CPU\translate('Order')); ?> <?php echo e(\App\CPU\translate('details')); ?>

                                    <span
                                        class="badge badge-soft-dark rounded-circle ml-1"><?php echo e($order->details->count()); ?></span>
                                </h4>
                            </div>

                            <div class="col-6 pt-2">
                                <?php if($order->order_note !=null): ?>
                                    <span class="font-weight-bold text-capitalize">
                                        <?php echo e(\App\CPU\translate('order_note')); ?> :
                                    </span>
                                    <p class="pl-1">
                                        <?php echo e($order->order_note); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                            <div class="col-6 pt-2">
                                <div class="text-right">
                                    <h6 class="" style="color: #8a8a8a;">
                                        <?php echo e(\App\CPU\translate('Payment')); ?> <?php echo e(\App\CPU\translate('Method')); ?>

                                        : <?php echo e(str_replace('_',' ',$order['payment_method'])); ?>

                                    </h6>
                                    <h6 class="" style="color: #8a8a8a;">
                                        <?php echo e(\App\CPU\translate('Payment')); ?> <?php echo e(\App\CPU\translate('reference')); ?>

                                        : <?php echo e(str_replace('_',' ',$order['transaction_ref'])); ?>

                                    </h6>
                                    <h6 class="" style="color: #8a8a8a;">
                                        <?php echo e(\App\CPU\translate('shipping')); ?> <?php echo e(\App\CPU\translate('method')); ?>

                                        : <?php echo e($order->shipping ? $order->shipping->title :'No shipping method selected'); ?>

                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <div class="media">
                            <div class="avatar avatar-xl mr-3">
                                <p><?php echo e(\App\CPU\translate('image')); ?></p>
                            </div>

                            <div class="media-body">
                                <div class="row">
                                    <div class="col-md-4 product-name">
                                        <p> <?php echo e(\App\CPU\translate('Name')); ?></p>
                                    </div>

                                    <div class="col col-md-2 align-self-center p-0 ">
                                        <p> <?php echo e(\App\CPU\translate('price')); ?></p>
                                    </div>

                                    <div class="col col-md-1 align-self-center">
                                        <p>Q</p>
                                    </div>
                                    <div class="col col-md-1 align-self-center  p-0 product-name">
                                        <p> <?php echo e(\App\CPU\translate('TAX')); ?></p>
                                    </div>
                                    <div class="col col-md-2 align-self-center  p-0 product-name">
                                        <p> <?php echo e(\App\CPU\translate('Discount')); ?></p>
                                    </div>

                                    <div class="col col-md-2 align-self-center text-right  ">
                                        <p> <?php echo e(\App\CPU\translate('Subtotal')); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php ($subtotal=0); ?>
                        <?php ($total=0); ?>
                        <?php ($shipping=0); ?>
                        <?php ($discount=0); ?>
                        <?php ($tax=0); ?>
                        <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php if($detail->product): ?>
                                <?php if($key==0): ?>
                                    <?php if($detail->product->added_by=='admin'): ?>
                                        <div class="row">
                                            <img
                                                class="avatar-img" style="width: 55px;height: 55px; border-radius: 50%;"
                                                onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                src="<?php echo e(asset('storage/app/public/company/'.\App\CPU\Helpers::get_business_settings('company_web_logo'))); ?>"
                                                alt="Image">
                                            <p class="sellerName">
                                                <a style="color: black;"
                                                   href="javascript:">
                                                    <?php echo e(\App\CPU\Helpers::get_business_settings('company_name')); ?>

                                                </a>
                                            </p>
                                        </div>
                                    <?php else: ?>
                                        <div class="row">
                                            <img
                                                class="avatar-img" style="width: 55px;height: 55px; border-radius: 50%;"
                                                onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                src="<?php echo e(asset('storage/app/public/shop/'.\App\Model\Shop::where('seller_id','=',$detail->seller_id)->first()->image)); ?>"
                                                alt="Image">
                                            <p class="sellerName">
                                                <a style="color: black;"
                                                   href="<?php echo e(route('admin.sellers.view',$detail->seller_id)); ?>"><?php echo e(\App\Model\Shop::where('seller_id','=',$detail->seller_id)->first()->name); ?></a>
                                                <i class="tio tio-info-outined ml-4" data-toggle="collapse"
                                                   style="font-size: 20px; cursor: pointer"
                                                   data-target="#sellerInfoCollapse-<?php echo e($detail->id); ?>"
                                                   aria-expanded="false"></i>
                                            </p>
                                        </div>

                                        <?php ($seller = App\Model\Seller::with('shop')->find($detail->seller_id)); ?>
                                        <div class="collapse" id="sellerInfoCollapse-<?php echo e($detail->id); ?>">
                                            <div class="row card-body mb-3">
                                                <div class="col-6">
                                                    <h4>
                                                        <?php echo e(\App\CPU\translate('Status')); ?>

                                                        : <?php echo $seller->status=='approved'?'<label class="badge badge-success">Active</label>':'<label class="badge badge-danger">In-Active</label>'; ?>

                                                    </h4>
                                                    <h5><?php echo e(\App\CPU\translate('Email')); ?> : <a
                                                            class="text-dark"
                                                            href="mailto:<?php echo e($seller->email); ?>"><?php echo e($seller->email); ?></a>
                                                    </h5>
                                                </div>
                                                <div class="col-6">
                                                    <h5><?php echo e(\App\CPU\translate('name')); ?> : <a
                                                            class="text-dark"
                                                            href="<?php echo e(route('admin.sellers.view', [$seller['id']])); ?>"><?php echo e($seller['shop']->name); ?></a>
                                                    </h5>
                                                    <h5><?php echo e(\App\CPU\translate('Phone')); ?> : <a
                                                            class="text-dark"
                                                            href="tel:<?php echo e($seller->phone); ?>"><?php echo e($seller->phone); ?></a>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <!-- Media -->
                                <div class="media">
                                    <div class="avatar avatar-xl mr-3">
                                        <img class="img-fluid"
                                             onerror="this.src='<?php echo e(asset('public/assets/back-end/img/160x160/img2.jpg')); ?>'"
                                             src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($detail->product['thumbnail']); ?>"
                                             alt="Image Description">
                                    </div>

                                    <div class="media-body">
                                        <div class="row">
                                            <div class="col-md-4 mb-3 mb-md-0 product-name">
                                                <p>
                                                    <?php echo e(substr($detail->product['name'],0,30)); ?><?php echo e(strlen($detail->product['name'])>10?'...':''); ?></p>
                                                <strong><u><?php echo e(\App\CPU\translate('Variation')); ?> : </u></strong>

                                                <div class="font-size-sm text-body">

                                                    <span class="font-weight-bold"><?php echo e($detail['variant']); ?></span>
                                                </div>
                                            </div>

                                            <div class="col col-md-2 align-self-center p-0 ">
                                                <h6><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($detail['price']))); ?></h6>
                                            </div>

                                            <div class="col col-md-1 align-self-center">

                                                <h5><?php echo e($detail->qty); ?></h5>
                                            </div>
                                            <div class="col col-md-1 align-self-center  p-0 product-name">

                                                <h5><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($detail['tax']))); ?></h5>
                                            </div>
                                            <div class="col col-md-2 align-self-center  p-0 product-name">

                                                <h5>
                                                    <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($detail['discount']))); ?></h5>
                                            </div>

                                            <div class="col col-md-2 align-self-center text-right  ">
                                                <?php ($subtotal=$detail['price']*$detail->qty+$detail['tax']-$detail['discount']); ?>

                                                <h5 style="font-size: 12px"><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($subtotal))); ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                

                                <?php ($discount+=$detail['discount']); ?>
                                <?php ($tax+=$detail['tax']); ?>
                                <?php ($total+=$subtotal); ?>
                            <!-- End Media -->
                                <hr>
                            <?php endif; ?>
                            <?php ($sellerId=$detail->seller_id); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php ($shipping=$order['shipping_cost']); ?>
                        <?php ($coupon_discount=$order['discount_amount']); ?>
                        
                        <div class="row justify-content-md-end mb-3">
                            <div class="col-md-9 col-lg-8">
                                <dl class="row text-sm-right">
                                    <dt class="col-sm-6"><?php echo e(\App\CPU\translate('Shipping')); ?></dt>
                                    <dd class="col-sm-6 border-bottom">
                                        <strong><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($shipping))); ?></strong>
                                    </dd>

                                    <dt class="col-sm-6"><?php echo e(\App\CPU\translate('coupon_discount')); ?></dt>
                                    <dd class="col-sm-6 border-bottom">
                                        <strong>- <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($coupon_discount))); ?></strong>
                                    </dd>

                                    <dt class="col-sm-6"><?php echo e(\App\CPU\translate('Total')); ?></dt>
                                    <dd class="col-sm-6">
                                        <strong><?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($total+$shipping-$coupon_discount))); ?></strong>
                                    </dd>
                                </dl>
                                <!-- End Row -->
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Body -->
                </div>
                <!-- End Card -->
            </div>

            <div class="col-lg-4">
                <!-- Card -->
                <div class="card">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title"><?php echo e(\App\CPU\translate('Customer')); ?></h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <?php if($order->customer): ?>
                        <div class="card-body">
                            <div class="media align-items-center" href="javascript:">
                                <div class="avatar avatar-circle mr-3">
                                    <img
                                        class="avatar-img" style="width: 75px;height: 42px"
                                        onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                        src="<?php echo e(asset('storage/app/public/profile/'.$order->customer->image)); ?>"
                                        alt="Image">
                                </div>
                                <div class="media-body">
                                <span
                                    class="text-body text-hover-primary"><?php echo e($order->customer['f_name'].' '.$order->customer['l_name']); ?></span>
                                </div>
                                <div class="media-body text-right">
                                    
                                </div>
                            </div>

                            <hr>

                            <div class="media align-items-center" href="javascript:">
                                <div class="icon icon-soft-info icon-circle mr-3">
                                    <i class="tio-shopping-basket-outlined"></i>
                                </div>
                                <div class="media-body">
                                    <span
                                        class="text-body text-hover-primary"> <?php echo e(\App\Model\Order::where('customer_id',$order['customer_id'])->count()); ?> <?php echo e(\App\CPU\translate('orders')); ?></span>
                                </div>
                                <div class="media-body text-right">
                                    
                                </div>
                            </div>

                            <hr>

                            <div class="d-flex justify-content-between align-items-center">
                                <h5><?php echo e(\App\CPU\translate('Contact')); ?> <?php echo e(\App\CPU\translate('info')); ?> </h5>
                            </div>

                            <ul class="list-unstyled list-unstyled-py-2">
                                <li>
                                    <i class="tio-online mr-2"></i>
                                    <?php echo e($order->customer['email']); ?>

                                </li>
                                <li>
                                    <i class="tio-android-phone-vs mr-2"></i>
                                    <?php echo e($order->customer['phone']); ?>

                                </li>
                            </ul>

                            <hr>

                            <div class="d-flex justify-content-between align-items-center">
                                <h5><?php echo e(\App\CPU\translate('shipping_address')); ?></h5>
                            </div>

                            <?php if($order->shippingAddress): ?>
                                <?php ($shipping_address=$order->shippingAddress); ?>
                            <?php else: ?>
                                <?php ($shipping_address=json_decode($order['shipping_address_data'])); ?>
                            <?php endif; ?>

                            <span class="d-block"><?php echo e(\App\CPU\translate('Name')); ?> :
                                <strong><?php echo e($shipping_address? $shipping_address->contact_person_name : \App\CPU\translate('empty')); ?></strong><br>
                                 <?php echo e(\App\CPU\translate('Country')); ?>:
                                <strong><?php echo e($shipping_address ? $shipping_address->country : \App\CPU\translate('empty')); ?></strong><br>
                                <?php echo e(\App\CPU\translate('City')); ?>:
                                <strong><?php echo e($shipping_address ? $shipping_address->city : \App\CPU\translate('empty')); ?></strong><br>
                                <?php echo e(\App\CPU\translate('zip_code')); ?> :
                                <strong><?php echo e($shipping_address ? $shipping_address->zip  : \App\CPU\translate('empty')); ?></strong><br>
                                <?php echo e(\App\CPU\translate('address')); ?> :
                                <strong><?php echo e($shipping_address ? $shipping_address->address  : \App\CPU\translate('empty')); ?></strong><br>
                                <?php echo e(\App\CPU\translate('Phone')); ?>:
                                <strong><?php echo e($shipping_address ? $shipping_address->phone  : \App\CPU\translate('empty')); ?></strong>
                            </span>

                            <hr>

                            <div class="d-flex justify-content-between align-items-center">
                                <h5><?php echo e(\App\CPU\translate('billing_address')); ?></h5>

                            </div>

                            <?php if($order->billingAddress): ?>
                                <?php ($billing=$order->billingAddress); ?>
                            <?php else: ?>
                                <?php ($billing=json_decode($order['billing_address_data'])); ?>
                            <?php endif; ?>

                            <span class="d-block"><?php echo e(\App\CPU\translate('Name')); ?> :
                                <strong><?php echo e($billing? $billing->contact_person_name : \App\CPU\translate('empty')); ?></strong><br>
                                 <?php echo e(\App\CPU\translate('Country')); ?>:
                                <strong><?php echo e($billing ? $billing->country : \App\CPU\translate('empty')); ?></strong><br>
                                <?php echo e(\App\CPU\translate('City')); ?>:
                                <strong><?php echo e($billing ? $billing->city : \App\CPU\translate('empty')); ?></strong><br>
                                <?php echo e(\App\CPU\translate('zip_code')); ?> :
                                <strong><?php echo e($billing ? $billing->zip  : \App\CPU\translate('empty')); ?></strong><br>
                                <?php echo e(\App\CPU\translate('address')); ?> :
                                <strong><?php echo e($billing ? $billing->address  : \App\CPU\translate('empty')); ?></strong><br>
                                <?php echo e(\App\CPU\translate('Phone')); ?>:
                                <strong><?php echo e($billing ? $billing->phone  : \App\CPU\translate('empty')); ?></strong>
                            </span>
                        </div>
                <?php endif; ?>
                <!-- End Body -->
                </div>
                <!-- End Card -->
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!--Show locations on map Modal -->
    <div class="modal fade" id="locationModal" tabindex="-1" role="dialog" aria-labelledby="locationModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"
                        id="locationModalLabel"><?php echo e(\App\CPU\translate('location')); ?> <?php echo e(\App\CPU\translate('data')); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 modal_body_map">
                            <div class="location-map" id="location-map">
                                <div style="width: 100%; height: 400px;" id="location_map_canvas"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script>
        $(document).on('change', '.payment_status', function () {
            var id = $(this).attr("data-id");
            var value = $(this).val();
            Swal.fire({
                title: '<?php echo e(\App\CPU\translate('Are you sure Change this')); ?>?',
                text: "<?php echo e(\App\CPU\translate('You will not be able to revert this')); ?>!",
                showCancelButton: true,
                confirmButtonColor: '#377dff',
                cancelButtonColor: 'secondary',
                confirmButtonText: '<?php echo e(\App\CPU\translate('Yes, Change it')); ?>!'
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "<?php echo e(route('admin.orders.payment-status')); ?>",
                        method: 'POST',
                        data: {
                            "id": id,
                            "payment_status": value
                        },
                        success: function (data) {
                            toastr.success('<?php echo e(\App\CPU\translate('Status Change successfully')); ?>');
                            location.reload();
                        }
                    });
                }
            })
        });

        function order_status(status) {
            <?php if($order['order_status']=='delivered'): ?>
            Swal.fire({
                title: '<?php echo e(\App\CPU\translate('Order is already delivered, and transaction amount has been disbursed, changing status can be the reason of miscalculation')); ?>!',
                text: "<?php echo e(\App\CPU\translate('Think before you proceed')); ?>.",
                showCancelButton: true,
                confirmButtonColor: '#377dff',
                cancelButtonColor: 'secondary',
                confirmButtonText: '<?php echo e(\App\CPU\translate('Yes, Change it')); ?>!'
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "<?php echo e(route('admin.orders.status')); ?>",
                        method: 'POST',
                        data: {
                            "id": '<?php echo e($order['id']); ?>',
                            "order_status": status
                        },
                        success: function (data) {
                            if (data.success == 0) {
                                toastr.success('<?php echo e(\App\CPU\translate('Order is already delivered, You can not change it')); ?> !!');
                                location.reload();
                            } else {
                                toastr.success('<?php echo e(\App\CPU\translate('Status Change successfully')); ?>!');
                                location.reload();
                            }

                        }
                    });
                }
            })
            <?php else: ?>
            Swal.fire({
                title: '<?php echo e(\App\CPU\translate('Are you sure Change this')); ?>?',
                text: "<?php echo e(\App\CPU\translate('You will not be able to revert this')); ?>!",
                showCancelButton: true,
                confirmButtonColor: '#377dff',
                cancelButtonColor: 'secondary',
                confirmButtonText: '<?php echo e(\App\CPU\translate('Yes, Change it')); ?>!'
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "<?php echo e(route('admin.orders.status')); ?>",
                        method: 'POST',
                        data: {
                            "id": '<?php echo e($order['id']); ?>',
                            "order_status": status
                        },
                        success: function (data) {
                            if (data.success == 0) {
                                toastr.success('<?php echo e(\App\CPU\translate('Order is already delivered, You can not change it')); ?> !!');
                                location.reload();
                            } else {
                                toastr.success('<?php echo e(\App\CPU\translate('Status Change successfully')); ?>!');
                                location.reload();
                            }

                        }
                    });
                }
            })
            <?php endif; ?>
        }
    </script>

    <script>
        function addDeliveryMan(id) {
            $.ajax({
                type: "GET",
                url: '<?php echo e(url('/')); ?>/admin/orders/add-delivery-man/<?php echo e($order['id']); ?>/' + id,
                data: {
                    'order_id': '<?php echo e($order['id']); ?>',
                    'delivery_man_id': id
                },
                success: function (data) {
                    if (data.status == true) {
                        toastr.success('Delivery man successfully assigned/changed', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    } else {
                        toastr.error('Deliveryman man can not assign/change in that status', {
                            CloseButton: true,
                            ProgressBar: true
                        });
                    }
                },
                error: function () {
                    toastr.error('Add valid data', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        }

        function last_location_view() {
            toastr.warning('Only available when order is out for delivery!', {
                CloseButton: true,
                ProgressBar: true
            });
        }

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        function waiting_for_location() {
            toastr.warning('<?php echo e(\App\CPU\translate('waiting_for_location')); ?>', {
                CloseButton: true,
                ProgressBar: true
            });
        }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(\App\CPU\Helpers::get_business_settings('map_api_key')); ?>&v=3.45.8"></script>
    <script>

        function initializegLocationMap() {
            var map = null;
            var myLatlng = new google.maps.LatLng(<?php echo e($shipping_address->latitude); ?>, <?php echo e($shipping_address->longitude); ?>);
            var dmbounds = new google.maps.LatLngBounds(null);
            var locationbounds = new google.maps.LatLngBounds(null);
            var dmMarkers = [];
            dmbounds.extend(myLatlng);
            locationbounds.extend(myLatlng);

            var myOptions = {
                center: myLatlng,
                zoom: 13,
                mapTypeId: google.maps.MapTypeId.ROADMAP,

                panControl: true,
                mapTypeControl: false,
                panControlOptions: {
                    position: google.maps.ControlPosition.RIGHT_CENTER
                },
                zoomControl: true,
                zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.LARGE,
                    position: google.maps.ControlPosition.RIGHT_CENTER
                },
                scaleControl: false,
                streetViewControl: false,
                streetViewControlOptions: {
                    position: google.maps.ControlPosition.RIGHT_CENTER
                }
            };
            map = new google.maps.Map(document.getElementById("location_map_canvas"), myOptions);
            console.log(map);
            var infowindow = new google.maps.InfoWindow();

            <?php if($shipping_address && isset($shipping_address)): ?>
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(<?php echo e($shipping_address->latitude); ?>, <?php echo e($shipping_address->longitude); ?>),
                map: map,
                title: "<?php echo e($order->customer['f_name']??""); ?> <?php echo e($order->customer['l_name']??""); ?>",
                icon: "<?php echo e(asset('public/assets/front-end/img/customer_location.png')); ?>"
            });

            google.maps.event.addListener(marker, 'click', (function (marker) {
                return function () {
                    infowindow.setContent("<div style='float:left'><img style='max-height:40px;wide:auto;' src='<?php echo e(asset('storage/app/public/profile/')); ?><?php echo e($order->customer->image??""); ?>'></div><div style='float:right; padding: 10px;'><b><?php echo e($order->customer->f_name??""); ?> <?php echo e($order->customer->l_name??""); ?></b><br/><?php echo e($shipping_address->address??""); ?></div>");
                    infowindow.open(map, marker);
                }
            })(marker));
            locationbounds.extend(marker.getPosition());
            <?php endif; ?>

            google.maps.event.addListenerOnce(map, 'idle', function () {
                map.fitBounds(locationbounds);
            });
        }

        // Re-init map before show modal
        $('#locationModal').on('shown.bs.modal', function (event) {
            initializegLocationMap();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\XAMMP\htdocs\GarmentsBridge\resources\views/admin-views/order/order-details.blade.php ENDPATH**/ ?>
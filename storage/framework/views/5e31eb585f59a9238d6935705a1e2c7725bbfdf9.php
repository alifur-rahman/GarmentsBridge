<?php
    $overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews);
    $rating = \App\CPU\ProductManager::get_rating($product->reviews);
    $productReviews = \App\CPU\ProductManager::get_product_review($product->id);
?>

<style>
    .product-title2 {
        font-family: 'Roboto', sans-serif !important;
        font-weight: 400 !important;
        font-size: 22px !important;
        color: #000000 !important;
        position: relative;
        display: inline-block;
        word-wrap: break-word;
        overflow: hidden;
        max-height: 1.2em; /* (Number of lines you want visible) * (line-height) */
        line-height: 1.2em;
    }

    .cz-product-gallery {
        display: block;
    }

    .cz-preview {
        width: 100%;
        margin-top: 0;
        margin- <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 0;
        max-height: 100% !important;
    }

    .cz-preview-item > img {
        width: 80%;
    }

    .details {
        border: 1px solid #E2F0FF;
        border-radius: 3px;
        padding: 16px;
    }

    img, figure {
        max-width: 100%;
        vertical-align: middle;
    }

    .cz-thumblist-item {
        display: block;
        position: relative;
        width: 64px;
        height: 64px;
        margin: .625rem;
        transition: border-color 0.2s ease-in-out;
        border: 1px solid #E2F0FF;
        border-radius: .3125rem;
        text-decoration: none !important;
        overflow: hidden;
    }

    .for-hover-bg {
        font-size: 18px;
        height: 45px;
    }

    .cz-thumblist-item > img {
        display: block;
        width: 80%;
        transition: opacity .2s ease-in-out;
        max-height: 58px;
        opacity: .6;
    }

    @media (max-width: 767.98px) and (min-width: 576px) {
        .cz-preview-item > img {
            width: 100%;
        }
    }

    @media (max-width: 575.98px) {
        .cz-thumblist {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -ms-flex-pack: center;
            justify-content: center;
            margin-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 0;
            padding-top: 1rem;
            padding-right: 22px;
            padding-bottom: 10px;
        }

        .cz-thumblist-item {
            margin: 0px;
        }

        .cz-thumblist {
            padding-top: 8px !important;
        }

        .cz-preview-item > img {
            width: 100%;
        }
    }
</style>

<div class="modal-header rtl">
    <div>
        <h4 class="modal-title product-title">
            <a class="product-title2" href="<?php echo e(route('product',$product->slug)); ?>" data-toggle="tooltip"
               data-placement="right"
               title="Go to product page"><?php echo e($product['name']); ?>

                <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-2' : 'right ml-2'); ?> font-size-lg"></i>
            </a>
        </h4>
    </div>
    <div>
        <button class="close call-when-done" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>

<div class="modal-body rtl">
    <div class="row ">
        <div class="col-lg-6 col-md-6">
            <div class="cz-product-gallery">
                <div class="cz-preview">
                    <?php if($product->images!=null && json_decode($product->images)>0): ?>
                        <?php $__currentLoopData = json_decode($product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="cz-preview-item d-flex align-items-center justify-content-center  <?php echo e($key==0?'active':''); ?>">
                                <img class="show-imag img-responsive" style="max-height: 500px!important;"
                                     onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                     src="<?php echo e(asset("storage/app/public/product/$photo")); ?>"
                                     alt="Product image" width="">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <div class="table-responsive" style="max-height: 515px; padding: 0px;">
                        <div class="d-flex">
                            <?php if($product->images!=null && json_decode($product->images)>0): ?>
                                <?php $__currentLoopData = json_decode($product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="cz-thumblist">
                                        <a href="javascript:" class=" cz-thumblist-item d-flex align-items-center justify-content-center">
                                            <img class="click-img" src="<?php echo e(asset("storage/app/public/product/$photo")); ?>"
                                                 onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                 alt="Product thumb">
                                        </a>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product details-->
        <div class="col-lg-6 col-md-6 mt-md-0 mt-sm-3">
            <div class="details" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                <a href="<?php echo e(route('product',$product->slug)); ?>" class="h3 mb-2 product-title"><?php echo e($product->name); ?></a>
                <div class="d-flex align-items-center mb-2 pro">
                    <span
                        class="d-inline-block font-size-sm text-body align-middle mt-1 <?php echo e(Session::get('direction') === "rtl" ? 'ml-2 pl-2' : 'mr-2 pr-2'); ?>"><?php echo e($overallRating[0]); ?></span>
                    <div class="star-rating">
                        <?php for($inc=0;$inc<5;$inc++): ?>
                            <?php if($inc<$overallRating[0]): ?>
                                <i class="sr-star czi-star-filled active"></i>
                            <?php else: ?>
                                <i class="sr-star czi-star"></i>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                    <span
                        class="d-inline-block font-size-sm text-body align-middle mt-1 <?php echo e(Session::get('direction') === "rtl" ? 'ml-2 mr-1' : 'ml-1 mr-2'); ?> pl-2 pr-2"><?php echo e($overallRating[1]); ?> <?php echo e(\App\CPU\translate('reviews')); ?></span>
                    <span style="width: 0px;height: 10px;border: 0.5px solid #707070; margin-top: 6px"></span>
                    <span
                        class="d-inline-block font-size-sm text-body align-middle mt-1 <?php echo e(Session::get('direction') === "rtl" ? 'ml-2 mr-1' : 'ml-1 mr-2'); ?> pl-2 pr-2"><?php echo e($countOrder); ?> <?php echo e(\App\CPU\translate('orders')); ?>  </span>
                    <span style="width: 0px;height: 10px;border: 0.5px solid #707070; margin-top: 6px">    </span>
                    <span
                        class="d-inline-block font-size-sm text-body align-middle mt-1 <?php echo e(Session::get('direction') === "rtl" ? 'ml-2 mr-1' : 'ml-1 mr-2'); ?> pl-2 pr-2">  <?php echo e($countWishlist); ?>  <?php echo e(\App\CPU\translate('wish')); ?></span>

                </div>
                <div class="mb-3">
                    <span
                        class="h3 font-weight-normal text-accent <?php echo e(Session::get('direction') === "rtl" ? 'ml-1' : 'mr-1'); ?>">
                        <?php echo e(\App\CPU\Helpers::get_price_range($product)); ?>

                    </span>
                    <?php if($product->discount > 0): ?>
                        <strike style="font-size: 12px!important;color: grey!important;">
                            <?php echo e(\App\CPU\Helpers::currency_converter($product->unit_price)); ?>

                        </strike>
                    <?php endif; ?>
                </div>

                <?php if($product->discount > 0): ?>
                    <div class="flex-start mb-3">
                        <div><strong><?php echo e(\App\CPU\translate('discount')); ?> : </strong></div>
                        <div><strong id="set-discount-amount" class="mx-2"></strong></div>
                    </div>
                <?php endif; ?>

                <div class="flex-start mb-3">
                    <div><strong><?php echo e(\App\CPU\translate('tax')); ?> : </strong></div>
                    <div><strong id="set-tax-amount" class="mx-2"></strong></div>
                </div>

                <form id="add-to-cart-form" class="mb-2">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                    <div class="position-relative <?php echo e(Session::get('direction') === "rtl" ? 'ml-n4' : 'mr-n4'); ?> mb-3">
                        <?php if(count(json_decode($product->colors)) > 0): ?>
                            <div class="flex-start">
                                <div class="product-description-label mt-2">
                                    <?php echo e(\App\CPU\translate('color')); ?>:
                                </div>
                                <div class="">
                                    <ul class="flex-start checkbox-color mb-1" style="list-style: none;">
                                        <?php $__currentLoopData = json_decode($product->colors); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <input type="radio"
                                                       id="<?php echo e($product->id); ?>-color-<?php echo e($key); ?>"
                                                       name="color" value="<?php echo e($color); ?>"
                                                       <?php if($key == 0): ?> checked <?php endif; ?>>
                                                <label style="background: <?php echo e($color); ?>;"
                                                       for="<?php echo e($product->id); ?>-color-<?php echo e($key); ?>"
                                                       data-toggle="tooltip"></label>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php
                            $qty = 0;
                            foreach (json_decode($product->variation) as $key => $variation) {
                                $qty += $variation->qty;
                            }
                        ?>

                    </div>
                    <?php $__currentLoopData = json_decode($product->choice_options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex-start">
                            <div class="product-description-label mt-2 ">
                                <?php echo e($choice->title); ?>:
                            </div>
                            <div>
                                <ul class=" checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-2">
                                    <?php $__currentLoopData = $choice->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span>
                                            <input type="radio"
                                                   id="<?php echo e($choice->name); ?>-<?php echo e($option); ?>"
                                                   name="<?php echo e($choice->name); ?>" value="<?php echo e($option); ?>"
                                                   <?php if($key == 0): ?> checked <?php endif; ?>>
                                            <label for="<?php echo e($choice->name); ?>-<?php echo e($option); ?>"><?php echo e($option); ?></label>
                                        </span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <!-- Quantity + Add to cart -->
                    <div class="row no-gutters">
                        <div class="col-2">
                            <div class="product-description-label mt-2"><?php echo e(\App\CPU\translate('Quantity')); ?>:</div>
                        </div>
                        <div class="col-10">
                            <div class="product-quantity d-flex align-items-center">
                                <div class="input-group input-group--style-2 pr-3"
                                     style="width: 160px;">
                                    <span class="input-group-btn">
                                        <button class="btn btn-number" type="button"
                                                data-type="minus" data-field="quantity"
                                                disabled="disabled" style="padding: 10px">
                                            -
                                        </button>
                                    </span>
                                    <input type="text" name="quantity"
                                           class="form-control input-number text-center cart-qty-field"
                                           placeholder="1" value="1" min="1" max="100">
                                    <span class="input-group-btn">
                                        <button class="btn btn-number" type="button" data-type="plus"
                                                data-field="quantity" style="padding: 10px">
                                           +
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row no-gutters d-none mt-2" id="chosen_price_div">
                        <div class="col-2">
                            <div class="product-description-label"><?php echo e(\App\CPU\translate('Total Price')); ?>:</div>
                        </div>
                        <div class="col-10">
                            <div class="product-price">
                                <strong id="chosen_price"></strong>
                            </div>
                        </div>
                        <div class="col-12">
                            <?php if($product['current_stock']<=0): ?>
                                <h5 class="mt-3" style="color: red"><?php echo e(\App\CPU\translate('out_of_stock')); ?></h5>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between mt-2">
                        <button class="btn btn-secondary" onclick="buy_now()"
                                type="button"
                                style="width:37%; height: 45px">
                            <?php echo e(\App\CPU\translate('buy_now')); ?>

                        </button>
                        <button class="btn btn-primary string-limit"
                                onclick="addToCart()"
                                type="button"
                                style="width:37%; height: 45px">
                            <?php echo e(\App\CPU\translate('add_to_cart')); ?>

                        </button>
                        <button type="button" onclick="addWishlist('<?php echo e($product['id']); ?>')"
                                class="btn btn-dark for-hover-bg string-limit"
                                style="">
                            <i class="fa fa-heart-o <?php echo e(Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'); ?>"
                               aria-hidden="true"></i>
                            <span class="countWishlist-<?php echo e($product['id']); ?>"><?php echo e($countWishlist); ?></span>
                        </button>
                    </div>
                </form>
                <!-- Product panels-->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    cartQuantityInitialize();
    getVariantPrice();
    $('#add-to-cart-form input').on('change', function () {
        getVariantPrice();
    });

    $(document).ready(function() {
        $('.click-img').click(function(){
            var idimg = $(this).attr('id');
            var srcimg = $(this).attr('src');
            $(".show-imag").attr('src',srcimg);
        });
    });
</script>
<?php /**PATH E:\XAMMP\htdocs\GarmentsBridge\resources\views/web-views/partials/_quick-view-data.blade.php ENDPATH**/ ?>
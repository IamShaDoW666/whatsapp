<!DOCTYPE html>
<html lang="en" dir="<?php echo e(env('SITE_RTL') == 'on'?'rtl':''); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="WhatsStore - Online Whatsapp Store Builder">
    <meta name="author" content="Rajodiya Infotech">
    <meta name="csrf-token" id="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(__('Home')); ?> - <?php echo e(($store->tagline) ?  $store->tagline : config('APP_NAME', ucfirst($store->name))); ?></title>

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/site.css')); ?>" id="stylesheet">
    <link rel="icon" href="<?php echo e(asset(Storage::url('uploads/logo/').(!empty($settings->value)?$settings->value:'favicon.png'))); ?>" type="image/png">
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/@fortawesome/fontawesome-free/css/all.min.css')); ?>"><!-- Page CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/swiper/dist/css/swiper.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/animate.css/animate.min.css')); ?>">
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/sites.css')); ?>" id="stylesheet">
    <?php if(!empty($store->store_theme)): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/'.$store->store_theme)); ?>" id="stylesheet">
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" id="stylesheet">
    <?php endif; ?>

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom.css')); ?>" id="stylesheet')}}">
    <?php if(env('SITE_RTL')=='on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-rtl.css')); ?>">
    <?php endif; ?>
</head>
<body>
<?php
    if(!empty(session()->get('lang')))
    {
        $currantLang = session()->get('lang');
    }else{
        $currantLang = $store->lang;
    }

    $languages=\App\Utility::languages();
?>
<input type="hidden" id="return_url">
<input type="hidden" id="return_order_id">
<div class="vertical-layout h-100">
    <div class="main-menu menu-fixed menu-yellow-bg menu-expanded menu-accordion">
        <div class="navbar-hader">
            <a href="#" class="navbar-brand">
                <span class="logo-box grey-bg">
                    <img src="<?php echo e(asset(Storage::url('uploads/store_logo/').(!empty($store->logo)?$store->logo:'logo.png'))); ?>" class="nav_tab_img" style="margin:15px 9px ">
                </span>
            </a>
        </div>
        <div class="nav-icon">
            <span></span>
        </div>
        <div class="main-menu-content">
            <h2 class="title-category grey-text"><?php echo e(__('Categories')); ?></h2>
            <ul class="navigation navigation main pro_category">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item">
                        <a data-href="<?php echo e($loop->iteration-1); ?><?php echo str_replace(' ','_',$category); ?>" class="<?php echo e(($key==0)?'active':''); ?> custom-list-group-item text-link grey-text productTab">
                            <?php echo e($category); ?>

                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
    <div class="app-content content">
        <nav class="navbar header-navbar navbar-expand floating-nav align-items-center">
            <div class="navbar-container d-flex align-items-center">
                <a href="#" class="nav-brand nav-logo">
                    <img src="<?php echo e(asset(Storage::url('uploads/store_logo/').(!empty($store->logo)?$store->logo:'logo.png'))); ?>" class="header_img" width="200px" style="margin:15px 40px;">
                </a>
                <a href="#" class="nav-brand nav-tagline">
                    <h3 class="nav-title yellow-text header_tagline"><?php echo e($store->tagline); ?></h3>
                    <span class="sub-text yellow-text header_address"><?php echo e($store->address); ?></span>
                </a>
                <form class="search-input" action="/action_page.php">
                    <a href="#" class="search-icon">
                        <img src="<?php echo e(asset('assets/images/search-icon-black-body.svg')); ?>" alt="#">
                    </a>
                    <input type="search" id="search" placeholder="<?php echo e(__('Search')); ?>" name="search">
                </form>

            </div>
        </nav>
        <div class="content-wrapper">
            <div class="content-body">
                <div class="row match-height">
                    <div class="col-xl-8  gridparentt">
                        <div class="card customer-card bestsell-card data_grid">
                            <div class="card-header">
                                <h4 class="card-title"><?php echo e(__('Products')); ?></h4>
                                <div class="right-area">
                                    <div class="sort-area" id="sort_by">
                                        <p class="card-text"><?php echo e(__('Sort by')); ?>: </p>
                                        <a href="<?php echo e(route('store.slug',[$store->slug,'grid'])); ?>" class="sort-icon" data-val="grid">
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M3.9 0H1.5C0.671573 0 0 0.671573 0 1.5V3.9C0 4.72843 0.671573 5.4 1.5 5.4H3.9C4.72843 5.4 5.4 4.72843 5.4 3.9V1.5C5.4 0.671573 4.72843 0 3.9 0ZM1.2 1.5C1.2 1.33431 1.33431 1.2 1.5 1.2H3.9C4.06569 1.2 4.2 1.33431 4.2 1.5V3.9C4.2 4.06569 4.06569 4.2 3.9 4.2H1.5C1.33431 4.2 1.2 4.06569 1.2 3.9V1.5ZM3.9 6.6H1.5C0.671573 6.6 0 7.27157 0 8.1V10.5C0 11.3284 0.671573 12 1.5 12H3.9C4.72843 12 5.4 11.3284 5.4 10.5V8.1C5.4 7.27157 4.72843 6.6 3.9 6.6ZM1.2 8.1C1.2 7.93432 1.33431 7.8 1.5 7.8H3.9C4.06569 7.8 4.2 7.93432 4.2 8.1V10.5C4.2 10.6657 4.06569 10.8 3.9 10.8H1.5C1.33431 10.8 1.2 10.6657 1.2 10.5V8.1ZM8.1 6.6H10.5C11.3284 6.6 12 7.27157 12 8.1V10.5C12 11.3284 11.3284 12 10.5 12H8.1C7.27157 12 6.6 11.3284 6.6 10.5V8.1C6.6 7.27157 7.27157 6.6 8.1 6.6ZM8.1 7.8C7.93432 7.8 7.8 7.93432 7.8 8.1V10.5C7.8 10.6657 7.93432 10.8 8.1 10.8H10.5C10.6657 10.8 10.8 10.6657 10.8 10.5V8.1C10.8 7.93432 10.6657 7.8 10.5 7.8H8.1ZM10.5 0H8.1C7.27157 0 6.6 0.671573 6.6 1.5V3.9C6.6 4.72843 7.27157 5.4 8.1 5.4H10.5C11.3284 5.4 12 4.72843 12 3.9V1.5C12 0.671573 11.3284 0 10.5 0ZM7.8 1.5C7.8 1.33431 7.93432 1.2 8.1 1.2H10.5C10.6657 1.2 10.8 1.33431 10.8 1.5V3.9C10.8 4.06569 10.6657 4.2 10.5 4.2H8.1C7.93432 4.2 7.8 4.06569 7.8 3.9V1.5Z"
                                                      fill="#838383"/>
                                            </svg>
                                        </a>
                                        <a href="<?php echo e(route('store.slug',[$store->slug,'list'])); ?>" class="sort-icon" data-val="list">
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M-5.24537e-08 10.8C-2.34843e-08 11.4627 0.537258 12 1.2 12L10.8 12C11.4627 12 12 11.4627 12 10.8L12 7.8C12 7.13726 11.4627 6.6 10.8 6.6L1.2 6.6C0.537259 6.6 -2.12557e-07 7.13726 -1.83588e-07 7.8L-5.24537e-08 10.8ZM1.2 10.8L1.2 7.8L10.8 7.8L10.8 10.8L1.2 10.8ZM-3.40949e-07 4.2C-3.11979e-07 4.86274 0.537258 5.4 1.2 5.4L10.8 5.4C11.4627 5.4 12 4.86274 12 4.2L12 1.2C12 0.53726 11.4627 4.52622e-07 10.8 4.81591e-07L1.2 9.01221e-07C0.537258 9.3019e-07 -5.01052e-07 0.537258 -4.72083e-07 1.2L-3.40949e-07 4.2ZM1.2 4.2L1.2 1.2L10.8 1.2L10.8 4.2L1.2 4.2Z"
                                                      fill="#D7D7D7"/>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="filter-by">
                                        <label class="filter-icon">
                                            <svg width="14" height="14" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M7.2778 9.77778C7.2778 10.4528 6.73059 11 6.05558 11L4.94447 11C4.62031 11 4.30944 10.8712 4.08022 10.642C3.85101 10.4128 3.72224 10.1019 3.72224 9.77778L3.72224 5.40054L0.364524 2.09294C0.011161 1.74485 -0.0967854 1.21772 0.0913067 0.758747C0.2794 0.299778 0.726229 -5.55075e-08 1.22224 8.54804e-07L9.7778 1.06853e-07C10.2738 6.34903e-08 10.7206 0.299777 10.9087 0.758746C11.0968 1.21772 10.9889 1.74485 10.6355 2.09294L7.2778 5.40054L7.2778 9.77778ZM4.8598 4.83438C4.91475 4.9276 4.94447 5.03461 4.94447 5.14472L4.94447 9.77778L6.05558 9.77778L6.05558 5.14472C6.05558 5.03461 6.08529 4.9276 6.14024 4.83438C6.16697 4.78903 6.19967 4.74695 6.23783 4.70936L9.7778 1.22222L1.22224 1.22222L4.76222 4.70936C4.80037 4.74695 4.83307 4.78903 4.8598 4.83438Z"
                                                      fill="#838383"/>
                                            </svg>
                                            <p><?php echo e(__('Filter by')); ?>:</p>
                                        </label>
                                        <div class="dropdown price-dropdown">
                                            <a class="px-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="0,10">
                                                <span><?php echo e(__('Price')); ?> <img src="<?php echo e(asset('assets/images/select-arrow.png')); ?>" alt=""/></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-sm" id="product_sort">
                                                <a href="#" class="dropdown-item hightolow" data-val="hightolow"><?php echo e(__('High To Low')); ?></a>
                                                <a href="#" class="dropdown-item lowtohigh" data-val="lowtohigh"> <?php echo e(__('Low To High')); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" id="product_view_body">
                                <div id="product_view"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card">
                            <h4 class="card-header card-title"><?php echo e(__('Coupon')); ?></h4>
                            <div class="card-body">
                                <div class="form-group mb-0">
                                    <input type="text" id="stripe_coupon" name="coupon" class="form-control coupon" placeholder="<?php echo e(__('Enter Coupon Code')); ?>">
                                    <input type="hidden" name="coupon" class="form-control hidden_coupon" value="">
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group product-detail apply-stripe-btn-coupon">
                                    <a href="#" class="btn btn-addcart apply-coupon btn-sm"><?php echo e(__('Apply')); ?></a>
                                </div>
                            </div>
                        </div>
                        <?php if(!empty($pro_cart) && count($pro_cart['products']) > 0): ?>
                            <?php if($store->enable_shipping == "on"): ?>
                                <?php if(count($locations) != 1): ?>
                                    <?php if(count($shippings) != 0): ?>
                                        <div class="card">
                                            <div class="form-group">
                                                <h4 class="card-header card-title"><?php echo e(__('Location')); ?></h4>
                                            </div>
                                            <div class="card-body">
                                                <?php echo e(Form::select('location_id', $locations, null,array('class' => 'active acticard-titleve form-control change_location','required'=>'required'))); ?>

                                            </div>
                                            <div class="card-body" id="location_hide" style="display: none">
                                                <div class="p-2">
                                                    <h6><?php echo e(__('Select Shipping')); ?></h6>
                                                </div>
                                                <div class="p-2" id="shipping_location_content">
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="card cart-card cart_dispay" id="card-summary">
                            <div class="card-header pb-3">
                                <h4 class="card-title"><?php echo e(__('Cart')); ?></h4>
                            </div>
                            <?php if(!empty($pro_cart) && count($pro_cart['products']) > 0): ?>
                                <?php
                                    $sub_tax = 0;
                                    $total = 0;
                                    $sub_total = 0;
                                ?>
                                <div class="card-body">
                                    <div class="checkout-body">
                                        <?php $__currentLoopData = $pro_cart['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($product['variant_id'] != 0 ): ?>
                                                <div class="checkout-items">
                                                    <div class="customer-images">
                                                        <img src="<?php echo e(asset($product['image'])); ?>" alt="#" width="70px">
                                                    </div>
                                                    <div class="customer-name">
                                                        <h6 class="title"><a href="#"><?php echo e($product['product_name'].' - '.$product['variant_name']); ?></a></h6>
                                                        <span class="detail-qty pr-1">x<?php echo e($product['quantity']); ?></span>
                                                        <?php
                                                            $total_tax=0;
                                                        ?>
                                                        <?php if($product['tax'] > 0): ?>
                                                            <?php $__currentLoopData = $product['tax']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $sub_tax = ($product['variant_price']* $product['quantity'] * $tax['tax']) / 100;
                                                                    $total_tax += $sub_tax;
                                                                ?>
                                                                <div class="title_tax">
                                                                    <?php echo e($tax['tax_name'].' '.$tax['tax'].'%'.' ('.$sub_tax.')'); ?>

                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                                $totalprice = $product['variant_price'] * $product['quantity'] + $total_tax;
                                                                $subprice = $product['variant_price'] * $product['quantity'];
                                                                $total += $totalprice;
                                                                $sub_total += $subprice;
                                                            ?>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="item-spin" data-id="<?php echo e($key); ?>">
                                                        <button class="spin-rupes product_qty" data-id="<?php echo e($product['id']); ?>" type="submit" value="<?php echo e($product['quantity']); ?>" data-option="decrease">
                                                            <img src="<?php echo e(asset('assets/images/minus-icon.svg')); ?>" alt="#" width="15px">
                                                        </button>

                                                        <input type="hidden" class="pro_variant_id" data-id="<?php echo e($product['variant_id']); ?>" id="product_qty">
                                                        <p class="price-spin"><?php echo e(\App\Utility::priceFormat($product['variant_price']* $product['quantity'])); ?></p>

                                                        <button class="spin-rupes product_qty" data-id="<?php echo e($product['id']); ?>" type="submit" value="<?php echo e($product['quantity']); ?>" data-option="increase">
                                                            <img src="<?php echo e(asset('assets/images/pluse-icon.svg')); ?>" alt="#" width="15px">
                                                        </button>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <div class="checkout-items">
                                                    <div class="customer-images">
                                                        <img src="<?php echo e(asset($product['image'])); ?>" alt="#" width="70px">
                                                    </div>
                                                    <div class="customer-name">
                                                        <h6 class="title"><a href="#"><?php echo e($product['product_name']); ?></a></h6>
                                                        <span class="detail-qty pr-1">x<?php echo e($product['quantity']); ?> </span>
                                                        <?php
                                                            $total_tax=0;
                                                        ?>
                                                        <?php if($product['tax'] > 0): ?>
                                                            <?php $__currentLoopData = $product['tax']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php
                                                                    $sub_tax = ($product['price']* $product['quantity'] * $tax['tax']) / 100;
                                                                    $total_tax += $sub_tax;
                                                                ?>
                                                                <div class="title_tax">
                                                                    <?php echo e($tax['tax_name'].' '.$tax['tax'].'%'.' ('.$sub_tax.')'); ?>

                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                                $totalprice = $product['price'] * $product['quantity'] + $total_tax;
                                                                $subprice = $product['price'] * $product['quantity'];
                                                                $total += $totalprice;
                                                                $sub_total += $subprice;
                                                            ?>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="item-spin" data-id="<?php echo e($key); ?>">
                                                        <button class="spin-rupes product_qty" data-id="<?php echo e($product['id']); ?>" type="submit" value="<?php echo e($product['quantity']); ?>" data-option="decrease">
                                                            <img src="<?php echo e(asset('assets/images/minus-icon.svg')); ?>" alt="#" width="15px">
                                                        </button>

                                                        <input type="hidden" class="pro_variant_id" data-id="<?php echo e($product['variant_id']); ?>" id="product_qty">
                                                        <p class="price-spin"><?php echo e(\App\Utility::priceFormat($product['price']* $product['quantity'])); ?></p>

                                                        <button class="spin-rupes product_qty" data-id="<?php echo e($product['id']); ?>" type="submit" value="<?php echo e($product['quantity']); ?>" data-option="increase">
                                                            <img src="<?php echo e(asset('assets/images/pluse-icon.svg')); ?>" alt="#" width="15px">
                                                        </button>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="invoice-details">
                                        <ul class="invoice-list">
                                            <li class="invoice-detail">
                                                <div class="invoice-title">
                                                    <?php echo e(__('Subtotal')); ?>

                                                </div>
                                                <div class="invoice-amt font-weight600 sub_total_price" data-value="<?php echo e($total); ?>">
                                                    <?php echo e(App\Utility::priceFormat($sub_total)); ?>

                                                </div>
                                            </li>
                                            <li class="invoice-detail">
                                                <div class="invoice-title">
                                                    <?php echo e(__('Coupon')); ?>

                                                </div>
                                                <div class="invoice-amt dicount_price">
                                                    0.00
                                                </div>
                                            </li>
                                            <?php if(!empty($pro_cart) && count($pro_cart['products']) > 0): ?>
                                                <li class="invoice-detail">
                                                    <div class="invoice-title">
                                                        <?php echo e(__('Shipping')); ?>

                                                    </div>
                                                    <div class="invoice-amt">
                                                        <span class="invoice-amt font-weight-bold shipping_price">0.00</span>
                                                    </div>
                                                </li>
                                            <?php endif; ?>
                                            <?php $__currentLoopData = $taxArr['tax']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="invoice-detail">
                                                    <div class="invoice-title">
                                                        <?php echo e($tax); ?>

                                                    </div>
                                                    <div class="invoice-amt">
                                                        <span class="invoice-amt font-weight-bold"><?php echo e(\App\Utility::priceFormat($taxArr['rate'][$k])); ?></span>
                                                    </div>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <li class="invoice-detail" id="Subtotal">
                                                <div class="invoice-title total-title">
                                                    <?php echo e(__('Total (Incl Tax)')); ?>

                                                </div>
                                                <div class="invoice-amt total-amount">
                                                    <input type="hidden" class="product_total" value="<?php echo e($total); ?>">
                                                    <div class="final_total_price pro_total_price" data-original="<?php echo e(\App\Utility::priceFormat(!empty($total)?$total:0)); ?>">
                                                        <?php echo e(App\Utility::priceFormat($total)); ?>

                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="card-footer">
                                    <div class="invoice-details">
                                        <ul class="invoice-list">
                                            <li class="invoice-detail">
                                                <div class="invoice-title">
                                                    <?php echo e(__('Subtotal')); ?>

                                                </div>
                                                <div class="invoice-amt font-weight-600">
                                                    0.00
                                                </div>
                                            </li>
                                            <?php if(!empty($pro_cart) && count($pro_cart['products']) > 0): ?>
                                                <li class="invoice-detail">
                                                    <div class="invoice-title">
                                                        <?php echo e(__('Shipping')); ?>

                                                    </div>
                                                    <div class="invoice-amt">
                                                        <span class="text-sm font-weight-bold shipping_price">0.00</span>
                                                    </div>
                                                </li>
                                            <?php endif; ?>
                                            <?php if(!empty($taxArr)): ?>
                                                <?php $__currentLoopData = $taxArr['tax']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="invoice-detail">
                                                        <div class="invoice-title">
                                                            <?php echo e($tax); ?>

                                                        </div>
                                                        <div class="invoice-amt">
                                                            <span class="invoice-amt font-weight-bold"><?php echo e(\App\Utility::priceFormat($taxArr['rate'][$k])); ?></span>
                                                        </div>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            <li class="invoice-detail">
                                                <div class="invoice-title total-title">
                                                    <?php echo e(__('Total Incl Tax')); ?>

                                                </div>
                                                <div class="invoice-amt total-amount pro_total_price" data-original="<?php echo e(\App\Utility::priceFormat(!empty($total)?$total:0)); ?>">
                                                    0.00
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="card delivery-card">
                            <div class="card-header">
                                <h4 class="card-title"><?php echo e(__('Delivery Details')); ?></h4>
                            </div>
                            <div class="card-body detail-form">
                                <div class="form-group">
                                    <?php echo e(Form::label('name',__('Name'),array("class"=>"form-control-label"))); ?>

                                    <?php echo e(Form::text('name',old('name'),array('class'=>'active acticard-titleve fname','required'=>'required'))); ?>

                                </div>
                                <div class="form-group">
                                    <?php echo e(Form::label('email',__('Email'),array("class"=>"form-control-label"))); ?>

                                    <?php echo e(Form::email('email',old('email'),array('class'=>'active email','required'=>'required'))); ?>

                                </div>
                                <div class="form-group">
                                    <?php echo e(Form::label('phone',__('Phone'),array("class"=>"form-control-label"))); ?>

                                    <?php echo e(Form::text('phone',old('phone'),array('class'=>'active phone','required'=>'required'))); ?>

                                </div>
                                <div class="form-group">
                                    <?php echo e(Form::label('billingaddress',__('Address line 1'),array("class"=>"form-control-label"))); ?>

                                    <?php echo e(Form::text('billing_address',old('billing_address'),array('class'=>'active billing_address','required'=>'required'))); ?>

                                </div>
                                <div class="form-group">
                                    <?php echo e(Form::label('shipping_address',__('Address line 2'),array("class"=>"form-control-label"))); ?>

                                    <?php echo e(Form::text('shipping_address',old('shipping_address'),array('class'=>'active shipping_address' ))); ?>

                                </div>
                            </div>
                        </div>

                        <div class="card instruction-card">
                            <div class="card-header">
                                <h4 class="card-title"><?php echo e(__('Order Notes')); ?></h4>
                            </div>
                            <div class="card-body">
                                <?php echo e(Form::textarea('special_instruct',null,array('class'=>'special_instruct form-control','rows'=>3))); ?>

                            </div>
                            <div class="card-footer">

                            </div>
                        </div>
                        <div class="row">
                            <?php if($store->whatsapp_number): ?>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="card whatsapp-card">
                                        <button type="submit" class="btn whatsap-btn" id="owner-whatsapp">
                                            <img src="<?php echo e(asset('assets/images/whatsapp.svg')); ?>" alt="#">
                                            <?php echo e(__('Order on WhatsApp')); ?>

                                        </button>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($store->telegrambot && $store->telegramchatid): ?>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="card telegram-card">
                                        <button type="submit" class="btn telegram-btn pt-2" id="owner-telegram">
                                            <img src="<?php echo e(asset('assets/images/telegram.svg')); ?>" alt="#" width="50px">
                                            <?php echo e(__('Order on Telegram')); ?>

                                        </button>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <p class="text-store <?php echo e((env('SITE_RTL')=='on')?'text-center':'text-left'); ?>"><?php echo e($store->footer_note); ?></p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <ul class="nav mt-3 mt-md-0  <?php echo e((env('SITE_RTL')=='on')?'m-auto float-left':'float-right text-left'); ?>">
                            <?php if(!empty($store->email)): ?>
                                <li class="nav-item">
                                    <a class="nav-link pl-0" href="mailto:<?php echo e($store->email); ?>" target="_blank">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(!empty($store->whatsapp)): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="https://wa.me/<?php echo e($store->whatsapp); ?>" target=”_blank”>
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(!empty($store->facebook)): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e($store->facebook); ?>" target="_blank">
                                        <i class="fab fa-facebook-square"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(!empty($store->instagram)): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e($store->instagram); ?>" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(!empty($store->twitter)): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e($store->twitter); ?>" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if(!empty($store->youtube)): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e($store->youtube); ?>" target="_blank">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="commonModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <div class="modal-title">
                    <h6 class="mb-0" id="modelCommanModelLabel"></h6>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

<script src="<?php echo e(asset('assets/libs/swiper/dist/js/swiper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/site.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/demo.js')); ?>"></script>
<script src="<?php echo e(asset('assets/libs/jquery-mask-plugin/dist/jquery.mask.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/sitejs.core.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>

<script src="<?php echo e(asset('assets/libs/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>

<?php
    $store_settings = \App\Store::where('slug',$store->slug)->first();
?>

<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e($store_settings->google_analytic); ?>"></script>

<?php echo $store_settings->storejs; ?>


<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', '<?php echo e($store_settings->google_analytic); ?>');
</script>
<script>
    $(document).ready(function () {
        $("#search").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $(".product_tableese .product_item").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    $('#search').keydown(function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            return false;
        }
    });

    $(document).ready(function () {
        $('.change_location').trigger('change');

        setTimeout(function () {
            var shipping_id = $("input[name='shipping_id']:checked").val();
            getTotal(shipping_id);
        }, 200);
    });

    $(document).on('change', '.shipping_mode', function () {
        var shipping_id = this.value;
        getTotal(shipping_id);
    });

    function getTotal(shipping_id) {
        // var pro_total_price = $('.pro_total_price').attr('data-original');
        var sub_total_price = $('.sub_total_price').attr('data-value');

        var coupon = $('.coupon').val();

        if (shipping_id == undefined) {
            $('.shipping_price_add').hide();
            return false
        } else {
            $('.shipping_price_add').show();
        }

        $.ajax({
            url: '<?php echo e(route('user.shipping', [$store->slug,'_shipping'])); ?>'.replace('_shipping', shipping_id),
            data: {
                "pro_total_price": sub_total_price,
                "coupon": coupon,
                "_token": "<?php echo e(csrf_token()); ?>",
            },
            method: 'POST',
            context: this,
            dataType: 'json',

            success: function (data) {
                // var price = data.price + sub_total_price;
                $('.shipping_price').html(data.price);
                $('.pro_total_price').html(data.total_price);
                $('.pro_total_price').attr('data-original', data.total_price);
            }
        });
    }

    $(document).on('change', '.change_location', function () {
        var location_id = $('.change_location').val();

        if (location_id == 0) {
            $('#location_hide').hide();

        } else {
            $('#location_hide').show();

        }

        $.ajax({
            url: '<?php echo e(route('user.location', [$store->slug,'_location_id'])); ?>'.replace('_location_id', location_id),
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
            },
            method: 'POST',
            context: this,
            dataType: 'json',

            success: function (data) {
                var html = '';
                var shipping_id = '<?php echo e((isset($cust_details['shipping_id']) ? $cust_details['shipping_id'] : '')); ?>';
                $.each(data.shipping, function (key, value) {
                    var checked = '';
                    if (shipping_id != '' && shipping_id == value.id) {
                        checked = 'checked';
                    }
                    html += '<div class="shipping_location"><input type="radio" name="shipping_id" data-id="' + value.price + '" value="' + value.id + '" id="shipping_price' + key + '" class="shipping_mode" ' + checked + '>' +
                        ' <label name="shipping_label" for="shipping_price' + key + '" class="shipping_label"> ' + value.name + '</label></div>';
                });
                $('#shipping_location_content').html(html);
            }
        });
    });

    $(document).on('click', '.apply-coupon', function (e) {
        e.preventDefault();
        var ele = $(this);
        var coupon = ele.closest('.row').find('.coupon').val();
        var hidden_field = $('.hidden_coupon').val();
        var price = $('#card-summary .product_total').val();
        var shipping_price = $('.shipping_price').html();

        if (coupon == hidden_field) {
            show_toastr('Error', 'Coupon Already Used', 'error');
        } else {
            if (coupon != '') {
                $.ajax({
                    url: '<?php echo e(route('apply.productcoupon')); ?>',
                    datType: 'json',
                    data: {
                        price: price,
                        shipping_price: shipping_price,
                        store_id: <?php echo e($store->id); ?>,
                        coupon: coupon
                    },
                    success: function (data) {
                        $('#stripe_coupon, #paypal_coupon').val(coupon);
                        if (data.is_success) {
                            $('.hidden_coupon').val(coupon);
                            $('.hidden_coupon').attr(data);

                            $('.dicount_price').html(data.discount_price);
                            $('.pro_total_price').attr('data-original', data.final_price);
                            var html = '';
                            // html += '<span data-value="' + data.final_price + '">' + data.final_price + '</span>'
                            html += '<span data-value="' + data.final_price + '">' + data.final_price + '</span>'
                            $('.final_total_price').html(html);


                            // $('.coupon-tr').show().find('.coupon-price').text(data.discount_price);
                            // $('.final-price').text(data.final_price);
                            show_toastr('Success', data.message, 'success');
                        } else {
                            // $('.coupon-tr').hide().find('.coupon-price').text('');
                            // $('.final-price').text(data.final_price);
                            show_toastr('Error', data.message, 'error');
                        }
                    }
                })
            } else {
                show_toastr('Error', '<?php echo e(__('Invalid Coupon Code.')); ?>', 'error');
            }
        }
    });

    $(document).on('click', '#owner-whatsapp', function () {
        var product_array = '<?php echo e($encode_product); ?>';
        var product = JSON.parse(product_array.replace(/&quot;/g, '"'));
        var order_id = '<?php echo e($order_id = '#'.time()); ?>';

        // var total_price = $('#Subtotal .total_price').attr('data-value');
        var total_price = $('.final_total_price').attr('data-original');
        var coupon_id = $('.hidden_coupon').attr('data_id');
        var dicount_price = $('.dicount_price').html();
        var shipping_price = $('.shipping_price').html();
        var shipping_name = $('.change_location').find(":selected").text();
        var shipping_id = $("input[name='shipping_id']:checked").val();

        var name = $('.detail-form .fname').val();
        var email = $('.detail-form .email').val();
        var phone = $('.detail-form .phone').val();
        var billing_address = $('.detail-form .billing_address').val();
        var shipping_address = $('.detail-form .shipping_address').val();
        var special_instruct = $('.special_instruct').val();


        var ajaxData = {
            coupon_id: coupon_id,
            dicount_price: dicount_price,
            shipping_price: shipping_price,
            shipping_name: shipping_name,
            shipping_id: shipping_id,
            total_price: total_price,
            product: product,
            order_id: order_id,
            name: name,
            email: email,
            phone: phone,
            billing_address: billing_address,
            shipping_address: shipping_address,
            special_instruct: special_instruct,

            wts_number: $('#wts_number').val()
        }

        getWhatsappUrl(ajaxData);


        $.ajax({
            url: '<?php echo e(route('user.whatsapp',$store->slug)); ?>',
            method: 'POST',
            data: ajaxData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data.status == 'success') {

                    removesession();

                    show_toastr(data["success"], '<?php echo session('+data["status"]+'); ?>', data["status"]);

                    setTimeout(function () {
                        var url = '<?php echo e(route('store-complete.complete', [$store->slug, ":id"])); ?>';
                        url = url.replace(':id', data.order_id);

                        window.location.href = url;
                    }, 1000);

                    setTimeout(function () {
                        var get_url_msg_url = $('#return_url').val();
                        var append_href = get_url_msg_url + '  ' + '<?php echo e(route('user.order',[$store->slug,Crypt::encrypt(!empty($order->id) ? $order->id + 1 : 0 + 1)])); ?>';
                        window.open(append_href, '_blank');
                    }, 20);

                } else {
                    show_toastr("Error", data.success, data["status"]);
                }
            }
        });
    });

    $(document).on('click', '#owner-telegram', function () {
        var product_array = '<?php echo e($encode_product); ?>';
        var product = JSON.parse(product_array.replace(/&quot;/g, '"'));
        var order_id = '<?php echo e($order_id = !empty($order->id) ? $order->id + 1 : 0 + 1); ?>';

        // var total_price = $('#Subtotal .total_price').attr('data-value');
        var total_price = $('.final_total_price').attr('data-original');
        var coupon_id = $('.hidden_coupon').attr('data_id');
        var dicount_price = $('.dicount_price').html();
        var shipping_price = $('.shipping_price').html();
        var shipping_name = $('.change_location').find(":selected").text();
        var shipping_id = $("input[name='shipping_id']:checked").val();

        var name = $('.detail-form .fname').val();
        var email = $('.detail-form .email').val();
        var phone = $('.detail-form .phone').val();
        var billing_address = $('.detail-form .billing_address').val();
        var shipping_address = $('.detail-form .shipping_address').val();
        var special_instruct = $('.special_instruct').val();


        var ajaxData = {
            type: 'telegram',
            coupon_id: coupon_id,
            dicount_price: dicount_price,
            shipping_price: shipping_price,
            shipping_name: shipping_name,
            shipping_id: shipping_id,
            total_price: total_price,
            product: product,
            order_id: order_id,
            name: name,
            email: email,
            phone: phone,
            billing_address: billing_address,
            shipping_address: shipping_address,
            special_instruct: special_instruct,

            wts_number: $('#wts_number').val()
        }

        getWhatsappUrl(ajaxData);


        $.ajax({
            url: '<?php echo e(route('user.telegram',$store->slug)); ?>',
            method: 'POST',
            data: ajaxData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data.status == 'success') {


                    show_toastr(data["success"], '<?php echo session('+data["status"]+'); ?>', data["status"]);

                    setTimeout(function () {

                        removesession();

                        var url = '<?php echo e(route('store-complete.complete', [$store->slug, ":id"])); ?>';
                        url = url.replace(':id', data.order_id);

                        window.location.href = url;
                    }, 1000);

                } else {
                    show_toastr("Error", data.success, data["status"]);
                }
            }
        });
    });

    //for create/get Whatsapp Url
    function getWhatsappUrl(ajaxData = '') {
        $.ajax({
            url: '<?php echo e(route('get.whatsappurl',$store->slug)); ?>',
            method: 'post',
            data: ajaxData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data.status == 'success') {
                    $('#return_url').val(data.url);
                    $('#return_order_id').val(data.order_id);

                } else {
                    $('#return_url').val('')
                    show_toastr("Error", data.success, data["status"]);
                }
            }
        });
    }

    //for create/get Telegram Url
    function getTelegramUrl(ajaxData = '') {
        $.ajax({
            url: '<?php echo e(route('get.whatsappurl',$store->slug)); ?>',
            method: 'post',
            data: ajaxData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data.status == 'success') {
                    $('#return_url').val(data.url);
                    $('#return_order_id').val(data.order_id);

                } else {
                    $('#return_url').val('')
                    show_toastr("Error", data.success, data["status"]);
                }
            }
        });
    }

    function removesession() {
        $.ajax({
            url: '<?php echo e(route('remove.session',$store->slug)); ?>',
            method: 'get',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {

            }
        });
    }

    $(document).on('click', '.add_to_cart', function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');

        $.ajax({
            type: "POST",
            url: '<?php echo e(route('user.addToCart', ['__product_id',$store->slug])); ?>'.replace('__product_id', id),
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
            },
            success: function (response) {
                if (response.status == "Success") {
                    show_toastr('Success', response.success, 'success');
                    $("#shoping_count").attr("value", response.item_count);
                    location.reload();
                } else {
                    show_toastr('Error', response.error, 'error');
                }
            },
            error: function (result) {
                // console.log('error');
            }
        });
    });

    $(document).on('click', '.add_to_cart_variant', function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var variants = [];
        $(".variant-selection").each(function (index, element) {
            variants.push(element.value);
        });

        if (jQuery.inArray('', variants) != -1) {
            show_toastr('Error', "<?php echo e(__('Please select all option.')); ?>", 'error');
            return false;
        }

        var variation_ids = $('#variant_id').val();

        $.ajax({
            url: '<?php echo e(route('user.addToCart', ['__product_id',$store->slug,'variation_id'])); ?>'.replace('__product_id', id).replace('variation_id', variation_ids ?? 0),
            type: "POST",
            data: {
                "_token": "<?php echo e(csrf_token()); ?>",
                variants: variants.join(' : '),
            },
            success: function (response) {
                if (response.status == "Success") {
                    show_toastr('Success', response.success, 'success');
                    $("#shoping_count").attr("value", response.item_count);
                    location.reload();
                } else {
                    show_toastr('Error', response.error, 'error');
                }
            },
            error: function (result) {
                // console.log('error');
            }
        });
    })

    $(document).on('change', '#pro_variants_name', function () {
        var variants = [];
        $(".variant-selection").each(function (index, element) {
            variants.push(element.value);
        });
        if (variants.length > 0) {
            $.ajax({
                url: '<?php echo e(route('get.products.variant.quantity')); ?>',
                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content'),
                    variants: variants.join(' : '),
                    product_id: $('#product_id').val()
                },
                success: function (data) {
                    $('.variation_price').html(data.price);
                    $('#variant_id').val(data.variant_id);
                    $('#variant_qty').val(data.quantity);
                }
            });
        }
    });

    $(document).ready(function () {
        var type = 'hightolow';
        // when change sorting order
        $('#product_sort').on('click', 'a', function () {
            type = $(this).attr('data-val');
            ajaxFilterProjectView(type);
            $('#product_sort a').removeClass('active');
            $(this).addClass('active');
        });


        ajaxFilterProjectView(type);

        // var currentRequest = null;
        function ajaxFilterProjectView(type) {
            var mainEle = $('#product_view');
            var view = '<?php echo e($view); ?>';
            var slug = '<?php echo e($store->slug); ?>';

            $.ajax({
                url: '<?php echo e(route('filter.product.view')); ?>',
                type: 'POST',
                data: {
                    view: view,
                    types: type,
                    slug: slug,
                },
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    mainEle.html(data.html);
                    var data_id = $('.pro_category').find('.custom-list-group-item.active').attr('data-href');
                    $('#product_view .collection-items').addClass('d-none');
                    $('#product_view .collection-items.' + data_id).removeClass('d-none');
                }
            });

        }
    });

    $(document).on('click', '.custom-list-group-item', function () {
        var dataHref = $(this).attr('data-href');
        $('.collection-items').addClass('d-none');
        $('.' + dataHref).removeClass('d-none');
    });

    $(".product_qty").on('click', function (e) {
        e.preventDefault();
        var product_id = $(this).attr('data-id');
        var arrkey = $(this).parents('div').attr('data-id');
        var qty_id = $(this).val();

        if ($(this).attr('data-option') == 'decrease') {
            qty_id = parseInt(qty_id) - parseInt(1);
        } else {
            qty_id = parseInt(qty_id) + parseInt(1);
        }

        $.ajax({
            url: '<?php echo e(route('user-product_qty.product_qty',['__product_id',$store->slug,'arrkeys'])); ?>'.replace('__product_id', product_id).replace('arrkeys', arrkey),
            type: "post",
            headers: {
                'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                "product_qty": qty_id,
            },
            success: function (response) {
                if (response.status == "Error") {
                    show_toastr('Error', response.error, 'error');
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                } else {
                    location.reload(); // then reload the page.(3)
                }
            },
            error: function (result) {
                // console.log('error12');
            }
        });
    });

    $(".productTab").click(function (e) {
        e.preventDefault();
        $('.productTab').removeClass('active', 'text-primary');
        $('body').removeClass('nav-open');
    });
</script>


<?php if(Session::has('success')): ?>
    <script>
        show_toastr('<?php echo e(__('Success')); ?>', '<?php echo session('success'); ?>', 'success');
    </script>
    <?php echo e(Session::forget('success')); ?>

<?php endif; ?>
<?php if(Session::has('error')): ?>
    <script>
        show_toastr('<?php echo e(__('Error')); ?>', '<?php echo session('error'); ?>', 'error');
    </script>
    <?php echo e(Session::forget('error')); ?>

<?php endif; ?>


</body>

</html>

<?php /**PATH C:\xampp\htdocs\whatsapp\resources\views/storefront/index.blade.php ENDPATH**/ ?>
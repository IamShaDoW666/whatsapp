<?php
    $logo=asset(Storage::url('uploads/logo/'));
    $company_logo=\App\Utility::getValByName('company_logo');
    $company_favicon=\App\Utility::getValByName('company_favicon');
    $store_logo=asset(Storage::url('uploads/store_logo/'));
    $lang=\App\Utility::getValByName('default_language');
    if(Auth::user()->type == 'Owner')
    {
        $store_lang=$store_settings->lang;
    }
?>
<?php $__env->startSection('page-title'); ?>
    <?php if(Auth::user()->type == 'super admin'): ?>
        <?php echo e(__('Setting')); ?>

    <?php else: ?>
        <?php echo e(__('Store Setting')); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <?php if(Auth::user()->type == 'super admin'): ?>
            <h5 class="h4 d-inline-block font-weight-bold mb-0 text-white"><?php echo e(__('Setting')); ?></h5>
        <?php else: ?>
            <h5 class="h4 d-inline-block font-weight-bold mb-0 text-white"><?php echo e(__('Store Setting')); ?></h5>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/summernote/summernote-bs4.css')); ?>">
    <style>
        hr {
            margin: 8px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('assets/libs/summernote/summernote-bs4.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="mt-4">
        <div class="card">
            <ul class="nav nav-tabs nav-overflow profile-tab-list" role="tablist">
                <?php if(Auth::user()->type == 'Owner'): ?>
                    <li class="nav-item ml-4">
                        <a href="#store_setting" id="store_setting_tab" class="nav-link active" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">
                            <i class="fas fa-store mr-2"></i>
                            <?php echo e(__('Store Settings')); ?>

                        </a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="#store_theme_setting" id="theme_setting_tab" class="nav-link" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">
                            <i class="fas fa-cog mr-2"></i><?php echo e(__('Store Theme Setting')); ?>

                        </a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="#store_site_setting" id="site_setting_tab" class="nav-link" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">
                            <i class="fas fa-cog mr-2"></i><?php echo e(__('Site Setting')); ?>

                        </a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="#store_payment-setting" id="payment-setting_tab" class="nav-link" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">
                            <i class="fab fa-cc-visa mr-2"></i><?php echo e(__('Store Payment')); ?>

                        </a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="#store_email_setting" id="email_store_setting" class="nav-link" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">
                            <i class="fas fa-envelope mr-2"></i><?php echo e(__('Store Email Setting')); ?>

                        </a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="#whatsapp_custom_massage" id="system_setting_tab" class="nav-link" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">
                            <i class="fab fa-whatsapp-square mr-2"></i><?php echo e(__('Whatsapp Massage Setting')); ?>

                        </a>
                    </li>
                <?php endif; ?>
                <?php if(Auth::user()->type == 'super admin'): ?>
                    <li class="nav-item ml-4">
                        <a href="#site_setting" id="site_setting_tab" class="nav-link active" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">
                            <i class="fas fa-cog mr-2"></i><?php echo e(__('Site Setting')); ?>

                        </a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="#payment-setting" id="payment-setting_tab" class="nav-link" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">
                            <i class="fab fa-cc-visa mr-2"></i><?php echo e(__('Payment')); ?>

                        </a>
                    </li>
                    <li class="nav-item ml-4">
                        <a href="#email_setting" id="system_setting_tab" class="nav-link" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true">
                            <i class="fas fa-envelope mr-2"></i><?php echo e(__('Email Setting')); ?>

                        </a>
                    </li>
                <?php endif; ?>
            </ul>
            <div class="tab-content">
                <?php if(Auth::user()->type == 'Owner'): ?>
                    <div class="tab-pane fade show active" id="store_setting" role="tabpanel" aria-labelledby="orders-tab">
                        <?php echo e(Form::model($store_settings,array('route'=>array('settings.store',$store_settings['id']),'method'=>'POST','enctype' => "multipart/form-data"))); ?>

                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="logo" class="form-control-label"><?php echo e(__('Logo')); ?></label>
                                        <input type="file" name="logo" id="logo" class="custom-input-file">
                                        <label for="logo">
                                            <i class="fa fa-upload"></i>
                                            <span><?php echo e(__('Choose a file')); ?></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-center mt-3">
                                    <div class="logstore_settingso-div">
                                        <img src="<?php echo e($store_logo.'/'.(isset($store_settings['logo']) && !empty($store_settings['logo'])?$store_settings['logo']:'logo.png')); ?>" width="180px" class="img_setting">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="row">
                                    <span class="invalid-logo" role="alert">
                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                     </span>
                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="invoice_logo" class="form-control-label"><?php echo e(__('Invoice Logo')); ?></label>
                                        <input type="file" name="invoice_logo" id="invoice_logo" class="custom-input-file">
                                        <label for="invoice_logo">
                                            <i class="fa fa-upload"></i>
                                            <span><?php echo e(__('Choose a file')); ?></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-center mt-3">
                                    <div class="logstore_settingso-div">
                                        <img src="<?php echo e($store_logo.'/'.(isset($store_settings['invoice_logo']) && !empty($store_settings['invoice_logo'])?$store_settings['invoice_logo']:'invoice_logo.png')); ?>" width="170px" class="img_setting">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <?php $__errorArgs = ['invoice_logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="row">
                                    <span class="invalid-invoice_logo" role="alert">
                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                     </span>
                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('store_name',__('Store Name'),array('class'=>'form-control-label'))); ?>

                                    <?php echo Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Store Name'))); ?>

                                    <?php $__errorArgs = ['store_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-store_name" role="alert">
                                         <strong class="text-danger"><?php echo e($message); ?></strong>
                                     </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('email',__('Email'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Email')))); ?>

                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-email" role="alert">
                                         <strong class="text-danger"><?php echo e($message); ?></strong>
                                     </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <?php if($plan->enable_custdomain == 'on' || $plan->enable_custsubdomain == 'on'): ?>
                                    <div class="col-6 py-4">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-primary <?php echo e(($store_settings['enable_storelink'] == 'on') ? 'active' : ''); ?>">
                                                <input type="radio" class="domain_click" name="enable_domain" value="enable_storelink" id="enable_storelink" <?php echo e(($store_settings['enable_storelink'] == 'on') ? 'checked' : ''); ?>"> <?php echo e(__('Store Link')); ?>

                                            </label>
                                            <?php if($plan->enable_custdomain == 'on'): ?>
                                                <label class="btn btn-primary <?php echo e(($store_settings['enable_domain'] == 'on') ? 'active' : ''); ?>">
                                                    <input type="radio" class="domain_click" name="enable_domain" value="enable_domain" id="enable_domain" <?php echo e(($store_settings['enable_domain'] == 'on') ? 'checked' : ''); ?> > <?php echo e(__('Domain')); ?>

                                                </label>
                                            <?php endif; ?>
                                            <?php if($plan->enable_custsubdomain == 'on'): ?>
                                                <label class="btn btn-primary <?php echo e(($store_settings['enable_subdomain'] == 'on') ? 'active' : ''); ?>">
                                                    <input type="radio" class="domain_click" name="enable_domain" value="enable_subdomain" id="enable_subdomain" <?php echo e(($store_settings['enable_subdomain'] == 'on') ? 'checked' : ''); ?>> <?php echo e(__('Sub Domain')); ?>

                                                </label>
                                            <?php endif; ?>
                                        </div>
                                        <div class="text-sm" id="domainnote" style="display: none"><?php echo e(__('Note : Before add custom domain, your domain A record is pointing to our server IP :')); ?><?php echo e($serverIp); ?> <br>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6" id="StoreLink" style="<?php echo e(($store_settings['enable_storelink'] == 'on') ? 'display: block':'display: none'); ?>">
                                        <?php echo e(Form::label('store_link',__('Store Link'),array('class'=>'form-control-label'))); ?>

                                        <div class="input-group">
                                            <input type="text" value="<?php echo e($store_settings['store_url']); ?>" id="myInput" class="form-control d-inline-block" aria-label="Recipient's username" aria-describedby="button-addon2" readonly>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary" type="button" onclick="myFunction()" id="button-addon2"><i class="far fa-copy"></i> <?php echo e(__('Copy Link')); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 domain" style="<?php echo e(($store_settings['enable_domain'] == 'on') ? 'display:block':'display:none'); ?>">
                                        <?php echo e(Form::label('store_domain',__('Custom Domain'),array('class'=>'form-control-label'))); ?>

                                        <?php echo e(Form::text('domains',$store_settings['domains'],array('class'=>'form-control','placeholder'=>__('xyz.com')))); ?>

                                    </div>
                                    <?php if($plan->enable_custsubdomain == 'on'): ?>
                                        <div class="form-group col-md-6 sundomain" style="<?php echo e(($store_settings['enable_subdomain'] == 'on') ? 'display:block':'display:none'); ?>">
                                            <?php echo e(Form::label('store_subdomain',__('Sub Domain'),array('class'=>'form-control-label'))); ?>

                                            <div class="input-group">
                                                <?php echo e(Form::text('subdomain',$store_settings['slug'],array('class'=>'form-control','placeholder'=>__('Enter Domain'),'readonly'))); ?>

                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">.<?php echo e($subdomain_name); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <div class="form-group col-md-6" id="StoreLink">
                                        <?php echo e(Form::label('store_link',__('Store Link'),array('class'=>'form-control-label'))); ?>

                                        <div class="input-group">
                                            <input type="text" value="<?php echo e($store_settings['store_url']); ?>" id="myInput" class="form-control d-inline-block" aria-label="Recipient's username" aria-describedby="button-addon2" readonly>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary" type="button" onclick="myFunction()" id="button-addon2"><i class="far fa-copy"></i> <?php echo e(__('Copy Link')); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('tagline',__('Tagline'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::text('tagline',null,array('class'=>'form-control','placeholder'=>__('Tagline')))); ?>

                                    <?php $__errorArgs = ['tagline'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-tagline" role="alert">
                                         <strong class="text-danger"><?php echo e($message); ?></strong>
                                     </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('address',__('Address'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::text('address',null,array('class'=>'form-control','placeholder'=>__('Address')))); ?>

                                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-address" role="alert">
                                         <strong class="text-danger"><?php echo e($message); ?></strong>
                                     </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('city',__('City'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::text('city',null,array('class'=>'form-control','placeholder'=>__('City')))); ?>

                                    <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-city" role="alert">
                                         <strong class="text-danger"><?php echo e($message); ?></strong>
                                     </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('state',__('State'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::text('state',null,array('class'=>'form-control','placeholder'=>__('State')))); ?>

                                    <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-state" role="alert">
                                         <strong class="text-danger"><?php echo e($message); ?></strong>
                                     </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('zipcode',__('Zipcode'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::text('zipcode',null,array('class'=>'form-control','placeholder'=>__('Zipcode')))); ?>

                                    <?php $__errorArgs = ['zipcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-zipcode" role="alert">
                                         <strong class="text-danger"><?php echo e($message); ?></strong>
                                     </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('country',__('Country'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::text('country',null,array('class'=>'form-control','placeholder'=>__('Country')))); ?>

                                    <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-country" role="alert">
                                         <strong class="text-danger"><?php echo e($message); ?></strong>
                                     </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('store_default_language',__('Store Default Language'), array('class'=>'form-control-label'))); ?>

                                    <div class="changeLanguage">
                                        <select name="store_default_language" id="store_default_language" class="form-control custom-select" data-toggle="select">
                                            <?php $__currentLoopData = \App\Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if($store_lang == $language): ?> selected <?php endif; ?> value="<?php echo e($language); ?>"><?php echo e(Str::upper($language)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <?php if($plan->shipping_method == 'on'): ?>
                                    <div class="form-group col-md-3">
                                        <?php echo e(Form::label('Shipping Method Enable',__('Shipping Method Enable'),array('class'=>'form-control-label mb-3'))); ?>

                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" name="enable_shipping" id="enable_shipping" <?php echo e(($store_settings['enable_shipping'] == 'on') ? 'checked=checked' : ''); ?>>
                                            <label class="custom-control-label form-control-label" for="enable_shipping"></label>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <i class="fab fa-google" aria-hidden="true"></i>
                                        <?php echo e(Form::label('google_analytic',__('Google Analytic'),array('class'=>'form-control-label'))); ?>

                                        <?php echo e(Form::text('google_analytic',null,array('class'=>'form-control','placeholder'=>'UA-XXXXXXXXX-X'))); ?>

                                        <?php $__errorArgs = ['google_analytic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-google_analytic" role="alert">
                                         <strong class="text-danger"><?php echo e($message); ?></strong>
                                     </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <?php echo e(Form::label('about',__('About'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::textarea('about',null,array('class'=>'form-control summernote-simple','rows'=>3,'placehold   er'=>__('About')))); ?>

                                    <?php $__errorArgs = ['about'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-about" role="alert">
                                         <strong class="text-danger"><?php echo e($message); ?></strong>
                                     </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-12 pt-4">
                                    <h5 class="h6 mb-0"><?php echo e(__('Footer Note')); ?></h5>
                                    <small><?php echo e(__('This detail will use for make explore social media.')); ?></small>
                                    <hr class="my-4">
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <i class="fas fa-envelope"></i>
                                        <?php echo e(Form::label('email',__('Email'),array('class'=>'form-control-label'))); ?>

                                        <?php echo e(Form::text('email',null,array('class'=>'form-control','rows'=>3,'placeholder'=>__('Email')))); ?>

                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-email" role="alert">
                                         <strong class="text-danger"><?php echo e($message); ?></strong>
                                     </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <i class="fab fa-whatsapp" aria-hidden="true"></i>
                                        <?php echo e(Form::label('whatsapp',__('Whatsapp'),array('class'=>'form-control-label'))); ?>

                                        <?php echo e(Form::text('whatsapp',null,array('class'=>'form-control','rows'=>3,'placeholder'=>'https://wa.me/1XXXXXXXXXX'))); ?>

                                        <?php $__errorArgs = ['whatsapp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-whatsapp" role="alert">
                                         <strong class="text-danger"><?php echo e($message); ?></strong>
                                     </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <i class="fab fa-facebook-square" aria-hidden="true"></i>
                                        <?php echo e(Form::label('facebook',__('Facebook'),array('class'=>'form-control-label'))); ?>

                                        <?php echo e(Form::text('facebook',null,array('class'=>'form-control','rows'=>3,'placeholder'=>'https://www.facebook.com/'))); ?>

                                        <?php $__errorArgs = ['facebook'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-facebook" role="alert">
                                         <strong class="text-danger"><?php echo e($message); ?></strong>
                                     </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <i class="fab fa-instagram" aria-hidden="true"></i>
                                        <?php echo e(Form::label('instagram',__('Instagram'),array('class'=>'form-control-label'))); ?>

                                        <?php echo e(Form::text('instagram',null,array('class'=>'form-control','placeholder'=>'https://www.instagram.com/'))); ?>

                                        <?php $__errorArgs = ['instagram'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-instagram" role="alert">
                                         <strong class="text-danger"><?php echo e($message); ?></strong>
                                     </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <i class="fab fa-twitter" aria-hidden="true"></i>
                                        <?php echo e(Form::label('twitter',__('Twitter'),array('class'=>'form-control-label'))); ?>

                                        <?php echo e(Form::text('twitter',null,array('class'=>'form-control','placeholder'=>'https://twitter.com/'))); ?>

                                        <?php $__errorArgs = ['twitter'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-twitter" role="alert">
                                         <strong class="text-danger"><?php echo e($message); ?></strong>
                                     </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <i class="fab fa-youtube" aria-hidden="true"></i>
                                        <?php echo e(Form::label('youtube',__('Youtube'),array('class'=>'form-control-label'))); ?>

                                        <?php echo e(Form::text('youtube',null,array('class'=>'form-control','placeholder'=>'https://www.youtube.com/'))); ?>

                                        <?php $__errorArgs = ['youtube'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-youtube" role="alert">
                                         <strong class="text-danger"><?php echo e($message); ?></strong>
                                     </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <i class="fas    fa-copyright" aria-hidden="true"></i>
                                        <?php echo e(Form::label('footer_note',__('Footer Note'),array('class'=>'form-control-label'))); ?>

                                        <?php echo e(Form::text('footer_note',null,array('class'=>'form-control','placeholder'=>__('Footer Note')))); ?>

                                        <?php $__errorArgs = ['footer_note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-footer_note" role="alert">
                                         <strong class="text-danger"><?php echo e($message); ?></strong>
                                     </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    <?php echo e(Form::label('storejs',__('Store Custom JS'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::textarea('storejs',null,array('class'=>'form-control','rows'=>3,'placeholder'=>__('Store Custom JS')))); ?>

                                    <?php $__errorArgs = ['storejs'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-storejs" role="alert">
                                         <strong class="text-danger"><?php echo e($message); ?></strong>
                                     </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6">
                                    <button type="button" class="btn btn-sm btn-soft-danger btn-icon rounded-pill" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').' | '.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($store_settings->id); ?>').submit();">
                                        <span class="btn-inner--text"><?php echo e(__('Delete Store')); ?></span>
                                    </button>
                                </div>
                                <div class="col-6 text-right">
                                    <?php echo e(Form::submit(__('Save Change'),array('class'=>'btn btn-sm btn-primary rounded-pill'))); ?>

                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['ownerstore.destroy', $store_settings->id],'id'=>'delete-form-'.$store_settings->id]); ?>

                    <?php echo Form::close(); ?>

                <?php endif; ?>
                <?php if(Auth::user()->type == 'super admin'): ?>
                    <div class="tab-pane fade show active" id="site_setting" role="tabpanel" aria-labelledby="orders-tab">
                        <?php echo e(Form::model($settings,array('route'=>'business.setting','method'=>'POST','enctype' => "multipart/form-data"))); ?>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="full_logo" class="form-control-label"><?php echo e(__('Logo')); ?></label>
                                        <input type="file" name="logo" id="full_logo" class="custom-input-file">
                                        <label for="full_logo">
                                            <i class="fa fa-upload"></i>
                                            <span><?php echo e(__('Choose a file')); ?></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-center mt-3">
                                    <div class="logo-div">
                                        <?php if(!empty($store_settings->logo)): ?>
                                            <img src="<?php echo e(asset(Storage::url('uploads/store_logo/'.$store_settings->logo))); ?>" width="170px" class="img_setting">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset(Storage::url('uploads/logo/logo.png'))); ?>" width="170px" class="img_setting">
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="favicon" class="form-control-label"><?php echo e(__('Favicon')); ?></label>
                                        <input type="file" name="favicon" id="favicon" class="custom-input-file">
                                        <label for="favicon">
                                            <i class="fa fa-upload"></i>
                                            <span><?php echo e(__('Choose a file')); ?></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-center mt-3">
                                    <div class="logo-div">
                                        <img src="<?php echo e($logo.'/'.(isset($company_favicon) && !empty($company_favicon)?$company_favicon:'favicon.png')); ?>" width="50px" class="img_setting">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="row">
                                    <span class="invalid-logo" role="alert">
                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                     </span>
                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('title_text',__('Title Text'))); ?>

                                    <?php echo e(Form::text('title_text',null,array('class'=>'form-control','placeholder'=>__('Title Text')))); ?>

                                    <?php $__errorArgs = ['title_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-title_text" role="alert">
                                     <strong class="text-danger"><?php echo e($message); ?></strong>
                                 </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('footer_text',__('Footer Text'))); ?>

                                    <?php echo e(Form::text('footer_text',null,array('class'=>'form-control','placeholder'=>__('Footer Text')))); ?>

                                    <?php $__errorArgs = ['footer_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-footer_text" role="alert">
                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                     </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('default_language',__('Default Language'))); ?>

                                    <div class="changeLanguage">
                                        <select name="default_language" id="default_language" class="form-control custom-select" data-toggle="select">
                                            <?php $__currentLoopData = \App\Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if($lang == $language): ?> selected <?php endif; ?> value="<?php echo e($language); ?>"><?php echo e(Str::upper($language)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <?php echo e(Form::label('display_landing_page_',__('Landing Page Display'))); ?>

                                    <div class="col-12 mt-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" name="display_landing_page" id="display_landing_page" <?php echo e($settings['display_landing_page'] == 'on' ? 'checked="checked"' : ''); ?>>
                                            <label class="custom-control-label form-control-label" for="display_landing_page"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <?php echo e(Form::label('SITE_RTL',__('RTL'))); ?>

                                    <div class="col-12 mt-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" name="SITE_RTL" id="SITE_RTL" <?php echo e(env('SITE_RTL') == 'on' ? 'checked="checked"' : ''); ?>>
                                            <label class="custom-control-label form-control-label" for="SITE_RTL"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('currency_symbol',__('Currency Symbol *'))); ?>

                                        <?php echo e(Form::text('currency_symbol',null,array('class'=>'form-control'))); ?>

                                        <small><?php echo e(__('Note: This value will assign when any new store created by Store Owner.')); ?></small>
                                        <?php $__errorArgs = ['currency_symbol'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-currency_symbol" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('currency',__('Currency *'))); ?>

                                        <?php echo e(Form::text('currency',null,array('class'=>'form-control font-style'))); ?>

                                        <?php echo e(__('Note: Add currency code as per three-letter ISO code.')); ?>

                                        <small>
                                            <a href="https://stripe.com/docs/currencies" target="_blank"><?php echo e(__('you can find out here..')); ?></a>
                                        </small>
                                        <br>
                                        <small>
                                            <?php echo e(__('This value will assign when any new store created by Store Owner.')); ?>

                                        </small>

                                        <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-currency" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <?php echo e(Form::submit(__('Save Change'),array('class'=>'btn btn-sm btn-primary rounded-pill'))); ?>

                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                    <div class="tab-pane fade show" id="payment-setting" role="tabpanel" aria-labelledby="orders-tab">
                        <div class="card-body">
                            <?php echo e(Form::open(array('route'=>'payment.setting','method'=>'post'))); ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('currency_symbol',__('Currency Symbol *'))); ?>

                                        <?php echo e(Form::text('currency_symbol',env('CURRENCY_SYMBOL'),array('class'=>'form-control','required'))); ?>

                                        <?php $__errorArgs = ['currency_symbol'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-currency_symbol" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('currency',__('Currency *'))); ?>

                                        <?php echo e(Form::text('currency',env('CURRENCY'),array('class'=>'form-control font-style','required'))); ?>

                                        <?php echo e(__('Note: Add currency code as per three-letter ISO code.')); ?>

                                        <small>
                                            <a href="https://stripe.com/docs/currencies" target="_blank"><?php echo e(__('you can find out here..')); ?></a>
                                        </small>
                                        <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-currency" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                            <div class=" pb-3">
                                <hr>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div id="accordion-2" class="accordion accordion-spaced">
                                        <!-- Strip -->
                                        <div class="card">
                                            <div class="card-header py-4" id="heading-2-2" data-toggle="collapse" role="button" data-target="#collapse-2-2" aria-expanded="false" aria-controls="collapse-2-2">
                                                <h6 class="mb-0"><i class="far fa-credit-card mr-3"></i><?php echo e(__('Stripe')); ?></h6>
                                            </div>
                                            <div id="collapse-2-2" class="collapse" aria-labelledby="heading-2-2" data-parent="#accordion-2">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6 py-2">
                                                            <h5 class="h5"><?php echo e(__('Stripe')); ?></h5>
                                                            <small> <?php echo e(__('Note: This detail will use for make checkout of shopping cart.')); ?></small>
                                                        </div>
                                                        <div class="col-6 py-2 text-right">
                                                            <div class="custom-control custom-switch">
                                                                <input type="hidden" name="is_stripe_enabled" value="off">
                                                                <input type="checkbox" class="custom-control-input" name="is_stripe_enabled" id="is_stripe_enabled" <?php echo e(isset($admin_payment_setting['is_stripe_enabled']) && $admin_payment_setting['is_stripe_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                <label class="custom-control-label form-control-label" for="is_stripe_enabled"><?php echo e(__('Enable Stripe')); ?></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <?php echo e(Form::label('stripe_key',__('Stripe Key'))); ?>

                                                                <?php echo e(Form::text('stripe_key',isset($admin_payment_setting['stripe_key'])?$admin_payment_setting['stripe_key']:'',['class'=>'form-control','placeholder'=>__('Enter Stripe Key')])); ?>

                                                                <?php $__errorArgs = ['stripe_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-stripe_key" role="alert">
                                                                                                 <strong class="text-danger"><?php echo e($message); ?></strong>
                                                                                             </span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <?php echo e(Form::label('stripe_secret',__('Stripe Secret'))); ?>

                                                                <?php echo e(Form::text('stripe_secret',isset($admin_payment_setting['stripe_secret'])?$admin_payment_setting['stripe_secret']:'',['class'=>'form-control ','placeholder'=>__('Enter Stripe Secret')])); ?>

                                                                <?php $__errorArgs = ['stripe_secret'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <span class="invalid-stripe_secret" role="alert">
                                                                 <strong class="text-danger"><?php echo e($message); ?></strong>
                                                             </span>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Paypal -->
                                        <div class="card">
                                            <div class="card-header py-4" id="heading-2-3" data-toggle="collapse" role="button" data-target="#collapse-2-3" aria-expanded="false" aria-controls="collapse-2-3">
                                                <h6 class="mb-0"><i class="far fa-credit-card mr-3"></i><?php echo e(__('PayPal')); ?></h6>
                                            </div>
                                            <div id="collapse-2-3" class="collapse" aria-labelledby="heading-2-3" data-parent="#accordion-2">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6 py-2">
                                                            <h5 class="h5"><?php echo e(__('PayPal')); ?></h5>
                                                            <small> <?php echo e(__('Note: This detail will use for make checkout of shopping cart.')); ?></small>
                                                        </div>
                                                        <div class="col-6 py-2 text-right">
                                                            <div class="custom-control custom-switch">
                                                                <input type="hidden" name="is_paypal_enabled" value="off">
                                                                <input type="checkbox" class="custom-control-input" name="is_paypal_enabled" id="is_paypal_enabled" <?php echo e(isset($admin_payment_setting['is_paypal_enabled']) && $admin_payment_setting['is_paypal_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                <label class="custom-control-label form-control-label" for="is_paypal_enabled"><?php echo e(__('Enable Paypal')); ?></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 pb-4">
                                                            <label class="paypal-label form-control-label" for="paypal_mode"><?php echo e(__('Paypal Mode')); ?></label> <br>
                                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                                <label class="btn btn-primary btn-sm <?php echo e(isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == 'sandbox' ? 'active' : ''); ?>">
                                                                    <input type="radio" name="paypal_mode" value="sandbox" <?php echo e(isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == '' || isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == 'sandbox' ? 'checked="checked"' : ''); ?>><?php echo e(__('Sandbox')); ?>

                                                                </label>
                                                                <label class="btn btn-primary btn-sm <?php echo e(isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == 'live' ? 'active' : ''); ?>">
                                                                    <input type="radio" name="paypal_mode" value="live" <?php echo e(isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == 'live' ? 'checked="checked"' : ''); ?>><?php echo e(__('Live')); ?>

                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="paypal_client_id"><?php echo e(__('Client ID')); ?></label>
                                                                <input type="text" name="paypal_client_id" id="paypal_client_id" class="form-control" value="<?php echo e(isset($admin_payment_setting['paypal_client_id'])?$admin_payment_setting['paypal_client_id']:''); ?>" placeholder="<?php echo e(__('Client ID')); ?>"/>
                                                                <?php if($errors->has('paypal_client_id')): ?>
                                                                    <span class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('paypal_client_id')); ?>

                                                                                        </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="paypal_secret_key"><?php echo e(__('Secret Key')); ?></label>
                                                                <input type="text" name="paypal_secret_key" id="paypal_secret_key" class="form-control" value="<?php echo e(isset($admin_payment_setting['paypal_secret_key'])?$admin_payment_setting['paypal_secret_key']:''); ?>" placeholder="<?php echo e(__('Secret Key')); ?>"/>
                                                                <?php if($errors->has('paypal_secret_key')): ?>
                                                                    <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('paypal_secret_key')); ?>

                                                                </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Paystack -->
                                        <div class="card">
                                            <div class="card-header py-4" id="heading-2-6" data-toggle="collapse" role="button" data-target="#collapse-2-6" aria-expanded="false" aria-controls="collapse-2-6">
                                                <h6 class="mb-0"><i class="far fa-credit-card mr-3"></i><?php echo e(__('Paystack')); ?></h6>
                                            </div>
                                            <div id="collapse-2-6" class="collapse" aria-labelledby="heading-2-6" data-parent="#accordion-2">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6 py-2">
                                                            <h5 class="h5"><?php echo e(__('Paystack')); ?></h5>
                                                            <small> <?php echo e(__('Note: This detail will use for make checkout of shopping cart.')); ?></small>
                                                        </div>
                                                        <div class="col-6 py-2 text-right">
                                                            <div class="custom-control custom-switch">
                                                                <input type="hidden" name="is_paystack_enabled" value="off">
                                                                <input type="checkbox" class="custom-control-input" name="is_paystack_enabled" id="is_paystack_enabled" <?php echo e(isset($admin_payment_setting['is_paystack_enabled']) && $admin_payment_setting['is_paystack_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                <label class="custom-control-label form-control-label" for="is_paystack_enabled"><?php echo e(__('Enable Paystack')); ?></label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="paypal_client_id"><?php echo e(__('Public Key')); ?></label>
                                                                <input type="text" name="paystack_public_key" id="paystack_public_key" class="form-control" value="<?php echo e(isset($admin_payment_setting['paystack_public_key']) ? $admin_payment_setting['paystack_public_key']:''); ?>" placeholder="<?php echo e(__('Public Key')); ?>"/>
                                                                <?php if($errors->has('paystack_public_key')): ?>
                                                                    <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('paystack_public_key')); ?>

                                                                </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="paystack_secret_key"><?php echo e(__('Secret Key')); ?></label>
                                                                <input type="text" name="paystack_secret_key" id="paystack_secret_key" class="form-control" value="<?php echo e(isset($admin_payment_setting['paystack_secret_key']) ? $admin_payment_setting['paystack_secret_key']:''); ?>" placeholder="<?php echo e(__('Secret Key')); ?>"/>
                                                                <?php if($errors->has('paystack_secret_key')): ?>
                                                                    <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('paystack_secret_key')); ?>

                                                                </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- FLUTTERWAVE -->
                                        <div class="card">
                                            <div class="card-header py-4" id="heading-2-7" data-toggle="collapse" role="button" data-target="#collapse-2-7" aria-expanded="false" aria-controls="collapse-2-7">
                                                <h6 class="mb-0"><i class="far fa-credit-card mr-3"></i><?php echo e(__('Flutterwave')); ?></h6>
                                            </div>
                                            <div id="collapse-2-7" class="collapse" aria-labelledby="heading-2-7" data-parent="#accordion-2">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6 py-2">
                                                            <h5 class="h5"><?php echo e(__('Flutterwave')); ?></h5>
                                                            <small> <?php echo e(__('Note: This detail will use for make checkout of shopping cart.')); ?></small>
                                                        </div>
                                                        <div class="col-6 py-2 text-right">
                                                            <div class="custom-control custom-switch">
                                                                <input type="hidden" name="is_flutterwave_enabled" value="off">
                                                                <input type="checkbox" class="custom-control-input" name="is_flutterwave_enabled" id="is_flutterwave_enabled" <?php echo e(isset($admin_payment_setting['is_flutterwave_enabled'])  && $admin_payment_setting['is_flutterwave_enabled']== 'on' ? 'checked="checked"' : ''); ?>>
                                                                <label class="custom-control-label form-control-label" for="is_flutterwave_enabled"><?php echo e(__('Enable Flutterwave')); ?></label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="paypal_client_id"><?php echo e(__('Public Key')); ?></label>
                                                                <input type="text" name="flutterwave_public_key" id="flutterwave_public_key" class="form-control" value="<?php echo e(isset($admin_payment_setting['flutterwave_public_key'])?$admin_payment_setting['flutterwave_public_key']:''); ?>" placeholder="<?php echo e(__('Public Key')); ?>"/>
                                                                <?php if($errors->has('flutterwave_public_key')): ?>
                                                                    <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('flutterwave_public_key')); ?>

                                                                </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="paystack_secret_key"><?php echo e(__('Secret Key')); ?></label>
                                                                <input type="text" name="flutterwave_secret_key" id="flutterwave_secret_key" class="form-control" value="<?php echo e(isset($admin_payment_setting['flutterwave_secret_key'])?$admin_payment_setting['flutterwave_secret_key']:''); ?>" placeholder="<?php echo e(__('Secret Key')); ?>"/>
                                                                <?php if($errors->has('flutterwave_secret_key')): ?>
                                                                    <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('flutterwave_secret_key')); ?>

                                                                </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Razorpay -->
                                        <div class="card">
                                            <div class="card-header py-4" id="heading-2-8" data-toggle="collapse" role="button" data-target="#collapse-2-8" aria-expanded="false" aria-controls="collapse-2-8">
                                                <h6 class="mb-0"><i class="far fa-credit-card mr-3"></i><?php echo e(__('Razorpay')); ?></h6>
                                            </div>
                                            <div id="collapse-2-8" class="collapse" aria-labelledby="heading-2-7" data-parent="#accordion-2">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6 py-2">
                                                            <h5 class="h5"><?php echo e(__('Razorpay')); ?></h5>
                                                            <small> <?php echo e(__('Note: This detail will use for make checkout of shopping cart.')); ?></small>
                                                        </div>
                                                        <div class="col-6 py-2 text-right">
                                                            <div class="custom-control custom-switch">
                                                                <input type="hidden" name="is_razorpay_enabled" value="off">
                                                                <input type="checkbox" class="custom-control-input" name="is_razorpay_enabled" id="is_razorpay_enabled" <?php echo e(isset($admin_payment_setting['is_razorpay_enabled']) && $admin_payment_setting['is_razorpay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                <label class="custom-control-label form-control-label" for="is_razorpay_enabled"><?php echo e(__('Enable Razorpay')); ?></label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="paypal_client_id"><?php echo e(__('Public Key')); ?></label>

                                                                <input type="text" name="razorpay_public_key" id="razorpay_public_key" class="form-control" value="<?php echo e(isset($admin_payment_setting['razorpay_public_key'])?$admin_payment_setting['razorpay_public_key']:''); ?>" placeholder="<?php echo e(__('Public Key')); ?>"/>
                                                                <?php if($errors->has('razorpay_public_key')): ?>
                                                                    <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('razorpay_public_key')); ?>

                                                                </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="paystack_secret_key"><?php echo e(__('Secret Key')); ?></label>
                                                                <input type="text" name="razorpay_secret_key" id="razorpay_secret_key" class="form-control" value="<?php echo e(isset($admin_payment_setting['razorpay_secret_key'])?$admin_payment_setting['razorpay_secret_key']:''); ?>" placeholder="<?php echo e(__('Secret Key')); ?>"/>
                                                                <?php if($errors->has('razorpay_secret_key')): ?>
                                                                    <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('razorpay_secret_key')); ?>

                                                                </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Mercado Pago-->
                                        <div class="card">
                                            <div class="card-header py-4" id="heading-2-12" data-toggle="collapse" role="button" data-target="#collapse-2-12" aria-expanded="false" aria-controls="collapse-2-12">
                                                <h6 class="mb-0"><i class="far fa-credit-card mr-3"></i><?php echo e(__('Mercado Pago')); ?></h6>
                                            </div>
                                            <div id="collapse-2-12" class="collapse" aria-labelledby="heading-2-12" data-parent="#accordion-2">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6 py-2">
                                                            <h5 class="h5"><?php echo e(__('Mercado Pago')); ?></h5>
                                                            <small> <?php echo e(__('Note: This detail will use for make checkout of plan.')); ?></small>
                                                        </div>
                                                        <div class="col-6 py-2 text-right">
                                                            <div class="custom-control custom-switch">
                                                                <input type="hidden" name="is_mercado_enabled" value="off">
                                                                <input type="checkbox" class="custom-control-input" name="is_mercado_enabled" id="is_mercado_enabled" <?php echo e(isset($admin_payment_setting['is_mercado_enabled']) &&  $admin_payment_setting['is_mercado_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                <label class="custom-control-label form-control-label" for="is_mercado_enabled"><?php echo e(__('Enable Mercado Pago')); ?></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 pb-4">
                                                            <label class="coingate-label form-control-label" for="mercado_mode"><?php echo e(__('Mercado Mode')); ?></label> <br>
                                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                                <label class="btn btn-primary btn-sm <?php echo e(isset($admin_payment_setting['mercado_mode']) && $admin_payment_setting['mercado_mode'] == 'sandbox' ? 'active' : ''); ?>">
                                                                    <input type="radio" name="mercado_mode" value="sandbox" <?php echo e(isset($admin_payment_setting['mercado_mode']) && $admin_payment_setting['mercado_mode'] == '' || isset($admin_payment_setting['mercado_mode']) && $admin_payment_setting['mercado_mode'] == 'sandbox' ? 'checked="checked"' : ''); ?>><?php echo e(__('Sandbox')); ?>

                                                                </label>
                                                                <label class="btn btn-primary btn-sm <?php echo e(isset($admin_payment_setting['mercado_mode']) && $admin_payment_setting['mercado_mode'] == 'live' ? 'active' : ''); ?>">
                                                                    <input type="radio" name="mercado_mode" value="live" <?php echo e(isset($admin_payment_setting['mercado_mode']) && $admin_payment_setting['mercado_mode'] == 'live' ? 'checked="checked"' : ''); ?>><?php echo e(__('Live')); ?>

                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="mercado_access_token"><?php echo e(__('Access Token')); ?></label>
                                                                <input type="text" name="mercado_access_token" id="mercado_access_token" class="form-control" value="<?php echo e(isset($admin_payment_setting['mercado_access_token']) ? $admin_payment_setting['mercado_access_token']:''); ?>" placeholder="<?php echo e(__('Access Token')); ?>"/>
                                                                <?php if($errors->has('mercado_secret_key')): ?>
                                                                    <span class="invalid-feedback d-block">
                                                                <?php echo e($errors->first('mercado_access_token')); ?>

                                                            </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Paytm -->
                                        <div class="card">
                                            <div class="card-header py-4" id="heading-2-8" data-toggle="collapse" role="button" data-target="#collapse-2-9" aria-expanded="false" aria-controls="collapse-2-9">
                                                <h6 class="mb-0"><i class="far fa-credit-card mr-3"></i><?php echo e(__('Paytm')); ?></h6>
                                            </div>
                                            <div id="collapse-2-9" class="collapse" aria-labelledby="heading-2-7" data-parent="#accordion-2">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6 py-2">
                                                            <h5 class="h5"><?php echo e(__('Paytm')); ?></h5>
                                                            <small> <?php echo e(__('Note: This detail will use for make checkout of shopping cart.')); ?></small>
                                                        </div>
                                                        <div class="col-6 py-2 text-right">
                                                            <div class="custom-control custom-switch">
                                                                <input type="hidden" name="is_paytm_enabled" value="off">
                                                                <input type="checkbox" class="custom-control-input" name="is_paytm_enabled" id="is_paytm_enabled" <?php echo e(isset($admin_payment_setting['is_paytm_enabled']) && $admin_payment_setting['is_paytm_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                <label class="custom-control-label form-control-label" for="is_paytm_enabled"><?php echo e(__('Enable Paytm')); ?></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 pb-4">
                                                            <label class="paypal-label form-control-label" for="paypal_mode"><?php echo e(__('Paytm Environment')); ?></label> <br>
                                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                                <label class="btn btn-primary btn-sm <?php echo e(isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == 'local' ? 'active' : ''); ?>">
                                                                    <input type="radio" name="paytm_mode" value="local" <?php echo e(isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == '' || isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == 'local' ? 'checked="checked"' : ''); ?>><?php echo e(__('Local')); ?>

                                                                </label>
                                                                <label class="btn btn-primary btn-sm <?php echo e(isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == 'live' ? 'active' : ''); ?>">
                                                                    <input type="radio" name="paytm_mode" value="production" <?php echo e(isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == 'production' ? 'checked="checked"' : ''); ?>><?php echo e(__('Production')); ?>

                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="paytm_public_key"><?php echo e(__('Merchant ID')); ?></label>
                                                                <input type="text" name="paytm_merchant_id" id="paytm_merchant_id" class="form-control" value="<?php echo e(isset($admin_payment_setting['paytm_merchant_id'])? $admin_payment_setting['paytm_merchant_id']:''); ?>" placeholder="<?php echo e(__('Merchant ID')); ?>"/>
                                                                <?php if($errors->has('paytm_merchant_id')): ?>
                                                                    <span class="invalid-feedback d-block">
                                                                <?php echo e($errors->first('paytm_merchant_id')); ?>

                                                            </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="paytm_secret_key"><?php echo e(__('Merchant Key')); ?></label>
                                                                <input type="text" name="paytm_merchant_key" id="paytm_merchant_key" class="form-control" value="<?php echo e(isset($admin_payment_setting['paytm_merchant_key']) ? $admin_payment_setting['paytm_merchant_key']:''); ?>" placeholder="<?php echo e(__('Merchant Key')); ?>"/>
                                                                <?php if($errors->has('paytm_merchant_key')): ?>
                                                                    <span class="invalid-feedback d-block">
                                                                <?php echo e($errors->first('paytm_merchant_key')); ?>

                                                            </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="paytm_industry_type"><?php echo e(__('Industry Type')); ?></label>
                                                                <input type="text" name="paytm_industry_type" id="paytm_industry_type" class="form-control" value="<?php echo e(isset($admin_payment_setting['paytm_industry_type']) ?$admin_payment_setting['paytm_industry_type']:''); ?>" placeholder="<?php echo e(__('Industry Type')); ?>"/>
                                                                <?php if($errors->has('paytm_industry_type')): ?>
                                                                    <span class="invalid-feedback d-block">
                                                                <?php echo e($errors->first('paytm_industry_type')); ?>

                                                            </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Mollie -->
                                        <div class="card">
                                            <div class="card-header py-4" id="heading-2-8" data-toggle="collapse" role="button" data-target="#collapse-2-10" aria-expanded="false" aria-controls="collapse-2-10">
                                                <h6 class="mb-0"><i class="far fa-credit-card mr-3"></i><?php echo e(__('Mollie')); ?></h6>
                                            </div>
                                            <div id="collapse-2-10" class="collapse" aria-labelledby="heading-2-7" data-parent="#accordion-2">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6 py-2">
                                                            <h5 class="h5"><?php echo e(__('Mollie')); ?></h5>
                                                            <small> <?php echo e(__('Note: This detail will use for make checkout of shopping cart.')); ?></small>
                                                        </div>
                                                        <div class="col-6 py-2 text-right">
                                                            <div class="custom-control custom-switch">
                                                                <input type="hidden" name="is_mollie_enabled" value="off">
                                                                <input type="checkbox" class="custom-control-input" name="is_mollie_enabled" id="is_mollie_enabled" <?php echo e(isset($admin_payment_setting['is_mollie_enabled']) && $admin_payment_setting['is_mollie_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                <label class="custom-control-label form-control-label" for="is_mollie_enabled"><?php echo e(__('Enable Mollie')); ?></label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="mollie_api_key"><?php echo e(__('Mollie Api Key')); ?></label>
                                                                <input type="text" name="mollie_api_key" id="mollie_api_key" class="form-control" value="<?php echo e(isset($admin_payment_setting['mollie_api_key'])?$admin_payment_setting['mollie_api_key']:''); ?>" placeholder="<?php echo e(__('Mollie Api Key')); ?>"/>
                                                                <?php if($errors->has('mollie_api_key')): ?>
                                                                    <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('mollie_api_key')); ?>

                                                                </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="mollie_profile_id"><?php echo e(__('Mollie Profile Id')); ?></label>
                                                                <input type="text" name="mollie_profile_id" id="mollie_profile_id" class="form-control" value="<?php echo e(isset($admin_payment_setting['mollie_profile_id'])?$admin_payment_setting['mollie_profile_id']:''); ?>" placeholder="<?php echo e(__('Mollie Profile Id')); ?>"/>
                                                                <?php if($errors->has('mollie_profile_id')): ?>
                                                                    <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('mollie_profile_id')); ?>

                                                                </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="mollie_partner_id"><?php echo e(__('Mollie Partner Id')); ?></label>
                                                                <input type="text" name="mollie_partner_id" id="mollie_partner_id" class="form-control" value="<?php echo e(isset($admin_payment_setting['mollie_partner_id'])?$admin_payment_setting['mollie_partner_id']:''); ?>" placeholder="<?php echo e(__('Mollie Partner Id')); ?>"/>
                                                                <?php if($errors->has('mollie_partner_id')): ?>
                                                                    <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('mollie_partner_id')); ?>

                                                                </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Skrill -->
                                        <div class="card">
                                            <div class="card-header py-4" id="heading-2-8" data-toggle="collapse" role="button" data-target="#collapse-2-13" aria-expanded="false" aria-controls="collapse-2-10">
                                                <h6 class="mb-0"><i class="far fa-credit-card mr-3"></i><?php echo e(__('Skrill')); ?></h6>
                                            </div>
                                            <div id="collapse-2-13" class="collapse" aria-labelledby="heading-2-7" data-parent="#accordion-2">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6 py-2">
                                                            <h5 class="h5"><?php echo e(__('Skrill')); ?></h5>
                                                            <small> <?php echo e(__('Note: This detail will use for make checkout of shopping cart.')); ?></small>
                                                        </div>
                                                        <div class="col-6 py-2 text-right">
                                                            <div class="custom-control custom-switch">
                                                                <input type="hidden" name="is_skrill_enabled" value="off">
                                                                <input type="checkbox" class="custom-control-input" name="is_skrill_enabled" id="is_skrill_enabled" <?php echo e(isset($admin_payment_setting['is_skrill_enabled']) && $admin_payment_setting['is_skrill_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                <label class="custom-control-label form-control-label" for="is_skrill_enabled"><?php echo e(__('Enable Skrill')); ?></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="mollie_api_key"><?php echo e(__('Mollie Api Key')); ?></label>
                                                                <input type="email" name="skrill_email" id="skrill_email" class="form-control" value="<?php echo e(isset($admin_payment_setting['skrill_email'])?$admin_payment_setting['skrill_email']:''); ?>" placeholder="<?php echo e(__('Mollie Api Key')); ?>"/>
                                                                <?php if($errors->has('skrill_email')): ?>
                                                                    <span class="invalid-feedback d-block">
                                                                    <?php echo e($errors->first('skrill_email')); ?>

                                                                </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- CoinGate -->
                                        <div class="card">
                                            <div class="card-header py-4" id="heading-2-8" data-toggle="collapse" role="button" data-target="#collapse-2-15" aria-expanded="false" aria-controls="collapse-2-10">
                                                <h6 class="mb-0"><i class="far fa-credit-card mr-3"></i><?php echo e(__('CoinGate')); ?></h6>
                                            </div>
                                            <div id="collapse-2-15" class="collapse" aria-labelledby="heading-2-7" data-parent="#accordion-2">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6 py-2">
                                                            <h5 class="h5"><?php echo e(__('CoinGate')); ?></h5>
                                                            <small> <?php echo e(__('Note: This detail will use for make checkout of shopping cart.')); ?></small>
                                                        </div>
                                                        <div class="col-6 py-2 text-right">
                                                            <div class="custom-control custom-switch">
                                                                <input type="hidden" name="is_coingate_enabled" value="off">
                                                                <input type="checkbox" class="custom-control-input" name="is_coingate_enabled" id="is_coingate_enabled" <?php echo e(isset($admin_payment_setting['is_coingate_enabled']) && $admin_payment_setting['is_coingate_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                <label class="custom-control-label form-control-label" for="is_coingate_enabled"><?php echo e(__('Enable CoinGate')); ?></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 pb-4">
                                                            <label class="coingate-label form-control-label" for="coingate_mode"><?php echo e(__('CoinGate Mode')); ?></label> <br>
                                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                                <label class="btn btn-primary btn-sm <?php echo e(isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == 'sandbox' ? 'active' : ''); ?>">
                                                                    <input type="radio" name="coingate_mode" value="sandbox" <?php echo e(isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == '' || isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == 'sandbox' ? 'checked="checked"' : ''); ?>><?php echo e(__('Sandbox')); ?>

                                                                </label>
                                                                <label class="btn btn-primary btn-sm <?php echo e(isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == 'live' ? 'active' : ''); ?>">
                                                                    <input type="radio" name="coingate_mode" value="live" <?php echo e(isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == 'live' ? 'checked="checked"' : ''); ?>><?php echo e(__('Live')); ?>

                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="coingate_auth_token"><?php echo e(__('CoinGate Auth Token')); ?></label>
                                                                <input type="text" name="coingate_auth_token" id="coingate_auth_token" class="form-control" value="<?php echo e(isset($admin_payment_setting['coingate_auth_token'])?$admin_payment_setting['coingate_auth_token']:''); ?>" placeholder="<?php echo e(__('CoinGate Auth Token')); ?>"/>
                                                                <?php if($errors->has('coingate_auth_token')): ?>
                                                                    <span class="invalid-feedback d-block">
                                                                <?php echo e($errors->first('coingate_auth_token')); ?>

                                                            </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <?php echo e(Form::submit(__('Save Change'),array('class'=>'btn btn-sm btn-primary rounded-pill'))); ?>

                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                    <div class="tab-pane fade show" id="email_setting" role="tabpanel" aria-labelledby="orders-tab">
                        <?php echo e(Form::open(array('route'=>'email.setting','method'=>'post'))); ?>

                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('mail_driver',__('Mail Driver'))); ?>

                                    <?php echo e(Form::text('mail_driver',env('MAIL_DRIVER'),array('class'=>'form-control','placeholder'=>__('Enter Mail Driver')))); ?>

                                    <?php $__errorArgs = ['mail_driver'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-mail_driver" role="alert">
                                     <strong class="text-danger"><?php echo e($message); ?></strong>
                                     </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('mail_host',__('Mail Host'))); ?>

                                    <?php echo e(Form::text('mail_host',env('MAIL_HOST'),array('class'=>'form-control ','placeholder'=>__('Enter Mail Host')))); ?>

                                    <?php $__errorArgs = ['mail_host'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-mail_driver" role="alert">
                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                 </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('mail_port',__('Mail Port'))); ?>

                                    <?php echo e(Form::text('mail_port',env('MAIL_PORT'),array('class'=>'form-control','placeholder'=>__('Enter Mail Port')))); ?>

                                    <?php $__errorArgs = ['mail_port'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-mail_port" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('mail_username',__('Mail Username'))); ?>

                                    <?php echo e(Form::text('mail_username',env('MAIL_USERNAME'),array('class'=>'form-control','placeholder'=>__('Enter Mail Username')))); ?>

                                    <?php $__errorArgs = ['mail_username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-mail_username" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('mail_password',__('Mail Password'))); ?>

                                    <?php echo e(Form::text('mail_password',env('MAIL_PASSWORD'),array('class'=>'form-control','placeholder'=>__('Enter Mail Password')))); ?>

                                    <?php $__errorArgs = ['mail_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-mail_password" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('mail_encryption',__('Mail Encryption'))); ?>

                                    <?php echo e(Form::text('mail_encryption',env('MAIL_ENCRYPTION'),array('class'=>'form-control','placeholder'=>__('Enter Mail Encryption')))); ?>

                                    <?php $__errorArgs = ['mail_encryption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-mail_encryption" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('mail_from_address',__('Mail From Address'))); ?>

                                    <?php echo e(Form::text('mail_from_address',env('MAIL_FROM_ADDRESS'),array('class'=>'form-control','placeholder'=>__('Enter Mail From Address')))); ?>

                                    <?php $__errorArgs = ['mail_from_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-mail_from_address" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('mail_from_name',__('Mail From Name'))); ?>

                                    <?php echo e(Form::text('mail_from_name',env('MAIL_FROM_NAME'),array('class'=>'form-control','placeholder'=>__('Enter Mail From Name')))); ?>

                                    <?php $__errorArgs = ['mail_from_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-mail_from_name" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <a href="#" data-url="<?php echo e(route('test.mail' )); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Send Test Mail')); ?>" class="btn btn-sm btn-info rounded-pill">
                                        <?php echo e(__('Send Test Mail')); ?>

                                    </a>
                                </div>
                                <div class="form-group col-md-6 text-right">
                                    <?php echo e(Form::submit(__('Save Change'),array('class'=>'btn btn-sm btn-primary rounded-pill'))); ?>

                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                <?php endif; ?>
                <?php if(\Auth::user()->type=='Owner'): ?>
                    <div id="store_theme_setting" class="tab-pane fade show" role="tabpanel" aria-labelledby="orders-tab">
                        <?php echo e(Form::open(array('route' => array('store.changetheme', $store_settings->id),'method' => 'POST'))); ?>

                        <div class="card-body">
                            <div class="row">
                                <?php $__currentLoopData = \App\Utility::themeOne(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-4 cc-selector mb-2">
                                        <div class="mb-3">
                                            <img src="<?php echo e(asset(Storage::url('uploads/store_theme/'.$key.'/Home.png'))); ?>" class="img-center pro_max_width pro_max_height <?php echo e($key); ?>_img">
                                        </div>
                                        <div class="form-group">
                                            <div class="row gutters-xs" id="<?php echo e($key); ?>">
                                                <?php $__currentLoopData = $v; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $css => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-auto">
                                                        <label class="colorinput">
                                                            <input name="theme_color" type="radio" value="<?php echo e($css); ?>" data-theme="<?php echo e($key); ?>" data-imgpath="<?php echo e($val['img_path']); ?>" class="colorinput-input" <?php echo e((isset($store_settings['store_theme']) && $store_settings['store_theme'] == $css) ? 'checked' : ''); ?>>
                                                            <span class="colorinput-color" style="background:#<?php echo e($val['color']); ?>"></span>
                                                        </label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <?php echo e(Form::submit(__('Save Change'),array('class'=>'btn btn-sm btn-primary rounded-pill'))); ?>

                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>

                    <div id="store_site_setting" class="tab-pane fade show" role="tabpanel" aria-labelledby="orders-tab">
                        <?php echo e(Form::model($settings,array('route'=>'business.setting','method'=>'POST','enctype' => "multipart/form-data"))); ?>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="company_logo" class="form-control-label"><?php echo e(__('Logo')); ?></label>
                                        <input type="file" name="company_logo" id="company_logo" class="custom-input-file">
                                        <label for="company_logo">
                                            <i class="fa fa-upload"></i>
                                            <span><?php echo e(__('Choose a file')); ?></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-center mt-3">
                                    <div class="logo-div">
                                        <img src="<?php echo e($logo.'/'.(isset($company_logo) && !empty($company_logo)?$company_logo:'logo.png')); ?>" width="170px" class="img_setting">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="company_favicon" class="form-control-label"><?php echo e(__('Favicon')); ?></label>
                                        <input type="file" name="company_favicon" id="company_favicon" class="custom-input-file">
                                        <label for="company_favicon">
                                            <i class="fa fa-upload"></i>
                                            <span><?php echo e(__('Choose a file')); ?></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-center mt-3">
                                    <div class="logo-div">
                                        <img src="<?php echo e($logo.'/'.(isset($company_favicon) && !empty($company_favicon)?$company_favicon:'favicon.png')); ?>" width="50px" class="img_setting">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="row">
                                    <span class="invalid-logo" role="alert">
                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                     </span>
                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('title_text',__('Title Text'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::text('title_text',null,array('class'=>'form-control','placeholder'=>__('Title Text')))); ?>

                                    <?php $__errorArgs = ['title_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-title_text" role="alert">
                                     <strong class="text-danger"><?php echo e($message); ?></strong>
                                 </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('footer_text',__('Footer Text'),array('class'=>'form-control-label'))); ?>

                                    <?php echo e(Form::text('footer_text',null,array('class'=>'form-control','placeholder'=>__('Footer Text')))); ?>

                                    <?php $__errorArgs = ['footer_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-footer_text" role="alert">
                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                     </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="site_date_format" class="form-control-label"><?php echo e(__('Date Format')); ?></label>
                                    <select type="text" name="site_date_format" class="form-control selectric" id="site_date_format">
                                        <option value="M j, Y" <?php if(@$settings['site_date_format'] == 'M j, Y'): ?> selected="selected" <?php endif; ?>>Jan 1,2015</option>
                                        <option value="d-m-Y" <?php if(@$settings['site_date_format'] == 'd-m-Y'): ?> selected="selected" <?php endif; ?>>d-m-y</option>
                                        <option value="m-d-Y" <?php if(@$settings['site_date_format'] == 'm-d-Y'): ?> selected="selected" <?php endif; ?>>m-d-y</option>
                                        <option value="Y-m-d" <?php if(@$settings['site_date_format'] == 'Y-m-d'): ?> selected="selected" <?php endif; ?>>y-m-d</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="site_time_format" class="form-control-label"><?php echo e(__('Time Format')); ?></label>
                                    <select type="text" name="site_time_format" class="form-control selectric" id="site_time_format">
                                        <option value="g:i A" <?php if(@$settings['site_time_format'] == 'g:i A'): ?> selected="selected" <?php endif; ?>>10:30 PM</option>
                                        <option value="g:i a" <?php if(@$settings['site_time_format'] == 'g:i a'): ?> selected="selected" <?php endif; ?>>10:30 pm</option>
                                        <option value="H:i" <?php if(@$settings['site_time_format'] == 'H:i'): ?> selected="selected" <?php endif; ?>>22:30</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <?php echo e(Form::submit(__('Save Change'),array('class'=>'btn btn-sm btn-primary rounded-pill'))); ?>

                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                    <div class="tab-pane fade show" id="store_payment-setting" role="tabpanel" aria-labelledby="orders-tab">
                        <div class="card-body">
                            <?php echo e(Form::open(array('route'=>array('owner.payment.setting',$store_settings->slug),'method'=>'post'))); ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('currency_symbol',__('Currency Symbol *'))); ?>

                                        <?php echo e(Form::text('currency_symbol',$store_settings['currency'],array('class'=>'form-control','required'))); ?>

                                        <?php $__errorArgs = ['currency_symbol'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-currency_symbol" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('currency',__('Currency *'))); ?>

                                        <?php echo e(Form::text('currency',$store_settings['currency_code'],array('class'=>'form-control font-style','required'))); ?>

                                        <?php echo e(__('Note: Add currency code as per three-letter ISO code.')); ?>

                                        <small>
                                            <a href="https://stripe.com/docs/currencies" target="_blank"><?php echo e(__('you can find out here..')); ?></a>
                                        </small>
                                        <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-currency" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="example3cols3Input"><?php echo e(__('Currency Symbol Position')); ?></label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input type="radio" id="customRadio5" name="currency_symbol_position" value="pre" class="custom-control-input" <?php if(@$store_settings['currency_symbol_position'] == 'pre'): ?> checked <?php endif; ?>>
                                                    <label class="custom-control-label" for="customRadio5"><?php echo e(__('Pre')); ?></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input type="radio" id="customRadio6" name="currency_symbol_position" value="post" class="custom-control-input" <?php if(@$store_settings['currency_symbol_position'] == 'post'): ?> checked <?php endif; ?>>
                                                    <label class="custom-control-label" for="customRadio6"><?php echo e(__('Post')); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="example3cols3Input"><?php echo e(__('Currency Symbol Space')); ?></label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input type="radio" id="customRadio7" name="currency_symbol_space" value="with" class="custom-control-input" <?php if(@$store_settings['currency_symbol_space'] == 'with'): ?> checked <?php endif; ?>>
                                                    <label class="custom-control-label" for="customRadio7"><?php echo e(__('With Space')); ?></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="custom-control custom-radio mb-3">
                                                    <input type="radio" id="customRadio8" name="currency_symbol_space" value="without" class="custom-control-input" <?php if(@$store_settings['currency_symbol_space'] == 'without'): ?> checked <?php endif; ?>>
                                                    <label class="custom-control-label" for="customRadio8"><?php echo e(__('Without Space')); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="col-6 py-2">
                                    <div class="mb-2">
                                        <h5 class="h5 mb-0"><?php echo e(__('Whatsapp')); ?></h5>
                                        <small> <?php echo e(__('Note: This detail will use for make checkout of shopping cart.')); ?></small>
                                    </div>
                                    <span>* <?php echo e(__('Use country code with your number')); ?> *</span>

                                    <div class="form-group">
                                        <?php echo e(Form::text('whatsapp_number',$store_settings['whatsapp_number'],array('class'=>'form-control active whatsapp_number','placeholder'=>'(+99) 12345 67890'))); ?>

                                        <?php if($errors->has('whatsapp_number')): ?>
                                            <span class="invalid-feedback d-block">
                                            <?php echo e($errors->first('whatsapp_number')); ?>

                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="col-12 py-2">
                                    <div class="mb-2">
                                        <h5 class="h5 mb-0"><?php echo e(__('Telegram')); ?></h5>
                                        <small> <?php echo e(__('Note: This detail will use for make checkout of shopping cart.')); ?></small>
                                    </div>
                                    <p>* <?php echo e(__('Use Telegram-Bot code with your Telegram')); ?> *</p>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <?php echo e(Form::label('telegrambot',__('Telegram Access Token'))); ?>

                                                <?php echo e(Form::text('telegrambot',$store_settings['telegrambot'],array('class'=>'form-control active telegrambot','placeholder'=>'1234567890:AAbbbbccccddddxvGENZCi8Hd4B15M8xHV0'))); ?>

                                                <p><?php echo e(__('Get Chat ID')); ?> : https://api.telegram.org/bot-TOKEN-/getUpdates</p>
                                                <?php if($errors->has('telegrambot')): ?>
                                                    <span class="invalid-feedback d-block">
                                            <?php echo e($errors->first('telegrambot')); ?>

                                        </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <?php echo e(Form::label('telegramchatid',__('Telegram Chat Id'))); ?>

                                                <?php echo e(Form::text('telegramchatid',$store_settings['telegramchatid'],array('class'=>'form-control active telegramchatid','placeholder'=>'123456789'))); ?>

                                                <?php if($errors->has('telegramchatid')): ?>
                                                    <span class="invalid-feedback d-block">
                                            <?php echo e($errors->first('telegramchatid')); ?>

                                        </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <?php echo e(Form::submit(__('Save Change'),array('class'=>'btn btn-sm btn-primary rounded-pill'))); ?>

                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>
                    <div class="tab-pane fade show" id="store_email_setting" role="tabpanel" aria-labelledby="orders-tab">
                        <?php echo e(Form::open(array('route'=>array('owner.email.setting',$store_settings->slug),'method'=>'post'))); ?>

                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('mail_driver',__('Mail Driver'))); ?>

                                    <?php echo e(Form::text('mail_driver',$store_settings->mail_driver,array('class'=>'form-control','placeholder'=>__('Enter Mail Driver')))); ?>

                                    <?php $__errorArgs = ['mail_driver'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-mail_driver" role="alert">
                                     <strong class="text-danger"><?php echo e($message); ?></strong>
                                     </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('mail_host',__('Mail Host'))); ?>

                                    <?php echo e(Form::text('mail_host',$store_settings->mail_host,array('class'=>'form-control ','placeholder'=>__('Enter Mail Host')))); ?>

                                    <?php $__errorArgs = ['mail_host'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-mail_driver" role="alert">
                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                 </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('mail_port',__('Mail Port'))); ?>

                                    <?php echo e(Form::text('mail_port',$store_settings->mail_port,array('class'=>'form-control','placeholder'=>__('Enter Mail Port')))); ?>

                                    <?php $__errorArgs = ['mail_port'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-mail_port" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('mail_username',__('Mail Username'))); ?>

                                    <?php echo e(Form::text('mail_username',$store_settings->mail_username,array('class'=>'form-control','placeholder'=>__('Enter Mail Username')))); ?>

                                    <?php $__errorArgs = ['mail_username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-mail_username" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('mail_password',__('Mail Password'))); ?>

                                    <?php echo e(Form::text('mail_password',$store_settings->mail_password,array('class'=>'form-control','placeholder'=>__('Enter Mail Password')))); ?>

                                    <?php $__errorArgs = ['mail_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-mail_password" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('mail_encryption',__('Mail Encryption'))); ?>

                                    <?php echo e(Form::text('mail_encryption',$store_settings->mail_encryption,array('class'=>'form-control','placeholder'=>__('Enter Mail Encryption')))); ?>

                                    <?php $__errorArgs = ['mail_encryption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-mail_encryption" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('mail_from_address',__('Mail From Address'))); ?>

                                    <?php echo e(Form::text('mail_from_address',$store_settings->mail_from_address,array('class'=>'form-control','placeholder'=>__('Enter Mail From Address')))); ?>

                                    <?php $__errorArgs = ['mail_from_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-mail_from_address" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('mail_from_name',__('Mail From Name'))); ?>

                                    <?php echo e(Form::text('mail_from_name',$store_settings->mail_from_name,array('class'=>'form-control','placeholder'=>__('Enter Mail From Name')))); ?>

                                    <?php $__errorArgs = ['mail_from_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-mail_from_name" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <a href="#" data-url="<?php echo e(route('test.mail' )); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Send Test Mail')); ?>" class="btn btn-sm btn-info rounded-pill">
                                        <?php echo e(__('Send Test Mail')); ?>

                                    </a>
                                </div>
                                <div class="form-group col-md-6 text-right">
                                    <?php echo e(Form::submit(__('Save Change'),array('class'=>'btn btn-sm btn-primary rounded-pill'))); ?>

                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                    <div class="tab-pane fade show" id="whatsapp_custom_massage" role="tabpanel" aria-labelledby="orders-tab">
                        <?php echo e(Form::model($store_settings, array('route' => array('customMassage',$store_settings->slug), 'method' => 'POST'))); ?>

                        <div class="col-12 p-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row text-xs">
                                        <div class="col-6">
                                            <h6 class="font-weight-bold"><?php echo e(__('Order Variable')); ?></h6>
                                            <div class="col-6 float-left">
                                                <p class="mb-1"><?php echo e(__('Store Name')); ?> : <span class="pull-right text-primary">{store_name}</span></p>
                                                <p class="mb-1"><?php echo e(__('Order No')); ?> : <span class="pull-right text-primary">{order_no}</span></p>
                                                <p class="mb-1"><?php echo e(__('Customer Name')); ?> : <span class="pull-right text-primary">{customer_name}</span></p>
                                                <p class="mb-1"><?php echo e(__('Phone')); ?> : <span class="pull-right text-primary">{phone}</span></p>
                                                <p class="mb-1"><?php echo e(__('Billing Address')); ?> : <span class="pull-right text-primary">{billing_address}</span></p>
                                                <p class="mb-1"><?php echo e(__('Shipping Address')); ?> : <span class="pull-right text-primary">{shipping_address}</span></p>
                                                <p class="mb-1"><?php echo e(__('Special Instruct')); ?> : <span class="pull-right text-primary">{special_instruct}</span></p>
                                            </div>
                                            <p class="mb-1"><?php echo e(__('Item Variable')); ?> : <span class="pull-right text-primary">{item_variable}</span></p>
                                            <p class="mb-1"><?php echo e(__('Qty Total')); ?> : <span class="pull-right text-primary">{qty_total}</span></p>
                                            <p class="mb-1"><?php echo e(__('Sub Total')); ?> : <span class="pull-right text-primary">{sub_total}</span></p>
                                            <p class="mb-1"><?php echo e(__('Discount Amount')); ?> : <span class="pull-right text-primary">{discount_amount}</span></p>
                                            <p class="mb-1"><?php echo e(__('Shipping Amount')); ?> : <span class="pull-right text-primary">{shipping_amount}</span></p>
                                            <p class="mb-1"><?php echo e(__('Total Tax')); ?> : <span class="pull-right text-primary">{total_tax}</span></p>
                                            <p class="mb-1"><?php echo e(__('Final Total')); ?> : <span class="pull-right text-primary">{final_total}</span></p>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-bold"><?php echo e(__('Item Variable')); ?></h6>
                                            <p class="mb-1"><?php echo e(__('Sku')); ?> : <span class="pull-right text-primary">{sku}</span></p>
                                            <p class="mb-1"><?php echo e(__('Quantity')); ?> : <span class="pull-right text-primary">{quantity}</span></p>
                                            <p class="mb-1"><?php echo e(__('Product Name')); ?> : <span class="pull-right text-primary">{product_name}</span></p>
                                            <p class="mb-1"><?php echo e(__('Variant Name')); ?> : <span class="pull-right text-primary">{variant_name}</span></p>
                                            <p class="mb-1"><?php echo e(__('Item Tax')); ?> : <span class="pull-right text-primary">{item_tax}</span></p>
                                            <p class="mb-1"><?php echo e(__('Item total')); ?> : <span class="pull-right text-primary">{item_total}</span></p>
                                            <div class="form-group">
                                                <label for="storejs" class="form-control-label">{item_variable}</label>
                                                <?php echo e(Form::text('item_variable',null,array('class'=>'form-control','placeholder'=>"{quantity} x {product_name} - {variant_name} + {item_tax} = {item_total}"))); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 px-4 language-form-wrap">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <?php echo e(Form::label('content',__('Email Message'),['class'=>'form-control-label text-dark'])); ?>

                                            <?php echo e(Form::textarea('content',null,array('class'=>'form-control','required'=>'required'))); ?>

                                        </div>
                                        <div class="col-md-12 text-right">
                                            <div class="form-group col-md-12 text-right">
                                                <?php echo e(Form::submit(__('Save Change'),array('class'=>'btn btn-sm btn-primary rounded-pill'))); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('assets/libs/jquery-mask-plugin/dist/jquery.mask.min.js')); ?>"></script>

    <script>
        function myFunction() {
            var copyText = document.getElementById("myInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            show_toastr('Success', "<?php echo e(__('Link copied')); ?>", 'success');
        }

        $(document).on('click', 'input[name="theme_color"]', function () {
            var eleParent = $(this).attr('data-theme');
            var imgpath = $(this).attr('data-imgpath');
            $('.' + eleParent + '_img').attr('src', imgpath);
        });

        $(document).ready(function () {
            setTimeout(function (e) {
                var checked = $("input[type=radio][name='theme_color']:checked");
                $('.' + checked.attr('data-theme') + '_img').attr('src', checked.attr('data-imgpath'));
            }, 300);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\whatsapp\resources\views/settings/index.blade.php ENDPATH**/ ?>
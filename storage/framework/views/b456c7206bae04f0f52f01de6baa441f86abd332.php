<?php
    $logo=asset(Storage::url('uploads/logo/'));
   $favicon=\App\Utility::getValByName('company_favicon');

?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="WhatsStore - Online Whatsapp Store Builder">
    <meta name="author" content="Rajodiya Infotech">

    <title><?php echo $__env->yieldContent('page-title'); ?> - <?php echo e((\App\Utility::getValByName('title_text')) ? \App\Utility::getValByName('title_text') : config('app.name', 'WhatsStore')); ?></title>
    <link rel="icon" href="<?php echo e($logo.'/'.(isset($favicon) && !empty($favicon)?$favicon:'favicon.png')); ?>" type="image" sizes="16x16">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/@fortawesome/fontawesome-free/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/fullcalendar/dist/fullcalendar.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/animate.css/animate.min.css')); ?>" id="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/select2/dist/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/site.css')); ?>" id="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/jquery.dataTables.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/site-'.Auth::user()->mode.'.css')); ?>" id="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom.css')); ?>" id="stylesheet')}}">
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery.min.js')); ?>"></script>

    <?php if(env('SITE_RTL')=='on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-rtl.css')); ?>">
    <?php endif; ?>

    <?php echo $__env->yieldPushContent('css-page'); ?>
</head>
<?php /**PATH C:\xampp\htdocs\whatsapp\resources\views/partials/admin/head.blade.php ENDPATH**/ ?>
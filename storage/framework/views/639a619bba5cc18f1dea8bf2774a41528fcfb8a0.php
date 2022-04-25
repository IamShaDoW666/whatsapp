<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Product')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block text-white font-weight-bold mb-0 "><?php echo e(__('Product')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <a href="<?php echo e(route('product.grid')); ?>" class="btn btn-sm btn-white bor-radius ml-4">
        <?php echo e(__('Grid View')); ?>

    </a>
    <a href="<?php echo e(route('product.create')); ?>" class="btn btn-sm btn-white btn-icon-only rounded-circle">
        <i class="fa fa-plus"></i>
    </a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('assets/libs/summernote/summernote-bs4.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Listing -->
    <div class="card">
        <!-- Card header -->
        <div class="card-header actions-toolbar">
            <div class="actions-search" id="actions-search">
                <div class="input-group input-group-merge input-group-flush">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-transparent"><i class="far fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control form-control-flush" placeholder="Type and hit enter ...">
                    <div class="input-group-append">
                        <a href="#" class="input-group-text bg-transparent" data-action="search-close" data-target="#actions-search"><i class="far fa-times"></i></a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between align-items-center">
                <div class="col">
                    <h6 class="d-inline-block mb-0"><?php echo e(__('All Products')); ?></h6>
                </div>
            </div>
        </div>
        <!-- Table -->
        <div class="table-responsive">
            <table class="table align-items-center">
                <thead>
                <tr>
                    <th scope="col"><?php echo e(__('Product')); ?></th>
                    <th scope="col"><?php echo e(__('Category')); ?></th>
                    <th scope="col"><?php echo e(__('Price')); ?></th>
                    <th scope="col"><?php echo e(__('Quantity')); ?></th>
                    <th scope="col"><?php echo e(__('Stock')); ?></th>
                    <th scope="col"><?php echo e(__('Created at')); ?></th>
                    <th scope="col" class="text-right"><?php echo e(__('Action')); ?></th>
                </tr>
                </thead>
                <tbody class="list">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row">
                            <div class="media align-items-center">
                                <div>
                                    <?php if(!empty($product->is_cover)): ?>
                                        <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/is_cover_image/'.$product->is_cover))); ?>" class="" style="width: 80px;">
                                    <?php else: ?>
                                        <img alt="Image placeholder" src="<?php echo e(asset(Storage::url('uploads/is_cover_image/default.jpg'))); ?>" class="" style="width: 80px;">
                                    <?php endif; ?>

                                </div>
                                <div class="media-body ml-4">
                                    <a href="<?php echo e(route('product.show',$product->id)); ?>" class="name h6 mb-0 text-sm">
                                        <?php echo e($product->name); ?>

                                    </a>
                                </div>
                            </div>
                        </th>
                        <td>
                            <?php echo e(!empty($product->product_category()) ? $product->product_category() :'-'); ?>

                        </td>
                        <td>
                            <?php if($product->enable_product_variant == 'on'): ?>
                                <?php echo e(__('In Variant')); ?>

                            <?php else: ?>
                                <?php echo e(\App\Utility::priceFormat($product->price)); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($product->enable_product_variant == 'on'): ?>
                                <?php echo e(__('In Variant')); ?>

                            <?php else: ?>
                                <?php echo e($product->quantity); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($product->enable_product_variant == 'on'): ?>
                                <span class="badge badge-success rounded-pill">
                                    <?php echo e(__('In Variant')); ?>

                                </span>
                            <?php else: ?>
                                <?php if($product->quantity == 0): ?>
                                    <span class="badge badge-danger rounded-pill">
                                        <?php echo e(__('Out of stock')); ?>

                                    </span>
                                <?php else: ?>
                                    <span class="badge badge-success rounded-pill">
                                        <?php echo e(__('In stock')); ?>

                                    </span>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php echo e(\App\Utility::dateFormat($product->created_at)); ?>

                        </td>
                        <td class="text-right">
                            <!-- Actions -->
                            <div class="actions ml-3">
                                <a href="<?php echo e(route('product.show',$product->id)); ?>" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="Quick view">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="<?php echo e(route('product.edit',$product->id)); ?>" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="action-item  mr-2 " data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').' | '.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($product->id); ?>').submit();">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['product.destroy', $product->id],'id'=>'delete-form-'.$product->id]); ?>

                                <?php echo Form::close(); ?>

                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('click', '#billing_data', function () {
            $("[name='shipping_address']").val($("[name='billing_address']").val());
            $("[name='shipping_city']").val($("[name='billing_city']").val());
            $("[name='shipping_state']").val($("[name='billing_state']").val());
            $("[name='shipping_country']").val($("[name='billing_country']").val());
            $("[name='shipping_postalcode']").val($("[name='billing_postalcode']").val());
        })
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\whatsapp\resources\views/product/index.blade.php ENDPATH**/ ?>
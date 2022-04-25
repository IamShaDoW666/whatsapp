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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('assets/libs/summernote/summernote-bs4.js')); ?>"></script>
    <script>
        var Dropzones = function () {
            var e = $('[data-toggle="dropzone1"]'), t = $(".dz-preview");
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            e.length && (Dropzone.autoDiscover = !1, e.each(function () {
                var e, a, n, o, i;
                e = $(this), a = void 0 !== e.data("dropzone-multiple"), n = e.find(t), o = void 0, i = {
                    url: "<?php echo e(route('products.update',$product->id)); ?>",
                    method: 'PUT',
                    headers: {
                        'x-csrf-token': CSRF_TOKEN,
                    },
                    thumbnailWidth: null,
                    thumbnailHeight: null,
                    previewsContainer: n.get(0),
                    previewTemplate: n.html(),
                    maxFiles: 10,
                    parallelUploads: 10,
                    autoProcessQueue: false,
                    uploadMultiple: true,
                    acceptedFiles: a ? null : "image/*",
                    success: function (file, response) {
                        if (response.flag == "success") {
                            show_toastr('success', response.msg, 'success');
                            window.location.href = "<?php echo e(route('product.index')); ?>";
                        } else {
                            show_toastr('Error', response.msg, 'error');
                        }
                    },
                    error: function (file, response) {
                        // Dropzones.removeFile(file);
                        if (response.error) {
                            show_toastr('Error', response.error, 'error');
                        } else {
                            show_toastr('Error', response, 'error');
                        }
                    },
                    init: function () {
                        var myDropzone = this;

                        this.on("addedfile", function (e) {
                            !a && o && this.removeFile(o), o = e
                        })
                    }
                }, n.html(""), e.dropzone(i)
            }))
        }()

        $('#submit-all').on('click', function () {

            var fd = new FormData();
            var file = document.getElementById('is_cover_image').files[0];
            if (file) {
                fd.append('is_cover_image', file);
            }

            var files = $('[data-toggle="dropzone1"]').get(0).dropzone.getAcceptedFiles();
            $.each(files, function (key, file) {
                fd.append('multiple_files[' + key + ']', $('[data-toggle="dropzone1"]')[0].dropzone.getAcceptedFiles()[key]); // attach dropzone image element
            });
            var other_data = $('#frmTarget').serializeArray();

            $.each(other_data, function (key, input) {
                fd.append(input.name, input.value);
            });

            $.ajax({
                url: "<?php echo e(route('products.update', $product->id)); ?>",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: fd,
                contentType: false,
                processData: false,
                success: function (data) {

                    if (data.flag == "success") {
                        show_toastr('success', data.msg, 'success');
                        window.location.href = "<?php echo e(route('product.index')); ?>";
                    } else {
                        show_toastr('Error', data.msg, 'error');
                    }
                },
                error: function (data) {
                    if (data.error) {
                        show_toastr('Error', data.error, 'error');
                    } else {
                        show_toastr('Error', data, 'error');
                    }
                },
            });
        });

        $(".deleteRecord").click(function () {

            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");

            $.ajax(
                {
                    url: '<?php echo e(route('products.file.delete', '__product_id')); ?>'.replace('__product_id', id),
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (data) {
                        if (data == "success") {
                            show_toastr('success', data.msg, 'success');
                            $('.product_Image[data-id="' + data.id + '"]').remove();
                        } else {
                            show_toastr('Error', data.msg, 'error');
                        }
                    }
                });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <!--account edit -->
            <div id="account_edit">
                <div class="card ">
                    <div class="card-body">
                        <?php echo e(Form::model($product,array('method' => 'POST','id'=>'frmTarget','enctype'=>'multipart/form-data'))); ?>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('name',__('Name'),array('class'=>'form-control-label'))); ?>

                                    <?php echo Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Name'))); ?>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('product_categorie',__('Product Categories'),array('class'=>'form-control-label'))); ?>

                                    <?php echo Form::select('product_categorie[]', $product_categorie, explode(',',$product->product_categorie),array('class' => 'form-control','data-toggle'=>'select','multiple')); ?>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('SKU',__('SKU'),array('class'=>'form-control-label'))); ?>

                                    <?php echo Form::text('SKU',null,array('class'=>'form-control','placeholder'=>__('Enter SKU'),'required'=>'required')); ?>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('product_tax',__('Product Tax'))); ?>

                                    <?php echo Form::select('product_tax[]', $product_tax, explode(',',$product->product_tax),array('class' => 'form-control','data-toggle'=>'select','multiple')); ?>

                                    <?php $__errorArgs = ['product_tax'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-product_tax" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-6 proprice">
                                <div class="form-group">
                                    <?php echo e(Form::label('price',__('Price'),array('class'=>'form-control-label'))); ?>

                                    <?php echo Form::text('price',null,array('class'=>'form-control','placeholder'=>__('Enter Price '))); ?>

                                </div>
                            </div>
                            <div class="col-6 proprice">
                                <div class="form-group">
                                    <?php echo e(Form::label('quantity',__('Quantity'),array('class'=>'form-control-label'))); ?>

                                    <?php echo Form::text('quantity',null,array('class'=>'form-control','placeholder'=>__('Enter Quantity'),'required'=>'required')); ?>

                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <?php echo e(Form::label('product_display',__('Product Display'),array('class'=>'form-control-label'))); ?>

                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="product_display" class="custom-control-input" id="product_display" <?php echo e(($product->product_display == 'on')? 'checked' :''); ?>>
                                    <label name="product_display" class="custom-control-label form-control-label" for="product_display"></label>
                                </div>
                                <?php $__errorArgs = ['product_display'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-product_display" role="alert">
                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <?php if(isset($product_variant_names) && !empty($product_variant_names)): ?>
                                <div class="form-group col-md-6 py-4">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="enable_product_variant" id="enable_product_variant" <?php echo e(($product['enable_product_variant'] == 'on') ? 'checked' : ''); ?>>

                                        <label class="custom-control-label form-control-label" for="enable_product_variant"><?php echo e(__('Display Variants')); ?></label>
                                    </div>
                                </div>
                                <div id="productVariant" class="col-md-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card my-3">
                                                <div class="card-header">
                                                    <div class="row flex-grow-1">
                                                        <div class="col-md d-flex align-items-center">
                                                            <h5 class="card-header-title"><?php echo e(__('Product Variants')); ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row form-group">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                <tr class="text-center">
                                                                    <?php if(isset($product_variant_names)): ?>
                                                                        <?php $__currentLoopData = $product_variant_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <th><span><?php echo e(ucwords($variant)); ?></span></th>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>
                                                                    <th><span><?php echo e(__('Price')); ?></span></th>
                                                                    <th><span><?php echo e(__('Quantity')); ?></span></th>
                                                                    <th></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php if(isset($productVariantArrays)): ?>
                                                                    <?php $__currentLoopData = $productVariantArrays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $counter => $productVariant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <tr>
                                                                            <?php $__currentLoopData = explode(' : ', $productVariant['product_variants']['name']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <td>
                                                                                    <input type="text" disabled name="variants[<?php echo e($productVariant['product_variants']['id']); ?>][variants][<?php echo e($key); ?>][]" autocomplete="off" spellcheck="false" class="form-control" value="<?php echo e($values); ?>">
                                                                                </td>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            <td>
                                                                                <input type="number" name="variants[<?php echo e($productVariant['product_variants']['id']); ?>][price]" autocomplete="off" spellcheck="false" placeholder="<?php echo e(__('Enter Price')); ?>" class="form-control vprice_<?php echo e($counter); ?>" value="<?php echo e($productVariant['product_variants']['price']); ?>">
                                                                            </td>
                                                                            <td>
                                                                                <input type="number" name="variants[<?php echo e($productVariant['product_variants']['id']); ?>][quantity]" autocomplete="off" spellcheck="false" placeholder="<?php echo e(__('Enter Quantity')); ?>" class="form-control vquantity_<?php echo e($counter); ?>" value="<?php echo e($productVariant['product_variants']['quantity']); ?>">
                                                                            </td>
                                                                            <td class="d-flex align-items-center mt-3 border-0">
                                                                                <i class="tio-add-to-trash text-danger"></i>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="col-12 border-0">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="mb-0"><?php echo e(__('Product Image')); ?></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('sub_images',__('Upload Product Images'),array('class'=>'form-control-label'))); ?>

                                            <div class="dropzone dropzone-multiple" data-toggle="dropzone1" data-dropzone-url="http://" data-dropzone-multiple>
                                                <div class="fallback">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="dropzone-1" name="file" multiple>
                                                        <label class="custom-file-label" for="customFileUpload"><?php echo e(__('Choose file')); ?></label>
                                                    </div>
                                                </div>
                                                <ul class="dz-preview dz-preview-multiple list-group list-group-lg list-group-flush">
                                                    <li class="list-group-item px-0">
                                                        <div class="row align-items-center">
                                                            <div class="col-auto">
                                                                <div class="avatar">
                                                                    <img class="rounded" src="" alt="Image placeholder" data-dz-thumbnail>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <h6 class="text-sm mb-1" data-dz-name>...</h6>
                                                                <p class="small text-muted mb-0" data-dz-size></p>
                                                            </div>
                                                            <div class="col-auto">
                                                                <a href="#" class="dropdown-item" data-dz-remove>
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-wrapper p-3 lead-common-box">
                                                <?php $__currentLoopData = $product_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="card mb-3 border shadow-none product_Image" data-id="<?php echo e($file->id); ?>">
                                                        <div class="px-3 py-3">
                                                            <div class="row align-items-center">
                                                                <div class="col ml-n2">
                                                                    <p class="card-text small text-muted">
                                                                        <img class="rounded" src=" <?php echo e(asset(Storage::url('uploads/product_image/'.$file->product_images))); ?>" width="70px" alt="Image placeholder" data-dz-thumbnail>
                                                                    </p>
                                                                </div>
                                                                <div class="col-auto actions">
                                                                    <a class="action-item" href=" <?php echo e(asset(Storage::url('uploads/product_image/'.$file->product_images))); ?>" download="" data-toggle="tooltip" data-original-title="<?php echo e(__('Download')); ?>">
                                                                        <i class="fas fa-download"></i>
                                                                    </a>
                                                                </div>

                                                                <div class="col-auto actions">
                                                                    <a name="deleteRecord" class="action-item deleteRecord" data-id="<?php echo e($file->id); ?>">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="is_cover_image" class="form-control-label"><?php echo e(__('Upload Cover Image')); ?></label>
                                            <input type="file" name="is_cover_image" id="is_cover_image" class="custom-input-file">
                                            <label for="is_cover_image">
                                                <i class="fa fa-upload"></i>
                                                <span><?php echo e(__('Choose a file')); ?></span>
                                            </label>
                                        </div>

                                        <div class="card-wrapper p-3 lead-common-box">
                                            <div class="card mb-3 border shadow-none">
                                                <div class="px-3 py-3">
                                                    <div class="row align-items-center">
                                                        <div class="col ml-n2">
                                                            <p class="card-text small text-muted">
                                                                <img class="rounded" src=" <?php echo e(asset(Storage::url('uploads/is_cover_image/'.$product->is_cover))); ?>" width="70px" alt="Image placeholder" data-dz-thumbnail>
                                                            </p>
                                                        </div>
                                                        <div class="col-auto actions">
                                                            <a class="action-item" href=" <?php echo e(asset(Storage::url('uploads/is_cover_image/'.$product->is_cover))); ?>" download="" data-toggle="tooltip" data-original-title="<?php echo e(__('Download')); ?>">
                                                                <i class="fas fa-download"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 pt-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('description',__('Product Description'),array('class'=>'form-control-label'))); ?>

                                    <?php echo Form::textarea('description',null,array('class'=>'form-control summernote-simple','rows'=>2,'placeholder'=>__('Product Description'))); ?>

                                </div>
                            </div>
                        </div>
                        <div class="w-100 text-right">
                            <button type="button" class="btn btn-sm btn-primary rounded-pill mr-auto" id="submit-all"><?php echo e(__('Save')); ?></button>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\whatsapp\resources\views/product/edit.blade.php ENDPATH**/ ?>
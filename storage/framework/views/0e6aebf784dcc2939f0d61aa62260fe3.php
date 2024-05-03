
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin</title>
        <style>
        .img-size img {
            max-width: 200px;
            max-height: 200px;
            width: 100%;
            height: auto;
        }
        </style>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?php echo e(asset('\resources\css\default.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('\resources\css\form.css')); ?>">
    </head>

    <body>

        <div class="sticky-top">
            <?php if(auth()->guard()->check()): ?>
                <!-- User is logged in -->
                <?php echo $__env->make('header_success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <!-- User is not logged in -->
                <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </div>

        <button type="button" class="mt-4 ms-5" onclick="redirectToHome()" style="background: none;">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="bi bi-arrow-return-left" viewBox="0 0 16 16" style="color: #4a4135;" >
                <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"/>
            </svg>
        </button>

        <script>
            function redirectToHome() {
                window.location.href = "<?php echo e(route('admin.home')); ?>";
            }
        </script>

        
        <h1 class="fw-bold text-center py-3">All Products</h1>


        <?php if(session()->has('message')): ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">x</button>
            <?php echo e(session()->get('message')); ?>

        </div>
        <?php endif; ?>
        
        <div class="container"><hr class="mb-5"></div>

        <div class="justify-content-center rounded-3 my-3 py-3 mx-5 ps-3 pe-0" style="background-color: #F6F6F6;">
            <div class="row fw-bold fs-5" style="font-family: serif">
                <div class="col-4 text-center ms-3" style="border-right: 1px solid #000;">Product</div>
                <div class="col-1 text-center" style="border-right: 1px solid #000;">Colour</div>
                <div class="col-1 text-center" style="border-right: 1px solid #000;">Quantity</div>
                <div class="col-1 text-center" style="border-right: 1px solid #000;">Category</div>
                <div class="col-1 text-center" style="border-right: 1px solid #000;">Brand</div>
                <div class="col-1 text-center" style="border-right: 1px solid #000;">Price</div>
                <div class="col-2 text-left ms-4">Discount Price</div>
            </div>
            <hr>
            
            <?php if(count($items) > 0): ?>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="row my-3 fw-bold">
                <div class="col-4 ms-3 d-flex align-items-center ms-0 ps-0" style="border-right: 1px solid #000;">
                    <div class="col-auto"><img src="<?php echo e(asset('product/' . $item->image)); ?>" style="width: 120px; height: auto"></div>
                    <div class="col ms-4 fw-bold" style="font-size: 15px"><?php echo e($item->name); ?></div>
                </div>
                <div class="col-1 d-flex justify-content-center align-items-center text-center" style="border-right: 1px solid #000;">
                    <?php if($item->colour): ?>
                    <?php echo e($item->colour); ?>

                    <?php else: ?>
                    -
                    <?php endif; ?>
                </div>
                <div class="col-1 d-flex justify-content-center align-items-center text-center" style="border-right: 1px solid #000;">
                    <?php echo e($item->quantity); ?>

                </div>
                <div class="col-1 d-flex justify-content-center align-items-center text-center" style="border-right: 1px solid #000;">
                    <?php if($item->category == 'sunglasses'): ?>
                        Sunglasses
                    <?php else: ?>
                        Contact Lens
                    <?php endif; ?>
                </div>
                <div class="col-1 d-flex justify-content-center align-items-center text-center" style="border-right: 1px solid #000;">
                    <?php echo e($item->brand->brandName); ?>

                </div>
                <div class="col-1 d-flex justify-content-center align-items-center text-center" style="border-right: 1px solid #000;">
                    RM <?php echo e(number_format($item->price, 2)); ?>

                </div>
                <div class="col-1 d-flex justify-content-center align-items-center text-center ms-4">
                    <div class="">
                        <?php if($item->disPrice !== null): ?>
                            RM <?php echo e(number_format($item->disPrice, 2)); ?>

                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </div>
                    
                </div>
                <div class="col-1 d-flex justify-content-end align-items-center ms-5">
                    <a class="btn btn-success" href="<?php echo e(route('admin.updateProducts',$item->itemID)); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                    </a>
                    
                    <a class="btn btn-danger ms-2" onclick="return confirm('Are You Sure to Delete This Product?')" href="<?php echo e(route('admin.deleteProducts',$item->itemID)); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                        </svg>
                    </a>
                </div>
            </div>
            <hr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="row">
                    <div class="col-auto">No items found</div>
                </div>
            <?php endif; ?>
        </table>
        </div>
    </body>
</html>
<?php /**PATH C:\laragon\www\powerdabest-G.E.T\resources\views/admin/showProduct.blade.php ENDPATH**/ ?>
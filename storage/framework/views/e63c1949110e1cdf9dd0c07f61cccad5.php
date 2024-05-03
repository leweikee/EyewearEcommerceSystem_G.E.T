<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>G.E.T Check Out Page</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?php echo e(asset('/resources/css/default.css')); ?>">
        
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
        
        <div class="text-center my-5">
            <h1 class="fw-bold">CHECKOUT</h1>
        </div>

        <div class="container">
            <hr class="mb-5">

            <!--address section-->

            <!--ordered item-->
            <div class="row d-flex text-center mx-0 p-3 mb-3" style="background-color: #F9F9F6; color: #000;">
                <div class="col-md-6 fw-bold" style="font-family: Georgia, serif;">PRODUCT</div>
                <div class="col-md-2 fw-bold" style="font-family: Georgia, serif;">PRICE</div>
                <div class="col-md-2 fw-bold" style="font-family: Georgia, serif;">QUANTITY</div>
                <div class="col-md-2 fw-bold" style="font-family: Georgia, serif;">SUBTOTAL</div>
                <hr class="my-3">
                

                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selectItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row mt-3 mx-0 pe-0">
                    <!--item details-->
                    <div class="col-md-6 mb-2 d-flex align-items-center">
                        <div class="col-md-1 d-flex align-items-center justify-content-center">
                            <?php echo e($loop->index + 1); ?>

                        </div>
                        <div class="col-md-4 d-flex align-items-center ps-3">
                            <div class="rounded-4" style="border: 2px solid #ddd; width: 150px; height; 150px;">
                                <a href="<?php echo e(url('/product_details/' . $selectItem->Product_id)); ?>">
                                    <img src="<?php echo e(asset('product/' . $selectItem->image)); ?>" alt="<?php echo e($selectItem->name); ?>" class="img-fluid">    
                                </a>
                            </div>      
                        </div>
                        <div class="col-md-7 ms-2" style="text-align: left;">
                            <div class="fw-bold mb-2" style="font-size: 17px">
                                <a href="<?php echo e(url('/product_details/' . $selectItem->Product_id)); ?>" style="text-decoration: none; apperance: none; color: #000">
                                    <?php echo e($selectItem->cartName); ?>

                                </a>
                            </div>

                            <?php if($selectItem->colour): ?>
                            <div>Colour: <?php echo e($selectItem->colour); ?> </div>
                            <?php endif; ?>

                            <?php if($selectItem->powers): ?>
                            <div>Power: <?php echo e($selectItem->powers); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!--item price-->
                    <div class="col-md-2 mb-2 d-flex align-items-center justify-content-center">  
                        <div class="text-center">RM <?php echo e(number_format($selectItem->price, 2)); ?></div>
                    </div>

                    <!--item order quantity-->
                    <div class="col-md-2 mb-2 d-flex align-items-center justify-content-center">
                        <div class="text-center"><?php echo e($selectItem->quantity); ?></div>
                    </div>

                    <!--item subtotal-->
                    <div class="col-md-2 mb-2 d-flex align-items-center justify-content-center">
                        <div class="text-center fw-bold">RM <?php echo e($selectItem->subtotal); ?></div>
                    </div>

                    <?php if(!$loop->last): ?>
                    <div class="col-md-12 text-center">
                        <hr class="mx-4">
                    </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </body>
</html><?php /**PATH C:\laragon\www\powerdabest-G.E.T\resources\views/checkout.blade.php ENDPATH**/ ?>
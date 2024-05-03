<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>G.E.T Product Details Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('/resources/js/productDetails.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('/resources/css/default.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/resources/css/productDetails.css')); ?>">
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

    <?php if(session('success')): ?>
    <div id="success-alert" class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
    <script>
        setTimeout(function() {
            document.getElementById('success-alert').style.display = 'none';
        }, 1500); // Set the duration in milliseconds (3 seconds in this case)
    </script>
    <?php endif; ?>

    <?php if(session('error')): ?>
<div id="error-alert" class="alert alert-danger" >
    <?php echo e(session('error')); ?>

</div>
<script>
        setTimeout(function() {
            document.getElementById('error-alert').style.display = 'none';
        }, 1500); // Set the duration in milliseconds (3 seconds in this case)
    </script>
<?php endif; ?>
    <div class="container mt-5 p-5" style="background-color: #F9F9F6;"> 
        <div class="row">
            <!-- Display image on the left -->
            <div class="col-md-6">
                <div class="product-details rounded-4" style="border: 1px solid #ddd;">
                    <img src="<?php echo e(asset('product/' . $item->image)); ?>" alt="<?php echo e($item->name); ?>" class="img-fluid" style="height: 100%">
                </div>
            </div>
            <!-- Display details on the right -->
            <div class="col-md-6">
                <div class="product-details">
                    <h6 class="fw-light font-monospace mb-4"><?php echo e($item->brand->brandName); ?></h6>
                    <h2 class="fw-bold mb-4"><?php echo e($item->name); ?></h2>
                    
                    <!--if disPrice exists-->
                    <?php if($item->disPrice): ?>
                        <h3 class="fw-semibold mb-4" style="color: red;">RM <?php echo e(number_format($item->disPrice, 2)); ?></h3>
                        <p class="text-decoration-line-through">RM <?php echo e(number_format($item->price, 2)); ?></p>
                    <?php else: ?>
                        <h3 class="fw-semibold mb-4" style="color: red;">RM <?php echo e(number_format($item->price, 2)); ?></h3>
                    <?php endif; ?>

                    <!--sunglasses description-->
                    <?php if($item->category=="sunglasses"): ?>
                        <p class="fw-light mb-0" id="description"><?php echo nl2br($item->description); ?></p>
                    <!--contactlens description-->
                    <?php elseif($item->category=="contactlens"): ?>
                        <p class="fw-light mb-0" id="description">
                            <?php echo nl2br(e(strstr($item->description, 'Lens Specification', true))); ?>

                        </p>
                        <!-- Display the Lens Specification section as a dropdown if it exists -->
                        <?php if(strpos($item->description, 'Lens Specification') !== false): ?>
                        <button class="description d-flex align-items-center" type="button" data-toggle="collapse" data-target="#lensSpecificationCollapse" aria-expanded="false" aria-controls="lensSpecificationCollapse" style="border: none; background: none; padding: 0; margin: 0; font: inherit; cursor: pointer; color: inherit;">
                            <div class="fw-bold" style="display: inline-flex;">Lens Specification</div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-eye ms-2" viewBox="0 0 16 16" style="color: black; display: inline-flex; margin-left: 5px; width: 18px; height: auto;">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                            </svg>
                        </button>
                        <div class="collapse fw-light" id="lensSpecificationCollapse">
                            <?php echo preg_replace('/<br\s*\/?>\s*<br\s*\/?>/i', '<br>', nl2br(e(trim(strstr($item->description, 'Box Contains'))))); ?>

                        </div>
                        <?php endif; ?>
                        <h6 class="mt-5">PRESCRIPTION</h6>
                    <?php endif; ?>
                    
                    <hr>

                    <form action="<?php echo e(url('/add_cart/' . $item->itemID)); ?>" method="post" class="mt-4" onsubmit="return validateQuantity()">
                        <?php echo csrf_field(); ?>
                        <label for="quantity" class="fw-bold">Quantity</label>
                        <div class="mt-2 mb-4 rounded-pill" style="width: 25%; background-color: white; border: 1px solid black; overflow: hidden;">
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="button" class="btn btn-light" onclick="decrementQuantity()">-</button>
                                <input type="text" name="quantity" id="quantity" value="1" class="form-control text-center" style="border: none; appearance: none;">
                                <button type="button" class="btn btn-light" onclick="incrementQuantity()">+</button>
                            </div>
                        </div>

                        <?php if($item->category=="contactlens"): ?>
                        <label for="powers" class="fw-bold">Power</label>
                        <div class="mt-2 mb-4 rounded-pill" style="width: 25%; background-color: white; border: 1px solid black; overflow: hidden;">
                            <select class="form-select" id="powers" name="powers" required>
                                <option value="" selected disabled>-----</option>
                                <option value="0.00">0.00</option>
                                <option value="-0.50">-0.50</option>
                                <option value="-1.00">-1.00</option>
                                <option value="-1.25">-1.25</option>
                                <option value="-1.50">-1.50</option>
                                <option value="-1.75">-1.75</option>
                                <option value="-2.00">-2.00</option>
                                <option value="-2.25">-2.25</option>
                                <option value="-2.50">-2.50</option>
                                <option value="-2.75">-2.75</option>
                                <option value="-3.00">-3.00</option>
                                <option value="-3.25">-3.25</option>
                                <option value="-3.50">-3.50</option>
                                <option value="-3.75">-3.75</option>
                                <option value="-4.00">-4.00</option>
                                <option value="-4.25">-4.25</option>
                                <option value="-4.50">-4.50</option>
                                <option value="-4.75">-4.75</option>
                                <option value="-5.00">-5.00</option>
                                <option value="-5.25">-5.25</option>
                                <option value="-5.50">-5.50</option>
                                <option value="-5.75">-5.75</option>
                                <option value="-6.00">-6.00</option>
                                <option value="-6.50">-6.50</option>
                                <option value="-7.00">-7.00</option>
                                <option value="-7.50">-7.50</option>
                                <option value="-8.00">-8.00</option>
                                <option value="-8.50">-8.50</option>
                                <option value="-9.00">-9.00</option>
                            </select>
                        </div>
                        <?php endif; ?>
                        
                        <?php if($item->colour): ?>
                        <label for="quantity" class="fw-bold">Colour</label>
                        <div class="mt-2 mb-4 rounded-pill" style="width: auto; max-width: 30%; background-color: white; border: 1px solid black; overflow: hidden;">
                            <input type="text" class="form-control text-center" value="<?php echo e($item->colour); ?>" placeholder="<?php echo e($item->colour); ?>" aria-label="Disabled input example" disabled readonly>
                        </div>
                        <?php endif; ?>

                        <div class="text-end">
                            <button class="btn btn-add btn-primary fw-bold mt-3 px-5 py-2 rounded-2" type="submit" style="background-color: #4a4135; width: 70%;">ADD TO CART</button>
                        </div>
                    </form>
                    <script>
                            function validateQuantity() {
                                // Get the quantity input value
                                var quantity = document.getElementById('quantity').value;

                                // Check if the quantity is greater than 0
                                if (parseInt(quantity) <= 0) {
                                    // Display an alert or take any other appropriate action
                                    alert('Quantity must be greater than 0');
                                    return false; // Prevent the form submission
                                }

                                // Continue with the form submission
                                return true;
                            }
                        </script>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\powerdabest-G.E.T\resources\views/product_details.blade.php ENDPATH**/ ?>
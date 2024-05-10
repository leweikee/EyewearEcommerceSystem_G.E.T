<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin</title>

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

        <div class="text-center my-5">
            <h1 class="fw-bold">MANAGE PRODUCTS</h1>
        </div>
        
        <div class="align-items-center justify-content-center mx-5" style="background-color: $f9f9f6">
            <div class="card text-center p-5 rounded-3">
                <div class="card-header fs-5 px-5 py-3 fw-semibold">
                    Please choose your desired action
                </div>
                <div class="card-body row mt-3">
                    <div class="col-6">
                    <button type="button" class="btn fs-5 mb-3 p-3" onclick="redirectToAddProduct()" 
                        style="background-color: #362f27; color: #fff; width: 100%; height: 100%; opacity: 0.6"  
                        onmouseover="this.style.backgroundColor='#362f27'; this.style.opacity=1; this.style.transition='0.4s ease'; this.style.color='#fff';" onmouseout="this.style.backgroundColor='#362f27'; this.style.opacity=0.6">
                        Add Product
                    </button>
                    </div>
                    <div class="col-6">
                    <button type="button" class="btn mb-3 p-3 fs-5" onclick="redirectToViewProduct()" 
                        style="background-color: #362f27; color: #fff; width: 100%; height: 100%; opacity: 0.6"  
                        onmouseover="this.style.backgroundColor='#362f27'; this.style.opacity=1; this.style.transition='0.4s ease'; this.style.color='#fff';" onmouseout="this.style.backgroundColor='#362f27'; this.style.opacity=0.6">
                        View/Edit/Delete Product
                    </button>
                </div>
                </div>
            </div>
        </div>

        <script>
            function redirectToAddProduct() {
                window.location.href = "<?php echo e(route('admin.addProducts')); ?>"; 
            }

            function redirectToViewProduct() {
                window.location.href = "<?php echo e(route('admin.showProducts')); ?>"; 
            }
        </script>
    </body>
</html>
<?php /**PATH C:\laragon\www\powerdabest-G.E.T\resources\views/admin/manageProduct.blade.php ENDPATH**/ ?>
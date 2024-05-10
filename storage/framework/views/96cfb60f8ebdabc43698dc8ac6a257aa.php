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


        <button type="button" class="mt-4 ms-5" onclick="redirectToHome()" style="background: none; border: none;">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="bi bi-arrow-return-left" viewBox="0 0 16 16" style="color: #4a4135;" >
            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"/>
            </svg>
        </button>

        <script>
            function redirectToHome() {
                window.location.href = "<?php echo e(route('admin.home')); ?>";
            }
        </script>

        <?php if(session()->has('message')): ?>
        <div class="alert alert-success">
            <?php echo e(session()->get('message')); ?>

        </div>
        <?php endif; ?>

        <?php if(session()->has('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(session()->get('error')); ?>

        </div>
        <?php endif; ?>

        <div class="text-center mb-5">
            <h1 class="fw-bold">BRANDS</h1>
        </div>
        <hr class="mb-5 container">
        <form action="<?php echo e(route('admin.addBrands')); ?>" method="post" enctype="multipart/form-data" style="max-width: 800px;">
        
        <?php echo csrf_field(); ?>
        <div class="container pt-5 px-3 rounded" style="background-color: #F9F9F6; width: 800px;">
            <div class="row mb-4">
                <div class="d-flex align-items-center">
                    <label class="col-auto mx-3">Brand Name:</label>
                    <input type ="text" name="brandName" placeholder="Enter Brand Name" required="" class="me-3">
                    <button type ="submit" class = "col-auto" style="border: none; background: none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                        </svg>
                    </button>
                </div>
            </div>
            
            <div class="justify-content-center rounded-3 my-3 py-3 mx-5 ps-3 pe-0">
                <div class="row fw-bold">
                    <hr>
                    <div class="col-6 text-center" style="border-right: 1px solid #000;">Brand Name</div>
                    <div class="col-6 text-center">Action</div>
                    <hr>
                </div>

                <?php if(!$brands): ?>
                <div class="row">There are currently no brands. <br>Would you like to add a new brand? <br>Please enter your desired brand name.</div>
                <?php else: ?>
                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row fw-bold d-flex align-items-center">
                    <div class="col-6 d-flex" style="border-right: 1px solid #000; width: 50%">
                        <?php echo e($brand->brandName); ?>

                    </div>
                    <div class="col-6 text-center">
                        <a onclick="return confirm('Are you sure to delete this brand')" class="btn btn-danger" href="<?php echo e(route('admin.deleteBrands',$brand->brandID)); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
        </div>
    </body>
</html>
<?php /**PATH C:\laragon\www\powerdabest-G.E.T\resources\views/admin/manageBrand.blade.php ENDPATH**/ ?>
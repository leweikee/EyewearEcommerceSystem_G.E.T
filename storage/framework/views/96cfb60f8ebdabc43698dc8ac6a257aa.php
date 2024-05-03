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
        <form action="<?php echo e(route('admin.addBrands')); ?>" method="post" enctype="multipart/form-data">
        
        <?php echo csrf_field(); ?>

        <div>
            <label>Brand Name: </label>
            <div class="d-flex">
                <input type ="text" name="brandName" placeholder="Enter Brand Name" required="" class="me-3">
                <input type ="submit" value="Add Brand" class = "btn btn-success">
            </div>
        </div>

            <table class="tbl">
                <?php if(!$brands): ?>
                <tr>
                    <td colspan='2'>There are currently no brands. <br>Would you like to add a new brand? <br>Please enter your desired brand name.</td>
                    <!--<td><a onclick="return confirm('Are you sure to delete this brand')" class="btn btn-danger" href="<?php echo e(route('admin.deleteBrands',$brand->brandID)); ?>">Delete</a></td>-->
                </tr>
                <?php else: ?>
                <tr>
                    <th>Brand Name</th>
                    <th>Action</th>
                </tr>
            
                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <td><?php echo e($brand->brandName); ?></td>
                    <td class="text center"><a onclick="return confirm('Are you sure to delete this brand')" class="btn btn-danger" href="<?php echo e(route('admin.deleteBrands',$brand->brandID)); ?>">Delete</a></td>
                </tr>
                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                <?php endif; ?>

            </table>
        </div>

    </body>
</html>
<?php /**PATH C:\laragon\www\powerdabest-G.E.T\resources\views/admin/manageBrand.blade.php ENDPATH**/ ?>
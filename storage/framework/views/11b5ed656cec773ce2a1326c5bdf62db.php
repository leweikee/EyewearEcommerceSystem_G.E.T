
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
                window.location.href = "<?php echo e(route('admin.manageProducts')); ?>";
            }
        </script>
        <?php if(session()->has('message')): ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">x</button>
            <?php echo e(session()->get('message')); ?>

        </div>
        <?php endif; ?>
    <div class="container justify-content-center rounded-3 my-3 pb-3" style="background-color: #F6F6F6; width: 50%">
        <h1 class="fw-bold text-center py-5">Add Product Form</h1>
        <form action="<?php echo e(route('admin.addProducts')); ?>" method="post" enctype="multipart/form-data">
        
        <?php echo csrf_field(); ?>

        <div class="d-flex align-items-center">
            <div class="col-4"><label>Product Name</label></div>
            <div class="col">
                <input type="text" name="name" placeholder="Enter Product Name" required="" class="ms-2">
            </div>
        </div>

        <div class="d-flex align-items-center">
            <div class="col-4"><label>Product Description</label></div>
            <div class="col">
                <textarea name="description" class="form-control ms-2" placeholder="Enter Product Description" required=""></textarea>
            </div>
        </div>
        
        <div class="d-flex align-items-center">
            <div class="col-4"><label>Product Colour</label></div>
            <div class="col">
                <input type="text" name="colour" placeholder="Enter Product Colour (Optional)" class="ms-2">
            </div>
        </div>

        <div class="d-flex align-items-center">
            <div class="col-4"><label>Quantity</label></div>
            <div class="col">
                <input type="number" name="quantity" placeholder="Enter Product Quantity" min="0" required="" class="ms-2">
            </div>
        </div>

        <div class="d-flex align-items-center">
            <div class="col-4"><label>Price</label></div>
            <div class="col">
                <input type="number" name="price" placeholder="Enter Product Price" required="" min="0" value="0" step="any" class="ms-2">
            </div>
        </div>

        <div class="d-flex align-items-center">
            <div class="col-4"><label>Discount Price</label></div>
            <div class="col">
                <input type="number" name="disPrice" placeholder="Enter Discount Price (Optional)" min="0" step="any" class="ms-2">
            </div>
        </div>

        <div class="d-flex align-items-center">
            <div class="col-4"><label>Product Category</label></div>
            <div class="col">
            <select required="" name="category" class="ms-2">
                <option value="0" selected=''>Select Product Category</option>
                <option value="sunglasses">Sunglasses</option>
                <option value="contactlens">Contact Lens</option>
            </select>
            </div>
        </div>

        <div class="d-flex align-items-center">
                <?php if(isset($brands)): ?>
            <div class="col-4"><label for="brandID">Product Brand</label></div>
            <div class="col">
            <select required name="brandID" class="ms-2">
                <option value="0">Select Product Brand</option>
                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($brand->brandID); ?>"><?php echo e($brand->brandName); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            </div>
                <?php endif; ?>
        </div>

        <div class="d-flex align-items-center">
            <div class="col-4"><label>Product Image</label></div>
            <div class="col">
                <input type="file" name="image" required="" accept="image/*" class="ms-2">
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <input type="submit" value="Add Product" class="btn btn-lg justify-content-center fw-bold px-3 py-2" style="background-color: #4a4135;"  onmouseover="this.style.backgroundColor='#211d17'; this.style.color='#fff';" onmouseout="this.style.backgroundColor='#4a4135';"></button>
        </div>
        </form>
    </div>
</body>
</html>


<?php /**PATH C:\laragon\www\powerdabest-G.E.T\resources\views/admin/addProduct.blade.php ENDPATH**/ ?>

<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin Home Page</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?php echo e(asset('\resources\css\default.css')); ?>">
    <style>
        .row {
            display: grid;
            grid-template-columns: auto auto;
            margin: 15px;
        }

        .col-md-3 {
            width: 60%;
            margin: 15px auto ;
            /* padding: 50px; */
        }

        .container {
            background-color: #fff;
            border-radius: 25px;
            width: 90%;
            height:80%;
            margin: auto;
            margin-top: 50px;
        }

        .func {
            display: flex;
            justify-content: space-around;
        }

        .b2 {
            width: 15%;
            padding: 10px;
        }

    </style>
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

        <!-- <h1>Admin Dashboard</h1> -->

        <!-- <hr> -->
        <div class="container">
        <h1 class="text-center pt-4">Overview</h1>
        
        <div class="row">
            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Total Orders</label>
                    <h1><?php echo e($totalOrder); ?></h1>
                    <a href="<?php echo e(route('admin.manageOrders')); ?>" class="text-white mb-3">View</a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Today Orders</label>
                    <h1><?php echo e($todayOrder); ?></h1>
                    <a href="<?php echo e(route('admin.manageOrders')); ?>" class="text-white mb-3">View</a>
                </div>
            </div>
        <!-- </div> -->

        <!-- <hr> -->

        <!-- <div class="row"> -->
             <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Total Products</label>
                    <h1><?php echo e($totalProducts); ?></h1>
                    <a href="<?php echo e(route('admin.showProducts')); ?>" class="text-white mb-3">View</a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-body bg-primary text-white mb-3">
                    <label>Total Brands</label>
                    <h1><?php echo e($totalBrands); ?></h1>
                    <a href="<?php echo e(route('admin.manageBrands')); ?>" class="text-white mb-3">View</a>
                </div>
            </div>
        </div>
        <hr>
        <h1 class="text-center pt-2 pb-3">Functions</h1>
        <div class="func">
        <button type="button" class="btn btn-danger b2" onclick="redirectToManageProduct()">Manage Product</button>
        <button type="button" class="btn btn-danger b2" onclick="redirectToManageBrand()">Manage Brand</button>
        <!-- new changes -->
        <button type="button" class="btn btn-danger b2" onclick="redirectToManageOrders()">Orders</button>
        <button type="button" class="btn btn-danger b2" onclick="redirectToManageReport()">Report</button>
        <button type="button" class="btn btn-danger b2" onclick="redirectToManagePromotion()">Promotion</button>
        <button type="button" class="btn btn-danger b2" onclick="redirectToManageFAQ()">FAQ</button>
        </div>

        <hr>
        </div>

        <script>
            function redirectToManageProduct() {
                window.location.href = "<?php echo e(route('admin.manageProducts')); ?>";
            }

            function redirectToManageBrand() {
                window.location.href = "<?php echo e(route('admin.manageBrands')); ?>";
            }

            function redirectToManageOrders() {
                window.location.href = "<?php echo e(route('admin.manageOrders')); ?>";
            }

            function redirectToManageReport() {
                window.location.href = "<?php echo e(url("/admin/viewReport")); ?>";
            }

            function redirectToManagePromotion() {
                window.location.href = "<?php echo e(url('/promotion')); ?>";
            }

            function redirectToManageFAQ() {
                window.location.href = "";
            }
        </script>
    </body>
</html>
<?php /**PATH C:\laragon\www\powerdabest-G.E.T\resources\views/admin/home.blade.php ENDPATH**/ ?>
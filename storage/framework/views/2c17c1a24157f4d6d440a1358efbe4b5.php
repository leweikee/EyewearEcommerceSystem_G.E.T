<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>G.E.T My Order Page</title>

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
        <div class="py-3 py-md-5">
        <div class="container">
        <div class="row">
        <div class="shadow bg-brown p-3">
        <h1 class="mb-4">My Orders</h1>
        <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <th>Order ID</th>
                <th>Username</th>
                <th>Tracking No</th>
                <!--<th>Payment Method</th>-->
                <th>Ordered Time</th>
                <th>Order Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($order->orderID); ?></td>
                        <td><?php echo e($order->name); ?></td>
                        <td><?php echo e($order->trackingID); ?></td>
                        <!--<td><?php echo e($order->paymentMethod); ?></td>-->
                        <td><?php echo e($order->order_date); ?></td>
                        <td><?php echo e($order->status); ?></td>
                        <td><a href="<?php echo e(url('viewOrders/'.$order->orderID)); ?>" class="btn btn-primary btn-sm">View</a></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6">No Orders Available</td>

                        </td>

                    </tr>
                <?php endif; ?>
            </tbody>

        </table>
        </div>
        </div>
        </div>
        </div>
        </div>
        
    </body>

</html>
<?php /**PATH C:\laragon\www\powerdabest-G.E.T\resources\views/custOrderList.blade.php ENDPATH**/ ?>
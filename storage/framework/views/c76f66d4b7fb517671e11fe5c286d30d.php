<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>G.E.T My Order Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo e(asset('/resources/css/default.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
    <div class="py-2 py-md-4">
        <div class="container">
            <div class="row">
                <div class="shadow bg-brown p-3">
                    <h1 class>
                        <i class="fa fa-shopping-cart text-dark"></i>Order Details
                        <a href="<?php echo e(url('/admin/manageOrder')); ?>" class="btn btn-danger btn-sm float-end">Back</a>
                    </h1>

                    <div class="row">
                        <div class="col-md-6">
                            <h5>Order Details</h5>
                            <hr>
                            <h6>Order ID: <?php echo e($order->orderID); ?></h6>
                            <?php if($order->trackingID): ?>
                                <h6>Tracking Number: <?php echo e($order->trackingID); ?></h6>
                            <?php else: ?>
                                <h6>Tracking Number: Not Available</h6>
                            <?php endif; ?>
                            <h6>Order Created Time: <?php echo e($order->order_date); ?></h6>
                            <h6 class="border p-2 text-success">
                                Order Status: <span class="text-uppercase"><?php echo e($order->status); ?></span>
                            </h6>
                        </div>

                        <div class="col-md-6">
                            <h5>Recipient Details</h5>
                        <h6>Recipient Name: <?php echo e($order->recipientName); ?></h6>
                        <h6>Email: <?php echo e($order->user->email); ?></h6>
                        <h6>Phone Number: <?php echo e($order->recipientPhoneNum); ?></h6>
                        <h6>Recipient Address: <?php echo e($order->recipientAddress); ?></h6>

                        </div>
                    </div>

                    
                    <h5 class="mt-2">Ordered Items</h5>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Colour</th>
                                <th>Powers</th> 
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </thead>
                            <tbody>
                                <?php
                                    $productPrice=0;
                                ?>
                                <?php $__empty_1 = true; $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td width="10%">
                                            <!-- Display the image or any other information related to the item -->
                                            <img src="<?php echo e(asset('product/' . $orderItem->item->image)); ?>" alt="Product Image" width="50">
                                        </td>
                                        <td width="30%">
                                            <?php echo e($orderItem->item->name); ?>

                                        </td>
                                        <td width="10%">
                                            <?php echo e(optional($orderItem->item)->colour ?: 'N/A'); ?>

                                        </td>
                                        <td width="15%">
                                            <?php echo e(optional($orderItem)->power ?: 'N/A'); ?>

                                        </td>
                                        <td width="10%">
                                            <?php echo e($orderItem->Quantity); ?>

                                        </td>
                                        <td width="15%">
                                        RM <?php echo e($orderItem->item->disPrice ?: $orderItem->item->price); ?>

                                        </td>
                                        <td width="15%" class="fw-bold">
                                        RM <?php echo e($orderItem->Quantity * ($orderItem->item->disPrice ?: $orderItem->item->price)); ?>

                                        </td>
                                    </tr>
                                    <?php
                                    $itemPrice = $orderItem->item->disPrice ?: $orderItem->item->price;
                                    $productPrice += $orderItem->Quantity * $itemPrice;
                                    ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="7">No Ordered Items Available</td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <td colspan="6" class="fw-bold">Product Subtotal</td>
                                    <td class="fw-bold">RM <?php echo e($productPrice); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="fw-bold">Shipping Fee</td>
                                    <td class="fw-bold">RM <?php echo e($order->shipping_fee); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="fw-bold">Product Subtotal</td>
                                    <td class="fw-bold">RM <?php echo e($order->total_price); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php if($order->status == 'Paid'): ?>
                    <a href="<?php echo e(url('/admin/orderToShip/' . $order->orderID )); ?>" class="btn btn-primary btn-lg active d-flex justify-content-center mt-2" role="button" aria-pressed="true">Order Ready to Ship</a>
                    <?php elseif($order->status == 'To Ship'): ?>
                    <a class="btn btn-primary btn-lg active d-flex justify-content-center mt-2" role="button" onclick="ship()" aria-pressed="true">Order Shipped</a></td></span>
                    <?php endif; ?>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Insert Tracking Number Modal -->            
                    <div class="modal" id="updateModal" aria-labelledby="updateModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Please Insert Parcel Tracking Number:</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="post" action="<?php echo e(url('/admin/orderShipped', $order->orderID)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="modal-body">
                                        <!-- Input fields for editing -->
                                        <div class="mb-3">
                                            <label for="name">Tracking Number:</label>
                                            <input type="text" id="tnum" name="tnum" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

    <script>
            function ship() {
                // new bootstrap.Modal(document.getElementById('updateModal')).show();
                new bootstrap.Modal(document.getElementById('updateModal')).show();
            }
        </script>

</body>
</html>
<?php /**PATH C:\laragon\www\powerdabest-G.E.T\resources\views/admin/orderDetail.blade.php ENDPATH**/ ?>
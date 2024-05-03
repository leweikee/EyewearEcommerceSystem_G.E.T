<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>G.E.T Template Page</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?php echo e(asset('/resources/css/default.css')); ?>">
        <style>
            .container{
                margin-top: 50px;
            }

            .b1 {
                width: 20%;
                color: #fff;
                background-color:grey;
                opacity: 80%;
            }

            .b1:active {
                background-color: #fff;
                color: black;
                opacity: 100%;
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

        <div class="text-center mt-5 mb-4">
            <h1 class="fw-bold">LIST OF ORDERS</h1>
        </div>

        <!-- <div class="container mb-4 g-4">
            <hr class="mb-5">
        </div> -->

        <div class="container mb-3 g-4">
            <hr class="mb-3">
            
            <div>
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active b1" id="nav-all-order-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">All Order</button>
                    <button class="nav-link b1" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">To Ship</button>
                    <button class="nav-link b1" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Shipped</button>
                    <button class="nav-link b1" id="nav-completed-tab" data-bs-toggle="tab" data-bs-target="#nav-completed" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Completed</button>
                    <button class="nav-link b1" id="nav-cancelled-tab" data-bs-toggle="tab" data-bs-target="#nav-cancelled" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Cancelled</button>
                    <!-- <button class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false" disabled>Disabled</button> -->
                </div>
            </nav>
                <div class="tab-content" id="nav-all-order-tab">
                <!-- sec 1 -->
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                <table class="table">
                    <tbody>
                        <tr>
                            <td scope="col" colspan="2" class="w-50">Product(s)</td>
                            <td scope="col" class="text-center" style="width: 16% !important" >Quantity</td>
                            <td scope="col" class="text-center"  style="width: 16% !important" >Total Price</td>
                            <td scope="col" class="text-center" style="width: 16% !important" >Status</td>
                            <!-- <td scope="col" class="w-auto" style="width: 16% !important">Total Price</td>
                            <td scope="col" class="w-auto" style="width: 16% !important">Status</td> -->
                            <!-- <td scope="col" class="w-auto" style="width: 16% !important">Action</td> -->
                        </tr>
                    </tbody>
                </table>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th colspan="3" scope="col" class="w-50"><?php echo e($x->deliveryAddress->recipientName); ?></th>
                        <th colspan="3" scope="col" class="w-50 text-end pr-5">OrderID: <?php echo e($x->orderID); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $x->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $y): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td scope="col" class="w-50">
                                <div style="display:flex;">
                                <div class="inline-block" style="width: 80px !important"><img src="<?php echo e(asset('product/' . $y->item->image)); ?>" alt="Product Image" width="80"></div>
                                <div class="d-inline" style="width: 388px !important">
                                    <div class="inline-block ms-4" style="width: 385px !important">
                                        <p><b><?php echo e($y->item->name); ?></b></br>
                                        <?php if($y->power !== null): ?>
                                        Power: <?php echo e($y->power); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
        </div>
                            </td>
                            <td scope="col" class="text-center" style="width: 16% !important" ><p> <?php echo e($y->Quantity); ?> </p></td>
                            <td scope="col" class="text-center" style="width: 16% !important" >
                            <?php if($y->item->disPrice !== null): ?>
                            <p> <?php echo e(number_format(($y->item->disPrice)*($y->Quantity), 2)); ?> </p>
                            <?php else: ?>
                            <p> <?php echo e(number_format(($y->item->price)*($y->Quantity), 2)); ?> </p>
                            <?php endif; ?>
                            </td>
                            <td scope="col" class="text-center" style="width: 16% !important" ><p> <?php echo e($x->status); ?> </p></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td scope="col" colspan="5"><span class="h5">Total Amount:</span><span class="text-danger h5">RM <?php echo e(number_format($x->total_price, 2)); ?></span><a href="<?php echo e(route('admin.showOrderDetails',$x->orderID)); ?>" class="btn btn-primary btn-lg active float-sm-end" role="button" aria-pressed="true">View Details</a></td>
                            </tr>
                        
                    </tbody>
                    </table>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                    <!-- sec 2 -->
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                <table class="table">
                    <tbody>
                        <tr>
                            <td scope="col" colspan="2" class="w-50">Product(s)</td>
                            <td scope="col" class="text-center" style="width: 16% !important" >Quantity</td>
                            <td scope="col" class="text-center"  style="width: 16% !important" >Total Price</td>
                            <td scope="col" class="text-center" style="width: 16% !important" >Status</td>
                            <!-- <td scope="col" class="w-auto" style="width: 16% !important">Total Price</td>
                            <td scope="col" class="w-auto" style="width: 16% !important">Status</td> -->
                            <!-- <td scope="col" class="w-auto" style="width: 16% !important">Action</td> -->
                        </tr>
                    </tbody>
                </table>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($x->status == 'To Ship'): ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th colspan="3" scope="col" class="w-50"><?php echo e($x->deliveryAddress->recipientName); ?></th>
                        <th colspan="3" scope="col" class="w-50 text-end pr-5">OrderID: <?php echo e($x->orderID); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $x->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $y): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <tr>
                            <td scope="col" class="w-50">
                                <div style="display:flex;">
                                <div class="inline-block" style="width: 80px !important"><img src="<?php echo e(asset('product/' . $y->item->image)); ?>" alt="Product Image" width="80"></div>
                                <div class="d-inline" style="width: 388px !important">
                                    <div class="inline-block ms-4" style="width: 385px !important">
                                        <p><b><?php echo e($y->item->name); ?></b></br>
                                        <?php if($y->power !== null): ?>
                                        Power: <?php echo e($y->power); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                </div>
                            </td>
                            <td scope="col" class="text-center" style="width: 16% !important" ><p> <?php echo e($y->Quantity); ?> </p></td>
                            <td scope="col" class="text-center" style="width: 16% !important" >
                            <?php if($y->item->disPrice !== null): ?>
                            <p> <?php echo e(number_format(($y->item->disPrice)*($y->Quantity), 2)); ?> </p>
                            <?php else: ?>
                            <p> <?php echo e(number_format(($y->item->price)*($y->Quantity), 2)); ?> </p>
                            <?php endif; ?>
                            </td>
                            <td scope="col" class="text-center" style="width: 16% !important" ><p> <?php echo e($x->status); ?> </p></td>
                            </tr>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td scope="col" colspan="5"><span class="h5">Total Amount:</span><span class="text-danger h5">RM <?php echo e(number_format($x->total_price, 2)); ?></span>
                                <span class="float-sm-end">
                                <a href="<?php echo e(route('admin.showOrderDetails',$x->orderID)); ?>" class="btn btn-primary btn-lg active m-2" role="button" aria-pressed="true">View Details</a>
                                <a class="btn btn-primary btn-lg active m-2" role="button" onclick="ship(<?php echo e($x->orderID); ?>)" aria-pressed="true">Order Shipped</a></td></span>
                            </tr> 
                        
                    </tbody>
                    </table>


                    <!-- Insert Tracking Number Modal -->            
                    <?php endif; ?>
                    <div class="modal" id="updateModal<?php echo e($x->orderID); ?>" aria-labelledby="updateModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Please Insert Parcel Tracking Number:</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="post" action="<?php echo e(url('/admin/orderShipped', $x->orderID)); ?>">
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
        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>


                <!-- sec 3 -->
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                <table class="table">
                    <tbody>
                        <tr>
                            <td scope="col" colspan="2" class="w-50">Product(s)</td>
                            <td scope="col" class="text-center" style="width: 16% !important" >Quantity</td>
                            <td scope="col" class="text-center"  style="width: 16% !important" >Total Price</td>
                            <td scope="col" class="text-center" style="width: 16% !important" >Status</td>
                            <!-- <td scope="col" class="w-auto" style="width: 16% !important">Total Price</td>
                            <td scope="col" class="w-auto" style="width: 16% !important">Status</td> -->
                            <!-- <td scope="col" class="w-auto" style="width: 16% !important">Action</td> -->
                        </tr>
                    </tbody>
                </table>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($x->status == 'Shipped'): ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th colspan="3" scope="col" class="w-50"><?php echo e($x->deliveryAddress->recipientName); ?></th>
                        <th colspan="3" scope="col" class="w-50 text-end pr-5">OrderID: <?php echo e($x->orderID); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $x->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $y): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <tr>
                            <td scope="col" class="w-50">
                                <div style="display:flex;">
                                <div class="inline-block" style="width: 80px !important"><img src="<?php echo e(asset('product/' . $y->item->image)); ?>" alt="Product Image" width="80"></div>
                                <div class="d-inline" style="width: 388px !important">
                                    <div class="inline-block ms-4" style="width: 385px !important">
                                        <p><b><?php echo e($y->item->name); ?></b></br>
                                        <?php if($y->power !== null): ?>
                                        Power: <?php echo e($y->power); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                </div>
                            </td>
                            <td scope="col" class="text-center" style="width: 16% !important" ><p> <?php echo e($y->Quantity); ?> </p></td>
                            <td scope="col" class="text-center" style="width: 16% !important" >
                            <?php if($y->item->disPrice !== null): ?>
                            <p> <?php echo e(number_format(($y->item->disPrice)*($y->Quantity), 2)); ?> </p>
                            <?php else: ?>
                            <p> <?php echo e(number_format(($y->item->price)*($y->Quantity), 2)); ?> </p>
                            <?php endif; ?>
                            </td>
                            <td scope="col" class="text-center" style="width: 16% !important" ><p> <?php echo e($x->status); ?> </p></td>
                            </tr>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td scope="col" colspan="5"><span class="h5">Total Amount:</span><span class="text-danger h5">RM <?php echo e(number_format($x->total_price, 2)); ?></span>
                                <span class="float-sm-end">
                                <a href="<?php echo e(route('admin.showOrderDetails',$x->orderID)); ?>" class="btn btn-primary btn-lg active m-2" role="button" aria-pressed="true">View Details</a>
                            </tr> 
                        
                    </tbody>
                    </table>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
                <!-- <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">Tab 4</div> -->
                 <!-- sec 4 -->
                 <div class="tab-pane fade" id="nav-completed" role="tabpanel" aria-labelledby="nav-completed-tab" tabindex="0">
                    <table class="table">
                    <tbody>
                        <tr>
                            <td scope="col" colspan="2" class="w-50">Product(s)</td>
                            <td scope="col" class="text-center" style="width: 16% !important" >Quantity</td>
                            <td scope="col" class="text-center"  style="width: 16% !important" >Total Price</td>
                            <td scope="col" class="text-center" style="width: 16% !important" >Status</td>
                            <!-- <td scope="col" class="w-auto" style="width: 16% !important">Total Price</td>
                            <td scope="col" class="w-auto" style="width: 16% !important">Status</td> -->
                            <!-- <td scope="col" class="w-auto" style="width: 16% !important">Action</td> -->
                        </tr>
                    </tbody>
                </table>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($x->status == 'Completed'): ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th colspan="3" scope="col" class="w-50"><?php echo e($x->deliveryAddress->recipientName); ?></th>
                        <th colspan="3" scope="col" class="w-50 text-end pr-5">OrderID: <?php echo e($x->orderID); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $x->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $y): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <tr>
                            <td scope="col" class="w-50">
                                <div style="display:flex;">
                                <div class="inline-block" style="width: 80px !important"><img src="<?php echo e(asset('product/' . $y->item->image)); ?>" alt="Product Image" width="80"></div>
                                <div class="d-inline" style="width: 388px !important">
                                    <div class="inline-block ms-4" style="width: 385px !important">
                                        <p><b><?php echo e($y->item->name); ?></b></br>
                                        <?php if($y->power !== null): ?>
                                        Power: <?php echo e($y->power); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                </div>
                            </td>
                            <td scope="col" class="text-center" style="width: 16% !important" ><p> <?php echo e($y->Quantity); ?> </p></td>
                            <td scope="col" class="text-center" style="width: 16% !important" >
                            <?php if($y->item->disPrice !== null): ?>
                            <p> <?php echo e(number_format(($y->item->disPrice)*($y->Quantity), 2)); ?> </p>
                            <?php else: ?>
                            <p> <?php echo e(number_format(($y->item->price)*($y->Quantity), 2)); ?> </p>
                            <?php endif; ?>
                            </td>
                            <td scope="col" class="text-center" style="width: 16% !important" ><p> <?php echo e($x->status); ?> </p></td>
                            </tr>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td scope="col" colspan="5"><span class="h5">Total Amount:</span><span class="text-danger h5">RM <?php echo e(number_format($x->total_price, 2)); ?></span>
                                <span class="float-sm-end">
                                <a href="<?php echo e(route('admin.showOrderDetails',$x->orderID)); ?>" class="btn btn-primary btn-lg active m-2" role="button" aria-pressed="true">View Details</a>
                                <a class="btn btn-success btn-lg active m-2 disabled" role="button" >Order Completed</a></td></span>
                            </tr> 
                        
                    </tbody>
                    </table>          
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>


                <!-- sec 5 -->
                <div class="tab-pane fade" id="nav-cancelled" role="tabpanel" aria-labelledby="nav-cancelled-tab" tabindex="0">
                <table class="table">
                    <tbody>
                        <tr>
                            <td scope="col" colspan="2" class="w-50">Product(s)</td>
                            <td scope="col" class="text-center" style="width: 16% !important" >Quantity</td>
                            <td scope="col" class="text-center"  style="width: 16% !important" >Total Price</td>
                            <td scope="col" class="text-center" style="width: 16% !important" >Status</td>
                            <!-- <td scope="col" class="w-auto" style="width: 16% !important">Total Price</td>
                            <td scope="col" class="w-auto" style="width: 16% !important">Status</td> -->
                            <!-- <td scope="col" class="w-auto" style="width: 16% !important">Action</td> -->
                        </tr>
                    </tbody>
                </table>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($x->status == 'Canceled'): ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th colspan="3" scope="col" class="w-50"><?php echo e($x->deliveryAddress->recipientName); ?></th>
                        <th colspan="3" scope="col" class="w-50 text-end pr-5">OrderID: <?php echo e($x->orderID); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $x->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $y): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <tr>
                            <td scope="col" class="w-50">
                                <div style="display:flex;">
                                <div class="inline-block" style="width: 80px !important"><img src="<?php echo e(asset('product/' . $y->item->image)); ?>" alt="Product Image" width="80"></div>
                                <div class="d-inline" style="width: 388px !important">
                                    <div class="inline-block ms-4" style="width: 385px !important">
                                        <p><b><?php echo e($y->item->name); ?></b></br>
                                        <?php if($y->power !== null): ?>
                                        Power: <?php echo e($y->power); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                </div>
                            </td>
                            <td scope="col" class="text-center" style="width: 16% !important" ><p> <?php echo e($y->Quantity); ?> </p></td>
                            <td scope="col" class="text-center" style="width: 16% !important" >
                            <?php if($y->item->disPrice !== null): ?>
                            <p> <?php echo e(number_format(($y->item->disPrice)*($y->Quantity), 2)); ?> </p>
                            <?php else: ?>
                            <p> <?php echo e(number_format(($y->item->price)*($y->Quantity), 2)); ?> </p>
                            <?php endif; ?>
                            </td>
                            <td scope="col" class="text-center" style="width: 16% !important" ><p> <?php echo e($x->status); ?> </p></td>
                            </tr>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td scope="col" colspan="5"><span class="h5">Total Amount:</span><span class="text-danger h5">RM <?php echo e(number_format($x->total_price, 2)); ?></span>
                                <span class="float-sm-end">
                                <a href="<?php echo e(route('admin.showOrderDetails',$x->orderID)); ?>" class="btn btn-primary btn-lg active m-2" role="button" aria-pressed="true">View Details</a>
                            </tr> 
                        
                    </tbody>
                    </table>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>




            </div>

            
        </div>


        <script>
            function ship(id) {
                var oID = id;
                // new bootstrap.Modal(document.getElementById('updateModal')).show();
                new bootstrap.Modal(document.getElementById('updateModal' + id)).show();
            }
        </script>

    </body>

</html><?php /**PATH C:\laragon\www\powerdabest-G.E.T\resources\views/admin/manageOrder.blade.php ENDPATH**/ ?>
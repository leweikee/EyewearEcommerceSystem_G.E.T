<!-- resources/views/products/index.blade.php -->
<link rel="stylesheet" href="<?php echo e(asset('/resources/css/index.css')); ?>">

 

<?php $__env->startSection('content'); ?>
<div class="container mb-4 g-4">
    <hr class="mb-5">
    <!--search-->
    <div class="mb-5 me-4 d-flex justify-content-end align-items-center">
        <?php if($categoryName == 'sunglasses' || $categoryName == 'contactlens'): ?>
            <div class="search-filter-container bg-white rounded d-flex align-items-center">
                <select id="brandFilter" class="rounded form-control" onchange="location = this.value;" style="width: auto; border: none;">
                    <option value="<?php echo e(url('/catalogue/' . $categoryName)); ?>">All Products</option>
                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e(url('/catalogue/' . $categoryName . '?brandid=' . $brand->brandID)); ?>" 
                            <?php echo e(Request::input('brandid') == $brand->brandID ? 'selected' : ''); ?>>
                            <?php echo e($brand->brandName); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <label for="brandFilter" class="pe-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search me-2" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                </label>
            </div>
        <?php endif; ?>

        <?php if(empty($categoryName)): ?>
            <!-- Filter brands for general catalogue page -->
            <div class="search-filter-container bg-white rounded d-flex align-items-center">
                <select id="brandFilter" class="rounded form-control" onchange="location = this.value;" style="width: auto; border: none;">
                    <option value="<?php echo e(url('/catalogue')); ?>">All Products</option>
                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e(url('/catalogue?brandid=' . $brand->brandID)); ?>" 
                            <?php echo e(Request::input('brandid') == $brand->brandID ? 'selected' : ''); ?>>
                            <?php echo e($brand->brandName); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <label for="brandFilter" class="pe-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search me-2" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                </label>
            </div>
        <?php endif; ?>
    </div>

    <!--products-->
    <div class="row row-cols-1 row-cols-md-3">
        <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col mb-5">
                <div class="content d-flex flex-column h-100">
                    <a href="<?php echo e(url('/product_details/' . $x->itemID)); ?>" style="text-decoration: none; apperance: none;">
                        <div class="card rounded-4" style="width: 24rem; height: 30em; background-color: #F9F9F6;">
                            <div class="content-overlay rounded-4"></div>
                            <img class="content-image rounded-top-4" src="<?php echo e(asset('product/' . $x->image)); ?>" alt="<?php echo e($x->name); ?>" style="height: 65%">
                            <div class="content-details fadeIn-bottom">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16" style="color:white;">
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                                </svg>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <p class="card-text mb-3"><?php echo e($x->brandName); ?></p>
                                <h5 class="card-title fw-bold mb-3"><?php echo e($x->name); ?></h5>
                                <div class="d-flex">
                                    <?php if($x->disPrice): ?>
                                        <h5 class="fw-semibold mb-1 me-3" style="color: red;">RM <?php echo e(number_format($x->disPrice, 2)); ?></h5>
                                        <p class="text-decoration-line-through me-1">RM <?php echo e(number_format($x->price, 2)); ?></p>
                                    <?php else: ?>
                                        <h5 class="fw-semibold me-3" style="color: red;">RM <?php echo e(number_format($x->price, 2)); ?></h5>
                                    <?php endif; ?>
                                </div>
                            </div> 
                        </div>  
                    </a> 
                </div>
            </div>    
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- Pagination Links -->
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center mx-5" style="height: 40px;">
            <?php if($item->onFirstPage()): ?>
                <li class="page-item disabled" style="width: fit-content;">
                    <a class="page-link" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
                </li>
            <?php else: ?>
                <li class="page-item" style="width: fit-content;"><a class="page-link" href="<?php echo e($item->previousPageUrl()); ?>">&laquo;</a></li>
            <?php endif; ?>

            <!-- Pagination Elements -->
            <?php for($page = 1; $page <= $item->lastPage(); $page++): ?>
                <li class="page-item <?php echo e($page == $item->currentPage() ? 'active' : ''); ?>" style="width: fit-content">
                    <a class="page-link" href="<?php echo e($item->url($page)); ?>"><?php echo e($page); ?></a>
                </li>
            <?php endfor; ?>

            <!-- Next Page Link -->
            <?php if($item->hasMorePages()): ?>
                <li class="page-item" style="width: fit-content">
                    <a class="page-link" href="<?php echo e($item->nextPageUrl()); ?>">&raquo;</a>
                </li>
            <?php else: ?>
                <li class="page-item disabled" style="width: fit-content">
                    <a class="page-link" aria-label="next"><span aria-hidden="true">&raquo;</span></a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
<?php $__env->stopSection(); ?>
<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>



<?php echo $__env->make('catalogue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\powerdabest-G.E.T\resources\views/item/index.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>G.E.T. Login Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo e(asset('/resources/css/default.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/resources/css/header.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/resources/css/register.css')); ?>">
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

    <div class="container align-items-center mt-5" style="width: 70%;">
        <div class="row align-items-center d-flex justify-content-center">
            <div class="col-md-6">
                <div class="form py-5">
                    <div class="text-center fs-1 fw-bold m-4 mb-5">Login</div>

                    <?php if(session('error')): ?>
                    <div id="success-alert" class="alert alert-danger pt-2 pb-0">
                        <p class="fs-6"><?php echo e(session('error')); ?></p>
                    </div>
                    <script>
                        setTimeout(function() 
                        {
                            document.getElementById('success-alert').style.display = 'none';
                        }, 2500); 
                    </script>
                    <?php elseif(session('success')): ?>
                    <div id="success-alert" class="alert alert-success pt-2 pb-0">
                        <p class="fs-6"><?php echo e(session('success')); ?></p>
                    </div>
                    <script>
                    setTimeout(function() 
                    {
                        document.getElementById('success-alert').style.display = 'none';
                    }, 3500); 
                    </script>
                    <?php endif; ?>

                    <form action="<?php echo e(route('login.submit')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                        <div class="input-group mb-4">
                            <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" fill="black" class="bi bi-person-circle d-flex justify-content-center m-0" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                </svg>
                            </span>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="name" placeholder="Enter your username" required>
                        </div>

                        <div class="input-group">
                            <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="18" fill="black" class="bi bi-lock d-flex justify-content-center m-0" viewBox="0 0 16 16">
                                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1"/>
                                </svg>
                            </span>
                            <input type="password" class="form-control" id="formGroupExampleInput" name="password" placeholder="Enter your password" required>
                        </div>
                        <br>

                        <p class="text-center fs-6 mt-1" style="font-family: serif">Don't have an account? <a href="/register" class="fw-bold">Sign up</a></p>
              
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" class="btn btn-secondary btn-lg fw-bold" style="background-color: #4a4135">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\powerdabest-G.E.T\resources\views/login.blade.php ENDPATH**/ ?>
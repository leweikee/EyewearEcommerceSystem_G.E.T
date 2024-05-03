<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>G.E.T Template Page</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?php echo e(asset('/resources/css/default.css')); ?>">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <style>
        
        .container {
            background-color: #fff;
            border-radius: 25px;
            width: 90%;
            height:80%;
            margin: auto;
            margin-top: 50px;
        }

        .con {
            border-right: 1px solid black;
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
        <div class="container pb-5">
            <h1 class="text-center pt-5 pb-4">Contact Us</h1>
            <div class="d-flex justify-content-around">
            <div  class="w-50 con ms-5  mt-4">
                <div class="mb-4 block"><h3>Contact Info</h3></div>
                <div class="w-50">
                    <div class="d-flex">
                        <i class="bi bi-geo-alt"></i><span class="ms-2 mb-1"><p class="mb-1"><b>Address</b></p><p>Johor Malaysia</p></span>
                    </div>
                    <div class="d-flex">
                        <i class="bi bi-telephone-fill"></i><span class="ms-2 mb-1"><p class="mb-1"><b>Phone</b></p><p>+60167127110</p></span>
                    </div>
                    <div class="d-flex">
                        <i class="bi bi-envelope"></i><span class="ms-2 mb-1"><p class="mb-1"><b>Email</b></p><p>gorgeouseyescare@hotmail.com</p></span>
                    </div>
                </div>
            </div>
            <div  class="w-50 ms-5 ps-5 mx-auto mt-4">
                <div class="mb-4"><h3>Get In Touch</h3></div>
                <div class="w-50">
                    <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" aria-describedby="nameHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Message</label>
                        <textarea class="form-control" id="email"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
    </div>

            <div>
                
            </div>

        </div>
    </body>

</html>
<?php /**PATH C:\laragon\www\powerdabest-G.E.T\resources\views/contact.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <link rel="stylesheet" href="<?php echo e(asset('resources/css/header.css')); ?>">
    <!-- <script type="text/javascript" src="<?php echo e(asset('resources/js/header.js')); ?>"></script> -->
</head>
<body>

    <div class="navbar-cont">
        <nav>
            <ul>
                <li>
                    <!-- <a href="#" id="searchIcon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </a> -->
                    <a href="<?php echo e(url('/aboutUs')); ?>">About Us</a>
                </li>
                <li>
                    <a href="<?php echo e(url('/catalogue')); ?>">Shop</a>
                    <ul class="dropdown">
                        <li><a href="<?php echo e(url('/catalogue/sunglasses')); ?>">Sunglasses</a></li>
                        <li><a href="<?php echo e(url('/catalogue/contactlens')); ?>">Contact Lens</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo e(url('/promotion')); ?>">Promotion</a>
                </li>
                <li>
                    <a href="<?php echo e(url('/')); ?>"><img class="logo" src="<?php echo e(asset('resources/images/G.E.T. logo.jpg')); ?>" alt="G.E.T. logo"></a>
                </li>
                <li>
                    <!-- <a href="<?php echo e(url('/aboutUs')); ?>">About Us</a> -->
                    <a href="<?php echo e(url('/contactUs')); ?>">Contact</a>
                </li>
                <li>
                    <a href="<?php echo e(url('/show_cart')); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('/login')); ?>">
                        Login
                    </a>
                </li>
            </ul>
        </nav>
    </div>


    <!--<div class="navbar">
        <div class="navbar-cont">
            <div class="searchfunc">
                <a href="" class="searchicon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </a>
                <div class="searchbox">
                    <input type="text" placeholder="Searching...">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="links"></div>
        </div>
    </div>-->

    <!-- <div class="navbar-cont">
        <nav>
            <ul>
                <li>
                    <a href="#" id="searchIcon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="">Shop</a>
                    <ul class="dropdown">
                        <li><a href="<?php echo e(url('/catalogue')); ?>">Sunglasses</a></li>
                        <li><a href="<?php echo e(url('/catalogue')); ?>">Contact Lens</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">Promotion</a>
                </li>
                <li>
                    <a href="<?php echo e(url('/')); ?>"><img class="logo" src="<?php echo e(asset('resources/images/G.E.T. logo.jpg')); ?>" alt="G.E.T. logo"></a>
                </li>
                <li>
                    <a href="<?php echo e(url('/aboutUs')); ?>">About Us</a>
                </li>
                <li>
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(url('/custProfile')); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>
    </div> -->

</body>
</html>
<?php /**PATH C:\laragon\www\powerdabest-G.E.T\resources\views/header.blade.php ENDPATH**/ ?>
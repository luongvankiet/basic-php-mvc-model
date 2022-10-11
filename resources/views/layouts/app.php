<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fitness Center</title>

    <!-- styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="<?php echo \App\Core\Application::assets('dist/css/index.css') ?>">
    <link rel="stylesheet" href="<?php echo \App\Core\Application::assets('css/style.css') ?>">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar bg-black text-white pr-3 pl-3 position-sticky">
        <!-- <h2 class="navbar-brand">Tourist Site</h2> -->
        <a href="<?php echo \App\Core\Application::appUrl() ?>"><img src="<?php echo \App\Core\Application::assets('/images/FitnessCentreLogo.png') ?>" alt="FitnessCentreLogo" style="width: 250px"></a>
        <ul class="d-flex gap-2">
            <li class="text-hover-primary"><a href="<?php echo \App\Core\Application::appUrl() ?>">Home</a></li>
            <li class="text-hover-primary"><a href="#">Classes</a></li>
            <li class="text-hover-primary"><a href="#">Memberships</a></li>
            <li class="text-hover-primary"><a href="#">Locations</a></li>
            <li class="text-hover-primary"><a href="#">Blogs</a></li>

            <?php if (\App\Core\Application::currentUser()) { ?>
                <li class="text-hover-primary">
                    <div class="dropdown dropdown-right">
                        <span><?php echo \App\Core\Application::currentUser()->email ?></span>
                        <div class="dropdown-content">
                            <a href="<?php echo \App\Core\Application::appUrl('/profile') ?>">profile</a>
                            <hr>
                            <a href="<?php echo \App\Core\Application::appUrl('/auth/logout') ?>">Logout</a>
                        </div>
                    </div>
                </li>
            <?php } else { ?>
                <li class="text-hover-primary"><a href="<?php echo \App\Core\Application::appUrl('auth/login') ?>">Login</a></li>
            <?php } ?>
        </ul>

        <span id="hamburger">
            <i class="fas fa-bars"></i>
        </span>
    </nav>
    <!-- ############### Navigation Bar End ############### -->
    @yield('content')


    <!-- Footer -->
    <div class="footer bg-black text-white">
        <div class="container">
            <div class="row gap-3">
                <div class="col-xs-12 col-lg-3">
                    <ul>
                        <li class="mb-2">
                            <h1>Locations</h1>
                        </li>
                        <li>
                            <a href="#" class="text-hover-primary">Central</a>
                        </li>
                        <li>
                            <a href="#" class="text-hover-primary">Town Hall</a>
                        </li>
                        <li>
                            <a href="#" class="text-hover-primary">Redfern</a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-lg-3">
                    <ul>
                        <li class="mb-2">
                            <h1>Locations</h1>
                        </li>
                        <li>
                            <p>Central</p>
                        </li>
                        <li>
                            <p>Town Hall</p>
                        </li>
                        <li>
                            <p>Redfern</p>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-lg-3">
                    <ul>
                        <li class="mb-2">
                            <h1>Locations</h1>
                        </li>
                        <li>
                            <p>Central</p>
                        </li>
                        <li>
                            <p>Town Hall</p>
                        </li>
                        <li>
                            <p>Redfern</p>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-lg-3">
                    <ul>
                        <li class="mb-2">
                            <h1>Locations</h1>
                        </li>
                        <li>
                            <p>Central</p>
                        </li>
                        <li>
                            <p>Town Hall</p>
                        </li>
                        <li>
                            <p>Redfern</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- ############### Footer Start ############### -->
    <footer>
        <div class="footer-container">
            <div class="footer">
                <div class="footer-heading footer-1">
                    <h2>Locations</h2>
                    <a href="#">Central</a>
                    <a href="#">Town Hall</a>
                    <a href="#">Redfern</a>
                </div>
                <div class="footer-heading footer-2">
                    <h2>Classes</h2>
                    <a href="#">Yoga</a>
                    <a href="#">HIIT</a>
                    <a href="#">Zumba</a>
                    <a href="#">Boxing</a>
                </div>
                <div class="footer-heading footer-3">
                    <h2>Social Media</h2>
                    <a href="https://Instagram.com">Instagram</a>
                    <a href="https://Facebook.com">Facebook</a>
                    <a href="https://Youtube.com">Youtube</a>

                </div>
                <div class="footer-heading footer-4">
                    <h2>Contact Us</h2>
                    <h2>+612345678910</h2>
                </div>
            </div>
        </div>
    </footer>
    <!-- ############### Footer End ############### -->

    <script src="<?php echo \App\Core\Application::assets('js/jquery-3.6.1.min.js') ?>"></script>
    <script src="<?php echo \App\Core\Application::assets('js/app.js') ?>"></script>
</body>

</html>

<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fitness Center</title>

    <!-- styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="<?php echo \App\Core\Application::assets('dist/css/index.css') ?>"> -->
    <link rel="stylesheet" href="<?php echo \App\Core\Application::assets('css/style.css') ?>">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo \App\Core\Application::appUrl() ?>">
                <img src="<?php echo \App\Core\Application::assets('/images/FitnessCentreLogo.png') ?>" alt="FitnessCentreLogo" style="width: 250px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="w-100 d-lg-flex justify-content-lg-end justify-content-center">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo \App\Core\Application::appUrl() ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?php echo \App\Core\Application::appUrl('courses') ?>">Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white">Memberships</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white">Locations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white">Blogs</a>
                        </li>
                        <?php if (\App\Core\Application::currentUser()) { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo \App\Core\Application::currentUser()->email ?>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#">Profile</a></li>
                                    <li><a class="dropdown-item" href="<?php echo \App\Core\Application::appUrl('/auth/logout') ?>">Logout</a></li>
                                </ul>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="<?php echo \App\Core\Application::appUrl('auth/login') ?>">Login</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- end navbar -->
    <!-- ############### Navigation Bar End ############### -->
    @yield('content')

    <div class="bg-dark bg-gradient">
        <div class="container text-white">
            <footer class="py-5">
                <div class="row">
                    <div class="col-6 col-md-2 mb-3">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Memberships</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Courses</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-md-2 mb-3">
                        <h5>Locations</h5>
                        <ul class="nav flex-column">
                            <?php foreach (\App\Core\Application::locations() as $location) { ?>
                                <li class="nav-item mb-2">
                                    <a href="#" class="nav-link p-0 text-muted">
                                        <?php echo $location->name ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class="col-6 col-md-2 mb-3">
                        <h5>Get in touch</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About Us</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Contact Us</a></li>
                        </ul>
                    </div>

                    <div class="col-md-5 offset-md-1 mb-3">
                        <form>
                            <h5>Subscribe to our newsletter</h5>
                            <p>Monthly digest of what's new and exciting from us.</p>
                            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                                <label for="newsletter1" class="visually-hidden">Email address</label>
                                <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                                <button class="btn btn-primary" type="button">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                    <p>&copy; 2022 Company, Inc. All rights reserved.</p>
                    <ul class="list-unstyled d-flex">
                        <li class="ms-3"><a class="link-light" href="#"><svg class="bi" width="24" height="24">
                                    <use xlink:href="#twitter" />
                                </svg></a></li>
                        <li class="ms-3"><a class="link-light" href="#"><svg class="bi" width="24" height="24">
                                    <use xlink:href="#instagram" />
                                </svg></a></li>
                        <li class="ms-3"><a class="link-light" href="#"><svg class="bi" width="24" height="24">
                                    <use xlink:href="#facebook" />
                                </svg></a></li>
                    </ul>
                </div>
            </footer>
        </div>
    </div>

    <script src="<?php echo \App\Core\Application::assets('js/jquery-3.6.1.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="<?php echo \App\Core\Application::assets('js/app.js') ?>"></script>
</body>

</html>

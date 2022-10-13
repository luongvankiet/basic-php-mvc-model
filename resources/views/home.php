<div class="header d-flex align-items-center">
    <div class="container">
        <div class="row p-5">
            <div class="col-lg-7 header-left">
                <span class="text-white">DISCOVER</span>
                <br>
                <span class="text-white bg-black">YOURSELF.</span>
            </div>
            <div class="col-lg-5">
                <div class="card bg-danger border">
                    <div class="card-body p-4">
                        <div class="container">
                            <h1 style="font-size: 3.75rem;">Get started at Western Sydney Fitness Centre</h1>
                            <div class="row pt-3">
                                <div class="col-6">
                                    <a class="btn btn-light w-100" href="<?php echo \App\Core\Application::appUrl('courses') ?>">Explore Courses</a>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-light w-100">Join now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container text-center py-5">
    <h1>TOP COURSES</h1>
    <div class="row">
        <?php foreach ($courses as $course) { ?>
            <div class="col-12 col-lg-4">
                <a href="<?php echo \App\Core\Application::appUrl("courses/$course->id") ?>" class="text-decoration-none text-dark">
                    <div class="content">
                        <img src="<?php echo \App\Core\Application::assets($course->imagePath) ?>" alt="Boxing" style="width:100%">
                        <h2><?php echo $course->name ?></h2>
                        <p style="width:100%"><?php echo $course->description ?></p>

                </a>
            </div>
    </div>
<?php } ?>
</div>
</div>
<div class="bg-secondary bg-opacity-10">
    <div class="container text-center py-5">
        <h1>Our Team</h1>
        <div class="row">
            <?php foreach ($trainers as $trainer) { ?>
                <div class="col-12 col-lg-3 py-3">
                    <div class="card shadow-lg">
                        <div class="card-body py-5">
                            <img src="<?php echo \App\Core\Application::assets($trainer->imagePath) ?>" class="img-fluid rounded-circle mx-auto profile-image" alt="...">
                            <h3 class="pt-3"><?php echo $trainer->name() ?></h3>
                            <p>Trainer</p>
                            <a type="button" class="btn btn-dark" href="<?php echo \App\Core\Application::appUrl("profile/$trainer->id") ?>">See Profile</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

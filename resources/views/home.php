<div class="header">
    <div class="container">
        <div class="row d-flex align-center justify-center p-5">
            <div class="col-lg-7 header-left">
                <span class="text-white">DISCOVER</span>
                <br>
                <span class="text-white bg-black">YOURSELF.</span>
            </div>
            <div class="col-lg-5 header-right">
                <div class="card bg-primary">
                    <div class="card-body p-2">
                        <p class="text-black">Get started at Western Sydney Fitness Centre</p>
                        <div class="row gap-1">
                            <div class="col-xs-6">
                                <button class="btn btn-outline-primary w-100">Explore Classes</button>
                            </div>
                            <div class="col-xs-6">
                                <button class="btn btn-outline-primary w-100">Join now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ############### Top Classes Start ############### -->
<div class="container text-center pt-5 pb-5">
    <h1>TOP COURSES</h1>
    <div class="row gap-1">
        <?php foreach ($courses as $course) { ?>
            <div class="col-xs-12 col-lg-4">
                <div class="content">
                    <img src="<?php echo \App\Core\Application::assets($course->imagePath) ?>" alt="Boxing" style="width:100%">
                    <h2><?php echo $course->name ?></h2>
                    <p style="width:100%"><?php echo $course->description ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<!-- ############### Top Classes End ############### -->

<div id="course-slides" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php foreach ($courses as $key => $course) { ?>
            <button type="button" data-bs-target="#course-slides" data-bs-slide-to="<?php echo $key ?>" class="active" aria-current="true"></button>
        <?php } ?>
    </div>
    <div class="carousel-inner">
        <?php foreach ($courses as $key => $course) { ?>
            <div class="carousel-item <?php echo $key === 0 ? 'active' : '' ?>">
                <img src="<?php echo \App\Core\Application::assets($course->imagePath) ?>" class="d-block w-100 course-img" alt="..." style="height: 40rem; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block">
                    <a class="text-decoration-none text-white" href="<?php echo \App\Core\Application::appUrl("courses/$course->id") ?>">
                        <h1><?php echo $course->name ?></h1>
                    </a>
                    <p><?php echo $course->description ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#course-slides" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#course-slides" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container my-5">
    <nav>
        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
            <?php foreach ($categories as $key => $category) { ?>
                <button class="nav-link text-dark <?php echo $key === 0 ? 'active' : '' ?>" data-bs-toggle="tab" data-bs-target="#category-<?php echo $key ?>-tab" type="button" role="tab" aria-controls="category-<?php echo $key ?>-tab" aria-selected="true"><?php echo $category->name ?></button>
            <?php } ?>
        </div>
    </nav>

    <div class="tab-content" id="course-content-tab">
        <?php foreach ($categories as $key => $category) { ?>
            <div class="tab-pane fade <?php echo $key === 0 ? 'show active' : '' ?>" id="category-<?php echo $key ?>-tab" role="tabpanel" aria-labelledby="category-<?php echo $key ?>-tab">
                <?php foreach ($category->courses() as $key => $course) { ?>
                    <div class="card my-3 border-light shadow">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-5 col-lg-4">
                                <img src="<?php echo \App\Core\Application::assets($course->imagePath) ?>" alt="<?php echo $course->name ?>" class="img-fluid">
                            </div>
                            <div class="col-md-7 col-lg-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $course->name ?></h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                    <a href="<?php echo \App\Core\Application::appUrl("courses/$course->id") ?>"><button type="button" class="btn btn-dark">See Class</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>

<div id="post-slides" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php foreach ($latestPosts as $key => $post) { ?>
            <button type="button" data-bs-target="#post-slides" data-bs-slide-to="<?php echo $key ?>" class="active" aria-current="true"></button>
        <?php } ?>
    </div>
    <div class="carousel-inner">
        <?php foreach ($latestPosts as $key => $post) { ?>
            <div class="carousel-item <?php echo $key === 0 ? 'active' : '' ?>">
                <img src="<?php echo \App\Core\Application::assets($post->imagePath) ?>" class="d-block w-100" alt="..." style="height: 40rem; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block">
                    <a class="text-decoration-none text-white" href="<?php echo \App\Core\Application::appUrl("blogs/$post->id") ?>">
                        <h1><span class="bg-dark bg-opacity-50"><?php echo $post->title ?></span></h1>
                    </a>
                    <!-- <p><?php echo $post->content ?></p> -->
                </div>
            </div>
        <?php } ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#post-slides" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#post-slides" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="col-12">
                <a href="<?php echo \App\Core\Application::appUrl() ?>" class="text-secondary text-decoration-none">
                    <h5><i class="fa fa-caret-left"></i> Back</h5>
                </a>
            </div>
            <?php foreach ($posts as $key => $post) { ?>
                <div class="card my-3">
                    <img src="<?php echo \App\Core\Application::assets($post->imagePath) ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $post->title ?></h5>
                        <p class="card-text">
                            <?php echo $post->content ? substr($post->content, 0, 400) . '...' : $post->content ?>
                        </p>
                        <a href="<?php echo \App\Core\Application::appUrl("blogs/$post->id") ?>" class="btn btn-outline-danger">Read more</a>
                        <p class="text-muted mt-2">Last updated <?php echo date("F jS, Y", strtotime($post->updatedAt)); ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="col-12 col-lg-4 px-4">
            <h2>Latest Posts</h2>
            <?php foreach ($latestPosts as $key => $post) { ?>
                <a href="<?php echo \App\Core\Application::appUrl("blogs/$post->id") ?>" class="text-decoration-none text-dark">
                    <div class="card border-0">
                        <div class="row g-0 d-flex align-items-center">
                            <div class="col-4">
                                <img src="<?php echo \App\Core\Application::assets($post->imagePath) ?>" class="img-fluid" alt="...">
                            </div>
                            <div class="col-8">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">
                                        <?php echo $post->content ? substr($post->content, 0, 70) . '...' : $post->content ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php } ?>

            <hr />

            <h2>Categories</h2>
            <div class="list-group list-group-flush">
                <?php foreach ($categories as $key => $category) { ?>
                    <a href="<?php echo \App\Core\Application::appUrl("blogs?category_id=$category->id") ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start <?php echo $currentCategoryId === $category->id ? 'active' : '' ?>">
                        <div class="ms-2 me-auto">
                            <h6><?php echo $category->name ?></h6>
                        </div>
                        <span class="badge bg-secondary rounded-pill"><?php echo $category->postCount() ?></span>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

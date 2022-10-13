<div class="p-5 text-bg-dark bg-image d-flex align-items-end justify-content-center" style="background-image: url('<?php echo \App\Core\Application::assets($post->imagePath) ?>'); min-height: 30rem">
</div>

<div class="container my-5">
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="col-12">
                <a href="<?php echo \App\Core\Application::appUrl('blogs') ?>" class="text-secondary text-decoration-none">
                    <h5><i class="fa fa-caret-left"></i> Back</h5>
                </a>
            </div>

            <hr />
            <h1><?php echo $post->title ?></h1>
            <?php if ($user = $post->user()) { ?>
                <span class="text-muted">Author: <a class="text-muted" href="<?php echo \App\Core\Application::appUrl("profile/$user->id") ?>"><?php echo $user->name() ?></a>, <?php echo date("F jS, Y", strtotime($post->createdAt)); ?>
                </span>
            <?php } ?>
            <hr />
            <p><?php echo $post->content ?></p>
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

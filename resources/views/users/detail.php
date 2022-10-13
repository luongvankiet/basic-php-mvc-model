<div class="p-5 text-bg-dark">
    <div class="content bg-dark bg-opacity-50 my-5">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-12 col-lg-4 text-center">
                    <img class="rounded-circle img-fluid" src="<?php echo \App\Core\Application::assets($user->imagePath) ?>" alt="" style="width: 250px; height:250px; object-fit:cover">
                </div>
                <div class="col-12 col-lg-8 text-center text-lg-start">
                    <h1 class="display-2 fst-italic"><?php echo $user->name() ?></h1>
                    <h4><?php echo $user->position ?></h4>
                    <h4><?php echo $user->email ?></h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
    <h2>About</h2>
    <hr />
    <p><?php echo $user->description ?></p>
</div>

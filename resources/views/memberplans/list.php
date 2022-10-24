<div class="container my-5">
    <div class="row">
        <?php foreach ($memberplans as $key => $memberplan) { ?>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card text-center">
                    <div class="card-header">
                        <h5 class="card-title text-center"><?php echo $memberplan->name ?> </h5>
                    </div>
                    <div class="card-body">
                        <?php echo $memberplan->description ?>
                        <hr />
                        <h5>Starting From</h5>
                        <p class="text-danger">$<?php echo $memberplan->price ?></p>
                        <a class="btn btn-secondary" href="#">Join Now</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

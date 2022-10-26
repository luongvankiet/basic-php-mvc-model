<div class="p-5 text-bg-dark bg-image d-flex align-items-end justify-content-center" style="background-image: url('<?php echo \App\Core\Application::assets($course->imagePath) ?>'); min-height: 30rem">
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="col-12">
                <a href="<?php echo \App\Core\Application::appUrl('courses') ?>" class="text-secondary text-decoration-none">
                    <h5><i class="fa fa-caret-left"></i> Back</h5>
                </a>
            </div>

            <hr />
            <h1><?php echo $course->name ?></h1>
            <p><?php echo $course->description ?></p>
        </div>
        <div class="col-12 col-lg-4 px-5">
            <?php if ($trainer = $course->trainer()) { ?>
                <h3 class="text-center">Trainer</h3>
                <div class="card text-center mb-4 border-0">
                    <div class="card-body pb-5">
                        <img src="<?php echo \App\Core\Application::assets($trainer->imagePath) ?>" class="img-fluid rounded-circle mx-auto profile-image" alt="...">
                        <h3 class="pt-3"><?php echo $trainer->name() ?></h3>
                        <p><?php echo $trainer->shortDescription ?></p>
                        <a type="button" class="btn btn-dark" href="<?php echo \App\Core\Application::appUrl("profile/$trainer->id") ?>">See Profile</a>
                    </div>
                </div>
                <hr />
            <?php } ?>

            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <h3>Duration</h3>
                    <ul>
                        <li><?php echo $course->duration ?> hours</li>
                    </ul>
                </li>
                <li class="list-group-item">
                    <h3>Schedule</h3>
                    <ul>
                        <li>Mon: 09:00 - 11:00</li>
                        <li>Tue: 09:00 - 11:00</li>
                        <li>Wed: 09:00 - 11:00</li>
                    </ul>
                </li>
                <li class="list-group-item">
                    <h3>Locations</h3>
                    <ul>
                        <?php foreach ($courseLocations as $location) { ?>
                            <li>
                                <a href="#" class="text-decoration-none text-dark">
                                    <?php echo $location->name ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
            <hr>
            <div class="text-center">
                <button type="button" class="btn btn-dark">Join Now</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="requestToJoin" tabindex="-1" aria-labelledby="requestToJoinLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="requestToJoinLabel">Request to Join this class</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

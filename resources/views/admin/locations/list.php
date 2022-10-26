<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Locations</h1>
</div>

<?php if (\App\Core\Application::session()->getFlash('error')) { ?>
    <div class="alert alert-danger" role="alert" id="myAlert">
        <?php echo \App\Core\Application::session()->getFlash('error') ?>
    </div>
<?php } ?>

<?php if (\App\Core\Application::session()->getFlash('success')) { ?>
    <div class="alert alert-success" role="alert" id="myAlert">
        <?php echo \App\Core\Application::session()->getFlash('success') ?>
    </div>
<?php } ?>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($locations as $key => $course) { ?>
                <tr>
                    <td class="text-center">#<?php echo $course->id ?></td>
                    <td><?php echo $course->name ?></td>
                    <td><?php echo $course->address ?></td>
                    <td><?php echo $course->phoneContact ?></td>
                    <td><?php echo $course->emailContact ?></td>

                    <td class="text-center">
                        <div class="btn-group">
                            <a class="btn btn-sm" href="<?php echo \App\Core\Application::appUrl("admin/courses/$course->id/edit") ?>">
                                <i class="fa fa-edit"></i>
                            </a>

                            <a href="#" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#confirmModal<?php echo $course->id ?>">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="confirmModal<?php echo $course->id ?>" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="confirmModalLabel">Confirm Delete</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete this course?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="<?php echo \App\Core\Application::appUrl("admin/courses/$course->id/delete") ?>" method="POST">
                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(() => {
            const alert = bootstrap.Alert.getOrCreateInstance('#myAlert')
            alert.close()
        }, 3000);
    });
</script>

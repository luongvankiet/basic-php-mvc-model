<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Users</h1>
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
                <th scope="col" style="width: 100px"></th>
                <th scope="col" class="text-center">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Position</th>
                <th scope="col">Role</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $key => $user) { ?>
                <tr>
                    <td>
                        <?php if ($user->imagePath) { ?>
                            <img class="rounded-circle img-fluid" src="<?php echo \App\Core\Application::assets($user->imagePath) ?>" alt="" style="width: 70px; height:70px; object-fit:cover">

                        <?php } ?>
                    </td>
                    <td class="text-center">#<?php echo $user->id ?></td>
                    <td><?php echo $user->firstName ?></td>
                    <td><?php echo $user->lastName ?></td>
                    <td><?php echo $user->email ?></td>
                    <td><?php echo $user->phone ?></td>
                    <td><?php echo $user->position ?></td>
                    <td><?php echo $user->role ?></td>

                    <td class="text-center">
                        <div class="btn-group">
                            <a class="btn btn-sm" href="<?php echo \App\Core\Application::appUrl("admin/courses/$user->id/edit") ?>">
                                <i class="fa fa-edit"></i>
                            </a>

                            <a href="#" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#confirmModal<?php echo $user->id ?>">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="confirmModal<?php echo $user->id ?>" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
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
                                <form action="<?php echo \App\Core\Application::appUrl("admin/courses/$user->id/delete") ?>" method="POST">
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

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Course ~ <?php echo $course->name ?></h1>
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

<form action="#" method="POST">
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input id="name" class="form-control <?php echo isset($data) ? ($data->hasError('name') ? 'is-invalid' : '') : '' ?>" type="text" name="name" value="<?php echo $course->name ?>" placeholder="Name">
                <?php if (isset($data) && $data->hasError('name')) { ?>
                    <div class="invalid-feedback"><?php echo $data->getFirstError('name') ?></div>
                <?php } ?>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category_id" id="category" class="form-control <?php echo isset($data) ? ($data->hasError('category') ? 'is-invalid' : '') : '' ?>" value="<?php echo $course->categoryId ?>">

                </select>

                <?php if (isset($data) && $data->hasError('category')) { ?>
                    <div class="invalid-feedback"><?php echo $data->getFirstError('category') ?></div>
                <?php } ?>
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">Duration</label>
                <input id="duration" class="form-control <?php echo isset($data) ? ($data->hasError('duration') ? 'is-invalid' : '') : '' ?>" type="number" name="duration" value="<?php echo $course->duration ?>" placeholder="Duration" min=0>
                <?php if (isset($data) && $data->hasError('duration')) { ?>
                    <div class="invalid-feedback"><?php echo $data->getFirstError('duration') ?></div>
                <?php } ?>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" class="form-control <?php echo isset($data) ? ($data->hasError('description') ? 'is-invalid' : '') : '' ?>" name="description" placeholder="Description" rows="10">
                            <?php echo $course->description ?>
                        </textarea>
            </div>
        </div>
        <div class="col-12 col-md-4">

        </div>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(() => {
            const alert = bootstrap.Alert.getOrCreateInstance('#myAlert')
            alert.close()
        }, 3000);
    });
</script>

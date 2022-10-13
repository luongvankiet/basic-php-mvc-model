<div class="container d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="card bg-white p-3">
            <div class="card-body" style="width: 300px; min-height: 300px">
                <form action="<?php echo \App\Core\Application::appUrl() ?>/auth/register" method="post">
                    <h2 class="text-center w-100 mb-2">
                        Sign up
                    </h2>

                    <!-- alert -->
                    <?php if (\App\Core\Session::getFlash('success')) { ?>
                        <div class="alert alert-success mb-2">
                            <?php echo \App\Core\Session::getFlash('success') ?>
                        </div>
                    <?php } ?>

                    <!-- alert -->
                    <?php if (\App\Core\Session::getFlash('error')) { ?>
                        <div class="alert alert-danger mb-2">
                            <?php echo \App\Core\Session::getFlash('error') ?>
                        </div>
                    <?php } ?>

                    <div class="mb-3">
                        <input class="form-control <?php echo isset($data) ? ($data->hasError('first_name') ? 'is-invalid' : '') : '' ?>" type="text" name="first_name" value="<?php echo isset($data) ? $data->firstName : '' ?>" placeholder="First Name">
                        <?php if (isset($data) && $data->hasError('first_name')) { ?>
                            <div class="invalid-feedback"><?php echo $data->getFirstError('first_name') ?></div>
                        <?php } ?>
                    </div>

                    <div class="mb-3">
                        <input class="form-control <?php echo isset($data) ? ($data->hasError('last_name') ? 'is-invalid' : '') : '' ?>" type="text" name="last_name" value="<?php echo isset($data) ? $data->lastName : '' ?>" placeholder="Last Name">
                        <?php if (isset($data) && $data->hasError('last_name')) { ?>
                            <div class="invalid-feedback"><?php echo $data->getFirstError('last_name') ?></div>
                        <?php } ?>
                    </div>

                    <div class="mb-3">
                        <input class="form-control <?php echo isset($data) ? ($data->hasError('email') ? 'is-invalid' : '') : '' ?>" type="text" name="email" value="<?php echo isset($data) ? $data->email : '' ?>" placeholder="Email">
                        <?php if (isset($data) && $data->hasError('email')) { ?>
                            <div class="invalid-feedback"><?php echo $data->getFirstError('email') ?></div>
                        <?php } ?>
                    </div>

                    <div class="mb-3">
                        <input class="form-control <?php echo isset($data) ? ($data->hasError('password') ? 'is-invalid' : '') : '' ?>" type="password" name="password" value="<?php echo isset($data) ? $data->password : '' ?>" placeholder="Password">
                        <?php if (isset($data) && $data->hasError('password')) { ?>
                            <div class="invalid-feedback"><?php echo $data->getFirstError('password') ?></div>
                        <?php } ?>
                    </div>

                    <div class="mb-3">
                        <input class="form-control <?php echo isset($data) ? ($data->hasError('password_confirmation') ? 'is-invalid' : '') : '' ?>" type="password" name="password_confirmation" value="<?php echo isset($data) ? $data->passwordConfirmation : '' ?>" placeholder="Confirm Password">
                        <?php if (isset($data) && $data->hasError('password_confirmation')) { ?>
                            <div class="invalid-feedback"><?php echo $data->getFirstError('password_confirmation') ?></div>
                        <?php } ?>
                    </div>

                    <div class="mb-3">
                        <button class="w-100 btn btn-danger">Register</button>
                    </div>

                    <div class="text-center">
                        <span>
                            Already have an account?
                        </span>

                        <a href="<?php echo \App\Core\Application::appUrl() ?>/auth/login" class="text-danger">
                            Login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

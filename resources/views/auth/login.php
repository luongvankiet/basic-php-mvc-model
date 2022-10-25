<div class="container d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="card bg-white p-3">
            <div class="card-body" style="width: 300px; min-height: 300px">
                <form action="<?php echo \App\Core\Application::appUrl('/auth/login') ?>" method="post">
                    <h2 class="text-center w-100 mb-4">
                        Login
                    </h2>

                    <!-- alert -->
                    <?php if (\App\Core\Session::getFlash('error')) { ?>
                        <div class="alert alert-danger mb-2">
                            <?php echo \App\Core\Session::getFlash('error') ?>
                        </div>
                    <?php } ?>

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

                    <div class="mb-2">
                        <button class="w-100 btn btn-danger">Login</button>
                    </div>

                    <div class="text-center">
                        <span class="font-sm">
                            Don’t have an account?
                        </span>

                        <a href="<?php echo \App\Core\Application::appUrl('/auth/register') ?>" class="text-danger">
                            Register
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

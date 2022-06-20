<?php echo view('templates/header'); ?>
<div class="container mx-0 px-0">
    <div class="row w-100 h-75 position-absolute align-items-center justify-content-center">
        <div class="col col-lg-4 ms-4">
            <form action="<?php echo base_url(); ?>/register" method="post">
                <h1 class="h3 mb-3 fw-normal">Registration</h1>


                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingName" name="name"
                        value="<?= set_value('name') ?>" placeholder="Your name">
                    <label for="floatingName">Name</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingEmail" name="email"
                        value="<?= set_value('email') ?>" placeholder="name@example.com">
                    <label for="floatingEmail">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" name="password"
                        placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingConfirmPassword" name="confirmpassword"
                        placeholder="Confirm Password">
                    <label for="floatingConfirmPassword">Confirm Password</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
            </form>
        </div>
    </div>
</div>

<!-- Error messages for validation -->
<?php if(isset($validation)):?>
<div aria-live="polite" aria-atomic="true" class="position-relative" data-bs-autohide="false">
    <div class="toast-container top-0 end-0 p-3">
        <div class="toast bg-warning" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
            <div class="toast-header">
                <strong class="me-auto">Error</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?= $validation->listErrors() ?>
            </div>
        </div>
    </div>
</div>
<?php endif;?>
<?php echo view('templates/footer'); ?>
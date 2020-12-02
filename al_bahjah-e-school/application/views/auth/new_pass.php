<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center" style="margin-top: 10vh;">
        <div class="col-lg-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="POST" action="<?= base_url('auth/new_pass'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" value="<?= $email; ?>" readonly />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="new_password1" name="new_password1" placeholder="New Password" />
                                        <?= form_error('new_password1', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="new_password2" name="new_password2" placeholder="Confirm New Password" />
                                    </div>
                                    <button type="submit" class="btn btn-success btn-user btn-block">
                                        Reset Password
                                    </button>
                                </form>
                                <hr />
                                <div class="text-center">
                                    <a href="<?= base_url('auth'); ?>" class="small">Back to login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
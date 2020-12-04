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
                                    <h1 class="h4 text-gray-900 mb-4">Forgot Your Password?</h1>
                                </div>
                                <form class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Alamat Email">
                                    </div>
                                    <button type="submit" class="btn btn-success btn-user btn-block">
                                        Reset Password
                                    </button>
                                </form>
                                <hr />
                                <div class="text-center">
                                    <a href="<?=base_url()?>index.php/Auth/santri_login" class="btn btn-link c-s login">Login</a>
                                </div>
                                <div class="text-center">
                                    <a href="<?=base_url()?>index.php/Auth" class="btn btn-link c-s login">Cek Kelulusan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
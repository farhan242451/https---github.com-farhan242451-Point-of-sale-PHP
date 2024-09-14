<link rel="stylesheet" href="<?= BASEURL; ?>/css/gantikey.css">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Flash Messages -->
            <?php Flasher::flash(); ?>

            <div class="card animate__animated animate__fadeIn">
                <div class="card-header text-center">
                    <h4><i class="fas fa-lock"></i> Ganti Password</h4>
                </div>
                <div class="card-body">
                    <form action="<?= BASEURL; ?>/gantikey/gantipassword" method="post">
                        <div class="form-group">
                            <label for="current_password">Password Lama</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" required>
                            <i class="fas fa-lock fa-lg"></i>
                        </div>

                        <div class="form-group">
                            <label for="new_password">Password Baru</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                            <i class="fas fa-lock fa-lg"></i>
                        </div>

                        <div class="form-group">
                            <label for="confirm_password">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                            <i class="fas fa-lock fa-lg"></i>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block animate__animated animate__pulse">Ganti Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
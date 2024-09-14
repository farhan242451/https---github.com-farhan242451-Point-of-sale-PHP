<link rel="stylesheet" href="<?= BASEURL; ?>/css/profile.css">

<div class="container mt-5">
    <?php Flasher::flash(); ?>
    <div class="row">


        <!-- Foto Pengguna -->
        <div class="col-md-6 mb-4">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">
                    <h5 class="mt-2"><i class="fa fa-user"></i> Foto Pengguna </h5>
                </div>
                <div class="card-body text-center">
                    <?php if (isset($data['user']['foto']) && !empty($data['user']['foto'])): ?>
                        <img src="data:image/jpeg;base64,<?= base64_encode ( $data['user']['foto']); ?>" alt="Profile Photo" class="img-fluid mb-3 profile-photo">
                    <?php else: ?>
                        <p class="text-muted">No photo available.</p>
                    <?php endif; ?>
                </div>
                <div class="card-footer">
                    <form method="POST" action="<?= BASEURL; ?>/user/updateFoto" enctype="multipart/form-data">
                        <input type="hidden" name="id_user" value="<?= htmlspecialchars($data['user']['id_user'] ?? ''); ?>">
                        <div class="form-group">
                            <input type="file" accept="image/*" name="foto" class="form-control-file mb-2" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-upload mr-1"></i> Ganti Foto
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Formulir Profil Pengguna -->
        <div class="col-md-6">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">
                    <h5 class="mt-2"><i class="fa fa-user"></i> Kelola Pengguna </h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="<?= BASEURL; ?>/user/UbahData">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" value="<?= htmlspecialchars($data['user']['username'] ?? ''); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="text" class="form-control" name="role" value="<?= htmlspecialchars($data['user']['role'] ?? ''); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK (KTP)</label>
                            <input type="text" class="form-control" name="nik" value="<?= htmlspecialchars($data['user']['nik'] ?? ''); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" rows="3" class="form-control" required><?= htmlspecialchars($data['user']['alamat'] ?? ''); ?></textarea>
                        </div>
                        <input type="hidden" name="id_user" value="<?= htmlspecialchars($data['user']['id_user'] ?? ''); ?>">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-save"></i> Ubah Profil
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
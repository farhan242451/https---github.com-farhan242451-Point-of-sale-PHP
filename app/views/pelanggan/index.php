    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h1 class="display-4"><i class="fas fa-users"></i> Data Pelanggan</h1>
                <p class="lead text-muted">Daftar pelanggan yang terdaftar dalam sistem kami</p>
                <hr class="my-4">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-info text-white">
                        <input type="hidden" name="id_user" id="id_user">
                        <h5 class="mb-0"><i class="fas fa-list"></i> Daftar Pelanggan</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Pelanggan</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Nomor Telepon</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($data['pelanggan'] as $pelanggan) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= $pelanggan['nama_pelanggan']; ?></td>
                                            <td><?= $pelanggan['alamat']; ?></td>
                                            <td><?= $pelanggan['nomor_telepon']; ?></td>
                                            <td class="text-center">
                                                <a href="<?= BASEURL; ?>/pelanggan/hapus/<?= $pelanggan['id_pelanggan']; ?>"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?');">
                                                    <i class="fas fa-trash-alt"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-muted text-right">
                        <i class="fas fa-users"></i> Total Pelanggan: <?= $data['pelanggantotal']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
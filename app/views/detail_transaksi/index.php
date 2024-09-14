<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="display-4"><i class="fas fa-info-circle"></i> Detail Transaksi</h1>
            <p class="lead text-muted"><?= $data['judul']; ?></p>
            <hr class="my-4">
        </div>
    </div>
    <div class="card shadow-sm border-light">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0"><i class="fas fa-list"></i> Daftar Detail Transaksi</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($data['detail_transaksi'] as $detail) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= htmlspecialchars($detail['nama_produk']); ?></td>
                                <td><?= htmlspecialchars($detail['jumlah']); ?></td>
                                <td>Rp <?= number_format(htmlspecialchars($detail['subtotal']), 0, ',', '.'); ?></td>
                                <td>
                                <a href="<?= BASEURL; ?>/detail_transaksi/hapus/<?= htmlspecialchars($detail['id_detail_transaksi']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">
                                <i class="fas fa-trash"></i> Hapus
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
            <a href="<?= BASEURL; ?>/transaksi" class="btn btn-primary mt-3">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>
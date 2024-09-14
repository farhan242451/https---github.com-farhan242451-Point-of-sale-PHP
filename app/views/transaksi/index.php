<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="display-4"><i class="fas fa-receipt"></i> Data Transaksi</h1>
            <p class="lead text-muted">Daftar transaksi yang tersedia dalam sistem kami</p>
            <hr class="my-4">
        </div>
    </div>
    <?php Flasher::flash(); ?>
    <button type="button" class="btn btn-primary mb-3 tombolTambahTransaksi" data-toggle="modal" data-target="#formModal">
        <i class="fas fa-plus"></i> Tambah Data Transaksi
    </button>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm border-light">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0"><i class="fas fa-list"></i> Daftar Transaksi</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">ID Pelanggan</th>
                                    <th scope="col">Tanggal Transaksi</th>
                                    <th scope="col">Total Harga</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = $data['startNumber'];
                                ?>
                                <?php foreach ($data['transaksi'] as $transaksi) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= htmlspecialchars($transaksi['id_pelanggan']); ?></td>
                                        <td><?= htmlspecialchars($transaksi['tanggal_transaksi']); ?></td>
                                        <td>Rp <?= number_format(htmlspecialchars($transaksi['total_harga']), 0, ',', '.'); ?></td>
                                        <td class="text-center">
                                            <a href="<?= BASEURL; ?>/transaksi/ubah/<?= $transaksi['id_transaksi']; ?>"
                                                class="btn btn-success btn-sm text-white tombolUbahTransaksi  "
                                                data-toggle="modal" data-target="#formModal"
                                                data-id="<?= $transaksi['id_transaksi']; ?>">
                                                <i class="fas fa-edit"></i> Ubah
                                            </a>
                                            <a href="<?= BASEURL; ?>/transaksi/hapus/<?= $transaksi['id_transaksi']; ?>"
                                                class="btn btn-danger btn-sm text-white"
                                                onclick="return confirm('Yakin?');">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </a>
                                            <a href="<?= BASEURL; ?>/detailTransaksi/index/<?= $transaksi['id_transaksi']; ?>"
                                                class="btn btn-primary btn-sm text-white">
                                                <i class="fas fa-info-circle"></i> Detail
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <!-- Pagination controls -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <?php if ($data['currentPage'] > 1): ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?= BASEURL; ?>/transaksi/index/<?= $data['currentPage'] - 1; ?>" aria-label="Previous" style="border-radius: 0.25rem;">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $data['totalPages']; $i++): ?>
                                <li class="page-item <?= ($i == $data['currentPage']) ? 'active' : ''; ?>">
                                    <a class="page-link" href="<?= BASEURL; ?>/transaksi/index/<?= $i; ?>" style="border-radius: 0.25rem;"><?= $i; ?></a>
                                </li>
                            <?php endfor; ?>

                            <?php if ($data['currentPage'] < $data['totalPages']): ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?= BASEURL; ?>/transaksi/index/<?= $data['currentPage'] + 1; ?>" aria-label="Next" style="border-radius: 0.25rem;">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
                <div class="card-footer text-muted text-right">
                    <i class="fas fa-receipt"></i> Total Transaksi: <?= $data['totalInvoices']; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah/Ubah Data Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/transaksi/tambah" method="post">
                    <input type="hidden" name="id_transaksi" id="id_transaksi">
                    <input type="hidden" name="id_pelanggan" id="id_pelanggan">
                    <div class="form-group">
                        <label for="tanggal_transaksi">Tanggal Transaksi</label>
                        <input type="datetime-local" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi" required>
                    </div>
                    <div class="form-group">
                        <label for="total_harga">Total Harga</label>
                        <input type="number" class="form-control" id="total_harga" name="total_harga" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
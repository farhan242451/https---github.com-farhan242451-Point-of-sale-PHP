<div class="container mt-5" style="max-width: 1200px;">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="display-4" style="font-size: 2.5rem; color: #007bff;"><i class="fas fa-receipt"></i> Data Transaksi</h1>
            <p class="lead text-muted" style="font-size: 1.25rem;">Daftar transaksi yang tersedia dalam sistem kami</p>
            <hr class="my-4" style="border-top: 2px solid #007bff;">
        </div>
    </div>
    <?php Flasher::flash(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm border-light" style="border-radius: 0.5rem;">
                <div class="card-header bg-info text-white" style="border-radius: 0.5rem 0.5rem 0 0;">
                    <h5 class="mb-0"><i class="fas fa-list"></i> Daftar Transaksi</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive" style="border-radius: 0 0 0.5rem 0.5rem; overflow-x: auto;">
                        <table class="table table-striped table-hover mb-0">
                            <thead class="thead-light" style="background-color: #f8f9fa;">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">ID Pelanggan</th>
                                    <th scope="col">Tanggal Transaksi</th>
                                    <th scope="col">Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = $data['startNumber'];
                                ?>

                                <?php foreach ($data['transaksi'] as $transaksi) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= htmlspecialchars($transaksi['id_transaksi']); ?></td>
                                        <td><?= htmlspecialchars($transaksi['tanggal_transaksi']); ?></td>
                                        <td>Rp <?= number_format(htmlspecialchars($transaksi['total_harga']), 0, ',', '.'); ?></td>
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
                                    <a class="page-link" href="<?= BASEURL; ?>/kasirtransaksi/index/<?= $data['currentPage'] - 1; ?>" aria-label="Previous" style="border-radius: 0.25rem;">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $data['totalPages']; $i++): ?>
                                <li class="page-item <?= ($i == $data['currentPage']) ? 'active' : ''; ?>">
                                    <a class="page-link" href="<?= BASEURL; ?>/kasirtransaksi/index/<?= $i; ?>" style="border-radius: 0.25rem;"><?= $i; ?></a>
                                </li>
                            <?php endfor; ?>

                            <?php if ($data['currentPage'] < $data['totalPages']): ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?= BASEURL; ?>/kasirtransaksi/index/<?= $data['currentPage'] + 1; ?>" aria-label="Next" style="border-radius: 0.25rem;">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
                <div class="card-footer text-muted text-right" style="background-color: #f8f9fa; border-radius: 0 0 0.5rem 0.5rem;">
                    <i class="fas fa-receipt"></i> Total Transaksi: <?= $data['totalInvoices']; ?>
                </div>
            </div>
        </div>
    </div>
</div>
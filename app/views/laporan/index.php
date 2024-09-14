<div class="container mt-5">
    <h2 class="text-center mb-4 animate__animated animate__fadeIn"><?= htmlspecialchars($data['title']); ?></h2>

    <form method="POST" class="mb-4 animate__animated animate__fadeIn animate__delay-1s">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Generate Report</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" id="start_date" name="start_date" class="form-control" value="<?= htmlspecialchars($data['start_date']); ?>" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" value="<?= htmlspecialchars($data['end_date']); ?>" required>
                    </div>
                    <div class="col-md-4 mb-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100 animate__animated animate__pulse animate__infinite">
                            <i class="fas fa-file-export"></i> Generate Report
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <?php if (!empty($data['report'])): ?>
        <div class="table-responsive animate__animated animate__fadeIn animate__delay-2s">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Tanggal Transaksi</th>
                        <th>Nama Pelanggan</th>
                        <th>Total Harga</th>
                        <th>Metode Pembayaran</th>
                        <th>Uang Customer</th>
                        <th>Uang Kembali</th>
                        <th>Total Items</th>
                        <th>Total Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['report'] as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id_transaksi']); ?></td>
                            <td><?= htmlspecialchars($row['tanggal_transaksi']); ?></td>
                            <td><?= htmlspecialchars($row['nama_pelanggan']); ?></td>
                            <td>Rp <?= number_format($row['total_harga'], 2, ',', '.'); ?></td>
                            <td><?= htmlspecialchars($row['payment_method']); ?></td>
                            <td>Rp <?= number_format($row['uang_customer'], 2, ',', '.'); ?></td>
                            <td>Rp <?= number_format($row['uang_kembali'], 2, ',', '.'); ?></td>
                            <td><?= htmlspecialchars($row['total_items']); ?></td>
                            <td>Rp <?= number_format($row['total_amount'], 2, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center animate__animated animate__fadeIn animate__delay-3s" role="alert">
            <i class="fas fa-info-circle"></i> No transactions found for the selected period.
        </div>
    <?php endif; ?>
</div>
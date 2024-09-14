<div class="container-fluid">
    <div class="row mt-4">
        <!-- Total Penjualan Card -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-primary text-white shadow-lg rounded-lg">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="card-title h6">Total Penjualan</div>
                            <h5><?= number_format($data['dailySales']['total'] ?? 0, 0, ',', '.'); ?></h5>
                        </div>
                        <i class="fas fa-cash-register fa-3x"></i>
                    </div>
                </div>
                <div class="card-footer text-center bg-light">
                    <a href="#" class="btn btn-light text-primary rounded-pill shadow-sm">
                        Detail <i class="fas fa-info-circle ml-2"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Total Produk Card -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-success text-white shadow-lg rounded-lg">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="card-title h6">Total Produk</div>
                            <h5><?= $data['totalProducts'] ?? 0; ?></h5>
                        </div>
                        <i class="fas fa-boxes fa-3x"></i>
                    </div>
                </div>
                <div class="card-footer text-center bg-light">
                    <a href="#" class="btn btn-light text-success rounded-pill shadow-sm">
                        Detail <i class="fas fa-info-circle ml-2"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Pelanggan Card -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-warning text-white shadow-lg rounded-lg">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="card-title h6">Pelanggan</div>
                            <h5><?= $data['totalPelanggan'] ?? 0; ?></h5>
                        </div>
                        <i class="fas fa-users fa-3x"></i>
                    </div>
                </div>
                <div class="card-footer text-center bg-light">
                    <a href="#" class="btn btn-light text-warning rounded-pill shadow-sm">
                        Detail <i class="fas fa-info-circle ml-2"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Transaksi Card -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-danger text-white shadow-lg rounded-lg">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="card-title h6">Transaksi</div>
                            <h5><?= $data['totalTransaksi'] ?? 0;?></h5>
                        </div>
                        <i class="fas fa-receipt fa-3x"></i>
                    </div>
                </div>
                <div class="card-footer text-center bg-light">
                    <a href="<?= BASEURL ; ?>/kasirtransaksi" class="btn btn-light text-danger rounded-pill shadow-sm">
                        Detail <i class="fas fa-info-circle ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Grafik Penjualan -->
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                Grafik Penjualan Harian
            </div>
            <div class="card-body">
                <canvas id="dailySalesChart"></canvas>
            </div>
        </div>
    </div>
</div>


<input type="hidden" id="totalProducts" value="<?= $data['totalProducts']['total'] ?? 0 ?>">
<input type="hidden" id="dailySales" value="<?= $data['dailySales']['total'] ?? 0 ?>">
<input type="hidden" id="dailySales" value="<?= $data['totalPelanggan']['total'] ?? 0 ?>">
<input type="hidden" id="totalTransaksi" value="<?= $data['totalTransaksi']['total'] ?? 0 ?>">
<input type="hidden" id="dailySalesLabels" value='<?= json_encode(array_column($data['dailySalesData'], 'date')) ?>'>
<input type="hidden" id="dailySalesData" value='<?= json_encode(array_column($data['dailySalesData'], 'total')) ?>'>
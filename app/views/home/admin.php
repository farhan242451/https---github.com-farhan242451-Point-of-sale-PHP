<!-- app/views/home/index.php -->

<div class="container-fluid mt-4">
    <!-- Statistics Cards -->
    <div class="row">
        <!-- Daily Sales -->
        <div class="col-lg-3 mb-4">
            <div class="card bg-info text-white rounded-lg shadow">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-chart-line fa-2x mr-3"></i>
                    <div>
                        <h4 class="display-4 mb-0"><?= number_format($data['dailySales']['total'] ?? 0, 0, ',', '.'); ?></h4>
                        <div class="font-weight-bold">Penjualan Hari Ini</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Monthly Sales -->
        <div class="col-lg-3 mb-4">
            <div class="card bg-primary text-white rounded-lg shadow">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-calendar-alt fa-2x mr-3"></i>
                    <div>
                        <h4 class="display-4 mb-0"><?= number_format($data['monthlySales']['total'] ?? 0, 0, ',', '.'); ?></h4>
                        <div class="font-weight-bold">Penjualan Bulan Ini</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Yearly Sales -->
        <div class="col-lg-3 mb-4">
            <div class="card bg-warning text-dark rounded-lg shadow">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-calendar-check fa-2x mr-3"></i>
                    <div>
                        <h4 class="display-4 mb-0"><?= number_format($data['yearlySales']['total'] ?? 0, 0, ',', '.'); ?></h4>
                        <div class="font-weight-bold">Penjualan Tahun Ini</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Sales -->
        <div class="col-lg-3 mb-4">
            <div class="card bg-dark text-white rounded-lg shadow">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-calendar-check fa-2x mr-3"></i>
                    <div>
                        <h4 class="display-4 mb-0"><?= number_format($data['totalSales']['total'] ?? 0, 0, ',', '.'); ?></h4>
                        <div class="font-weight-bold">Total Seluruh Penjualan</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Categories -->
        <div class="col-lg-2 mb-3">
            <div class="card bg-success text-white rounded-lg shadow">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-tags fa-2x mr-3"></i>
                    <div>
                        <h4 class="display-4 mb-0"><?= $data['Totalkategori'] ?? 0; ?></h4>
                        <div class="font-weight-bold">Jumlah Kategori</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Products -->
        <div class="col-lg-2 mb-3">
            <div class="card bg-success text-white rounded-lg shadow">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-box fa-2x mr-3"></i>
                    <div>
                        <h4 class="display-4 mb-0"><?= $data['totalProducts'] ?? 0; ?></h4>
                        <div class="font-weight-bold">Jumlah Produk</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Admins -->
        <div class="col-lg-2 mb-3">
            <div class="card bg-success text-white rounded-lg shadow">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-cogs fa-2x mr-4"></i>
                    <div>
                        <h4 class="display-4 mb-0"><?= $data['totalAdmins'] ?? 0; ?></h4>
                        <div class="font-weight-bold">Jumlah Admin</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Cashiers -->
        <div class="col-lg-2 mb-3">
            <div class="card bg-success text-white rounded-lg shadow">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-receipt fa-2x mr-3"></i>
                    <div>
                        <h4 class="display-4 mb-0"><?= $data['totalkasir'] ?? 0; ?></h4>
                        <div class="font-weight-bold">Jumlah Kasir</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Invoices -->
        <div class="col-lg-2 mb-3">
            <div class="card bg-success text-white rounded-lg shadow">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-file-invoice fa-2x mr-3"></i>
                    <div>
                        <h4 class="display-4 mb-0"><?= $data['totalInvoices'] ?? 0; ?></h4>
                        <div class="font-weight-bold">Jumlah Invoice</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="row">
        <!-- Daily Sales Chart -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow rounded-lg">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-chart-area mr-2"></i>Penjualan Harian</h5>
                    <div class="chart-container">
                        <canvas id="dailySalesChart" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- Monthly Sales Chart -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow rounded-lg">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-chart-bar mr-2"></i>Penjualan Bulanan</h5>
                    <div class="chart-container">
                        <canvas id="monthlySalesChart" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden inputs for data -->
    <input type="hidden" id="dailySales" value="<?= $data['dailySales']['total'] ?? 0 ?>">
    <input type="hidden" id="monthlySales" value="<?= $data['monthlySales']['total'] ?? 0 ?>">
    <input type="hidden" id="yearlySales" value="<?= $data['yearlySales']['total'] ?? 0 ?>">
    <input type="hidden" id="totalProducts" value="<?= $data['totalProducts']['total'] ?? 0 ?>">

    <!-- Data for charts -->
    <input type="hidden" id="dailySalesLabels" value='<?= json_encode(array_column($data['dailySalesData'], 'date')) ?>'>
    <input type="hidden" id="dailySalesData" value='<?= json_encode(array_column($data['dailySalesData'], 'total')) ?>'>
    <input type="hidden" id="monthlySalesLabels" value='<?= json_encode(array_column($data['monthlySalesData'], 'month')) ?>'>
    <input type="hidden" id="monthlySalesData" value='<?= json_encode(array_column($data['monthlySalesData'], 'total')) ?>'>
</div>

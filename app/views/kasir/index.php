<div class="container-fluid mt-5">
    <div class="row">
        <!-- Product Section -->
        <div class="col-lg-7">
            <div class="card shadow mb-4 border-0 rounded-lg">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Daftar Produk</h3>
                    <div class="form-group mb-0 w-70">
                        <span class="text-white">Jam: <span id="currentTime"><?= $data['current_time']; ?></span></span>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row">
                        <?php foreach ($data['products'] as $product) : ?>
                            <div class="col-md-4 col-sm-6 mb-4">
                                <div class="card h-100 text-center border-0 shadow-sm rounded-lg">
                                    <img src="data:image/png;base64,<?= base64_encode($product['foto_produk']); ?>" alt="<?= $product['nama_produk']; ?>" class="card-img-top img-fluid rounded-top">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $product['nama_produk']; ?></h5>
                                        <p class="card-text text-primary font-weight-bold">Rp <?= number_format($product['harga'], 2); ?></p>
                                        <button class="btn btn-outline-primary btn-lg rounded-pill" onclick="addToCart('<?= $product['nama_produk']; ?>', <?= $product['harga']; ?>, <?= $product['id_produk']; ?>, 'data:image/png;base64,<?= base64_encode($product['foto_produk']); ?>')">
                                            <i class="fas fa-cart-plus"></i> Tambah
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="card-footer">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <?php if ($data['currentPage'] > 1): ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?= BASEURL; ?>/kasir/index/<?= $data['currentPage'] - 1; ?>" aria-label="Previous">
                                        <span aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $data['totalPages']; $i++): ?>
                                <li class="page-item <?= $data['currentPage'] == $i ? 'active' : ''; ?>">
                                    <a class="page-link" href="<?= BASEURL; ?>/kasir/index/<?= $i; ?>"><?= $i; ?></a>
                                </li>
                            <?php endfor; ?>

                            <?php if ($data['currentPage'] < $data['totalPages']): ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?= BASEURL; ?>/kasir/index/<?= $data['currentPage'] + 1; ?>" aria-label="Next">
                                        <span aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Cart and Transaction Section -->
        <div class="col-lg-5">
            <div class="card shadow mb-4 border-0 rounded-lg">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Cart</h3>
                    <button class="btn btn-outline-light btn-sm" id="clearCartBtn">Clear Cart</button>
                </div>
                <div class="card-body">
                    <table class="table table-hover text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="cartTableBody">
                            <!-- Cart items will be filled by JavaScript -->
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="font-weight-bold">Total: Rp <span id="totalPrice">0.00</span></span>
                    </div>
                </div>
            </div>

            <div class="card shadow border-0 rounded-lg">
                <div class="card-header bg-secondary text-white text-center">
                    <h3 class="mb-0">Form Transaksi</h3>
                </div>
                <div class="card-body">
                    <form id="transactionForm" action="<?= BASEURL; ?>/kasir/processTransaction" method="POST">
                        <div class="form-group">
                            <label for="customer_name">Nama Pelanggan</label>
                            <input type="text" class="form-control rounded-pill" id="customer_name" name="customer_name" placeholder="Nama pelanggan" required>
                        </div>

                        <div class="form-group">
                            <label for="payment_method">Metode Pembayaran</label>
                            <select class="form-control rounded-pill" id="payment_method" name="payment_method" required>
                                <option value="cash">Cash</option>
                                <option value="non-cash">Non-cash</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="uang_customer">Uang Pelanggan</label>
                            <input type="number" step="0.01" class="form-control rounded-pill" id="uang_customer" name="uang_customer" placeholder="Jumlah uang yang dibayarkan" required>
                        </div>

                        <input type="hidden" id="cartData" name="cart">
                        <input type="hidden" id="totalPriceInput" name="total_price">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>Uang Kembali: Rp <span id="changeAmount">0.00</span></span>
                        </div>
                        <button type="submit" class="btn btn-success btn-block btn-lg rounded-pill mt-4">
                            <i class="fas fa-receipt"></i> Proses Transaksi
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateTime() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        document.getElementById('currentTime').textContent = `${hours}:${minutes}:${seconds}`;
    }

    // Update the time every second
    setInterval(updateTime, 1000);

    // Initialize the time immediately
    updateTime();
</script>
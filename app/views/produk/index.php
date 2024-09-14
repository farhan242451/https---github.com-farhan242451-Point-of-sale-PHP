<div class="container mt-5">
    <h1 class="display-4 text-center mb-4"><?= htmlspecialchars($data['title']); ?></h1>
    <hr class="my-4">

    <!-- Flash Message -->
    <?php Flasher::flash(); ?>

    <!-- Add Product Button -->
    <div class="text-right mb-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
            <i class="fas fa-plus"></i> Tambah Produk
        </button>
    </div>

    <!-- Product Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Foto</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = $data['startNumber'];
                ?>
                <?php foreach ($data['produk'] as $produk) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= htmlspecialchars($produk['nama_produk']); ?></td>
                        <td>Rp <?= number_format($produk['harga'], 2, ',', '.'); ?></td>
                        <td><?= htmlspecialchars($produk['stok']); ?></td>
                        <td><?= htmlspecialchars($produk['nama_kategori']); ?></td>
                        <td>
                            <?php if ($produk['foto_produk']) : ?>
                                <img src="data:image/jpeg;base64,<?= base64_encode($produk['foto_produk']); ?>" alt="Foto Produk" class="img-fluid" style="max-width: 100px;">
                            <?php else: ?>
                                <img src="<?= BASEURL; ?>/img/default.jpg" alt="Foto Produk" class="img-fluid" style="max-width: 100px;">
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-success btn-sm tombolUbahData" data-id="<?= htmlspecialchars($produk['id_produk']); ?>" data-toggle="modal" data-target="#formModal">
                                <i class="fas fa-edit"></i> Ubah
                            </button>
                            <a href="<?= BASEURL; ?>/produk/hapus/<?= htmlspecialchars($produk['id_produk']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">
                                <i class="fas fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?php if ($data['currentPage'] > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="<?= BASEURL; ?>/produk/index/<?= $data['currentPage'] - 1; ?>" aria-label="Previous" style="border-radius: 0.25rem;">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $data['totalPages']; $i++): ?>
                <li class="page-item <?= ($i == $data['currentPage']) ? 'active' : ''; ?>">
                    <a class="page-link" href="<?= BASEURL; ?>/produk/index/<?= $i; ?>" style="border-radius: 0.25rem;"><?= $i; ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($data['currentPage'] < $data['totalPages']): ?>
                <li class="page-item">
                    <a class="page-link" href="<?= BASEURL; ?>/produk/index/<?= $data['currentPage'] + 1; ?>" aria-label="Next" style="border-radius: 0.25rem;">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>

<!-- Modal Form -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formProduk" action="<?= BASEURL; ?>/produk/tambah" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_produk" id="id_produk">
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" required>
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" required>
                    </div>
                    <div class="form-group">
                        <label for="id_kategori">Kategori</label>
                        <select class="form-control" id="id_kategori" name="id_kategori" required>
                            <?php foreach ($data['kategori'] as $kategori) : ?>
                                <option value="<?= htmlspecialchars($kategori['id_kategori']); ?>"><?= htmlspecialchars($kategori['nama_kategori']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto_produk">Foto Produk</label>
                        <input type="file" class="form-control" id="foto_produk" name="foto_produk">
                        <div class="mt-2">
                            <img id="previewFoto" src="#" alt="Preview Foto" class="img-fluid" style="max-width: 100px; display: none;">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" form="formProduk">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>
        </div>
    </div>
</div>
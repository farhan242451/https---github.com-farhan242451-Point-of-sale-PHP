<?php Flasher::flash(); ?>
<div class="container-fluid mt-3">
    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary mb-3 tombolTambahKategori" data-toggle="modal" data-target="#formModal">
                Tambah Data Kategori
            </button>
        </div>
    </div>
    <h1 class="mb-4">Daftar Kategori</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data['kategori'] as $kategori) : ?>a
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= htmlspecialchars($kategori['nama_kategori']); ?></td>
                        <td>
                            <a href="<?= BASEURL; ?>/kategori/ubah/<?= $kategori['id_kategori']; ?>" class="badge badge-success float-right ml-2  tombolUbahKategori" data-toggle="modal" data-target="#formModal" data-id="<?= $kategori['id_kategori']; ?>">Ubah</a>
                            <a href="<?= BASEURL; ?>/kategori/hapus/<?= $kategori['id_kategori']; ?>" class="badge badge-primary float-right ml-2" onclick="return confirm('yakin?');">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/kategori/tambah" method="post">
                    <input type="hidden" name="id_kategori" id="id_kategori">
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
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
<?php

class Produk extends Controller
{
    // Menampilkan halaman produk
    public function index($page = 1)
    {


        $limit = 5;
        $offset = ($page - 1) * $limit;

        $data['title'] = 'Data Produk';
        $data['produk'] = $this->model('Produk_model')->getProduksWithPagination($limit, $offset);
        $data['kategori'] = $this->model('Kategori_model')->getAllKategori();
        $data['totalProducts'] = $this->model('Produk_model')->getTotalProduk();


        $totalProduk = $this->model('Produk_model')->getTotalProduk();
        $data['totalPages'] = ceil($totalProduk / $limit);
        $data['currentPage'] = $page;

        $data['startNumber'] = ($page - 1) * $limit + 1;

        $this->view('template/header');
        $this->view('produk/index', $data);
        $this->view('template/footer');
    }

    // Menambahkan produk
    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Pastikan file foto_produk ada
            $foto_produk = isset($_FILES['foto_produk']['tmp_name']) ? file_get_contents($_FILES['foto_produk']['tmp_name']) : null;

            if ($this->model('Produk_model')->tambahProduk($_POST, $foto_produk)) {
                Flasher::setFlash('produk', 'berhasil', 'ditambahkan', 'success');
            } else {
                Flasher::setFlash('produk', 'gagal', 'ditambahkan', 'danger');
            }
            header('Location: ' . BASEURL . '/produk');
            exit;
        }
    }

    // Mengubah produk
    public function ubah()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Pastikan file foto_produk ada
            $foto_produk = isset($_FILES['foto_produk']['tmp_name']) ? file_get_contents($_FILES['foto_produk']['tmp_name']) : null;

            if ($this->model('Produk_model')->ubahProduk($_POST, $foto_produk)) {
                Flasher::setFlash('produk', 'berhasil', 'diubah', 'success');
            } else {
                Flasher::setFlash('produk', 'gagal', 'diubah', 'danger');
            }
            header('Location: ' . BASEURL . '/produk');
            exit;
        }
    }

    // Menghapus produk
    public function hapus($id)
    {
        if ($this->model('Produk_model')->hapusProduk($id)) {
            Flasher::setFlash('produk', 'berhasil', 'dihapus', 'success');
        } else {
            Flasher::setFlash('produk', 'gagal', 'dihapus', 'danger');
        }
        header('Location: ' . BASEURL . '/produk');
        exit;
    }

    public function getUbah()
    {
        if ($_POST) {
            $id_produk = $_POST['id_produk'];
            $produk = $this->model('Produk_model')->getProdukById($id_produk);

            // Encode foto_produk ke base64 jika ada
            if ($produk['foto_produk']) {
                $produk['foto_produk'] = base64_encode($produk['foto_produk']);
            }

            echo json_encode($produk);
        }
    }
}

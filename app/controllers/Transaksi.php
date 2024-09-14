<?php

class Transaksi extends Controller
{

    public function __construct()
    {
        $this->checkLogin(); // Memanggil fungsi checkLogin di konstruktor
    }

    private function checkLogin()
    {
        // Jika session 'user' tidak ada, arahkan ke halaman login
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

        public function index($page = 1)
        {
            $data['title'] = 'Transaksi';

            // Konfigurasi pagination
            $limit = 5; // Jumlah produk per halaman
            $offset = ($page - 1) * $limit;

            // Dapatkan produk dengan pagination
            $data['transaksi'] = $this->model('Transaksi_model')->getTransaksisWithPagination($limit, $offset);
            $data['totalInvoices'] = $this->model('Transaksi_model')->getTotalTransaksi();
            
            // Dapatkan total produk untuk menghitung total halaman
            $totalTransaksi = $this->model('Transaksi_model')->getTotalTransaksi();
            $data['totalPages'] = ceil($totalTransaksi / $limit);
            $data['currentPage'] = $page;
            $data['startNumber'] = ($page - 1) * $limit + 1;

            // Tampilkan view
            $this->view('template/header', $data);
            $this->view('transaksi/index', $data);
            $this->view('template/footer');
        }

    

    public function getUbah()
    {
        $id_transaksi = $_POST['id_transaksi'];
        $data['transaksi'] = $this->model('Transaksi_model')->getTransaksiById($id_transaksi);

        echo json_encode($data['transaksi']);
    }

    public function ubah()
    {
        if ($this->model('Transaksi_model')->ubahDataTransaksi($_POST) > 0) {
            Flasher::setFlash('transaksi', 'berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/transaksi');
            exit;
        } else {
            Flasher::setFlash('transaksi', 'gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/transaksi');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Transaksi_model')->hapusDataTransaksi($id) > 0) {
            Flasher::setFlash('transaksi', 'berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/transaksi');
            exit;
        } else {
            Flasher::setFlash('transaksi', 'gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/transaksi');
            exit;
        }
    }
}

<?php

class DetailTransaksi extends Controller
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
    public function index($id_transaksi)
    {
        $data['judul'] = 'Detail Transaksi';
        $data['detail_transaksi'] = $this->model('DetailTransaksi_model')->getDetailTransaksiByTransaksiId($id_transaksi);
        
        $this->view('template/header', $data);
        $this->view('detail_transaksi/index', $data);
        $this->view('template/footer');
    }


    public function hapus($id)
    {
        if( $this->model('DetailTransaksi_model')->hapusDataDetail($id) > 0 ) {
            Flasher::setFlash('DetailTransaksi','berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/detail_transaksi');
            exit;
        } else {
            Flasher::setFlash('DetailTransaksi','gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/detail_transaksi');
            exit;
        }
    }


    
}

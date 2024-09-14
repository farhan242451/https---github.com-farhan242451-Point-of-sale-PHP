<?php

class Pelanggan extends Controller 
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



public function index()
    {
        $data['judul'] = 'Pelanggan';
        $data['pelanggan'] = $this->model('Pelanggan_model')->getAllPelanggan();
        $data['pelanggantotal'] = $this->model('Pelanggan_model')->getPelanggan();
        $this->view('template/header', $data);
        $this->view('pelanggan/index',$data);
        $this->view('template/footer');
    }



    public function ubah()
    {
        if ($this->model('Pelanggan_model')->ubahDatapelanggan($_POST) > 0) {
            Flasher::setFlash('pelanggan','berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/pelanggan');
            exit;
        } else {
            Flasher::setFlash('pelanggan','gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/pelanggan');
            exit;
        }
    }

    public function hapus($id)
    {
        if( $this->model('pelanggan_model')->hapusDatapelanggan($id) > 0 ) {
            Flasher::setFlash('pelanggan','berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pelanggan');
            exit;
        } else {
            Flasher::setFlash('pelanggan','gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pelanggan');
            exit;
        }
    }




}
<?php

class Kategori extends Controller 
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
        $data['judul'] = 'kategori';
        $data['kategori'] = $this->model('Kategori_model')->getAllKategori();
        $this->view('template/header', $data);
        $this->view('Kategori/index',$data);
        $this->view('template/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Kategori';

        if ($this->model('Kategori_model')->tambahDatakategori($_POST) > 0) {
            Flasher::setFlash('kategori','berhasil', 'ditambahkan', 'success');
            header('Location:' . BASEURL . '/kategori');
            exit;
        } else {
            Flasher::setFlash('kategori','gagal', 'ditambahkan', 'danger');
            header('Location:' . BASEURL . '/kategori/tambah');
            exit;
        }
    }

    public function getUbah($id_kategori)
    {
        $id_kategori = $_POST['id_kategori'];
        $data['kategori'] = $this->model('Kategori_model')->getkategoriById($id_kategori);
        echo json_encode($data['kategori']);
    }

    public function ubah()
    {
        if ($this->model('Kategori_model')->ubahDatakategori($_POST) > 0) {
            Flasher::setFlash('kategori','berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/kategori');
            exit;
        } else {
            Flasher::setFlash('kategori','gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/kategori');
            exit;
        }
    }

    public function hapus($id)
    {
        if( $this->model('Kategori_model')->hapusDataKategori($id) > 0 ) {
            Flasher::setFlash('kategori','berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/kategori');
            exit;
        } else {
            Flasher::setFlash('kategori','gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/kategori');
            exit;
        }
    }

}

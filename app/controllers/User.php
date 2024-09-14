<?php
class User extends Controller
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

        $id = $_SESSION['user']['id_user'];
        $data['username'] = $_SESSION['username'];
        $data['title'] = 'Profil Pengguna';
        $data['user'] = $this->model('User_model')->getUserById($id);

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer');

    }


    public function UbahData()
    {
        if ($this->model('User_model')->ubahDataUsers($_POST) > 0) {
            Flasher::setFlash('profile', 'berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            Flasher::setFlash('profile', 'gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/user');
            exit;
        }


    }

    public function updateFoto()
    {
        $id_user = $_POST['id_user'];
    
        // Cek apakah ada file foto yang diunggah
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            // Baca file foto sebagai binary
            $foto = file_get_contents($_FILES['foto']['tmp_name']);
    
            // Persiapkan data untuk dikirim ke model
            $data = [
                'id_user' => $id_user,
                'foto' => $foto
            ];


    
            // Panggil model untuk memperbarui foto
            if ($this->model('User_model')->updateFoto($data) > 0) {
                Flasher::setFlash('Foto', 'berhasil', 'diubah', 'success');
            } else {
                Flasher::setFlash('Foto', 'gagal', 'diubah', 'danger');
            }
        } else {
            Flasher::setFlash('Foto', 'tidak valid', 'gagal diupload', 'danger');
        }
    
        // Redirect ke halaman profile setelah selesai
        header('Location: ' . BASEURL . '/user');
        exit;
    }
    




}


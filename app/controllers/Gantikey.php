<?php

class Gantikey extends Controller
{

    public function index()
    {

        $userId = $_SESSION['user']['id_user'];
        $data['user'] = $this->model('User_model')->getUserById($userId);
        $data['username'] = $_SESSION['username'];

        $data["judul"] = 'Ganti Password';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view("gantikey/index", $data);
        $this->view('templates/footer');
    }


    public function gantipassword()
    {

        // Check if new password and confirm password match
        if ($_POST['new_password'] !== $_POST['confirm_password']) {
            Flasher::setFlash('Password', ' tidak', ' cocok', 'danger');
        } else {
            // Get user ID from session and fetch user details
            $id = $_SESSION['user']['id_user'];
            $user = $this->model('Gantikey_model')->getUserById($id);

            // Verify current password and update with new one if valid
            if (password_verify($_POST['current_password'], $user['password'])) {
                $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

                if ($this->model('Gantikey_model')->updatePassword($id, $new_password)) {
                    Flasher::setFlash('Password', 'berhasil', ' diubah', 'success');
                } else {
                    Flasher::setFlash('password', 'Gagal ', 'mengubah password', 'danger');
                }
            } else {
                Flasher::setFlash('Password', ' lama', ' salah', 'danger');
            }
        }

        // Redirect to the password change page
        header('Location: ' . BASEURL . '/gantikey');
        exit;
    }
}

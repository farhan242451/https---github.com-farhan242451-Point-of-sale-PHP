<?php

class Register extends Controller
{
    public function index()
    {
        // Show the registration form
        $this->view('register/index');

    }

    public function registerUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Capture data from form
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $role = $_POST['role']; // 'admin' or 'kasir'

            // Basic validation
            if ($password !== $confirm_password) {
                Flasher::setFlash('Registrasi', 'gagal', 'Password dan konfirmasi password tidak cocok', 'danger');
                header('Location: ' . BASEURL . '/register');
                exit;
            }

            // Hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Save to database
            $registerModel = $this->model('Register_model');
            $registerModel->register($username, $hashedPassword, $role);

            // Redirect to login page
            Flasher::setFlash('Registrasi', 'Berhasil', 'Registrasi berhasil', 'success');
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }
}
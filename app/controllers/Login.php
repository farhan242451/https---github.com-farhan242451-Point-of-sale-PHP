<?php

class Login extends Controller
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Validate input
            if (empty($username) || empty($password)) {
                $data['error'] = 'Username and Password are required';
            } else {
                $user = $this->model('Login_model')->login($username, $password);

                if ($user) {
                    $_SESSION['user'] = $user;
                    $_SESSION['username'] = $user['username'];

                    // Redirect based on user role
                    if ($user['role'] === 'admin') {
                        header('Location: ' . BASEURL . '/home/admin');
                    } elseif ($user['role'] === 'kasir') {
                        header('Location: ' . BASEURL . '/home/kasir');
                    }
                    exit;
                } else {
                    $data['error'] = 'Invalid Username or Password';
                }
            }
        }

        // Show the login form
        $this->view('login/index', $data ?? []);
    }

    

    public function logout()
    {
        session_start();
        unset($_SESSION['user']);
        session_destroy();
        header('Location: ' . BASEURL . '/login');
        exit;
    }
}

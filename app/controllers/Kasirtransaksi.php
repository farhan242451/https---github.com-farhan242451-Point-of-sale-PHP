<?php

class Kasirtransaksi extends Controller
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
    $data['title'] = 'TransaksiDetail';

    // Konfigurasi pagination
    $limit = 5; // Jumlah transaksi per halaman
    $offset = ($page - 1) * $limit;

    // Update current page and starting number
    $data['currentPage'] = $page;

    // Get user info
    $data['username'] = $_SESSION['username'];
    $userId = $_SESSION['user']['id_user'];
    $data['user'] = $this->model('User_model')->getUserById($userId);

    // Get transactions with pagination
    $data['transaksi'] = $this->model('Transaksi_model')->getTransaksisWithPagination($limit, $offset);
    $data['totalInvoices'] = $this->model('Transaksi_model')->getTotalTransaksi();

    // Get total transactions for calculating total pages
    $totalTransaksi = $this->model('Transaksi_model')->getTotalTransaksi();
    $data['totalPages'] = ceil($totalTransaksi / $limit);

    // Calculate the starting number for pagination
    $data['startNumber'] = ($page - 1) * $limit + 1;

    // Tampilkan view
    $this->view('templates/header', $data);
    $this->view('templates/sidebar', $data);
    $this->view('kasirtransaksi/index', $data);
    $this->view('templates/footer');
}
}

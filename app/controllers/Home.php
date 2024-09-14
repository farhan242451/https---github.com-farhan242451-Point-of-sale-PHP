<?php

class Home extends Controller
{

    private $produkModel;
    private $transaksiModel;
    private $detailTransaksiModel;

    private $homeModel;


    public function __construct()
    {
        $this->checkLogin();
        $this->produkModel = $this->model('Produk_model');
        $this->transaksiModel = $this->model('Transaksi_model');
        $this->detailTransaksiModel = $this->model('DetailTransaksi_model');
        $this->homeModel = $this->model('Home_model');
    }

    private function checkLogin()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function admin()
    {
        // Fetch data
        $data['dailySales'] = $this->model('Home_model')->getDailySales();
        $data['monthlySales'] = $this->model('Home_model')->getMonthlySales();
        $data['yearlySales'] = $this->model('Home_model')->getYearlySales();
        $data['totalProducts'] = $this->model('Produk_model')->getTotalProduk();
        $data['dailySalesData'] = $this->model('Home_model')->getDailySalesData();
        $data['monthlySalesData'] = $this->model('Home_model')->getMonthlySalesData();
        $data['totalSales'] = $this->model('Home_model')->getTotalSales();
        $data['Totalkategori'] = $this->model('Kategori_model')->getTotalkategori();
        $data['totalInvoices'] = $this->model('Transaksi_model')->getTotalTransaksi();
        $data['totalAdmins'] = $this->model('Home_model')->getTotalAdmins();
        $data['totalkasir'] = $this->model('Home_model')->getTotalkasir();

        $this->view('template/header', $data);
        $this->view('home/admin', $data);
        $this->view('template/footer', $data);
    }

    public function kasir(){

        $data['title'] = 'Dashboard Kasir';
        $data['username'] = $_SESSION['username'];
            
        $userId = $_SESSION['user']['id_user'];
        $data['user'] = $this->model('User_model')->getUserById($userId);
        $data['dailySalesData'] = $this->model('Home_model')->getDailySalesData();
        $data['dailySales'] = $this->model('Home_model')->getDailySales();
        $data['totalProducts'] = $this->model('Produk_model')->getTotalProduk();
        $data['totalPelanggan'] = $this->model('Pelanggan_model')->getPelanggan();
        $data['totalTransaksi'] = $this->model('Transaksi_model')->getTotalTransaksi();


        $this->view('templates/header'); 
        $this->view('templates/sidebar',$data);
        $this->view('home/kasir', $data);
        $this->view('templates/footer');
    }

}
<?php

class Laporan extends Controller
{
    public function index()
    {
        $data['title'] = 'Laporan Penjualan';

        $data['username'] = $_SESSION['username'];
        $userId = $_SESSION['user']['id_user'];
        $data['user'] = $this->model('User_model')->getUserById($userId);

        // Check if form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];

            $data['report'] = $this->model('Laporan_model')->getSalesReport($startDate, $endDate);
            $data['start_date'] = $startDate;
            $data['end_date'] = $endDate;
        } else {
            $data['report'] = [];
            $data['start_date'] = '';
            $data['end_date'] = '';
        }



        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('laporan/index', $data);
        $this->view('templates/footer', $data);
        
    }
}

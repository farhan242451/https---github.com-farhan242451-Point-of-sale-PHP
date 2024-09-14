<?php

class Home_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Get total sales for today
    public function getDailySales()
    {
        $this->db->query("SELECT SUM(total_harga) AS total FROM transaksi WHERE DATE(tanggal_transaksi) = CURDATE()");
        return $this->db->single();
    }

    // Get total sales for the current month
    public function getMonthlySales()
    {
        $this->db->query("SELECT SUM(total_harga) AS total FROM transaksi WHERE MONTH(tanggal_transaksi) = MONTH(CURDATE()) AND YEAR(tanggal_transaksi) = YEAR(CURDATE())");
        return $this->db->single();
    }

    // Get total sales for the current year
    public function getYearlySales()
    {
        $this->db->query("SELECT SUM(total_harga) AS total FROM transaksi WHERE YEAR(tanggal_transaksi) = YEAR(CURDATE())");
        return $this->db->single();
    }

    public function getTotalSales()
    {
        $this->db->query("SELECT SUM(total_harga) AS total FROM transaksi");
        return $this->db->single();
    }


    public function getTotalAdmins()
    {
        $this->db->query("SELECT COUNT(id_user) AS total FROM users WHERE role = 'admin'");
        return $this->db->single()['total'];
    }

    public function getTotalkasir()
    {
        $this->db->query("SELECT COUNT(id_user) AS total FROM users WHERE role = 'kasir'");
        return $this->db->single()['total'];
    }

    // Get daily sales data for chart
    public function getDailySalesData()
    {
        $this->db->query("
            SELECT DATE(tanggal_transaksi) AS date, SUM(total_harga) AS total
            FROM transaksi
            WHERE DATE(tanggal_transaksi) BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE()
            GROUP BY DATE(tanggal_transaksi)
            ORDER BY DATE(tanggal_transaksi) ASC
        ");
        return $this->db->resultSet();
    }

    // Get monthly sales data for chart
    public function getMonthlySalesData()
    {
        $this->db->query("
            SELECT DATE_FORMAT(tanggal_transaksi, '%Y-%m') AS month, SUM(total_harga) AS total
            FROM transaksi
            WHERE YEAR(tanggal_transaksi) = YEAR(CURDATE())
            GROUP BY DATE_FORMAT(tanggal_transaksi, '%Y-%m')
            ORDER BY DATE_FORMAT(tanggal_transaksi, '%Y-%m') ASC
        ");
        return $this->db->resultSet();
    }

    
}

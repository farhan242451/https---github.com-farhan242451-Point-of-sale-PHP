<?php

class Laporan_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Method to get sales report
    public function getSalesReport($startDate, $endDate)
    {
        $query = "
            SELECT
                t.id_transaksi,
                t.tanggal_transaksi,
                p.nama_pelanggan,
                t.total_harga,
                t.payment_method,
                t.uang_customer,
                t.uang_kembali,
                SUM(dt.jumlah) AS total_items,
                SUM(dt.subtotal) AS total_amount
            FROM transaksi t
            JOIN pelanggan p ON t.id_pelanggan = p.id_pelanggan
            JOIN detail_transaksi dt ON t.id_transaksi = dt.id_transaksi
            WHERE t.tanggal_transaksi BETWEEN :start_date AND :end_date
            GROUP BY t.id_transaksi
            ORDER BY t.tanggal_transaksi DESC
        ";

        $this->db->query($query);
        $this->db->bind(':start_date', $startDate);
        $this->db->bind(':end_date', $endDate);

        return $this->db->resultSet();
    }
}

<?php

class Transaksi_model
{
    private $table = 'transaksi';
    private $tableDetailTransaksi = 'detail_transaksi';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Get all transactions
    public function getAllTransaksi()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    // Get transaction by ID
    public function getTransaksiById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_transaksi = :id_transaksi');
        $this->db->bind('id_transaksi', $id);
        return $this->db->single();
    }

    // Update transaction data
    public function ubahDataTransaksi($data)
    {
        $query = 'UPDATE ' . $this->table . ' SET 
                    id_pelanggan = :id_pelanggan, 
                    tanggal_transaksi = :tanggal_transaksi, 
                    total_harga = :total_harga
                  WHERE id_transaksi = :id_transaksi';

        $this->db->query($query);
        $this->db->bind('id_pelanggan', $data['id_pelanggan']);
        $this->db->bind('tanggal_transaksi', $data['tanggal_transaksi']);
        $this->db->bind('total_harga', $data['total_harga']);
        $this->db->bind('id_transaksi', $data['id_transaksi']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    // Delete transaction
    public function hapusDataTransaksi($id)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id_transaksi = :id_transaksi';
        $this->db->query($query);
        $this->db->bind('id_transaksi', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function getTransaksisWithPagination($limit, $offset)
    {
        $this->db->query('
            SELECT * FROM transaksi 
            ORDER BY tanggal_transaksi DESC 
            LIMIT :limit OFFSET :offset
        ');
        $this->db->bind(':limit', $limit, PDO::PARAM_INT);
        $this->db->bind(':offset', $offset, PDO::PARAM_INT);

        return $this->db->resultSet();
    }

    // Get total number of transactions
    public function getTotalTransaksi()
    {
        $this->db->query('SELECT COUNT(*) AS total FROM transaksi');
        return  $this->db->single()['total'];

         
    }

}
        
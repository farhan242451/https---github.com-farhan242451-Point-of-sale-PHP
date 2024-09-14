<?php

class DetailTransaksi_model
{
    private $table = 'detail_transaksi';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function getAllDetailTransaksi()
    {
        $this->db->query("SELECT * FROM detail_transaksi");
        return $this->db->resultSet();
    }

    public function getDetailTransaksiByTransaksiId($id_transaksi)
    {
        // Join detail_transaksi with produk to get the nama_produk
        $this->db->query("
            SELECT detail_transaksi.*, produk.nama_produk 
            FROM detail_transaksi 
            JOIN produk ON detail_transaksi.id_produk = produk.id_produk
            WHERE detail_transaksi.id_transaksi = :id_transaksi
        ");
        
        // Bind the transaction ID
        $this->db->bind(':id_transaksi', $id_transaksi);
    
        // Execute the query and return the result set
        return $this->db->resultSet();
    }
    

    public function hapusDataDetail($id)
    {
        $query = "DELETE FROM detail_tansaksi WHERE id_detail_tansaksi = :id_detail_tansaksi";
        $this->db->query($query);
        $this->db->bind('id_detail_tansaksi', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }





}

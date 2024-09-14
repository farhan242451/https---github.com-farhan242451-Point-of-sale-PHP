<?php

class Kasir_model
{


    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function insertCustomer($customerName)
    {
        // Check if customer already exists
        $query = "SELECT id_pelanggan FROM pelanggan WHERE nama_pelanggan = :customer_name";
        $this->db->query($query);
        $this->db->bind('customer_name', $customerName);
        $result = $this->db->single();

        if (!$result) {
            // Insert new customer
            $query = "INSERT INTO pelanggan (nama_pelanggan) VALUES (:customer_name)";
            $this->db->query($query);
            $this->db->bind('customer_name', $customerName);
            $this->db->execute();

            return $this->db->lastInsertId();
        }

        return $result['id_pelanggan'];
    }

    public function insertTransaction($customerId, $paymentMethod, $uangCustomer, $totalPrice)
    {
        $uangKembali = $uangCustomer - $totalPrice;
        $query = "INSERT INTO transaksi (id_pelanggan, tanggal_transaksi, total_harga, payment_method, uang_customer, uang_kembali) 
                  VALUES (:customer_id, NOW(), :total_price, :payment_method, :uang_customer, :uang_kembali)";
        $this->db->query($query);
        $this->db->bind('customer_id', $customerId);
        $this->db->bind('total_price', $totalPrice);
        $this->db->bind('payment_method', $paymentMethod);
        $this->db->bind('uang_customer', $uangCustomer);
        $this->db->bind('uang_kembali', $uangKembali);
        $this->db->execute();
    }

    public function getLastTransactionId()
    {
        $query = "SELECT LAST_INSERT_ID() AS id";
        $this->db->query($query);
        return $this->db->single()['id'];
    }

    public function insertDetailTransaction($idTransaksi, $productId, $quantity, $price, $subtotal)
    {
        $query = "INSERT INTO detail_transaksi (id_transaksi, id_produk, jumlah, harga, subtotal) 
                  VALUES (:id_transaksi, :id_produk, :jumlah, :harga, :subtotal)";
        $this->db->query($query);
        $this->db->bind('id_transaksi', $idTransaksi);
        $this->db->bind('id_produk', $productId);
        $this->db->bind('jumlah', $quantity);
        $this->db->bind('harga', $price);
        $this->db->bind('subtotal', $subtotal);
        $this->db->execute();
    }
    

    // Get all products with limit and offset for pagination
    public function getProduksWithPagination($limit, $offset)
    {
        $this->db->query("SELECT * FROM produk  LIMIT :limit OFFSET :offset");
        $this->db->bind(':limit', $limit, PDO::PARAM_INT);
        $this->db->bind(':offset', $offset, PDO::PARAM_INT);
        return $this->db->resultSet();
    }

    // Get total number of products
    public function getTotalProducts()
    {
        $this->db->query("SELECT COUNT(*) AS total FROM produk");
        $result = $this->db->single();
        return $result['total'];
    }

    public function getAllCustomers()
{
    $this->db->query("SELECT * FROM pelanggan");
    return $this->db->resultSet();
}

}

<?php

class Produk_model
{
    private $table = 'produk';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllProduk()
    {
        $this->db->query("SELECT p.*, k.nama_kategori FROM produk p LEFT JOIN kategori k ON p.id_kategori = k.id_kategori");
        return $this->db->resultSet();
    }

    public function tambahProduk($data, $foto_produk)
    {
        $this->db->query("INSERT INTO produk (nama_produk, harga, stok, id_kategori, foto_produk) VALUES (:nama_produk, :harga, :stok, :id_kategori, :foto_produk)");
        $this->db->bind(':nama_produk', $data['nama_produk']);
        $this->db->bind(':harga', $data['harga']);
        $this->db->bind(':stok', $data['stok']);
        $this->db->bind(':id_kategori', $data['id_kategori']);
        $this->db->bind(':foto_produk', $foto_produk);
        return $this->db->execute();
    }

    public function ubahProduk($data, $foto_produk)
    {
        $this->db->query("UPDATE produk SET nama_produk = :nama_produk, harga = :harga, stok = :stok, id_kategori = :id_kategori, foto_produk = :foto_produk WHERE id_produk = :id_produk");
        $this->db->bind(':id_produk', $data['id_produk']);
        $this->db->bind(':nama_produk', $data['nama_produk']);
        $this->db->bind(':harga', $data['harga']);
        $this->db->bind(':stok', $data['stok']);
        $this->db->bind(':id_kategori', $data['id_kategori']);
        $this->db->bind(':foto_produk', $foto_produk);
        return $this->db->execute();
    }

    public function hapusProduk($id)
    {
        $this->db->query("DELETE FROM produk WHERE id_produk = :id_produk");
        $this->db->bind(':id_produk', $id);
        return $this->db->execute();
    }

    public function getProdukById($id_produk)
    {
        $this->db->query('SELECT * FROM produk WHERE id_produk = :id_produk');
        $this->db->bind('id_produk', $id_produk);
        return $this->db->single();
    }

    public function getProduksWithPagination($limit, $offset)
    {
        $this->db->query('
        SELECT produk.*, kategori.nama_kategori 
        FROM produk 
        LEFT JOIN kategori ON produk.id_kategori = kategori.id_kategori
        ORDER BY produk.id_produk DESC 
        LIMIT :limit OFFSET :offset
    ');
        $this->db->bind(':limit', $limit, PDO::PARAM_INT);
        $this->db->bind(':offset', $offset, PDO::PARAM_INT);

        return $this->db->resultSet();
    }


    public function getTotalProduk()
    {
        $this->db->query('SELECT COUNT(*) AS total FROM produk');
        $result = $this->db->single();
        return $result['total'];
    }
}

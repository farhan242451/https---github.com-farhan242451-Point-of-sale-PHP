<?php

class Kategori_model {
    private $table = 'kategori';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllKategori()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function tambahDatakategori($data)
    {
        $query = "INSERT INTO kategori VALUES 
        ('',:nama_kategori)";

        $this->db->query($query);
        $this->db->bind(':nama_kategori', $data['nama_kategori']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getkategoriById($id_kategori)
    {
        $this->db->query('SELECT * FROM kategori WHERE id_kategori = :id_kategori');
        $this->db->bind('id_kategori', $id_kategori);
        return $this->db->single();
    }

    public function ubahDatakategori($data)
    {
        $query = "UPDATE kategori SET 
        nama_kategori = :nama_kategori 
        WHERE id_kategori = :id_kategori";

        $this->db->query($query);
        $this->db->bind('nama_kategori',$data['nama_kategori']);
        $this->db->bind('id_kategori', $data['id_kategori']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataKategori($id)
    {
        $query = "DELETE FROM kategori WHERE id_kategori = :id_kategori";
        $this->db->query($query);
        $this->db->bind('id_kategori', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function getTotalkategori()
    {
        $this->db->query("SELECT COUNT(id_kategori) AS total FROM {$this->table}");
        return $this->db->single()['total'];
    }

}

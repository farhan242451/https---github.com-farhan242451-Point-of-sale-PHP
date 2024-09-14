<?php

class Pelanggan_model {
    private $table = 'pelanggan';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllPelanggan() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPelanggan() {
        $this->db->query('SELECT COUNT(*) AS total FROM ' . $this->table);
        return $this->db->single()['total'];
    }

    public function hapusDatapelanggan($id)
    {
        $query = "DELETE FROM pelanggan WHERE id_pelanggan = :id_pelanggan";
        $this->db->query($query);
        $this->db->bind('id_pelanggan', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getAllUsers($id_user) {
        $this->db->query("SELECT username FROM users WHERE id_user = :id_user");
        $this->db->bind(':id_user', $id_user);
        return $this->db->single()->username;
    }


    
}
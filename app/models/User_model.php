<?php
class User_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Ambil data pengguna berdasarkan ID
    public function getUserById($id)
    {
        $this->db->query("SELECT * FROM users WHERE id_user = :id_user");
        $this->db->bind('id_user', $id);
        return  $this->db->single();
    }

    // Update user information
    public function ubahDataUsers($data)
    {
        $query = 'UPDATE users SET  
        username = :username, 
        nik = :nik,
        role = :role,
        alamat = :alamat
        WHERE id_user = :id_user';

        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('nik', $data['nik']);
        $this->db->bind('role', $data['role']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('id_user', $data['id_user']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateFoto($data)
{
    $query = "UPDATE users SET foto = :foto WHERE id_user = :id_user";

    $this->db->query($query);
    $this->db->bind('foto', $data['foto'], PDO::PARAM_LOB);
    $this->db->bind('id_user', $data['id_user']); 

    $this->db->execute();
    return $this->db->rowCount(); 
}
}

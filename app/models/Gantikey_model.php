<?php

class Gantikey_model{

    private $table = 'users';
    private $db;

    public function __construct() {
        $this->db = new Database(); // Assuming you're using a custom `Database` class
    }

    // Fetch user details by user ID
    public function getUserById($id) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id_user = :id");
        $this->db->bind('id', $id);
        return $this->db->single(); // Return a single result
    }

    // Update password for a given user ID
    public function updatePassword($id, $new_password) {
        $this->db->query("UPDATE " . $this->table . " SET password = :new_password WHERE id_user = :id");
        $this->db->bind('new_password', $new_password);
        $this->db->bind('id', $id);
        
        return $this->db->execute(); // Execute the query and return true if successful
    }
}
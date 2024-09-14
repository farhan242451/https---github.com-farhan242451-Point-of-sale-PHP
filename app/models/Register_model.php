<?php
class Register_model {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function register($username, $hashedPassword, $role) {
        $query = 'INSERT INTO users (username, password, role) VALUES (:username, :password, :role)';
        $this->db->query($query);
        $this->db->bind(':username', $username);
        $this->db->bind(':password', $hashedPassword);
        $this->db->bind(':role', $role);
        $this->db->execute();

        return $this->db->rowCount();
    }
}

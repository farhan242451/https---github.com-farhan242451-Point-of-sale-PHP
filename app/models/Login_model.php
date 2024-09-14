<?php

class Login_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function login($username, $password)
    {
        $this->db->query('SELECT * FROM users WHERE username = :username');
        $this->db->bind(':username', $username);
        $user = $this->db->single();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }
}

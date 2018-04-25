<?php
namespace App\Model;

use Core\Model\Database;


class UserManager extends Database {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getUserById($postId) {
        $this->db->prepare('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $postId);
        
        $result = $this->db->fetchOne('App\Entity\UsersEntity');
        return $result;
    }


    public function login($pseudo, $password) {
        $this->db->prepare('SELECT * FROM users WHERE pseudo = :pseudo');
        $this->db->bind(':pseudo', $pseudo);
        $req = $this->db->fetchOne('App\Entity\UsersEntity');
        
        $hashed = $req->password();

        if (password_verify($password, $hashed)) {
            return $req;
        } else {
            return false;
        }
    }


    public function updateProfil($data, $adminId) {
        $this->db->prepare('UPDATE users SET pseudo = :pseudo, password = :password WHERE id = :id');
        $this->db->bind(':pseudo', $data['pseudo']);
        $this->db->bind(':password', password_hash($data['password'], PASSWORD_DEFAULT));
        $this->db->bind(':id', $adminId);

        return $this->db->execute();
    }
    
}
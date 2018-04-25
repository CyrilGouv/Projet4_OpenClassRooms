<?php
namespace App\Model;

use Core\Model\Database;


class PostManager extends Database {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }


    // Récupère tous les articles
    public function getAllPosts() {
        $this->db->query('SELECT id, user_id, title, body, date_format(created_at, "Le %d/%m/%Y") as created_at, images  FROM posts ORDER BY id DESC');

        $this->db->execute();

        $results = $this->db->fetchArr('App\Entity\PostsEntity');
        return $results;
    }


    // Récupère 2 articles pour la page d'accueil
    public function getLimitedPosts() {
        $this->db->query('SELECT id, user_id, title, body, date_format(posts.created_at, "Le %d/%m/%Y") as created_at, images FROM posts ORDER BY id DESC LIMIT 0, 2');

        $this->db->execute();
        
        $results = $this->db->fetchArr('App\Entity\PostsEntity');
        return $results;
    }


    // Permet de récupèrer un article grâce à son id
    public function getPost($id) {
        $this->db->prepare('SELECT *, date_format(created_at, "Le %d/%m/%Y") as created_at FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);
        
        $req = $this->db->fetchOne('App\Entity\PostsEntity');
        return $req;
    }


    // Ajoute un nouvel article à la bdd
    public function addPost($adminId, $title, $image, $content) {
        $this->db->prepare('INSERT INTO posts (user_id, title, body, images) VALUE(:user_id, :title, :body, :images)');
        $this->db->bind(':user_id', $adminId);
        $this->db->bind(':title', $title);
        $this->db->bind(':body', $content);
        $this->db->bind(':images', $image);

        $this->db->execute();
    }


    // Update un article dans la bdd
    public function updatePost($id, $title, $image, $content) {
        $this->db->prepare('UPDATE posts SET title = :title, body = :body, images = :images WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':title', $title);
        $this->db->bind(':body', $content);
        $this->db->bind(':images', $image);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // DELETE un article \\
    public function deletePost($id) {
        $this->db->prepare('DELETE FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);

        $this->db->execute();
    }
}
<?php
namespace App\Model;

use Core\Model\Database;

class CommentManager extends Database {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }


    // Récupère tous les commentaires liés à un article \\
    public function getComments($postId) {
        $this->db->prepare('SELECT id, pseudo, content, date_format(created_at, "Le %d/%m/%Y à %Hh%imin%ss") as created_at FROM comments WHERE post_id = :post_id ORDER BY id DESC');
        $this->db->bind(':post_id', $postId);
        $results =$this->db->fetchArr('App\Entity\CommentsEntity');
        return $results;
    }


    // Ajoute un commentaire dans la bdd \\
    public function addComment($pseudo, $comment, $postId) {
        $this->db->prepare('INSERT INTO comments (pseudo, content, post_id) VALUE(:pseudo, :content, :post_id)');
        $this->db->bind(':pseudo', $pseudo);
        $this->db->bind(':content', $comment);
        $this->db->bind(':post_id', $postId);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    // Récupère un seul commentaire \\
    public function getComment($id) {
        $this->db->prepare('SELECT pseudo, content, date_format(created_at, "Le %d/%m/%Y à %Hh%imin%ss") as created_at, post_id FROM comments WHERE id = :id');
        $this->db->bind(':id', $id);

        $results =$this->db->fetchOne('App\Entity\CommentsEntity');
        return $results;
    }


    // Update la valeur d' undesirable dans la bdd \\
    public function isUndesirable($id) {
        $this->db->prepare('UPDATE comments SET undesirable = :undesirable WHERE id = :id');
        $this->db->bind(':undesirable', true);
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    // Récupère les commentaires indésirables \\
    public function getCommentsUndesirable() {
        $this->db->query('SELECT id, pseudo, content, date_format(created_at, "Le %d/%m/%Y à %Hh%imin%ss") as created_at FROM comments WHERE undesirable = 1');
        $results =$this->db->fetchArr('App\Entity\CommentsEntity');
        return $results;
    }


    // Supprime un commentaire indésirable \\
    public function deleteComment($id) {
        $this->db->prepare('DELETE FROM comments WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
    }


    // Garde un commentaire signalé comme indésirable \\
    public function keepComment($id) {
        $this->db->prepare('UPDATE comments SET undesirable = :undesirable WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':undesirable', false);
        $this->db->execute();
    }
}
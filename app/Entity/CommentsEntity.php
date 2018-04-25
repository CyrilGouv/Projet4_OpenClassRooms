<?php
namespace App\Entity;

use \Datetime;


class CommentsEntity {
    private $id;
    private $pseudo;
    private $content;
    private $created_at;
    private $post_id;

    public function __construct(array $data) {
        $this->hydrate($data);
    }

    public function hydrate(array $data) {
        foreach($data as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // GETTERS //
    public function id() {
        return $this->id;
    }

    public function pseudo() {
        return $this->pseudo;
    }

    public function content() {
        return $this->content;
    }

    public function created_at() {
        return $this->created_at;
    }

    public function post_id() {
        return $this->post_id;
    }


    // SETTERS //
    public function setId($id) {
        $id = (int) $id;

        if ($id > 0) {
            $this->id = $id;
        } 
    }

    public function setPseudo($pseudo) {
        if (is_string($pseudo)) {
            $this->pseudo = $pseudo;
        }
    }

    public function setContent($content) {
        if (is_string($content)) {
            $this->content = $content;
        }
    }

    public function setCreated_at($created_at) {
        $this->created_at = $created_at;
    }

    public function setPost_id($postId) {
        $postId = (int) $postId;

        if ($postId > 0) {
            $this->post_id = $postId;
        } 
    }
}
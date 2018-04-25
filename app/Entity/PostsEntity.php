<?php
namespace App\Entity;

use \Datetime;


class PostsEntity {
    private $id;
    private $user_id;
    private $title;
    private $body;
    private $created_at;
    private $images;

    public function __construct($data) {
        if (!is_array($data)) {
            header('Location: ' . URL_ROOT . '/blog/');
        } 

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

    public function user_id() {
        return $this->user_id;
    }

    public function title() {
        return $this->title;
    }

    public function body() {
        return $this->body;
    }

    public function created_at() {
        return $this->created_at;
    }

    public function images() {
        return $this->images;
    }

    // SETTERS //
    public function setId($id) {
        $id = (int) $id;

        if ($id > 0) {
            $this->id = $id;
        } 
    }

    public function setUser_id($userId) {
        $userId = (int) $userId;

        if ($userId > 0) {
            $this->user_id = $userId;
        } 
    }

    public function setTitle($title) {
        if (is_string($title)) {
            $this->title = $title;
        }
    }

    public function setBody($body) {
        if (is_string($body)) {
            $this->body = htmlspecialchars_decode($body);
        }
    }

    public function setCreated_at($createdAt) {
        $this->created_at = $createdAt;
    }

    public function setImages($images) {
        if (is_string($images)) {
            $this->images = $images;
        }
    }
}
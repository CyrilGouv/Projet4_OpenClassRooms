<?php
namespace App\Entity;

use \Datetime;


class UsersEntity {
    private $id;
    private $pseudo;
    private $password;
    private $createdAt;

    public function __construct($data) {
        if (!is_array($data)) {
            return false;
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

    public function pseudo() {
        return $this->pseudo;
    }

    public function password() {
        return $this->password;
    }

    public function createdAt() {
        return $this->createdAt;
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

    public function setPassword($password) {
        if (is_string($password)) {
            $this->password = $password;
        }
    }

    public function setCreatedAt(Datetime $createdAt) {
        if ($createdAt instanceof Datetime) {
            $this->createdAt = $createdAt;
        }
    }
}
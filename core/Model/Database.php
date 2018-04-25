<?php
namespace Core\Model;

use \PDO;


class Database {

    private $host   = DB_HOST;
    private $user   = DB_USER;
    private $pass   = DB_PASS;
    private $dbname = DB_NAME;

    private $pdo;
    private $req;

    public function __construct() {
        $this->getDb();
    }


    // Instancie la connection à la DB
    private function setDb() {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

        $this->pdo = new PDO($dsn, $this->user, $this->pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Permet de récupérer la connection à la DB
    public function getDb() {
        if ($this->pdo === null) {
            $this->setDb();
        }

        return $this->pdo;
    }

    // Permet de faire une requête de type query
    public function query($sql) {
        $this->req = $this->pdo->query($sql);
    }

    // Permet de faire une requête de type prepare
    public function prepare($sql) {
        $this->req = $this->pdo->prepare($sql);
    }

    // Permet de Bind les valeurs
    public function bind($param, $value, $type = null) {
        if ($type == null) {
            switch(true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->req->bindValue($param, $value, $type);
    }


    // Execute la requête
    public function execute() {
        return $this->req->execute();
    }

    // Permet de récupérer le résultat d'une requête en passant les entitées sous forme de tableau
    public function fetchArr($entity = null) {
        
        if ($entity != null) {
            $results = [];

            $this->execute();

            while($data = $this->req->fetch(PDO::FETCH_ASSOC)) {
                $results[] = new $entity($data);
            }

            return $results;
        }

        $this->execute();
        return $this->req->fetchAll(PDO::FETCH_OBJ);

    }

    // Récupère une donnée unique
    public function fetchOne($entity = null) {
        
        if ($entity != null) {
            $this->execute();

            $data = $this->req->fetch(PDO::FETCH_ASSOC);
    
            $results = new $entity($data);
            return $results;
        }


        $this->execute();
        return $this->req->fetch(PDO::FETCH_OBJ);
    }

}
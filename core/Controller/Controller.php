<?php
namespace Core\Controller;

class Controller {

    // Permet de load les views
    public function render($view, $data) {
        if (file_exists(ROOT . '/app/views/' . $view . '.php')) {
            require_once(ROOT . '/app/views/' . $view . '.php');
        } else {
            die("Hum... Cette vue n'existe pas !");
        }
    }


    // Permet d'instantier les models
    public function manager($model) {
        $namespaceModel = 'App\Model\\' . $model;
        return new $namespaceModel(); 
    }

}
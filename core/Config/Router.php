<?php
namespace Core\Config;

class Router {

    private $currentController = 'Pages';
    private $currentMethod = 'index';
    private $params = [];

    public function __construct() {

        $url = $this->getUrl();

        if (file_exists(ROOT . '/app/controller/' . ucfirst($url[0]) . '.php')) {
            $this->currentController = ucfirst($url[0]);
            unset($url[0]);
        }

        //require_once ROOT . '/app/controller/' . $this->currentController . '.php';
        // Instanciation
        $namespaceController = '\App\Controller\\' . $this->currentController;
        $this->currentController = new $namespaceController;

        if (isset($url[1])) {
            // On test si la méthode existe dans le controller
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }
        

        // On récupère le reste de l'url comme parammètre si il y en a ...
        $this->params = $url ? array_values($url) : [];

        // Permet d'appeller en callback le tableau de paramètres
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    private function getUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
    
}
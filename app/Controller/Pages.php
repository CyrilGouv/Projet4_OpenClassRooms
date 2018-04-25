<?php
namespace App\Controller;

use Core\Controller\Controller;


class Pages extends Controller {

    public function __construct() {
        $this->postManager = $this->manager('PostManager');
        $this->userManager = $this->manager('UserManager');
    }

    
    public function index() {
        $posts = $this->postManager->getLimitedPosts();
        
        $data = compact('posts');
        $this->render('pages/home', $data);
    }

    public function about() {
        $data = [];
        $this->render('pages/about', $data); 
    }

    public function mentions() {
        $data = [];
        $this->render('pages/mentions', $data);
    }

}
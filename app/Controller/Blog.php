<?php
namespace App\Controller;

use Core\Controller\Controller;


class Blog extends Controller {

    public function __construct() {
        $this->postManager    = $this->manager('PostManager');
        $this->commentManager = $this->manager('CommentManager');
    }


    public function index() {
        // On récupère tous les articles du blog
        $posts = $this->postManager->getAllPosts();
        
        $data = compact('posts');
        $this->render('blog/index', $data);
    }


    public function post($id) {
        // On récupère un article en particulier
        $post     = $this->postManager->getPost($id);
        // On récupère les commentaires liés à un article particulier
        $comments = $this->commentManager->getComments($id);

        if (isset($_POST['addComment']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            extract($_POST);

            $add = [
                'pseudo'       => strip_tags(trim($commentPseudo)),
                'comment'      => strip_tags(trim($commentaire)),
                'pseudoError'  => '',
                'commentError' => ''
            ];

            if (empty($add['pseudo'])) {
                $add['pseudoError'] = 'Merci de renseigner un pseudo';
            } else {
                if (mb_strlen($add['pseudo']) < 3) {
                    $add['pseudoError'] = 'Votre pseudo doit comporter plus de 3 charactères';
                }
            }

            if (empty($add['comment'])) {
                $add['commentError'] = 'Merci de renseigner un commentaire';
            } else {
                if (mb_strlen($add['comment']) < 4) {
                    $add['commentError'] = 'Votre commentaire doit comporter plus de 4 charactères';
                }
            }

                    
            // Si il n'y a aucune erreur de détecter
            if (empty($add['pseudoError']) && empty($add['commentError'])) {
                
                // On ajoute le commentaire à la db
                $req = $this->commentManager->addComment($add['pseudo'], $add['comment'], $id);

                if ($req) {
                    $_SESSION['flash']['infos'] = 'success';
                    $_SESSION['flash']['message'] = 'Votre commentaire a bien été ajouté.';
                    
                    header('Location: ' . URL_ROOT . '/blog/post/' . $id . '#comments');
                }

            } else {
                $data = compact('post', 'comments', 'add');
                $this->render('blog/post', $data);
            }
        } else {
            $data = compact('post', 'comments');
            $this->render('blog/post', $data);
        }
    }


    public function undesirable($id) {
        if (isset($_POST['undesirable']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
            // Permet de récupèrer l'id de l'article en question
            $comment = $this->commentManager->getComment($id);
            $postId = $comment->post_id();

            // Marque dans la bdd le commentaire en signaler
            $update  = $this->commentManager->isUndesirable($id);
            

            if ($update) {
                $_SESSION['flash']['infos'] = 'success';
                $_SESSION['flash']['message'] = 'Merci d\'avoir signaler un commentaire indésirable.';
                
                header('Location: ' . URL_ROOT . '/blog/post/' . $postId . '#comments');
            }

        }
    }
    
}


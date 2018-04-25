<?php
namespace App\Controller;

use Core\Controller\Controller;


class SecTech extends Controller {

    public function __construct() {
        $this->postManager    = $this->manager('PostManager');
        $this->userManager    = $this->manager('UserManager');
        $this->commentManager = $this->manager('CommentManager');
    }

    
    // Page de connexion \\
    public function login() {

        // Vérifie si le formulaire a été soumis
        if (isset($_POST['login']) && $_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['token'])) {
            
            // Permet de ralentir l'attaque par brute force
            sleep(1);
            
            extract($_POST);

            $data = [
                'pseudo'        => strip_tags(trim($connectionPseudo)),
                'password'      => strip_tags(trim($connectionPassword)),
                'pseudoError'   => '',
                'passwordError' => ''
            ];
            
            if (empty($data['pseudo'])) {
                $data['pseudoError'] = 'Le champ pseudo doit être completer, merci !';
            }

            if (empty($data['password'])) {
                $data['passwordError'] = 'Le champ mot de passe doit être completer, merci !';
            }


            // Si aucune erreur n'est détectée 
            if (empty($data['pseudoError']) && empty($data['passwordError'])) {
                $login = $this->userManager->login($data['pseudo'], $data['password']);
            
                if (!$login) {
                    $data['passwordError'] = 'Votre combinaison pseudo et/ou mot de passe semble incorrect';
                    $this->render('secTech/login', $data);
                } else {
                    
                    // On test si les tokens générés sont identiques
                    if (hash_equals($_SESSION['token'], $_POST['token'])) {
                        // Si tout est OK on crée nos variables de SESSION
                        $_SESSION['adminId'] = $login->id();
                        $_SESSION['adminPseudo'] = $login->pseudo();

                        // On redirige vers l'accueil de notre espace ADMIN
                        header('Location: ' . URL_ROOT . '/sectech/');
                    } else {
                        $data['passwordError'] = 'Hum... Imposible de se connecter';
                        $this->render('sectech/login', $data);
                    }
                                
                }
            } else {
                $this->render('sectech/login', $data);
            }

            
        } else {
            // Initialisation de mes data
            $data = [
                'pseudo'        => '',
                'password'      => '',
                'pseudoError'   => '',
                'passwordError' => ''
            ];

            $this->render('sectech/login', $data);
        }   
    }


    // Page d'accueil de l'admin \\
    public function index() {
        if (isset($_SESSION['adminId'])) {
            $comments = $this->commentManager->getCommentsUndesirable();
            
            $data = compact('comments');
            $this->render('sectech/index', $data);
        } else {
            $this->login();
        }
        
    }


    // Suppression d'un commentaire indésirable \\
    public function deleteComment($id) {
        if (isset($_SESSION['adminId'])) {
            $this->commentManager->deleteComment($id);

            $_SESSION['flash']['infos'] = 'success';
            $_SESSION['flash']['message'] = 'Le commentaire a bien été supprimer';
            
            header('Location: ' . URL_ROOT . '/sectech/');
        } else {
            $this->login();
        }
    }


    // Garder un commentaire signalé comme indésirable \\
    public function keepComment($id) {
        if (isset($_SESSION['adminId'])) {
            $this->commentManager->keepComment($id);

            $_SESSION['flash']['infos'] = 'success';
            $_SESSION['flash']['message'] = 'Vous avez choisi de garder le commentaire';
            
            header('Location: ' . URL_ROOT . '/sectech/');
        } else {
            $this->login();
        }
    }

    
    // Edition du profil \\
    public function profil() {
        if (isset($_SESSION['adminId'])) {
            

            if (isset($_POST['editProfil']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
                extract($_POST);

                $data = [
                    'pseudo'               => strip_tags(trim($editPseudo)),
                    'password'             => strip_tags(trim($editPassword)),
                    'confirmPassword'      => strip_tags(trim($confirmEditPassword)),
                    'pseudoError'          => '',
                    'passwordError'        => '',
                    'confirmPasswordError' => '',
                ];


                if (empty($data['pseudo'])) {
                    $data['pseudoError'] = 'Veuillez renseigner le champ pseudo';
                }

                if (empty($data['password'])) {
                    $data['passwordError'] = 'Veuillez renseigner le champ mot de passe';
                }

                if (empty($data['confirmPassword'])) {
                    $data['confirmPasswordError'] = 'Veuillez renseigner le champ de confirmation de votre nouveau mot de passe';
                }

                if (mb_strlen($data['pseudo']) < 3) {
                    $data['pseudoError'] = 'Votre pseudo doit comporter plus de 3 charactères';
                }

                if (mb_strlen($data['password']) < 5) {
                    $data['passwordError'] = 'Votre mot de passe doit comporter plus de 5 charactères';
                } else {
                    if ($data['password'] != $data['confirmPassword']) {
                        $data['passwordError'] = 'Votre combinaison de mot de passe ne sont pas identiques';
                    }
                }

                if(empty($data['pseudoError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {
                    
                    // Si aucune erreur alors on met à jour le profil dans la bdd
                    $update = $this->userManager->updateProfil($data, $_SESSION['adminId']);
                    
                    if ($update) {
                        $_SESSION['flash']['infos'] = 'success';
                        $_SESSION['flash']['message'] = "Vous avez modifié votre profil, merci de vous reconnecter avec votre nouvelle combinaison Pseudo / Mot de passe";
                        
                        // On redirige notre admin pour qu'il se re-connecte
                        header('Location: ' . URL_ROOT . '/sectech/login');
                    }


                } else {
                    $this->render('sectech/profil', $data);
                }

                
            } else {
                // Initialisation de mes data
                $data = [
                    'pseudo'               => '',
                    'password'             => '',
                    'confirmPassword'      => '',
                    'pseudoError'          => '',
                    'passwordError'        => '',
                    'confirmPasswordError' => '',
                ];

                $this->render('sectech/profil', $data);
            }

        } else {
            header('Location: ' . URL_ROOT . '/sectech/login');
        }
    }


    // Ajouter un article \\
    public function add() {
        if (isset($_SESSION['adminId'])) {

            if (isset($_POST['add']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
                extract($_POST);

                $fileName = $_FILES['postImage']['name'];
                $fileFormat = ['jpg', 'jpeg', 'gif', 'png'];
                

                $data = [
                    'title'        => strip_tags(trim($postTitle)),
                    'image'        => strip_tags(trim($fileName)),
                    'content'      => htmlspecialchars(trim($postContent)),
                    'titleError'   => '',
                    'imageError'   => '',
                    'contentError' => '',
                ];

                if (empty($data['title'])) {
                    $data['titleError'] = 'Le champ titre est requis';
                }

                if (empty($data['image'])) {
                    $data['imageError'] = 'Vous devez ajouter une image';
                }

                if (empty($data['content'])) {
                    $data['contentError'] = 'Un contenu est requis';
                }

                // On vérifie qu'il s'agit d'une image au bon format
                if (!in_array(substr(strrchr($data['image'], '.'), 1), $fileFormat)) {
                    $data['imageError'] = "L'image doit être au format jpg, jpeg, gif ou png";
                }


                if (empty($data['titleError']) && empty($data['imageError']) && empty($data['contentError'])) {

                    $pathImage  = ROOT . '/public/img/pics/' . $data['image'];
                    $storeImage = move_uploaded_file($_FILES['postImage']['tmp_name'], $pathImage); 

                    $addPost = $this->postManager->addPost($_SESSION['adminId'], $data['title'], $data['image'], $data['content']);
                    
                    $_SESSION['flash']['infos'] = 'success';
                    $_SESSION['flash']['message'] = "Votre nouvel article a bien été ajouté.";
                    
                    $this->render('sectech/add', $data);
                    
                } else {
                    $this->render('sectech/add', $data);
                }

            }
            $data = [];
            $this->render('sectech/add', $data);
            
        } else {
            $this->login();
        }
    }


    // Liste des articles pour édition \\
    public function posts() {
        if (isset($_SESSION['adminId'])) {
            $posts = $this->postManager->getAllPosts();

            $data = compact('posts');
            $this->render('sectech/posts', $data);
        } else {
            $this->login();
        }
    }


    // Edition d'un article \\
    public function edit($id) {
        if (isset($_SESSION['adminId'])) {
            $post = $this->postManager->getPost($id);

            if (isset($_POST['edit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
                extract($_POST);

                $fileName = $_FILES['postImage']['name'];
                $fileFormat = ['jpg', 'jpeg', 'gif', 'png'];
                

                $update = [
                    'title'        => strip_tags(trim($postTitle)),
                    'image'        => strip_tags(trim($fileName)),
                    'content'      => htmlspecialchars(trim($postContent)),
                    'titleError'   => '',
                    'imageError'   => '',
                    'contentError' => '',
                ];

                if (empty($update['title'])) {
                    $update['titleError'] = 'Le champ titre est requis';
                }

                if (empty($update['image'])) {
                    $update['imageError'] = 'Vous devez ajouter une image';
                }

                if (empty($update['content'])) {
                    $update['contentError'] = 'Un contenu est requis';
                }

                // On vérifie qu'il s'agit d'une image au bon format
                if (!in_array(substr(strrchr($update['image'], '.'), 1), $fileFormat)) {
                    $update['imageError'] = "L'image doit être au format jpg, jpeg, gif ou png";
                }


                if (empty($update['titleError']) && empty($update['imageError']) && empty($update['contentError'])) {
                    $pathImage  = ROOT . '/public/img/pics/' . $update['image'];
                    $storeImage = move_uploaded_file($_FILES['postImage']['tmp_name'], $pathImage); 

                    $updatePost = $this->postManager->updatePost($id, $update['title'], $update['image'], $update['content']);
                    
                    if ($updatePost) {
                        $_SESSION['flash']['infos'] = 'success';
                        $_SESSION['flash']['message'] = "Votre article a bien été éditer.";

                        header('Location: ' . URL_ROOT . '/sectech/posts');
                    }

                } else {
                    $data = compact('post', 'update');
                    $this->render('sectech/edit', $data);
                }
            } else {
                $data = compact('post');
                $this->render('sectech/edit', $data);
            }
        } else {
            $this->login();
        }
    }


    // Suppression d'un article \\
    public function delete($id) {
        if (isset($_SESSION['adminId'])) {
            
            $this->postManager->deletePost($id);

            $_SESSION['flash']['infos'] = 'success';
            $_SESSION['flash']['message'] = 'Votre article a bien été supprimé';
            
            header('Location: ' . URL_ROOT . '/sectech/posts');
            
        } else {
            $this->login();
        }
    }


    public function logout() {
        session_destroy();
        $_SESSION = [];
        header('Location: ' . URL_ROOT . '/sectech/login');
    }

}
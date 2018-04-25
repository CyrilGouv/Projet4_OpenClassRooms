<?php require ROOT . '/app/Views/templates/base/header.php'; ?>

<section class="home-blog blog-admin-espace">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-12">
                <h2 class="single-post-title">Espace d'administration</h2>
                <div class="admin-espace-blurb">
                    <p>Bonjour Mr <strong><?= $_SESSION['adminPseudo'] ?></strong> !</p>
                    <p>Que souhaitez-vous faire aujourd'hui ?</p>
                </div>

                <div class="admin-espace-content">
                    <a href="<?= URL_ROOT ?>/sectech/index">Accueil</a>
                    <a href="<?= URL_ROOT ?>/sectech/profil">Editer votre profil</a>
                    <a href="<?= URL_ROOT ?>/sectech/add">Ajouter un article</a>
                    <a class="active" href="<?= URL_ROOT ?>/sectech/posts">Éditer les articles</a>
                    <a href="<?= URL_ROOT ?>/sectech/logout">Se deconnecter</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Éditer un article</h3>
                <div class="add-post text-left">
                    <form action="<?= URL_ROOT ?>/sectech/edit/<?= $data['post']->id() ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group add-post-title">
                            <label for="post-title">Titre : <sup>*</sup></label>
                            <input type="text" name="postTitle" class="form-control <?= (!empty($data['update']['titleError'])) ? 'is-invalid' : '' ?>" value="<?= $data['post']->title() ?>">
                            <span class="invalid-feedback"><?= $data['update']['titleError'] ?></span>
                        </div>

                        <div class="form-group add-post-image">
                            <label for="post-image">Image à la une : <sup>*</sup></label>
                            <input type="file" name="postImage" class="form-control  <?= (!empty($data['update']['imageError'])) ? 'is-invalid' : '' ?>">
                            <span class="invalid-feedback"><?= $data['update']['imageError'] ?></span>
                        </div>

                        <div class="form-group add-post-content">
                            <label for="post-content">Contenu : <sup>*</sup></label>
                            <textarea class="form-control <?= (!empty($data['update']['contentError'])) ? 'is-invalid' : '' ?>" name="postContent" rows="10"><?= $data['post']->body() ?></textarea>
                            <span class="invalid-feedback"><?= $data['update']['contentError'] ?></span>
                        </div>

                        <input type="submit" value="Éditer" name="edit" class="btn">
                        <a class="btn btn-danger" href="<?= URL_ROOT ?>/sectech/delete/<?= $data['post']->id() ?>">Supprimer</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>


<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footer-social d-flex justify-content-center">
                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
                <div class="footer-menu">
                    <ul class="menu d-flex align-items-center justify-content-center">
                        <li><a href="<?= URL_ROOT ?>">Accueil</a></li>
                        <li><a href="<?= URL_ROOT ?>/pages/about">A propos</a></li>
                        <li><a href="<?= URL_ROOT ?>/blog/">Blog</a></li>
                    </ul>
                </div>
                <div class="footer-copyright">
                    <p>Copyright © 2018 <a href="http://www.cyrilgouverneur.com">Cyril Gouverneur</a>.</p>
                    <p><a href="<?= URL_ROOT ?>/pages/mentions">Mentions Légales</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script src="<?= URL_ROOT ?>/js/tinyMCE.js"></script>
</body>
</html>
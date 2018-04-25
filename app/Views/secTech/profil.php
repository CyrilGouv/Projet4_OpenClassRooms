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
                    <a class="active" href="<?= URL_ROOT ?>/sectech/profil">Editer votre profil</a>
                    <a href="<?= URL_ROOT ?>/sectech/add">Ajouter un article</a>
                    <a href="<?= URL_ROOT ?>/sectech/posts">Editer les articles</a>
                    <a href="<?= URL_ROOT ?>/sectech/logout">Se deconnecter</a>
                </div>
            </div>
        </div>

        <div class="row text-left">
            <div class="col-md-8 mx-auto">
                <form class="editrofil" action="<?= URL_ROOT ?>/sectech/profil" method="post">
                    <div class="form-group edit-pseudo">
                        <label for="editPseudo">Pseudo :</label>
                        <input type="text" name="editPseudo" class="form-control <?= (!empty($data['pseudoError'])) ? 'is-invalid' : '' ?>" value="<?= $_SESSION['adminPseudo'] ?>">
                        <span class="invalid-feedback"><?= $data['pseudoError'] ?></span>
                    </div>
                    <div class="form-group edit-password">
                        <label for="editPassword">Mot de passe :</label>
                        <input type="password" name="editPassword" class="form-control <?= (!empty($data['passwordError'])) ? 'is-invalid' : '' ?>">
                        <span class="invalid-feedback"><?= $data['passwordError'] ?></span>
                    </div>
                    <div class="form-group confirm-edit-password">
                        <label for="confirmEditPassword">Confirmation mot de passe :</label>
                        <input type="password" name="confirmEditPassword" class="form-control <?= (!empty($data['confirmPasswordError'])) ? 'is-invalid' : '' ?>">
                        <span class="invalid-feedback"><?= $data['confirmPasswordError'] ?></span>
                    </div>

                    <input type="submit" class="btn" value="Sauvegarder" name="editProfil">
                </form>
            </div>
        </div>
    </div>
</section>

<?php require ROOT . '/app/Views/templates/base/footer.php'; ?>
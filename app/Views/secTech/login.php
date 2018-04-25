<?php require ROOT . '/app/Views/templates/base/header.php'; ?>

<section class="home-blog blog-admin-connection">
    <div class="container">
        <h2 class="single-post-title">Admin</h2>
        <p>Veuillez vous connecter pour accéder à l'administration</p>

        <div class="row">
            <?php 
                if (!empty($_SESSION['flash'])) {
                    echo flashMessage($_SESSION['flash']['infos'], $_SESSION['flash']['message']);
                }
                $_SESSION['flash'] = [];

                $token = bin2hex(random_bytes(32));
                $_SESSION['token'] = $token;
            ?>
            <div class="col-md-8 mx-auto">
                <form class="connection" action="<?= URL_ROOT ?>/sectech/login" method="post">
                    <div class="form-group connection-pseudo">
                        <label for="connectionPseudo">Pseudo :</label>
                        <input type="text" name="connectionPseudo" class="form-control <?= (!empty($data['pseudoError'])) ? 'is-invalid' : '' ?>" value="<?= $data['pseudo'] ?>">
                        <span class="invalid-feedback"><?= $data['pseudoError'] ?></span>
                    </div>
                    <div class="form-group connection-password">
                        <label for="connectionPassword">Password :</label>
                        <input type="password" name="connectionPassword" class="form-control <?= (!empty($data['passwordError'])) ? 'is-invalid' : '' ?>" value="<?= $data['password'] ?>">
                        <span class="invalid-feedback"><?= $data['passwordError'] ?></span>
                    </div>
                    <input type="hidden" name="token" id="token" value="<?= $token ?>" />
                    <input type="submit" class="btn" value="Connexion" name="login">
                </form>
            </div>
        </div>
    </div>
</section>

<?php require ROOT . '/app/Views/templates/base/footer.php'; ?>
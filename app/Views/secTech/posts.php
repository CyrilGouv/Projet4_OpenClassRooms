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
                    <a class="active" href="<?= URL_ROOT ?>/sectech/posts">Editer les articles</a>
                    <a href="<?= URL_ROOT ?>/sectech/logout">Se deconnecter</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Édition d'article</h3>
                <?php 
                    if (!empty($_SESSION['flash'])) {
                        echo flashMessage($_SESSION['flash']['infos'], $_SESSION['flash']['message']);
                    }
                    $_SESSION['flash'] = [];
                ?>
                <div class="edit-posts text-left mt-5">
                    <?php foreach($data['posts'] as $post) : ?>
                        <div class="card card-body mb-3">
                            <h4 class="card-title"><?= $post->title() ?></h4>
                            <div class="bg-light p-2 mb-3">
                                <em>Posté <?= $post->created_at() ?></em>
                            </div>
                            <p class="card-text"><?= substr($post->body(), 0, 250) ?> ...</p>
                            <a href="<?= URL_ROOT ?>/sectech/edit/<?= $post->id() ?>" class="btn btn-dark">Éditer cette article</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require ROOT . '/app/Views/templates/base/footer.php'; ?>
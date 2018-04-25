<?php require ROOT . '/app/Views/templates/base/header.php'; ?>

<section class="home-blog blog-admin-espace">
    <div class="container text-center">
        <h2 class="single-post-title">Espace d'administration</h2>
        <div class="admin-espace-blurb">
            <p>Bonjour Mr <strong><?= $_SESSION['adminPseudo'] ?></strong> !</p>
            <p>Que souhaitez-vous faire aujourd'hui ?</p>
        </div>

        <div class="admin-espace-content">
            <a class="active" href="<?= URL_ROOT ?>/sectech/index">Accueil</a>
            <a href="<?= URL_ROOT ?>/sectech/profil">Editer votre profil</a>
            <a href="<?= URL_ROOT ?>/sectech/add">Ajouter un article</a>
            <a href="<?= URL_ROOT ?>/sectech/posts">Editer les articles</a>
            <a href="<?= URL_ROOT ?>/sectech/logout">Se deconnecter</a>
        </div>

        <?php 
            if (!empty($_SESSION['flash'])) {
                echo flashMessage($_SESSION['flash']['infos'], $_SESSION['flash']['message']);
            }
            $_SESSION['flash'] = [];
        ?>
        
        <?php if ($data['comments'] != null) : ?>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center">Commentaires indésirables</h3>
                    <div class="edit-posts text-left mt-5">

                        <?php foreach($data['comments'] as $comment) : ?>
                            <div class="card card-body mb-3">
                                <h4 class="card-title"><?= $comment->pseudo() ?></h4>
                                <div class="bg-light p-2 mb-3">
                                    <em>Posté <?= $comment->created_at() ?></em>
                                </div>
                                <p class="card-text"><?= $comment->content() ?></p>
                                <p>
                                    Supprimer :
                                    <a href="<?= URL_ROOT ?>/sectech/deleteComment/<?= $comment->id() ?>" class="btn btn-danger">OUI</a>
                                    <a href="<?= URL_ROOT ?>/sectech/keepComment/<?= $comment->id() ?>" class="btn">NON</a>
                                </p>
                                
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php require ROOT . '/app/Views/templates/base/footer.php'; ?>
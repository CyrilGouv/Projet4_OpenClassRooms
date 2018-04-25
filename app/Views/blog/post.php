<?php require ROOT . '/app/Views/templates/base/header.php'; ?>

<section class="home-blog">
    <div class="container">
        <h2 class="single-post-title"><?= $data['post']->title() ?></h2>
        <div class="row">
            <div class="col-12">
                <div class="home-blog-post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="single-post-img">
                                <img class="img-fluid" src="<?= IMG_ROOT . $data['post']->images() ?>" alt="Voyage">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="home-post-content-single">
                                <div class="home-post-blurb">
                                    <p class="home-post-exerpt">
                                        <?= $data['post']->body() ?>
                                    </p>
                                    <p class="home-post-meta"><date><?= $data['post']->created_at() ?></date> par Jean Forteroche</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Commentaires -->
        <div class="row">
            <div class="col-md-12">
                <div class="blog-comments" id="comments">
                    <h3>Commentaires</h3>
                    <?php 
                    if (!empty($_SESSION['flash'])) {
                        echo flashMessage($_SESSION['flash']['infos'], $_SESSION['flash']['message']);
                    }
                    $_SESSION['flash'] = [];
                    ?>

                    <!-- On boucle les ici -->
                    <?php foreach($data['comments'] as $comment) : ?>
                        <div class="blog-comment">
                            <p>
                                <span class="comment-author"><?= $comment->pseudo() ?></span>    |     
                                <span class="comment-date"><?= $comment->created_at() ?></span>    
                            </p>
                            <p class="comment-content"><?= $comment->content() ?></p>
                            <form method="post" action="<?= URL_ROOT ?>/blog/undesirable/<?= $comment->id() ?>">
                                <input type="submit" name="undesirable" value="Signaler" class="btn btn-danger btn-xs">
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- Formulaires Commentaires -->
        <div class="row">
            <div class="col-md-6">
                <div class="add-comments">
                    <h4>Ajouter un commentaire</h4>
                    <form action="<?= URL_ROOT ?>/blog/post/<?= $data['post']->id() ?>" method="post">
                        <div class="form-group">
                            <label for="pseudo">Pseudo : <sup>*</sup></label>
                            <input type="text" name="commentPseudo" class="form-control <?= (!empty($data['add']['pseudoError'])) ? 'is-invalid' : '' ?>">
                            <span class="invalid-feedback"><?= $data['add']['pseudoError'] ?></span>
                        </div>
                        <div class="form-group">
                            <label for="commentaire">Commentaire : <sup>*</sup></label>
                            <textarea name="commentaire" id="commentaire" rows="8" class="form-control <?= (!empty($data['add']['commentError'])) ? 'is-invalid' : '' ?>"></textarea>
                            <span class="invalid-feedback"><?= $data['add']['commentError'] ?></span>
                        </div>
                        <input type="submit" class="btn" value="Envoyer" name="addComment">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require ROOT . '/app/Views/templates/base/footer.php'; ?>
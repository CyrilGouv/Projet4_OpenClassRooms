<?php require ROOT . '/app/Views/templates/base/header.php'; ?>

<section class="home-blog">
    <div class="container">
        <h2>Mes derniers épisodes</h2>
        <div class="row">
            <?php 
            if (!empty($_SESSION['flash'])) {
                echo flashMessage($_SESSION['flash']['infos'], $_SESSION['flash']['message']);
            }
            $_SESSION['flash'] = [];
            ?>
            <!-- On boucle ici -->
            <?php foreach($data['posts'] as $post) : ?>
                
            
                <div class="col-12">
                    <div class="home-blog-post" data-aos="fade-up">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="home-post-img">
                                    <a href="<?= URL_ROOT ?>/blog/post/<?= $post->id() ?>"><img class="img-fluid" src="<?= IMG_ROOT . $post->images() ?>" alt="Voyage"></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="home-post-content">
                                    <h3 class="home-post-title"><a href="<?= URL_ROOT ?>/blog/post/<?= $post->id() ?>"><?= $post->title() ?></a></h3>
                                    <div class="home-post-blurb">
                                        <p class="home-post-meta"><date><?= $post->created_at() ?></date> par Jean Forteroche</p>
                                        <p class="home-post-exerpt">
                                            <?= substr($post->body(), 0, 250) ?>
                                        </p>
                                        <a href="<?= URL_ROOT ?>/blog/post/<?= $post->id() ?>">...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require ROOT . '/app/Views/templates/base/footer.php'; ?>
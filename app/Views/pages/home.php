<?php require ROOT . '/app/Views/templates/base/header.php'; ?>


<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="banner-about animated fadeInLeft">
                    <p>Bonjour à vous !</p>
                    <p>Jeune acteur et auteur de bestsellers, je m'appelle Jean Forteroche.<br>
                    Je vous souhaite la bienvenue dans mon monde.</p>
                    <a href="<?= URL_ROOT ?>/pages/about">En savoir plus</a>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="banner-img animated fadeInRight">
                    <img class="img-fluid" src="<?= URL_ROOT ?>/img/jean-forteroche.png" alt="Jean Forteroche">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="home-blog">
    <div class="container">
        <h2>Mes derniers épisodes</h2>
        <div class="row">
            <!-- On boucle ici -->
            <?php foreach($data['posts'] as $post) : ?>
                
            
                <div class="col-12">
                    <div class="home-blog-post" data-aos="fade-up">
                        <div class="row flex-column-reverse flex-md-row">
                            <div class="col-lg-6 home-blog-posts">
                                <div class="home-post-img">
                                    <a href="<?= URL_ROOT ?>/blog/post/<?= $post->id() ?>"><img class="img-fluid" src="<?= IMG_ROOT . $post->images() ?>" alt="Voyage"></a>
                                </div>
                            </div>
                            <div class="col-lg-6 home-blog-posts">
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
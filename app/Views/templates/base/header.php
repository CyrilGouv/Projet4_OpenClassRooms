<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= SITENAME ?></title>

    <link href="https://fonts.googleapis.com/css?family=Mr+Dafoe|Open+Sans:400,700" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= URL_ROOT ?>/css/app.css">
    <link rel="stylesheet" href="<?= URL_ROOT ?>/css/front.css">
    <link rel="stylesheet" href="<?= URL_ROOT ?>/css/responsive.css">
</head>
<body>
    <header id="header">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 d-flex align-items-center responsiveHidden">
                        <div class="header-top-contact">
                            <p>contact@jeanforteroche.com</p>
                        </div>
                    </div>
                    <div class="col-xl-6 d-flex align-items-center justify-content-center header-top-resp">
                        <div class="header-top-logo">
                            <h1>Jean Forteroche</h1>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-3 d-flex align-items-center justify-content-end header-top-resp">
                        <div class="header-top-social">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav class="nav">
            <div class="container">
                <ul class="menu d-flex align-items-center justify-content-center">
                    <li><a class="<?= ($_GET['url'] == 'index' || $_GET['url'] == '') ? 'active' : '' ?>" href="<?= URL_ROOT ?>">Accueil</a></li>
                    <li><a class="<?= ($_GET['url'] == 'pages/about') ? 'active' : '' ?>" href="<?= URL_ROOT ?>/pages/about">A propos</a></li>
                    <li><a class="<?= ($_GET['url'] == 'blog/') ? 'active' : '' ?>" href="<?= URL_ROOT ?>/blog/">Blog</a></li>
                </ul>
            </div>
        </nav>
    </header>
    

    
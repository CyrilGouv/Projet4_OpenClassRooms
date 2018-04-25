
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
                        <li><a class="<?= ($_GET['url'] == 'index' || $_GET['url'] == '') ? 'active' : '' ?>" href="<?= URL_ROOT ?>">Accueil</a></li>
                        <li><a class="<?= ($_GET['url'] == 'pages/about') ? 'active' : '' ?>" href="<?= URL_ROOT ?>/pages/about">A propos</a></li>
                        <li><a class="<?= ($_GET['url'] == 'blog/') ? 'active' : '' ?>" href="<?= URL_ROOT ?>/blog/">Blog</a></li>
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
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
    <script src="<?= URL_ROOT ?>/js/app.js"></script>
</body>
</html>
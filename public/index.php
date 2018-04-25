<?php
require '../core/Config/config.php';
require '../core/Config/Router.php';
require ROOT . '/app/App.php';

App::autoload();

require ROOT . '/app/helpers/flashMessage.php';



$router = new Core\Config\Router();
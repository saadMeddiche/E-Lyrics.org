<?php
require_once  './autoload.php';


$pages = ['home', 'update', 'add', 'view', 'artists', 'albums'];

if (isset($_SESSION["logged"]) && $_SESSION["logged"] === true) {

    //include the file header.php
    HomeController::IncludeFile('header');

    if (isset($_GET['page'])) {

        if (in_array($_GET['page'], $pages)) {
            HomeController::IncludeFile($_GET['page']);
            include_once "./views/includes/js/script.php";
        } else {
            HomeController::IncludeFile('404');
        }
    } else {
        HomeController::IncludeFile('home');
    }

    //include the file footer.php
    HomeController::IncludeFile('footer');
} else {
    HomeController::IncludeFile('login');
}

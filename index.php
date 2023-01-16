<?php
require_once  './autoload.php';


$pages = ['home', 'update', 'add'];

//include the file header.php
HomeController::IncludeFile('header');

if (isset($_GET['page'])) {

    if (in_array($_GET['page'], $pages)) {
        HomeController::IncludeFile($_GET['page']);
    } else {
        HomeController::IncludeFile('404');
    }
} else {
    HomeController::IncludeFile('home');
}

//include the file footer.php
HomeController::IncludeFile('footer');

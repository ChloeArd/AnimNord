<?php
session_start();

require_once './Model/DB.php';
require_once './Model/Manager/Traits/ManagerTrait.php';
require_once './Controller/Traits/ReturnViewTrait.php';

require_once './Model/Entity/Role.php';
require_once './Model/Entity/User.php';
require_once './Model/Entity/AdFind.php';
require_once './Model/Entity/AdLost.php';
require_once './Model/Entity/CommentFind.php';
require_once './Model/Entity/CommentLost.php';
require_once './Model/Entity/ContentIndex.php';
require_once './Model/Entity/FavoriteFind.php';
require_once './Model/Entity/FavoriteLost.php';

require_once './Model/Manager/RoleManager.php';
require_once './Model/Manager/UserManager.php';
require_once './Model/Manager/ContentIndexManager.php';
require_once './Model/Manager/AdLostManager.php';
require_once './Model/Manager/FavoriteLostManager.php';
require_once './Model/Manager/CommentLostManager.php';

require_once './Controller/HomeController.php';
require_once './Controller/AdLostController.php';
require_once './Controller/UserController.php';
require_once './Controller/FavoriteLostController.php';
require_once './Controller/CommentLostController.php';

use Controller\CommentLostController;
use Controller\FavoriteLostController;
use Controller\HomeController;
use Controller\AdLostController;
use Controller\UserController;

if (isset($_GET['controller'])) {
    switch ($_GET['controller']) {
        case 'adlost' :
            $controller = new AdLostController();
            $controllerFavorite = new FavoriteLostController();
            $controllerCommentLost = new CommentLostController();
            if(isset($_GET['action'])) {
                switch($_GET['action']) {
                    case 'new' :
                        $controller->addAd($_POST);
                        break;
                    case 'update' :
                        $controller->updateAd($_POST);
                        break;
                    case 'view' :
                        $controller->adsUser($_SESSION['id']);
                        break;
                    case 'delete' :
                        $controller->deleteAd($_POST);
                        break;
                    case 'adComment' :
                        $controller->ad($_GET["id"]);
                        break;
                    default:
                        break;
                }
            }
            if (isset($_GET['favorite'])) {
                switch ($_GET['favorite']) {
                    case 'favoriteLost' :
                        $controllerFavorite->addFavorite($_POST);
                        break;
                }
            }
            if (isset($_GET['comment'])) {
                switch ($_GET['comment']) {
                    case 'commentLost' :
                        $controllerCommentLost->commentsAd($_GET['id']);
                        break;
                }
            }
            else {
                $controller->ads();
            }
            break;
        case 'adFind':
            break;
        case 'user':
            $controller = new UserController();
            if(isset($_GET['action'])) {
                switch($_GET['action']) {
                    case 'new' :
                        break;
                    case "view" :
                        $controller->user($_GET["id"]);
                        break;
                    default:
                        break;
                }
            }
            else {
                $controller->users();
            }
            break;
        default:
            break;
    }
}
else {
    $controller = new HomeController();
    $controller->homePage();
}
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
require_once './Model/Entity/Message.php';

require_once './Model/Manager/RoleManager.php';
require_once './Model/Manager/UserManager.php';
require_once './Model/Manager/ContentIndexManager.php';
require_once './Model/Manager/AdLostManager.php';
require_once './Model/Manager/AdFindManager.php';
require_once './Model/Manager/FavoriteLostManager.php';
require_once './Model/Manager/FavoriteFindManager.php';
require_once './Model/Manager/CommentLostManager.php';
require_once './Model/Manager/CommentFindManager.php';
require_once './Model/Manager/MessageManager.php';

require_once './Controller/HomeController.php';
require_once './Controller/ContentIndexController.php';
require_once './Controller/AdLostController.php';
require_once './Controller/AdFindController.php';
require_once './Controller/UserController.php';
require_once './Controller/FavoriteLostController.php';
require_once './Controller/FavoriteFindController.php';
require_once './Controller/CommentLostController.php';
require_once './Controller/CommentFindController.php';
require_once './Controller/MessageController.php';

use Controller\CommentFindController;
use Controller\CommentLostController;
use Controller\ContentIndexController;
use Controller\FavoriteFindController;
use Controller\FavoriteLostController;
use Controller\HomeController;
use Controller\AdLostController;
use Controller\AdFindController;
use Controller\MessageController;
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
                        $controller->addAd($_POST, $_FILES);
                        break;
                    case 'update' :
                        $controller->updateAd($_POST, $_FILES);
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
                        $controllerFavorite->addFavorite($_GET['id'], $_SESSION['id']);
                        break;
                    case 'view' :
                        $controllerFavorite->favoritesUser($_SESSION['id']);
                        if (isset($_GET['delete'])) {
                            switch ($_GET['delete']) {
                                case 'ok' :
                                    $controllerFavorite->deleteFavorite($_POST);
                                    break;
                                case 'ad' :
                                    $controllerFavorite->deleteFavorite($_POST);
                                    $controllerFavorite = new FavoriteFindController();
                                    $controllerFavorite->deleteFavorite($_POST);
                                    break;
                                default :
                                    break;
                            }
                        }
                        break;
                    case 'delete' :
                        $controllerFavorite->deleteFavorite($_POST);
                        break;
                    default :
                        break;
                }
            }
            if (isset($_GET['comment'])) {
                switch ($_GET['comment']) {
                    case 'commentLost' :
                        $controllerCommentLost->commentsAd($_GET['id']);
                        break;
                    default :
                        break;
                }
            }
            else {
                $controller->ads();
            }
            break;
        case 'commentLost' :
            $controller = new CommentLostController();
            if(isset($_GET['action'])) {
                switch($_GET['action']) {
                    case "new" :
                        $controller->addComment($_POST);
                        break;
                    case "update" :
                        $controller->updateComment($_POST);
                        break;
                    case "delete" :
                        $controller->deleteComment($_POST);
                        break;
                    default:
                        break;
                }
            }
            break;
        case 'adfind':
            $controller = new AdFindController();
            $controllerFavorite = new FavoriteFindController();
            if(isset($_GET['action'])) {
                switch($_GET['action']) {
                    case 'new' :
                        $controller->addAd($_POST, $_FILES);
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
                        $controllerFavorite->addFavorite($_GET['id'], $_SESSION['id']);
                        break;
                    case 'view' :
                        $controllerFavorite->favoritesUser($_SESSION['id']);
                        if (isset($_GET['delete'])) {
                            switch ($_GET['delete']) {
                                case 'ok' :
                                    $controllerFavorite->deleteFavorite($_POST);
                                    break;
                                default :
                                    break;
                            }
                        }
                        break;
                    case 'delete' :
                        $controllerFavorite->deleteFavorite($_POST);
                        break;
                    default :
                        break;
                }
            }
            else {
                $controller->ads();
            }
            break;
        case 'commentFind' :
            $controller = new CommentFindController();
            if(isset($_GET['action'])) {
                switch($_GET['action']) {
                    case "new" :
                        $controller->addComment($_POST);
                        break;
                    case "update" :
                        $controller->updateComment($_POST);
                        break;
                    case "delete" :
                        $controller->deleteComment($_POST);
                        break;
                    default:
                        break;
                }
            }
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
                    case 'all' :
                        $controller->users();
                        break;
                    case 'update' :
                        $controller->update($_POST);
                        break;
                    case 'updatePass' :
                        $controller->updatePass($_POST);
                        break;
                    case 'updateRole' :
                        $controller->updateRole($_POST);
                        break;
                    case 'delete' :
                        $controller->delete($_POST);
                        break;
                    default:
                        break;
                }
            }
            else {
                $controller->users();
            }
            break;
        case 'content' :
            $controller = new ContentIndexController();
            if(isset($_GET['action'])) {
                switch($_GET['action']) {
                    case "update" :
                        $controller->update($_POST);
                        break;
                    default:
                        break;
                }
            }
            break;
        case 'ad' :
            $controller = new HomeController();
            $controller->adPage();
            break;
        case 'connection' :
            $controller = new HomeController();
            $controller->connectionPage();
            break;
        case 'registration' :
            $controller = new HomeController();
            $controller->registrationPage();
            break;
        case 'contact' :
            $controller = new HomeController();
            $controller->contactPage();
            break;
        case 'sendMail' :
            $controller = new HomeController();
            $controller->contactUserPage();
            break;
        case 'message' :
            $controller = new MessageController();
            $controller->messagePage();
            break;
        default:
            break;
    }
}
else {
    $controller = new HomeController();
    $controller->homePage();
}
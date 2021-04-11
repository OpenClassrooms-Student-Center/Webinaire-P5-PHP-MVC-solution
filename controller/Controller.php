<?php
require_once 'model/CategoryManager.php';
require_once 'model/WebinarManager.php';
require_once 'model/UserManager.php';

class Controller
{
    public function home()
    {
        $categoryFilter = $_GET['category'] ?? 0; // si on a un parametre ?category dans l'url, on le prend sinon on met 0 par défaut dans la variable
        // Récuparation des catégories
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->getCategories();
        $webinarManager = new WebinarManager();
        $webinars = $webinarManager->getWebinars($categoryFilter);

        require 'view/index.php';

    }

    public function login()
    {
        if (isset($_SESSION['user'])) {
            header('Location: index.php?action=new');
        }

        $error = '';

        if (isset($_POST['login']) && isset($_POST['password'])) {
            $userManager = new UserManager();
            $user = $userManager->getUser($_POST['login']);

            if (!$user) {
                $error = 'Utilisateur non trouvé';
            } else {
                if (!password_verify($_POST['password'], $user['password'])) {
                    $error = 'Mot de passe erroné';
                } else {
                    $_SESSION['user'] = $user['id'];
                    header('Location: index.php?action=new');
                }
            }
        }
        require 'view/login.php';
    }

    public function newWebinar()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?action=login');
        }

        if (isset($_POST['name']) && isset($_POST['category']) && isset($_POST['link']) && isset($_POST['date'])) {
            $webinarManager = new WebinarManager();
            $webinarManager->insertWebinar($_POST['name'], $_POST['description'] ?? '', $_POST['category'], $_SESSION['user'], $_POST['date'], $_POST['link']);
            header('Location: index.php');
        }

        require 'view/new_webinar.php';
    }
}
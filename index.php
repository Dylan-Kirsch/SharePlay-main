<?php

    require_once('config\config.php');

    require_once('repository\database.php');
    require_once('repository\reponse.php');

    require_once('repository\accueilDB.php');
    require_once('repository\galerieDB.php');
    require_once('repository\jeuxDB.php');
    require_once('repository\universDB.php');
    require_once('repository\tagDB.php');
    require_once('repository\typeAffichageDB.php');
    require_once('repository\photoDB.php');
    require_once('repository\utilisateurDB.php');

    require_once('controllers\controller.php');
    require_once('controllers\accueil-controller.php');
    require_once('controllers\galerie-controller.php');
    require_once('controllers\jeux-controller.php');
    require_once('controllers\univers-controller.php');
    require_once('controllers\photo-controller.php');
    require_once('controllers\utilisateur-controller.php');

    require_once('models\jeux.php');
    require_once('models\accueil.php');
    require_once('models\univers.php');
    require_once('models\galerie.php');
    require_once('models\photo.php');
    require_once('models\tag.php');
    require_once('models\typeAffichage.php');
    require_once('models\utilisateur.php');

    session_start();
    
    
    if (isset($_GET['page']))
                $accueil = $_GET['page'];
            else
                $accueil = 'news';
     
    switch($accueil)
    {
        case 'subscribe':
            UtilisateurController::inscription();
            break;

        case 'login':
            UtilisateurController::login();
            break;

        case 'logout':
            UtilisateurController::logout();
            break;

        case 'news':

            if (isset($_GET['id'])) 
                AccueilController::afficherUneNews($_GET['id']);
            else
                AccueilController::afficherNews();
            break;
        
        case 'ajouter-news':

            include 'views\formulaire\news.php';

            break;

        case 'upload-news':

            AccueilController::ajouterNews();

            break;

        case 'parametre':

            include 'views\parametreProfil.php';

            break;

        case 'carousel-classique':

            include 'views\carousel-type\carousel-classique.php';

            break;

        case 'carousel-3D':

            include 'views\carousel-type\carousel-3d.php';

            break;
        
        case 'modifier-profil':

            UtilisateurController::modifier();

            break;

        default: AccueilController::afficherNews();
            

    }





?>
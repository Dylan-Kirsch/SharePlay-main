<?php
class Controller
{  

    public static function isNotConnected()
    {
        return (!isset($_SESSION['isConnected'])|| !$_SESSION['isConnected']);
    }
    public static function isConnected()
    {
        return !Controller::isNotConnected();
    }
    public static function getCSRFToken()
    {
        if (empty($_SESSION['csrftoken'])) {
            $_SESSION['csrftoken'] = bin2hex(openssl_random_pseudo_bytes(32));
        }
        return $_SESSION['csrftoken']; 
    }

    public static function checkCSRFToken()
    {
        return (isset($_POST['csrftoken'])&&($_SESSION['csrftoken']==$_POST['csrftoken']));
    }

    // public static function isAdmin()
    // {
    //     if (!isset($_SESSION['userID']))
    //         return false;
    //     // var_dump($_SESSION['userID']);
    //     $user = UtilisateurDB::load($_SESSION['userID']);
    //     return $user->isAdmin();
    // }
    
    // public static function isNotAdmin()
    // {
    //     return !Controller::isAdmin();
    // }

    // public static function requireAdmin()
    // {
    //     if (Controller::isNotAdmin())
    //        header('Location: index.php?command=login');
        
    // }
}

?>
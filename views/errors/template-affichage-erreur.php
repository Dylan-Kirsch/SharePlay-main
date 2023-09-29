<?php
$title="Back-office ERROR";
$css= ' <link rel="stylesheet" href="connexion.css">';
$menu= true;

ob_start();
?>
Erreur: <?=$msgErreur?>

<?php
$content= ob_get_clean();
require_once './views/layout.php';
?>
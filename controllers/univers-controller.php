<?php
    
    function afficherUnivers()
    {

        $reponse = GalerieDB::lister();

        if ($reponse->isSuccessfull())
        {
            $counter = 0;
            $listeGalerie = $reponse->getData();
            foreach ($listeGalerie as $galerie) 
            {

                if ($counter >= 6) {
                    break; // Arrêter la boucle une fois que 6 éléments ont été affichés
                }
                include 'views\universPlusRegarder.php';
                $counter++;
            }
        } 
        else
        include('views\afficherException.php');

    }


    function afficherUnUnivers(int $pId)
    {

        $reponse = UniversDB::lire($pId);

        if ($reponse->isSuccessfull())
        {

            if ($reponse->isDataFound())
            {

                $jeux = $reponse->getData()[0];
                include 'views\ajoutRecent.php';

            }
            else
                include('views\universNonTrouvee.php');
        }
        else
        include('views\afficherException.php');
        
    }

?>
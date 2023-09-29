<?php

    function afficherJeux()
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
                include 'views\jeuxPlusRegarder.php';
                $counter++;

            }
        } 
        else
        include('views\afficherException.php');

    }


    function afficherUnJeux($pId)
    {

        $reponse = JeuxDB::lire($pId);

        if ($reponse->isSuccessfull())
        {

            if ($reponse->isDataFound())
            {

                $jeux = $reponse->getData()[0];
                include 'views\ajoutRecent.php';

            }
            else
                include('views\jeuxNonTrouvee.php');
        }
        else
        include('views\afficherException.php');

    }

?>
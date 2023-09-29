<?php

    class GalerieController extends Controller
    {

        public static function afficherGalerie()
        {

            $reponse = GalerieDB::lister();

            if ($reponse->isSuccessfull())
            {   
                $count = 0;
                $listeGalerie = $reponse->getData();
                foreach ($listeGalerie as $galerie) 
                {
                    if ($galerie) {
                        
                        if ($count % 3 === 0) {
                            
                            echo '<div class="itemRecent">';
                        }

                        include 'views\ajoutRecent.php';

                    
                        $count++;

                        
                        if ($count % 3 === 0) {
                            echo '</div>';
                        }

                    } 
                    else 
                    {
                        break; 
                    }
                }

                if ($count % 3 !== 0) {
                    echo '</div>';
                }
            } 
            else
            include('views\afficherException.php');

        }


        public static function afficherUneGalerie($pId)
        {

            $reponse = GalerieDB::lire($pId);

            if ($reponse->isSuccessfull())
            {

                if ($reponse->isDataFound())
                {

                    $galerie = $reponse->getData()[0];
                    include 'views\ajoutRecent.php';

                }
                else
                    include('views\galerieNonTrouvee.php');
            }
            else
            {
                include('views\afficherException.php');
            }

        }


        public static function ajouterGalerie()
        {
        
            if (count($_POST)==0)
            {
                $jeu = JeuxDB::lister()->getData();
                $univers = UniversDB::lister()->getData();
                $typeAffichage = TypeAffichageDB::lister()->getdata();
            }
            else
            {   
        
                if (AccueilController::isNotConnected())
                {
                    $_SESSION['message']='Il faut être connecté';
                    header('Location: index.php');
                }
                else if (AccueilController::isConnected())
                {
                    $resultat = GalerieDB::creer($_POST) && TagDB::creer($_POST);
                    
                    if ($resultat)
                        include 'views\success\galerieAjouter.php';
                    else
                    {
                        $jeu = JeuxDB::lister()->getData();
                        $univers = UniversDB::lister()->getData();
                        $typeAffichage = TypeAffichageDB::lister()->getdata();
                    }

                }     
            }
        }

    } 

?>
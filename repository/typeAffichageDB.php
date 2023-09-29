<?php

    class TypeAffichageDB
    {

        static public function lister():Reponse
        {

            try 
            {
            
                $stmt = Database::getInstance()->query("SELECT * from TYPE_AFFICHAGE;");
                $resultat = $stmt->fetchall();
                $listeTypeAffichage = new ArrayObject();

                

                foreach ($resultat as $key => $value) {

                    $type_Affichage = new TypeAffichage(
                        $value['id'],
                        $value['types'],
                        $value['route']
                    );
                
                    $listeTypeAffichage->append($type_Affichage);

                }

                return new Reponse($listeTypeAffichage);

            }

            catch(PDOException $e)
            {

                return new Reponse(new ArrayObject(),$e);

            } 
        }

    }















?>
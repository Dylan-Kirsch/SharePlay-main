<?php

    class UniversDB
    {

        static public function lister():Reponse
        {

            try 
            {
            
                $stmt = Database::getInstance()->query("SELECT * from UNIVERS;");
                $resultat = $stmt->fetchall();
                $listeUnivers = new ArrayObject();

                foreach ($resultat as $key => $value) {

                    $univers = new Univers(
                        $value['id'],
                        $value['titre'],
                        $value['photo_default']
                    );
                
                    $listeUnivers->append($univers);

                }

                return new Reponse($listeUnivers);

            }

            catch(PDOException $e)
            {

                return new Reponse(new ArrayObject(),$e);

            } 
        }


        static public function lire(int $pId):Reponse
        {

            if (!is_numeric($pId)||$pId<=0)
                return new Reponse(new ArrayObject());
            
            try{

                $stmt = Database::getInstance()->query('SELECT * FROM UNIVERS WHERE ID ='.$pId.";");
                $value = $stmt->fetch();
                $resultat = new ArrayObject();

                if ($value!=false)
                {
                    $univers = new Univers(
                        $value['id'],
                        $value['titre'],
                        $value['photo_default']
                    );
                    
                    $resultat->append($univers);
                    return new Reponse($resultat);
                } 
                else
                return new Reponse(new ArrayObject());
            }

            catch(PDOException $e)
            {

                return new Reponse(new ArrayObject(),$e);
                
            }
        } 

    }

?>
<?php

    class JeuxDB
    {

        static public function lister():Reponse
        {

            try 
            {
            
                $stmt = Database::getInstance()->query("SELECT * from JEU;");
                $resultat = $stmt->fetchall();
                $listeJeux = new ArrayObject();
                
                foreach ($resultat as $key => $value) {

                    $jeux = new Jeux(
                        $value['id'],
                        $value['title'],
                        $value['photo_defaut']
                    );
                
                    $listeJeux->append($jeux);

                }

                return new Reponse($listeJeux);

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

                $stmt = Database::getInstance()->query('SELECT * FROM JEU WHERE ID ='.$pId.";");
                $value = $stmt->fetch();
                $resultat = new ArrayObject();

                if ($value!=false)
                {
                    $jeux = new Jeux(
                        $value['id'],
                        $value['title'],
                        $value['photo_defaut']
                    );
                    
                    $resultat->append($jeux);
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
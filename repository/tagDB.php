<?php

    class TagDB
    {

        static public function lister():Reponse
        {

            try 
            {
            
                $stmt = Database::getInstance()->query("SELECT * from TAG;");
                $resultat = $stmt->fetchall();
                $listeTag = new ArrayObject();

                foreach ($resultat as $key => $value) {

                    $tag = new Tag(
                        $value['id'],
                        $value['libelle']
                    );
                
                    $listeTag->append($tag);

                }

                return new Reponse($listeTag);

            }

            catch(PDOException $e)
            {

                return new Reponse(new ArrayObject(),$e);

            } 
        }


        static public function creer($pData):bool
        {
        
            
            if (!(isset($pData['libelle'])&& strlen($pData['libelle'])))
                return false;

            try
            {
                $stmt = Database::getInstance()->prepare("INSERT INTO TAG (libelle)
                VALUES(:libelle)");
                
                $stmt->bindValue(':libelle',$pData['libelle']);

                return $stmt->execute();
            }

            catch (PDOException $e)
            {
                echo $e->getMessage();
                return false;
            }
            
        }


    
    }
?>
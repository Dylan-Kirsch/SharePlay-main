<?php

    class PhotoDB
    {

        static public function lister():Reponse
        {

            try 
            {
            
                $stmt = Database::getInstance()->query("SELECT * from PHOTO;");
                $resultat = $stmt->fetchall();
                $listePhoto = new ArrayObject();

                foreach ($resultat as $key => $value) {

                    $photo = new Photo(
                        $value['id'],
                        $value['photo']
                    );
                
                    $listePhoto->append($photo);

                }

                return new Reponse($listePhoto);

            }

            catch(PDOException $e)
            {

                return new Reponse(new ArrayObject(),$e);

            } 
        }


        static public function uploader($pData):bool
        {
        
            
            if (!(isset($pData['photo'])&& file($pData['photo'])))
                return false;

            try
            {
                $stmt = Database::getInstance()->prepare("INSERT INTO photo (photo)
                VALUES(:photo)");
                
                $stmt->bindValue(':photo',$pData['photo']);

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
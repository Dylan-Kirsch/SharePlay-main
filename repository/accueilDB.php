<?php


    class NewsDB
    {

        static public function lister():Reponse
        {

            try
            {

                $stmt = Database::getInstance()->query("SELECT * FROM NEWS");
                $resultat = $stmt->fetchall();
                $listeNews = new ArrayObject();

                foreach ($resultat as $key => $value) {
                    
                    $news = new News 
                    (
                        $value['id'],
                        $value['titre'],
                        $value['information'],
                        $value['photo']
                    );

                    $listeNews->append($news);

                }

                return new Reponse($listeNews);

            }

            catch(PDOException $e)
            {

                //print_r('Gros Problème'.$e->getMessage());
                return new Reponse(new ArrayObject(),$e);

            }


        }


        static function lire(int $pId):Reponse
        {

            if (!is_numeric($pId)||$pId<=0)
                return new Reponse(new ArrayObject());

            try
            {

                $stmt = Database::getInstance()->query("SELECT * FROM NEWS");
                $value = $stmt->fetch();
                $resultat = new ArrayObject();

                if ($value!=false) {
                    
                    $news = new News 
                    (
                        $value['id'],
                        $value['titre'],
                        $value['information'],
                        $value['photo']
                    );

                    $resultat->append($news);
                    return new Reponse($resultat);

                }
                else
                return new Reponse(new ArrayObject());

            }

            catch(PDOException $e)
            {

                print_r('Gros Problème'.$e->getMessage());
                return new Reponse(new ArrayObject(),$e);
                
            }
        }

        static public function ajouterNews($pData):bool
        {
        
            if (!(isset($pData['titre'])&& isset($pData['titre'])))
            return false;
            if (!(isset($pData['information'])&& isset($pData['information'])))
            return false;
            if (!(isset($pData['photo'])&& isset($pData['photo'])))
            return false;

            try
            {
                $stmt = Database::getInstance()->prepare("INSERT INTO news (titre, information, photo)
                VALUES(:titre, :information, :photo)");
                
                $stmt->bindValue(':titre',$pData['titre']);
                $stmt->bindValue(':information',$pData['information']);
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
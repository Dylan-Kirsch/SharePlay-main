<?php


    class UtilisateurDB
    {

        static public function lister():Reponse
        {

            try
            {

                $stmt = Database::getInstance()->query("SELECT * FROM UTILISATEUR");
                $resultat = $stmt->fetchall();
                $listeUtilisateur = new ArrayObject();

                foreach ($resultat as $key => $value) {
                    
                    $utilisateur = new Utilisateur
                    (
                        $value['id'],
                        $value['nom'],
                        $value['prenom'],
                        $value['pseudo'],
                        $value['email'],
                        $value['mot_de_passe'],
                        // $value['adresse'],
                        // $value['langue']

                    );

                    $listeUtilisateur->append($utilisateur);

                }

                return new Reponse($listeUtilisateur);

            }

            catch(PDOException $e)
            {

                //print_r('Gros Problème'.$e->getMessage());
                return new Reponse(new ArrayObject(),$e);

            }


        }


        static public function creerUtilisateur($pData):bool
        {
            if (!(isset($pData['nom'])&& strlen($pData['nom'])))
                return false;
                if (!(isset($pData['prenom'])&& strlen($pData['prenom'])))
                return false;
                if (!(isset($pData['pseudo'])&& strlen($pData['pseudo'])))
                return false;
                if (!(isset($pData['email'])&& strlen($pData['email'])))
                return false;
                if (!(isset($pData['mot_de_passe'])&& strlen($pData['mot_de_passe'])))
                return false;
                if (!filter_var($pData['email'], FILTER_VALIDATE_EMAIL))
                return false;
                
            try 
            {
                
                $stmt = Database::getInstance()->prepare("INSERT INTO UTILISATEUR (nom, prenom, pseudo, email, mot_de_passe)
                VALUES(:nom, :prenom, :pseudo, :email, :mot_de_passe)");
                
                $stmt->bindValue(':nom',$pData['nom']);
                $stmt->bindValue(':prenom',$pData['prenom']);
                $stmt->bindValue(':pseudo',$pData['pseudo']);
                $stmt->bindValue(':email', $pData['email']);
                $stmt->bindValue(':mot_de_passe',password_hash($pData['mot_de_passe'], PASSWORD_BCRYPT));

                return $stmt->execute();
            }

            catch (PDOException $e)
            {
                echo $e->getMessage();
                return false;
            }
        }


// ************* MODIFIER UTILISATEUR ************

        // public static function modifInfoProfil($pData):bool
        // {
        //     if (!(isset($pData['nom'])&& strlen($pData['adresse'])))
        //     return false;
        //         if (!(isset($pData['adresse'])&& strlen($pData['adresse'])))
        //         return false;
        //         if (!(isset($pData['langue'])&& strlen($pData['langue'])))
        //         return false;
            
        //     try
        //     {
        //         $stmt = Database::getInstance()->prepare("UPDATE UTILISATEUR SET (nom, adresse, langue)
        //         VALUES(:nom, :adresse, :langue) WHERE id.utilisateur");

        //         $stmt->bindValue(':nom',$pData['nom']);
        //         $stmt->bindValue(':adresse',$pData['adresse']);
        //         $stmt->bindValue(':langue',$pData['langue']);

        //         return $stmt->execute();
        //     }

        //     catch (PDOException $e)
        //     {
        //         echo $e->getMessage();
        //         return false;
        //     }

        // }



// ************  LOGIN   **************


        public static function checkLogin($email, $mot_de_passe)
        {
            try
            {
           
                $sql= "SELECT * from `utilisateur`where email like :email";
                $db=DataBase::getInstance()->prepare($sql);
                $db->execute([
                    'email'=>$email
                ]);
                $tuple = $db->fetch();
                if ($tuple && password_verify($mot_de_passe, $tuple['mot_de_passe']))
                    {
                        $utilisateur = new Utilisateur($tuple['id'],$tuple['nom'],$tuple['prenom'],
                                                       $tuple['pseudo'],$tuple['email'],$tuple['mot_de_passe'],
                                                       $tuple['adresse'], $tuple['langue']);
                        return $utilisateur;
                    }
                    else
                    return false;
            }
            catch (PDOException $exception) 
            {
                $msgErreur =$exception->getMessage();
                require_once './views/errors/template-affichage.php';
            } 
        }

        public static function load($id)
        {
            try
            {
                $sql= "SELECT * FROM `utilisateur` where ID=:id;";
                $db=DataBase::getInstance()->prepare($sql);

                $db->execute(['id'=>$id]);

                $tuple =$db->fetch();
                $utilisateur = new Utilisateur($tuple['id'],$tuple['nom'],$tuple['prenom'],
                                               $tuple['pseudo'],$tuple['email'],$tuple['mot_de_passe'],
                                               $tuple['adresse'], $tuple['langue']);
                return $utilisateur;
            }
            catch (PDOException $exception) 
            {
                $msgErreur =$exception->getMessage();
                require_once './views/errors/template_affichage_error.php';
            } 
        }





    
    }

?>
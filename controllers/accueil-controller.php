<?php

    class AccueilController extends Controller
    {
        public static function afficherNews()
        {
            
            ob_start();
            
            $reponse = NewsDB::lister();
            $listeJeux = JeuxDB::lister();
            $listeUnivers = UniversDB::lister();
            $listeTypeAffichage = TypeAffichageDB::lister();

            if ($reponse->isSuccessfull())
            {
                $listeNews = $reponse->getData();

                if ($listeNews)
                {
                    foreach ($listeNews as $key=>$news) 

                    {
                        if ($key == 0)
                        {
                            $active = "active";
                            
                        }
                        else
                            $active ="";
                            include('views\carousel-news.php');
                    }

                }
                
                else
                    include 'views\newsNonTrouvee.php';
            } 
            else
            include('views\afficherException.php');

            $carouselNews = ob_get_clean();
            include 'views/layout.php';

        }

        public static function afficherUneNews(int $pId)
        {

            $reponse = NewsDB::lire($pId);

            if ($reponse->isSuccessfull())
            {

                if ($reponse->isDataFound())
                {
                    $news = $reponse->getData()[0];
                
                    include 'views\carousel-news.php';
                }
                else
                    include 'views\newsNonTrouvee.php';
            }
            else
            include('views\afficherException.php');
        
        }


        public static function ajouterNews()
        {
            $target_dir = "assets/images/upload/";

            $target_file = $target_dir . basename($_FILES["photo"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            if(isset($_POST["ajouter"])) 
            {
                $check = getimagesize($_FILES["photo"]["tmp_name"]);
                
                if($check !== false)
                {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } 
                else 
                {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }

            // Check if file already exists
            if (file_exists($target_file)) 
            {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["photo"]["size"] > 3000000) 
            {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) 
            {
                echo "Sorry, only JPG, JPEG, PNG files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) 
            {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } 
            else 
            {
                if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) 
                {
                    echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
                    echo  NewsDB::ajouterNews(['titre'=>'pa premoer','information'=>"dddd",'photo'=>$target_file]);
                } 
                else 
                {
                    echo "Sorry, there was an error uploading your file.";
                }
            }

   

        }
        
    }
    
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href=".\assets\css\parametre.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Sansita:wght@700&display=swap" >

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <title>Parametre profil</title>
</head>
<body>

    <a class="close" href="index.php"><i class="fa-solid fa-xmark fa-2xl"></i></a>

    <div id="infoGlobal">

        <div id="parametreG" class="container-fluid">
            <div id="paraProfil">
                <img src="assets/images/photo-profil.jpg" alt="photo de profil">

                <div class="profile">
                    <p><?=$_SESSION['prenom']?> <?=$_SESSION['nom']?></p>
                    <p><?=$_SESSION['pseudo']?></p>
                    <p><?=$_SESSION['email']?></p>
                </div>
                
            </div>

            <div class="infoCompte" >
                <p>Compte</p>
                <p>
                    <i class="fa-solid fa-id-card-clip"></i>
                    Vos informations
                </p>
            </div>

        </div>

        <div id="parametreD" class="container-fluid">

            <h1>Vos informations</h1>

            
            <form action="index.php?page=parametre?modifier-profil" method="POST">

                <div class="infoNom" >

                    <p>Nom</p>

                    <input type="text" name="nom" value="<?=isset($_POST['nom'])?$_POST['nom']:"";?>" >
                    <!-- <p></p> -->

                    <button>Modifier</button>

                </div>

                <div class="infoLangue" >

                    <p>Langue</p>

                    <input type="text" name="langue" value="<?=isset($_POST['langue'])?$_POST['langue']:"";?>" >
                    <!-- <p></p> -->

                    <button>Modifier</button>

                </div>

                <div class="infoAdresse" >

                    <p>Adresse du domicile</p>

                    <input type="text" name="adresse" value="<?=isset($_POST['adresse'])?$_POST['adresse']:"";?>" >
                    <!-- <p></p> -->

                    <button>Modifier</button>

                </div>

                <div class="enregistrer">
                    <input type="submit" name="enregistrer" value="Enregistrer">
                </div>

                <input type="hidden" name="csrftoken" value="<?=$token?>">

            </form>


        </div>

    </div>

</body>
</html>
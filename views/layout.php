<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/inscription.css ">
    <link rel="stylesheet" href="assets/css/connexion.css">
    <link rel="stylesheet" href="assets/css/profil.css">
    <link rel="stylesheet" href="assets/css/responsive.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"  integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Metal+Mania&display=swap" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Sansita:wght@700&display=swap" >

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

    <script src="assets\js\fonction.js"></script>
    <script src="assets\js\execution.js" defer></script>
    <script src="assets\js\carouselAjout.js" defer></script>

    <title>SharePlay</title>

</head>

<body> 

        <?php include 'views/nav.php' ?>
        
        <?php 
            if (isset($_SESSION['message']))
            {
        ?>
        <div class="bg-notice">
            <?=$_SESSION['message']?>
        </div>
        <?php
            unset($_SESSION['message']);
            }
        ?>
        <?php 
            if (isset($_SESSION['error']))
            {
        ?>
        <div class="bg-notice">
            <?=$_SESSION['error']?>
        </div>
        <?php
            unset($_SESSION['error']);
            }
        ?>


        <div id="carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">   
            <div class="carousel-inner">
                <?=$carouselNews?>
            </div>
        </div>
        
        
        
    </header>

    <section id="ajoutRecent">

    <h1 class="ajout px-4">Ajout récent</h1>
     
    <div id="list">
  
        <?php GalerieController::afficherGalerie(); ?>
    
    </div>
        

    </section>

    <section id="universPlusRegarder">

        <h1 class="universRegarder px-4">Univers le plus regarder</h1>

        <div class="itemRegarder">
            
            <?php afficherUnivers(); ?>
            
        </div>

    </section>

    <section id="jeuxPlusRegarder">

        <h1 class="jeuxRegarder">Jeux les plus regarder</h1>
 
        <div class="itemJeux">

            <?php afficherJeux(); ?>

        </div>

    </section>

    <?php include 'views/footer.php' ?>
    

</body>
</html>
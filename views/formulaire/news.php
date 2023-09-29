<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href=".\assets\css\news.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"  integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Sansita:wght@700&display=swap" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" >

    <title>Document</title>
</head>
<body>

    <div id="newsForm" class="container">

        <div id="background" class="card">

            <img src=".\assets\images\news\news-wallpaper.jpg" alt="">

            <div class="card-img-overlay">
                <h1>Ajouter une nouvelle news</h1>
            </div>
            
        </div>

        <div class="news card" >

            <form action="index.php?page=upload-news" method="POST" enctype="multipart/form-data">
                <!-- <div class="titre">
                    <input type="text" name="titre" placeholder="titre ">
                </div>

                <div class="info">
                    <input type="text" name="info" placeholder="information ">
                </div> -->

                <div class="photos">
                    <input type="file" name="photo" id="photo" placeholder="ajouter une photo">
                </div>

                <div class="valider">
                    <input type="submit" name="ajouter" value="valider">
                </div>
            </form>
        </div>

    </div>

    
    
</body>
</html>

<div class="card">
    <!-- <span>
        <i class="fa-solid fa-trash-can fa-xl" style="color: #cc0000;"></i>
    </span> -->
    <a href="index.php?page=<?=$galerie->typeAffichage->route?>">
        <img src="assets/images/jeux-univers/<?=$galerie->univers->photo_default?>" alt="Image">
        <div class="overley1 card-img-overlay d-flex flex-column justify-content-between">
            <h3 class="card-title"><?=$galerie->univers->titre?></h3>
            <h4 class="card-text"><?=$galerie->utilisateur->getPseudo()?></h4>
        </div>
    </a>
</div>


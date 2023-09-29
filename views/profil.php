
<div id="leProfil" class="dropProfil">
    <span> <?=$_SESSION['pseudo']?> </span>
    <img id="btnDrop" src="assets/images/photo-profil.jpg" alt="photo de profil">
</div>

<div id="profil" class="dropMenu">
    <div class="profil">
        <img src="assets/images/photo-profil.jpg" alt="photo de profil">
        <h3><?=$utilisateur->getPrenom()?> <?=$utilisateur->getNom()?></h3>
        <span><?=$_SESSION['pseudo']?></span>
    </div>
    <ul>
        <li class="paraProfil" >
            <a href="index.php?page=parametre">
                <i class="fa-solid fa-gear"></i>
                Paramètre du profil
            </a>
        </li>

        <li class="mesGalerie" >
            <a href="#">
                <i class="fa-solid fa-panorama fa-sm"></i>
                Mes galeries
            </a>
        </li>

        <li class="touteCommu" >
            <a href="#">
                <i class="fa-solid fa-users-rays fa-sm"></i>
                Toutes les communautés
            </a>
        </li>

        <li class="news" >
            <a href="index.php?page=ajouter-news">
            <i class="fa-sharp fa-solid fa-rss fa-sm"></i>
                Ajouter une news
            </a>
            
        </li>

        <li class="deconnection">
            <a href="index.php?page=logout">Deconnexion</a>
        </li>
    </ul>
</div>
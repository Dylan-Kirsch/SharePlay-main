<div id="connectInscri" class="dropProfil">
    <i id="btnDrop" class="fa-solid fa-circle-user" style="color: #a6a6a6;"></i>
</div>

    
    <div class="dropMenu">

<!-- CONNEXION -->

        <form method="POST" action="index.php?page=login" >

            <div id="connexion">

                <h1>Connexion</h1>
        
                <span id="inscrire">
                    <p>Vous avez pas de compte ? inscrivez-vous </p>
                </span>

                <div id="identifiant">
                    <input type="text" name="email" placeholder="E-Mail" value="<?=isset($_POST['email'])?$_POST['email']:"";?>">
                </div>

                <div id="password">
                    <input type="password" name="password" placeholder="Mot de passe"  value="<?=isset($_POST['mot_de_passe'])?$_POST['mot_de_passe']:"";?>">
                </div>

                
                <div id="bouton">
                    <input type="submit" value="Se connecter">
                </div>
                <input type="hidden" name="csrftoken" value="<?=$token?>">
            </div>

        </form>

<!-- INSCRIPTION --> 
        <form method="POST" action="index.php?page=subscribe" >

            <div id="inscription">

                <h1>Inscription</h1>
                
                <span id="seConnecter">
                    <p>Vous avez déjà un compte ?</p>
                </span>

                <div id="nom">
                    <input type="text" name="nom" placeholder="Nom" value="<?=isset($_POST['nom'])?$_POST['nom']:"";?>">
                </div>

                <div id="prenom">
                    <input type="text" name="prenom" placeholder="Prenom" value="<?=isset($_POST['prenom'])?$_POST['prenom']:"";?>">
                </div>
                
                <div id="pseudo">
                    <input type="text" name="pseudo" placeholder="Pseudo" value="<?=isset($_POST['pseudo'])?$_POST['pseudo']:"";?>">
                </div>

                <div id="email">
                    <input type="email" name="email" placeholder="E-mail" value="<?=isset($_POST['email'])?$_POST['email']:"";?>">
                </div>

                <div id="motDePasse">
                    <input type="password" name="mot_de_passe" placeholder="Mot de passe" value="<?=isset($_POST['mot_de_passe'])?$_POST['mot_de_passe']:"";?>">
                </div>
                
                <div id="bouton">
                    <input type="submit" value="S'inscrire">
                </div>
                <input type="hidden" name="csrftoken" value="<?=$token?>">

            </div>
 
        </form>

        
    </div>


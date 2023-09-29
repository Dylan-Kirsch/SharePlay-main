function toggleDrop() 
{
    let profil = document.querySelector('.dropMenu');
    let nomSite = document.querySelector('#nomSite');
    let nav = document.querySelector('#navbar');

    if (profil.style.display == "flex") 
    {
        profil.style.display = "none";
        nomSite.style.color = "#fff"
        nav.style.backgroundColor = "#00000077";
        console.log('non visible');
    }
    else
    {
        profil.style.display = "flex";
        nomSite.style.color = "#000"
        nav.style.backgroundColor = "#fff";
        console.log('visible');
    }
}

function toggleCreerGalerie() 
{

    let galerie = document.querySelector('#dropCreer');
    let nav = document.querySelector('#navbar');

    if (galerie.style.visibility == "visible") 
    {
        galerie.style.visibility = "hidden";
        nomSite.style.color = "#fff"
        nav.style.backgroundColor = "#00000077";
        console.log('non visible');
    }
    else
    {
        galerie.style.visibility = "visible";
        nomSite.style.color = "#000"
        nav.style.backgroundColor = "#fff";
        console.log('visible');
    }
 
}


function hiddenForm()
{

    let inscription = document.querySelector('#inscription');
    let connexion = document.querySelector('#connexion');

    if (connexion.style.display == "none") 
    {
        connexion.style.display = "flex";
        inscription.style.display = "none";
        console.log('pas caché');
    }
    else
    {
        connexion.style.display = "none"
        inscription.style.display = "flex";
        console.log('caché');
    }

}
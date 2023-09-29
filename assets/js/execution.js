let btnDrop = document.querySelector('#btnDrop');
btnDrop.addEventListener('click', toggleDrop);

let btnCreerGalerie = document.querySelector('#navBtn');
btnCreerGalerie.addEventListener('click', toggleCreerGalerie);

// cacher le formulaire de connexion ou inscription

let btnHidden = document.querySelector('#inscrire');
btnHidden.addEventListener('click', hiddenForm);

let btnVisible = document.querySelector('#seConnecter');
btnVisible.addEventListener('click', hiddenForm);


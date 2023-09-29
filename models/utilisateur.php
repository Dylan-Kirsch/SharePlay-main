<?php 

    class Utilisateur
    {

        private int $id;

        private string $nom;

        private string $prenom;

        private string $pseudo;

        private string $email;

        private string $mot_de_passe;

        // private string $adresse;

        // private string $langue;



        public function __construct(int $pId, string $pNom, string $pPrenom, string $pPseudo, string $pEmail, string $pMot_de_passe, string $pAdresse, string $pLangue)
        {
            $this->id = $pId;
            $this->nom = htmlentities($pNom);
            $this->prenom = htmlentities($pPrenom);
            $this->pseudo = htmlentities($pPseudo);
            $this->email = htmlentities($pEmail);
            $this->mot_de_passe = htmlentities($pMot_de_passe);
            // $this->adresse = htmlentities($pAdresse);
            // $this->langue = htmlentities($pLangue);

        }

// mettre getters et setters

        public function getId()
        {
            return $this->id;
        }

        public function getNom()
        {
            return $this->nom;
        }

        public function getPrenom()
        {
            return $this->prenom;
        }

        public function getPseudo()
        {
            return $this->pseudo;
        }

        public function getEmail()
        {
            return $this->email;
        }
        
        public function getMotDePasse()
        {
            return $this->mot_de_passe;
        }

        public function getAdresse()
        {
            return $this->adresse;
        }

        public function getLangue()
        {
            return $this->langue;
        }



    }












?>
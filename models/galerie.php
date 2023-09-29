<?php ;

    class Galerie
    {

        public int $id;

        public Jeux $jeux;

        public Univers $univers;

        // public Tag $tag;

        // public Photo $photo;

        public TypeAffichage $typeAffichage;

        public Utilisateur $utilisateur;


        public function __construct($pId, Jeux $pJeux, Univers $pUnivers,TypeAffichage $pTypeAffichage , Utilisateur $pUtilisateur )
        {

            $this->id = $pId;
            $this->jeux = $pJeux;
            $this->univers = $pUnivers;
            // $this->tag = $pTag;
            // $this->photo = $pPhoto;
            $this->typeAffichage = $pTypeAffichage;
            $this->utilisateur = $pUtilisateur;
        }

    }

?>
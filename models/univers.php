<?php

    class Univers
    {

        public int $id;

        public string $titre;

        public $photo_default;

        public function __construct($pId,$pTitre,$pPhoto_default) {

            $this->id = $pId;
            $this->titre = htmlentities($pTitre);
            $this->photo_default = htmlentities($pPhoto_default);
        }


    }


?>
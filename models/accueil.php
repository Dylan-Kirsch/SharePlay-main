<?php

    class News 
    {
        public int $id;
        public string $titre;
        public string $information;
        public $photo;
        public function __construct($pId, $pTitre, $pInformation, $pPhoto) 
        {
            $this->id = $pId;
            $this->titre = htmlentities($pTitre);
            $this->information = htmlentities($pInformation);
            $this->photo = htmlentities($pPhoto);
        }
    }

?>
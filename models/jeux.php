<?php

    class Jeux {

        public int $id;

        public string $title;

        public string $photo_defaut;

        public function __construct(int $pId, string $pTitle, string $pPhoto_defaut) {

            $this->id = $pId;
            $this->title = htmlentities($pTitle);
            $this->photo_defaut = $pPhoto_defaut;
        }

    }

?>
<?php 

    class Photo
    {

        public int $id;

        public string $photo;


        public function __construct($pId, $pPhoto)
        {

            $this->id = $pId;
            $this->photo = $pPhoto;

        }

    }


?>
<?php

    class TypeAffichage
    {
        public int $id;

        public string $types;

        public string $route;


        public function __construct(int $pId, string $pTypes, string $pRoute)
        {
            $this->id = $pId;
            $this->types = htmlentities($pTypes);
            $this->route = htmlentities($pRoute);
        }
    }














?>
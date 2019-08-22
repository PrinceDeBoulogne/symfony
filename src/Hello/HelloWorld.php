<?php

namespace App\Hello;
    class HelloWorld
    {
        private $prenom;
        private $magnifier;

        function yo()
        {
            return "yo $this->prenom";
        }
        function yoUpper()
        {
            return $this->magnifier->upper($this->yo());
        }
        function __construct(string $p, Magnifier $m)
        {
            $this->prenom = $p;
            $this->magnifier = $m;
        }
    }
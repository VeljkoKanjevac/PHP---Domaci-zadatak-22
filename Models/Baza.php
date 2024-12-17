<?php

    class Baza
    {
        public $sql;

        public function __construct()
        {
            $this->sql = mysqli_connect("localhost","root","","web_shop");
        }
    }
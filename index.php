<?php

    require_once "Models/Korisnik.php";

    $korisnik = new Korisnik();
    $email = "nekikorisnik.com";

    if($korisnik -> emailExists($email) === false) 
    {
        $korisnik -> register($email, "veljko123");
    }
    else
    {
        die("Korisnik sa unetom email adresom vec postoji u bazi podataka");
    }
<?php

    require_once "Baza.php";

    class Korisnik extends Baza
    {
        public function register($email, $password)
        {
            $password = password_hash($password, PASSWORD_BCRYPT);
            $email = $this -> sql -> real_escape_string($email);
            $password = $this -> sql -> real_escape_string($password);

            $this -> sql -> query(" INSERT INTO korisinci (email, sifra) VALUES ('$email', '$password') ");
        }

        public function emailExists($email)
        {
            $email = $this -> sql -> real_escape_string($email);
            $result = $this -> sql -> query(" SELECT * FROM korisnici WHERE email = '$email' ");
            if ($result -> num_rows > 0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function deleteUser($email)
        {
            $email = $this -> sql -> real_escape_string($email);
            $this -> sql -> query(" DELETE FROM korisnici WHERE email = '$email' ");
        }

        public function update($usersEmail, $email, $password)
        {
            $password = password_hash($password, PASSWORD_BCRYPT);
            $email = $this -> sql -> real_escape_string($email);
            $password = $this -> sql -> real_escape_string($password);
            $usersEmail = $this -> sql -> real_escape_string($usersEmail);

            $this -> sql -> query(" UPDATE korisnici SET email = '$email' , sifra = '$password' WHERE email = '$$usersEmail' ");
        }
    }
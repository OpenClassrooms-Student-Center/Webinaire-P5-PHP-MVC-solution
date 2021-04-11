<?php

abstract class Manager
{

    private $bdd;

    protected function dbConnect()
    {
        if ($this->bdd == null) {
            try {
                $this->bdd = new PDO('mysql:dbname=webinaires;host=127.0.0.1;charset=utf8', 'phpmyadmin', 'root');
                $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Échec lors de la connexion : ' . $e->getMessage();
            }
        }
        return $this->bdd;
    }

}
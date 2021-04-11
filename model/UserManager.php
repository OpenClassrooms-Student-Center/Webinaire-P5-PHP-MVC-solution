<?php
require_once 'Manager.php';

class UserManager extends Manager
{

    public function getUser($login)
    {
        $req = $this->dbConnect()->prepare('SELECT * FROM users WHERE login = ?');
        $req->execute([$login]);
        return $req->fetch();
    }

}
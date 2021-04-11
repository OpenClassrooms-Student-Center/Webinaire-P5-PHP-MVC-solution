<?php
require_once 'Manager.php';

class CategoryManager extends Manager
{
    public function getCategories()
    {
        $req = $this->dbConnect()->query('SELECT * FROM categories');

        return $req->fetchAll();
    }
}
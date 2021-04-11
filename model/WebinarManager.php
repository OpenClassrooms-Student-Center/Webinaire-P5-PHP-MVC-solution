<?php
require_once 'Manager.php';

class WebinarManager extends Manager
{

    public function getWebinars($categoryFilter)
    {
        $request = 'SELECT w.id, w.name as webinar_name, w.date, w.description, c.name as category_name, c.color, u.login FROM webinars w INNER JOIN categories c ON c.id = w.category INNER JOIN users u ON u.id = w.user ';
        // on construit notre requête : on récupère les webinaires, avec la catégorie et l'auteur associé dont le nom correspond à l'éventuelle recherche
        $parameters = []; // on construit notre tableau de paramètres (à mettre dans execute) en fonction des filtres
        if ($categoryFilter !== 0) { // si on a une catégorie
            $request .= "WHERE w.category = ? ";
            $parameters[] = $categoryFilter;
        }
        $request .= ' ORDER BY w.date DESC'; // Récuparation des Webinaires
        $req = $this->dbConnect()->prepare($request);
        $req->execute($parameters);
        return $req->fetchAll();
    }

    public function insertWebinar($name, $description, $category, $user, $date, $link)
    {
        $req = $this->dbConnect()->prepare('INSERT INTO webinars (name, description, category, user, date, link) VALUES (?, ?, ?, ?, ?, ?)');
        $req->execute([$name, $description, $category, $user, $date, $link]);
    }
}
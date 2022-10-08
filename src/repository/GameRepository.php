<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Game.php';

class GameRepository extends Repository
{
    
    public function getGames()
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM games ORDER BY name
        ');
        
        $stmt->execute();
    
        $games = $stmt->fetchAll();
        
        if ($games == false) {
            return null;
        }
        
        return $games;
    }
}
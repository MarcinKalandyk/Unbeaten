<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/Event.php';

class EventRepository extends Repository
{
    public function addEvent(Event $event)
    {
        
        $stmt = $this->database->connect()->prepare("
            INSERT INTO `events` (`name`, `address`, `game_id`, `prize`, `fee`, `owner_id`, `image`, `date`, `match_type`) VALUES
            (?, ?, ?, ?, ?, ?, ?, ?, ?);
        ");
        
        $stmt->execute([
            $event->getName(),
            $event->getAddress(),
            $event->getGameId(),
            $event->getPrize(),
            $event->getFee(),
            1,
            $event->getImage(),
            $event->getDate(),
            $event->getMatchType(),
        ]);
    }
    
    public function getEvetns()
    {
        
        $stmt = $this->database->connect()->prepare('
            SELECT e.*, g.name AS game FROM events AS e
            JOIN games AS g ON g.id = e.game_id
        ');
        
        $stmt->execute();
        
        $events = $stmt->fetchAll();
        
        if ($events == false) {
            return null;
        }
        
        return $events;
    }
}
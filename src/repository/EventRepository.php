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
            $event->getOwnerId(),
            $event->getImage(),
            $event->getDate(),
            $event->getMatchType(),
        ]);
    }
    
    public function getEvent($id)
    {
        
        $stmt = $this->database->connect()->prepare('
            SELECT e.*, g.name AS game FROM events AS e
            JOIN games AS g ON g.id = e.game_id
            WHERE e.id = ?
        ');
        
        $stmt->execute([$id]);
        
        $event = $stmt->fetch();
        
        if ($event == false) {
            return null;
        }
        
        return $event;
    }
    
    public function getEvetns()
    {
        
        $stmt = $this->database->connect()->prepare('
            SELECT e.*, g.name AS game FROM events AS e
            JOIN games AS g ON g.id = e.game_id
            ORDER BY owner_id = :user DESC
        ');
        
        $stmt->bindParam(':user', $_SESSION['user']->getId());
        
        $stmt->execute();
        
        $events = $stmt->fetchAll();
        
        if ($events == false) {
            return null;
        }
        
        return $events;
    }
    
    public function getEventByTitle(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';
        
        $stmt = $this->database->connect()->prepare('
            SELECT e.*, g.name AS game FROM events AS e
            JOIN games AS g ON g.id = e.game_id
            WHERE LOWER(e.name) LIKE :search OR LOWER(g.name) LIKE :search
        ');
        $str = '%' . $searchString . '%';
        $stmt->bindParam(':search', $str, PDO::PARAM_STR);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function remove($id)
    {
        $stmt = $this->database->connect()->prepare('
            DELETE FROM events WHERE id = ?
        ');
        
        $stmt->execute([
            $id
        ]);
    }
}
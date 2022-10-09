<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/User.php';

class UserEventsRepository extends Repository
{
    public function add($user_id, $event_id)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users_events (user_id, event_id)
            VALUES (?, ?)
        ');
        
        $stmt->execute([
            $user_id,
            $event_id
        ]);
    }
    
    public function remove($user_id, $event_id)
    {
        $stmt = $this->database->connect()->prepare('
            DELETE FROM users_events WHERE user_id = ? AND event_id = ?
        ');
        
        $stmt->execute([
            $user_id,
            $event_id
        ]);
    }
    
    public function getUsersForEvent($event_id)
    {
        
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users_events WHERE event_id = :event_id
        ');
        $stmt->bindParam(':event_id', $event_id, PDO::PARAM_STR);
        $stmt->execute();
        
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        if ($list == false) {
            return null;
        }
        
        $users = [];
        
        $usersReposityory = new UserRepository();
        
        foreach ($list as $item) {
            $users[] = $usersReposityory->getUserByID($item['user_id']);
        }
        
        return $users;
    }
    
    public function userIsSigned($event_id, $user_id)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users_events WHERE event_id = :event_id AND user_id =:user_id
        ');
        $stmt->bindParam(':event_id', $event_id, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $stmt->execute();
        
        $list = $stmt->fetch(PDO::FETCH_ASSOC);
        
        
        if ($list == false) {
            return false;
        }
        
        return true;
    }
}
<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Game.php';
require_once __DIR__ . '/../models/Event.php';
require_once __DIR__ . '/../repository/GameRepository.php';
require_once __DIR__ . '/../repository/EventRepository.php';

class EventController extends AppController
{
    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/uploads/';
    
    private GameRepository $gameRepository;
    private EventRepository $eventRepository;
    
    private $message = [];
    
    public function __construct()
    {
        parent::__construct();
        $this->gameRepository = new GameRepository();
        $this->eventRepository = new EventRepository();
    }
    
    public function events()
    {
        $events = $this->eventRepository->getEvetns();
        
        $this->render('events', [
            'events' => $events
        ]);
    }
    
    public function addEvent()
    {
        
        if ($this->isPost()) {
           
            $event = new Event();
            
            if (is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
                $status = move_uploaded_file(
                    $_FILES['file']['tmp_name'],
                    getcwd() . self::UPLOAD_DIRECTORY . $_FILES['file']['name']
                );
                
                if ($status) {
                    $event->setImage(self::UPLOAD_DIRECTORY . $_FILES['file']['name']);
                }
            }
            
           
            $event->setName($_POST['name']);
            $event->setAddress($_POST['address']);
            $event->setGameId($_POST['game_id']);
            $event->setPrize($_POST['prize']);
            $event->setFee($_POST['fee']);
            $event->setOwnerId($_POST['owner_id']);
            $event->setDate($_POST['date']);
            $event->setMatchType($_POST['match_type']);
            
            if (!empty($this->message)) {
                return $this->render('add-event', [
                    'messages' => $this->message
                ]);
                
            }
            
            $this->eventRepository->addEvent($event);
    
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/events");
        }
        
        
        $games = $this->gameRepository->getGames();
        $this->render('add-event', [
            'games' => $games
        ]);
    }
    
    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }
        
        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }
}
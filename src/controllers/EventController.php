<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Game.php';
require_once __DIR__ . '/../models/Event.php';
require_once __DIR__ . '/../models/UserEvents.php';
require_once __DIR__ . '/../repository/GameRepository.php';
require_once __DIR__ . '/../repository/EventRepository.php';
require_once __DIR__ . '/../repository/UserEventsRepository.php';

class EventController extends AppController
{
    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/uploads/';
    
    private GameRepository $gameRepository;
    private EventRepository $eventRepository;
    private UserEventsRepository $userEventsRepository;
    
    private $message = [];
    
    public function __construct()
    {
        parent::__construct();
        $this->gameRepository = new GameRepository();
        $this->eventRepository = new EventRepository();
        $this->userEventsRepository = new UserEventsRepository();
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
    
    public function search() {
    
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    
        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
        
            header('Content-type: application/json');
            http_response_code(200);
        
            echo json_encode($this->eventRepository->getEventByTitle($decoded['search']));
        }
        
    }
    
    public function details() {
    
        $user = $_SESSION['user'];
        
        $event = $this->eventRepository->getEvent($_GET['id']);
    
        $users = $this->userEventsRepository->getUsersForEvent($_GET['id']);
        
        $isSigned = $this->userEventsRepository->userIsSigned($_GET['id'], $user->getId());
        
        $this->render('details', [
            'event' => $event,
            'users' => $users,
            'is_signed' => $isSigned
        ]);
    }
    
    public function join() {
        
        $user = $_SESSION['user'];
        
        $this->userEventsRepository->add($user->getId(), $_GET['id']);
    
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/details/?id=" . $_GET['id']);
    }
    
    public function withdraw() {
        
        $user = $_SESSION['user'];
        
        $this->userEventsRepository->remove($user->getId(), $_GET['id']);
    
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/details/?id=" . $_GET['id']);
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
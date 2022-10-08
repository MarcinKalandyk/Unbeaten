<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Game.php';
require_once __DIR__ . '/../repository/GameRepository.php';

class EventController extends AppController
{
    private GameRepository $gameRepository;
    
    public function __construct()
    {
        parent::__construct();
        $this->gameRepository = new GameRepository();
    }
    
    public function events()
    {
        $this->render('events');
    }
    
    public function addEvent() {
    
        $games = $this->gameRepository->getGames();
    
        $this->render('add-event', [
            'games' => $games
        ]);
    }
}
<?php

require_once 'AppController.php';

class EventController extends AppController
{
    public function events()
    {
        $this->render('events');
    }
    
    public function addEvent() {
    
    
        return $this->render('add-event');
    }
}
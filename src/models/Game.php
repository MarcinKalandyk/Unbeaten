<?php

class Game
{
    private $id;
    private $name;
    
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    
    public function getName()
    {
        return $this->name;
    }
}
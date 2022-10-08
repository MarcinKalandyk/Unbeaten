<?php

class Event
{
    private $id;
    private $name;
    private $address;
    private $game_id;
    private $prize;
    private $fee;
    private $owner_id;
    private $image;
    private $date;
    private $match_type;
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
    
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    
    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }
    
    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }
    
    /**
     * @return mixed
     */
    public function getGameId()
    {
        return $this->game_id;
    }
    
    /**
     * @param mixed $game_id
     */
    public function setGameId($game_id): void
    {
        $this->game_id = $game_id;
    }
    
    /**
     * @return mixed
     */
    public function getPrize()
    {
        return $this->prize;
    }
    
    /**
     * @param mixed $prize
     */
    public function setPrize($prize): void
    {
        $this->prize = $prize;
    }
    
    /**
     * @return mixed
     */
    public function getFee()
    {
        return $this->fee;
    }
    
    /**
     * @param mixed $fee
     */
    public function setFee($fee): void
    {
        $this->fee = $fee;
    }
    
    /**
     * @return mixed
     */
    public function getOwnerId()
    {
        return $this->owner_id;
    }
    
    /**
     * @param mixed $owner_id
     */
    public function setOwnerId($owner_id): void
    {
        $this->owner_id = $owner_id;
    }
    
    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }
    
    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }
    
    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }
    
    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }
    
    /**
     * @return mixed
     */
    public function getMatchType()
    {
        return $this->match_type;
    }
    
    /**
     * @param mixed $match_type
     */
    public function setMatchType($match_type): void
    {
        $this->match_type = $match_type;
    }
    
    
}
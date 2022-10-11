<?php

class User {
    
    private $id;
    private $email;
    private $password;
    private $name;

    public function __construct(
        $id,
        string $email,
        string $password,
        string $name
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
    }

    public function getEmail(): string 
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }
    
    public function getId(): string
    {
        return $this->id;
    }
    
    public function getName()
    {
        return $this->name;
    }
}
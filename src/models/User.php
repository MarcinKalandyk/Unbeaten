<?php

class User {
    
    private $id;
    private $email;
    private $password;
    private $name;
    private $role_id;
    
    public function __construct(
        $id,
        string $email,
        string $password,
        string $name,
        $role_id = null
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->role_id = $role_id;
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
    
    /**
     * @return int|null
     */
    public function getRoleId(): ?int
    {
        return $this->role_id;
    }
}
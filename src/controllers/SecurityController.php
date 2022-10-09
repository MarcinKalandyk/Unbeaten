<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../repository/UserRepository.php';

class SecurityController extends AppController
{
    
    private UserRepository $userRepository;
    
    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }
    
    public function login()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }
    
        $email = $_POST['email'];
        $password = md5($_POST['password']);
    
        $user = $this->userRepository->getUser($email);
    
        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }
    
        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }
    
        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }
        
        $_SESSION['user'] = $user;
    
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/events");
    }
    
    public function logout() {
        session_destroy();
    
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }
    
    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $name = $_POST['name'];
        
        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Passwords do not match']]);
        }
        
        //TODO try to use better hash function
        $user = new User($email, md5($password), $name);
        
        $this->userRepository->addUser($user);
    
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
        
    }
}
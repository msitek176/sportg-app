<?php

require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/Repository.php';

class SecurityController extends AppController
{
    public function login()
    {

        $userRepository = new UserRepository();


        if(!$this->isPost()){
            return $this->login('login');
        }

        $email= $_POST["email"];
        $password= $_POST["password"];

        $user = $userRepository->getUser($email);

        if((strlen($email)||strlen($password))==0)
        {
            return $this->render('login',['messages'=>['empty fields!']]);
        }

        if(!$user){
            return $this->render( 'login',['messages'=>['user not exist!']]);
        }

        if ($user->getEmail() !== $email){
            return $this->render( 'login',['messages'=>['user with this email not exist!']]);
        }

        $password = password_hash($password, PASSWORD_BCRYPT,array ('salt' => $user->getSalt()) );
        if ($user->getPassword() !== $password){
            return $this->render('login',['messages'=>['wrong passwords!']]);
        }

        session_start();
        $user = $userRepository->getUserId($email);
        $_SESSION['user_id'] = $user['id_user'];
        //echo  $_SESSION['user_id'];
        $_SESSION['role'] =$user['roles'];
        //echo   $_SESSION['role'];

        //return $this->render('profile');

        $url = "http://$_SERVER[HTTP_HOST]";
        header ("Location: {$url}/profile");
    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }
        $userRepository = new UserRepository();

        $salt = uniqid(mt_rand(), true);
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $user = $userRepository->getUser($email);

        if((!strlen($email)||!strlen($password)||!strlen($name)||!strlen($surname)))
        {
            return $this->render('register',['messages'=>['empty fields!']]);
        }

        if (!is_null($user))
        {
            return null;
        }

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }

        //(is_null($this->userRepository->getUser($email))): bool



        $password = password_hash($password, PASSWORD_BCRYPT,array ('salt' => $salt) );
        $user = new User($email, $password, $name, $surname, $salt);


        $userRepository->addUser($user);



        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }
}
<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index(){
        //dddd display login.htnl
        $this->render('login');
    }


    public function profile(){
        //dddd display exercises.php
        $this->render('profile');

    }
    public function settings(){
        //dddd display exercises.php
        $this->render('settings');

    }
    public function gyms(){
        //dddd display exercises.php
        $this->render('gyms');

    }
    public function friends(){
        //dddd display exercises.php
        $this->render('friends');

    }
    public function friendprofile(){
        //dddd display exercises.php
        $this->render('friend-profile');

    }
    public function addexercise(){
        //dddd display exercises.php
        $this->render('add-exercise');

    }


}
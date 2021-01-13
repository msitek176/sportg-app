<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index(){
        //dddd display login.htnl
        $this->render('login');
    }

    public function exercises(){
        //dddd display exercises.html
        $this->render('exercises');

    }
    public function profile(){
        //dddd display exercises.html
        $this->render('profile');

    }
    public function settings(){
        //dddd display exercises.html
        $this->render('settings');

    }
    public function gyms(){
        //dddd display exercises.html
        $this->render('gyms');

    }
    public function friends(){
        //dddd display exercises.html
        $this->render('friends');

    }
    public function friendprofile(){
        //dddd display exercises.html
        $this->render('friend-profile');

    }
    public function addexercise(){
        //dddd display exercises.html
        $this->render('add-exercise');

    }

}
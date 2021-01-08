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
}
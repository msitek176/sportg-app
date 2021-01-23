<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Exercise.php';
require_once __DIR__.'/../repository/ExerciseRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';


session_start();


class ProfileController extends AppController
{

    private $messages = [];
    private $exerciseRepository;


    public function __construct()
    {
        parent:: __construct();
        $this->exerciseRepository = new ExerciseRepository();
        $this->userRepository = new UserRepository();
    }

    public function profile(){
        $exercises = $this->exerciseRepository->getExercises();
        $user = $this->userRepository->getUserInfo($_SESSION['user_id']['id_user']);

        $this->render('profile',['exercises'=>$exercises, 'user'=>$user]);

    }


    public function exerciseDone()
    {
        if (!$this->isPost()) {
            return $this->render('profile');
        }

        $exercise = $_POST['exercise'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $note = $_POST['note'];
        $exercises = $this->exerciseRepository->getExercises();
        $user = $this->userRepository->getUserInfo($_SESSION['user_id']['id_user']);


        if (!strlen($time)||!strlen($exercise)||!strlen($date))
        {

            return $this->render('profile',['messages' => ['Please provide proper value'],'exercises'=>$exercises, 'user'=>$user]);
        }
        $this->exerciseRepository->exerciseDoneDB($exercise,$date,$time,$note);

        return $this->render('profile',['messages' => ['You\'ve been succesfully add exercise!'],'exercises'=>$exercises, 'user'=>$user]);
    }



}
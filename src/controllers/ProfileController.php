<?php
require_once 'AppController.php';
require_once __DIR__.'/../models/Exercise.php';
require_once __DIR__.'/../repository/ExerciseRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';

session_start();

class ProfileController extends AppController
{
    private $exerciseRepository;

    public function __construct()
    {
        parent:: __construct();
        $this->exerciseRepository = new ExerciseRepository();
        $this->userRepository = new UserRepository();
    }

    public function profile(){
        $exercises = $this->exerciseRepository->getExercises();
        $user = ($this->userRepository->getUserInfo($_SESSION['user_id']));
        $scores=$this->exerciseRepository->selectData($_SESSION['user_id']);
        $today = $this->userRepository->todayExercises($scores);
        $week = $this->userRepository->weekExercises($scores);
        $month = $this->userRepository->monthExercises($scores);
        $all = $this->userRepository->allExercises($scores);
        $this->render('profile',['exercises'=>$exercises, 'user'=>$user, 'today'=>$today, 'week'=>$week, 'month'=>$month, 'all'=>$all]);
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
        $user = $this->userRepository->getUserInfo($_SESSION['user_id']);
        $scores=$this->exerciseRepository->selectData($_SESSION['user_id']);
        $today = $this->userRepository->todayExercises($scores);
        $week = $this->userRepository->weekExercises($scores);
        $month = $this->userRepository->monthExercises($scores);
        $all = $this->userRepository->allExercises($scores);

        if (!strlen($time)||!strlen($exercise)||!strlen($date))
        {
            return $this->render('profile',['messages' => ['Please provide proper value'],'exercises'=>$exercises, 'user'=>$user, 'today'=>$today, 'week'=>$week, 'month'=>$month, 'all'=>$all]);
        }
        $this->exerciseRepository->exerciseDoneDB($exercise,$date,$time,$note);
        $scores=$this->exerciseRepository->selectData($_SESSION['user_id']);
        $today = $this->userRepository->todayExercises($scores);
        $week = $this->userRepository->weekExercises($scores);
        $month = $this->userRepository->monthExercises($scores);
        $all = $this->userRepository->allExercises($scores);
        return $this->render('profile',['messages' => ['You\'ve been succesfully add exercise!'],'exercises'=>$exercises, 'user'=>$user, 'today'=>$today, 'week'=>$week, 'month'=>$month, 'all'=>$all]);
    }
}
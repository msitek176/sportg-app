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
        //var_dump($_SESSION);
        //echo($_SESSION['user_id']);
        $user = ($this->userRepository->getUserInfo($_SESSION['user_id']));

        $scores=$this->exerciseRepository->selectData($_SESSION['user_id']);
        $today = $this->todayExercises($scores);
        $week = $this->weekExercises($scores);
        $month = $this->monthExercises($scores);
        $all = $this->allExercises($scores);
        $this->render('profile',['exercises'=>$exercises, 'user'=>$user, 'today'=>$today, 'week'=>$week, 'month'=>$month, 'all'=>$all]);


    }

    public function todayExercises($scores)
    {
        $calc = 0;
        $today = date("Y-m-d");
        foreach($scores as $score):
            //var_dump($score);

            if ($score['date'] == $today)
                $calc = $calc + (int)trim($score['time']," minutes");
        endforeach;
        return $calc;
    }

    public function weekExercises($scores)
    {
        $today = date("Y-m-d");
        $calc = 0;
        for($i = 0; $i < 7; $i ++)
        {
            $day = date( "Y-m-d", strtotime( "$today -$i day" ) );
            foreach($scores as $score):
                if ($score['date'] == $day)
                    $calc = $calc + (int)trim($score['time']," minutes");
            endforeach;
        }
        return $calc;
    }

    public function monthExercises($scores)
    {
        $week=$this->weekExercises($scores);
        $today = date("Y-m-d");
        $calc = $week;
        for($i = 7; $i < 30; $i ++)
        {
            $day = date( "Y-m-d", strtotime( "$today -$i day" ) );
            foreach($scores as $score):
                if ($score['date'] == $day)

                    $calc = $calc + (int)trim($score['time']," minutes");
            endforeach;
        }
        return $calc;
    }

    public function allExercises($scores)
    {
        $text_array = [];
        foreach($scores as $score):

            array_push($text_array,[$score['date'],$score['name'],$score['time'],$score['note']]);

        endforeach;
        return $text_array;
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
        $today = $this->todayExercises($scores);
        $week = $this->weekExercises($scores);
        $month = $this->monthExercises($scores);
        $all = $this->allExercises($scores);

        if (!strlen($time)||!strlen($exercise)||!strlen($date))
        {

            return $this->render('profile',['messages' => ['Please provide proper value'],'exercises'=>$exercises, 'user'=>$user, 'today'=>$today, 'week'=>$week, 'month'=>$month, 'all'=>$all]);
        }
        $this->exerciseRepository->exerciseDoneDB($exercise,$date,$time,$note);
        $scores=$this->exerciseRepository->selectData($_SESSION['user_id']);
        $today = $this->todayExercises($scores);
        $week = $this->weekExercises($scores);
        $month = $this->monthExercises($scores);
        $all = $this->allExercises($scores);
        return $this->render('profile',['messages' => ['You\'ve been succesfully add exercise!'],'exercises'=>$exercises, 'user'=>$user, 'today'=>$today, 'week'=>$week, 'month'=>$month, 'all'=>$all]);
    }





}
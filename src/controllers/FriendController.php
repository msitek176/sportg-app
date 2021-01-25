<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Friend.php';
require_once __DIR__.'/../repository/ExerciseRepository.php';
require_once __DIR__.'/../repository/FriendRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';


session_start();


class FriendController extends AppController
{

    private $messages = [];
    private $exerciseRepository;


    public function __construct()
    {
        parent:: __construct();
        $this->exerciseRepository = new ExerciseRepository();
        $this->userRepository = new UserRepository();
        $this->friendRepository = new FriendRepository();
    }

    public function friends(){
        $friends = $this->friendRepository->getFriendInfo($_SESSION['user_id']);
        $this->render('friends',['friends'=>$friends]);


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


    public function friendprofile(int $id_friend){
        $friend = $this->userRepository->getUserInfo($id_friend);

        $scores=$this->exerciseRepository->selectData($id_friend);
        $today = $this->todayExercises($scores);
        $week = $this->weekExercises($scores);
        $month = $this->monthExercises($scores);
        $all = $this->allExercises($scores);
        $this->render('friend-profile',['friend'=>$friend, 'today'=>$today, 'week'=>$week, 'month'=>$month, 'all'=>$all]);
    }

    public function removeuser(int $id_user)
    {
        $removing = $this->friendRepository->removing($id_user);
        $friends = $this->friendRepository->getFriendInfo($_SESSION['user_id']);

        $this->render('friends',['friends'=>$friends,'communicate'=>$removing]);
    }

}
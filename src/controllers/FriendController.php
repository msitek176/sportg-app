<?php
require_once 'AppController.php';
require_once __DIR__.'/../models/Friend.php';
require_once __DIR__.'/../repository/ExerciseRepository.php';
require_once __DIR__.'/../repository/FriendRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';

session_start();

class FriendController extends AppController
{
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

    public function friendprofile(int $id_friend){
        $friend = $this->userRepository->getUserInfo($id_friend);
        $scores=$this->exerciseRepository->selectData($id_friend);
        $today = $this->userRepository->todayExercises($scores);
        $week = $this->userRepository->weekExercises($scores);
        $month = $this->userRepository->monthExercises($scores);
        $all = $this->userRepository->allExercises($scores);
        $this->render('friend-profile',['friend'=>$friend, 'today'=>$today, 'week'=>$week, 'month'=>$month, 'all'=>$all]);
    }

    public function removeuser(int $id_user)
    {
        $removing = $this->friendRepository->removing($id_user);
        $friends = $this->friendRepository->getFriendInfo($_SESSION['user_id']);
        $this->render('friends',['friends'=>$friends,'communicate'=>$removing]);
    }
}
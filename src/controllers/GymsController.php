<?php
require_once 'AppController.php';
require_once __DIR__ . '/../models/Gym.php';
require_once __DIR__.'/../repository/GymsRepository.php';

session_start();

class GymsController extends AppController
{
    private $gymsRepository;

    public function __construct()
    {
        parent:: __construct();
        $this->gymsRepository = new GymsRepository();
    }

    public function gyms(){
        $gyms = $this->gymsRepository->getGyms();
        $this->render('gyms',['gyms'=>$gyms]);
    }

}
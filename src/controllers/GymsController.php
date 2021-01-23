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



    public function searchGyms()
    {

        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]): '';

        if($contentType === "application/json"){
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header ('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->gymsRepository->getGymsByName());
        }
    }



}
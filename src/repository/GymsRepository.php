<?php
require_once 'Repository.php';
require_once __DIR__ . '/../models/Gym.php';

session_start();

class GymsRepository extends Repository
{
    public function getGyms(): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM gyms JOIN address a on gyms.id_address = a.id_address
            ');
        $stmt->execute();

        $gyms = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($gyms as $gym){
            $address= $gym['street']."/".$gym['number'].", ".$gym['locality']." ".$gym['post_code'];
            $result[]= new Gym(
            $address,
            $gym['name'],
            $gym['image'],
        );
        }
      return  $result;
    }
}
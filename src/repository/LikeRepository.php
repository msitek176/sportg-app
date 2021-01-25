<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Exercise.php';

session_start();

class LikeRepository extends Repository
{

    public function ifLike($id_exersice)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT id_exercise FROM exercise_likes WHERE id_user=:id_user
        ');
        $stmt->bindParam(':id_user', $_SESSION['user_id'], PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //var_dump("test");
        if (in_array($id_exersice, $result)) {
            return 1;
        }
        return 0;

    }
}
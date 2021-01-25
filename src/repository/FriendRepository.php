<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Friend.php';


class FriendRepository extends Repository
{
        public function getFriendInfo($id_user)
        {
            $stmt = $this->database->connect()->prepare('
            SELECT * from user_details  WHERE id_user_details != :id_user
            ');
            $stmt->bindParam(':id_user',$id_user,PDO::PARAM_STR);
            $stmt->execute();

            $friends = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($friends == false){
                return null; //exeption better option
            }

            foreach ($friends as $friend) {
                $result[] = new Friend(
                    $friend['id_user_details'],
                    $friend['name'],
                    $friend['surname'],
                    $friend['description'],
                    $friend['image'],
                    $friend['hobby1'],
                    $friend['hobby2'],
                    $friend['hobby3']);
            }
           // var_dump($result);

            return $result;

        }

        public function removing($id_user)
        {
            try{
                $stmt = $this->database->connect()->prepare('
            DELETE FROM user_details WHERE id_user_details =:id_user
            ');
                $stmt->bindParam(':id_user',$id_user,PDO::PARAM_STR);
                $stmt->execute();

                return "User has been remove properly!";
            }
            catch (Exception $e)
            {
                return $e->getMessage();
            }
        }


}
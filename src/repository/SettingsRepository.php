<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/UserInfo.php';

class SettingsRepository extends Repository
{
        public function passwordChanges($id_user,$new_password): void
        {
            $stmt = $this->database->connect()->prepare('
                UPDATE users SET password=:new_password WHERE id_user=:id_user
            ');
            $stmt->bindParam(':new_password',$new_password,PDO::PARAM_STR);
            $stmt->bindParam(':id_user',$id_user,PDO::PARAM_INT);
            $stmt->execute();
        }

        public function checkingSaltAndPassword($id_user)
        {
            $stmt = $this->database->connect()->prepare('
                SELECT password,salt FROM users WHERE id_user=:id_user 
            ');
            $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $stmt->execute();
            $passwordandsalt = $stmt->fetch(PDO::FETCH_ASSOC);

            return $passwordandsalt;

        }

        public function changeInfo($id_user,$infoArray)
        {
                try{
                    $stmt = $this->database->connect()->prepare('
                    UPDATE user_details SET name =:name, surname =:surname, description =:description, hobby1 =:hobby1, hobby2 =:hobby2, hobby3 =:hobby3
                    WHERE id_user_details=:id_user
                ');

                    $stmt->bindParam(':name',$infoArray['name'],PDO::PARAM_STR);
                    $stmt->bindParam(':surname',$infoArray['surname'],PDO::PARAM_STR);
                    $stmt->bindParam(':description',$infoArray['description'],PDO::PARAM_STR);
                    $stmt->bindParam(':hobby1',$infoArray['hobby1'],PDO::PARAM_STR);
                    $stmt->bindParam(':hobby2',$infoArray['hobby2'],PDO::PARAM_STR);
                    $stmt->bindParam(':hobby3',$infoArray['hobby3'],PDO::PARAM_STR);
                    $stmt->bindParam(':id_user',$id_user,PDO::PARAM_STR);
                    $stmt->execute();
                }
                catch (Exception $e)
                {
                    return 0;
                }

                return 1;
        }
}
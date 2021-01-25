<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/UserInfo.php';


class UserRepository extends Repository
{

        public function getUser(string $email): ?User
        {
            $stmt = $this->database->connect()->prepare('
            SELECT users.*, ud.name, ud.surname from users left join user_details ud on users.id_user = ud.id_user_details WHERE email = :email
            ');
            $stmt->bindParam(':email',$email,PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user == false){
                return null; //exeption better option
            }

            return new User(
                $user['email'],
                $user['password'],
                $user['name'],
                $user['surname'],
                $user['salt'],

            );
        }

        public function getUserId($email){
            $stmt = $this->database->connect()->prepare('
            SELECT users.id_user, r.roles FROM users JOIN roles r on users.id_role = r.id_role WHERE email = :email
            ');
            $stmt->bindParam(':email',$email,PDO::PARAM_STR);
            $stmt->execute();
            $array =  $stmt->fetch(PDO::FETCH_ASSOC);
            return $array;
        }

        public function addUser ($user)
        {

            $date = new DateTime();

            $stmt = $this->database->connect()->prepare('
            INSERT INTO user_details (name, surname) VALUES (?,?);
            ');
            $stmt->execute([
                    $user->getName(),
                    $user->getSurname()
                ]
            );
            $stmt = $this->database->connect()->prepare('
            INSERT INTO users (email, password, salt, created_at) VALUES (?,?,?,?);
            ');
            $stmt->execute([
                $user->getEmail(),
                $user->getPassword(),
                $user->getSalt(),
                $date->format('Y-m-d')
                ]
            );

        }

        public function getUserInfo($id_user)
        {
            $stmt = $this->database->connect()->prepare('
            SELECT * from user_details  WHERE id_user_details = :id_user
            ');
            $stmt->bindParam(':id_user',$id_user,PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user == false){
                return null; //exeption better option
            }


            return new UserInfo($user['name'],
                $user['surname'],
                $user['description'],
                $user['image'],
                $user['hobby1'],
                $user['hobby2'],
                $user['hobby3']);
        }

}
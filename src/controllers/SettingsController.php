<?php
require_once 'AppController.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/SettingsRepository.php';

session_start();

class SettingsController extends AppController
{
    public function __construct()
    {
        parent:: __construct();
        $this->userRepository = new UserRepository();
        $this->settingsRepository= new SettingsRepository();
    }

    public function settings(){
        $settingsRepository= new SettingsRepository();
        $message = [""];
        $userRepository= new UserRepository();
        $user = $userRepository->getUserInfo($_SESSION['user_id']);

        if(!empty($_POST)){
            foreach (array_keys($_POST) as $key):
                if ((strlen($_POST[$key])==0) && $key!=='old-password' && $key!=='new-password'&& $key!=='new-password-confirm' && $key!=='email' && $key!=='file')
                {
                    $fun = 'get'.ucfirst($key);
                    $_POST[$key]=$user->$fun();
                }
            endforeach;

            if($settingsRepository->changeInfo($_SESSION['user_id'],$_POST))
            {
                $message= ["Everything is okay"];
            }
            else
            {
                $message=  ["something went wrong"];
            }

            if(strlen($_POST['old-password'])){
                $message = $this->passwordChange($settingsRepository);
            }
        }
        return $this->render('settings', ['messages' => $message]);
    }

    public function passwordChange($settingsRepository){
        $passwordandsalt = $settingsRepository->checkingSaltAndPassword($_SESSION['user_id']);
        $oldpassword = $_POST['old-password'];
        $oldpassword = password_hash($oldpassword, PASSWORD_BCRYPT,array ('salt' => $passwordandsalt['salt'] ));

        if ($oldpassword !== $passwordandsalt['password']){
            return ['wrong old passwords!'];
        }

        if ($_POST['new-password'] !== $_POST['new-password-confirm']) {
            return ['Please provide proper password'];
        }

        $_POST['new-password'] = password_hash($_POST['new-password'], PASSWORD_BCRYPT,array ('salt' => $passwordandsalt['salt'] ));

        if ($oldpassword === $_POST['new-password']) {
            return ['Old password is the same as new'];
        }

        $settingsRepository->passwordChanges($_SESSION['user_id']['id_user'],$_POST['new-password'] );
        return ['Password changed'];
    }
}
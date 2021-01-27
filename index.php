<?php
$id_user=1;

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);


Routing::get('index','DefaultController');
Routing::post('register','SecurityController');
Routing::get('exercises','ExerciseController');
Routing::post('login','SecurityController');
Routing::post('addexercise','ExerciseController');
Routing::get('profile','ProfileController');
Routing::get('settings','SettingsController');
Routing::get('gyms','GymsController');
Routing::get('searchGyms','GymsController');
Routing::get('friends','FriendController');
Routing::get('removeuser','FriendController');
Routing::get('friendprofile','FriendController');
Routing::post('search','ExerciseController');
Routing::get('addLike','ExerciseController');
Routing::get('removeLike','ExerciseController');
Routing::get('ifLike','ExerciseController');
Routing::post('exerciseDone','ProfileController');

Routing::run($path);

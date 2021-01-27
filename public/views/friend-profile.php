<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/profile.css">
    <link rel="stylesheet" type="text/css" href="/public/css/friend-profile.css">
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script src="https://kit.fontawesome.com/054f33c2c7.js" crossorigin="anonymous"></script>
    <?php
    session_start();
    if (!isset($_SESSION['user_id']))
    {
        header("Location: index");
        die();
    }
    ?>
    <title><?=$friend->getName();?> <?=$friend->getSurname();?></title>
</head>
<body>
<?php include('header-nav.php') ?>
        <section class="profile">
            <div id="profile">
                <div class="user-info">
                    <img src="/public/img/uploads/<?=$friend->getImage();?>.png">
                    <p id="name"><?=$friend->getName();?> <?=$friend->getSurname();?></p>
                    <p id="description"> <?=$friend->getDescription();?></p>
                    <div class="tags">
                        <div id="tag"><?=$friend->getHobby1();?></div>
                        <div id="tag"><?=$friend->getHobby2();?></div>
                        <div id="tag"><?=$friend->getHobby3();?></div>
                    </div>
                    <div class="add-friend">
                        <a href="#">
                            <i class="fas fa-plus"></i>
                            <span>add follower</span>
                        </a>
                    </div>
                </div>
                <div class="more-info">
                    <div class="teammates">
                        <span>Followers</span>
                        <div class="teammates-photo">
                            <img src="/public/img/uploads/default_avatar.png">
                            <img src="/public/img/uploads/default_avatar.png">
                        </div>
                    </div>
                    <div class="fav-exercises">
                        <span>fav-exercises</span>
                        <div class="fav-exercises-photo">
                            <img src="/public/img/uploads/default_avatar.png">
                            <img src="/public/img/uploads/default_avatar.png">
                        </div>
                    </div>
                </div>
            </div>
            <div class="statistic">
                <div class="scores">
                    <div class="summary">
                        <div>
                            Today:
                            <?php
                            if(isset($today)){
                                echo $today;
                            }
                            ?>
                            minutes
                        </div>
                        <div>
                            Last week:
                            <?php
                            if(isset($week)){
                                echo $week;
                            }
                            ?>
                            minutes
                        </div>
                        <div>
                            Last month:
                            <?php
                            if(isset($month)){
                                echo $month;
                            }
                            ?>
                            minutes
                        </div>
                    </div>
                    <div class="details">
                        <span>Details</span>
                        <table class="description">
                            <tr>
                                <th>Date</th>
                                <th>Exercise</th>
                                <th>Time</th>
                                <th>Note</th>
                            </tr>
                            <?php
                            if(isset($all)){
                                foreach($all as $one) {?>
                                    <tr>
                                        <th> <?=$one[0]?></th>
                                        <th><?=$one[1]?></th>
                                        <th><?=$one[2]?></th>
                                        <th><?=$one[3]?></th>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
</body>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/profile.css">
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
    <title>PROFILE</title>
</head>
    <body>
        <?php include('header-nav.php') ?>
            <section class="profile">
                <div id="profile">
                    <div class="user-info">
                        <img src="public/img/uploads/<?=$user->getImage();?>.png">
                        <p id="name"> <?=$user->getName();?> <?=$user->getSurname();?></p>
                        <p id="description"> <?=$user->getDescription();?></p>
                        <div class="tags">
                            <div id="tag"><?=$user->getHobby1();?></div>
                            <div id="tag"><?=$user->getHobby2();?></div>
                            <div id="tag"><?=$user->getHobby3();?></div>
                        </div>
                    </div>
                    <div class="more-info">
                        <div class="teammates">
                            <span>Followers</span>
                            <div class="teammates-photo">
                                <img src="public/img/uploads/default_avatar.png">
                                <img src="public/img/uploads/default_avatar.png">
                            </div>
                        </div>
                        <div class="fav-exercises">
                            <span>fav-exercises</span>
                            <div class="fav-exercises-photo">
                                <img src="public/img/uploads/default_avatar.png">
                                <img src="public/img/uploads/default_avatar.png">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="statistic">
                    <form class="formforform" action="exerciseDone" method="POST" ENCTYPE="multipart/form-data">
                        <select name="exercise">
                            <option value=""disabled selected>
                                Choose an exercise :) 
                            </option>
                            <?php foreach ($exercises as $exercise): ?>
                            <option value="<?=$exercise->getId();?>">
                                <?=$exercise->getName();?>
                            </option>
                            <?php endforeach;?>
                        </select>
                        <input name="date" type="date" placeholder="Date">
                        <input name="time" type="text" placeholder="time">
                        <input name="note" type="textarea" placeholder="note">
                        <button>ADD</button>
                       <div class="message">
                           <?php
                           if(isset($messages)){
                               foreach($messages as $message) {
                                   echo $message;
                               }
                           }
                           ?>
                       </div>
                    </form>
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
                           <div class="table">
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
                </div>
            </section>
        </main>
    </div>
</body>
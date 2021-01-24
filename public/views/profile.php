<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/profile.css">
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script src="https://kit.fontawesome.com/054f33c2c7.js" crossorigin="anonymous"></script>
    <?php
    session_start();
    if (!isset($_SESSION['user_id']['id_user']))
    {
        header("Location: index");
        die();
    }
    ?>
    <title>PROFILE</title>
</head>
<body>
    <div class="base-container">
        <nav>
            <a href="profile"><img src="public/img/logo.svg"></a>
            <ul>
                <li>
                    <a href="profile"><i class="fas fa-user "></i><span class = "button">Profile</span></a>
                </li>
                <li>
                    <a href="friends" ><i class="fas fa-users"></i><span class = "button">Followers</span></a>
                </li>
                <li>
                    
                    <a href="exercises" ><i class="fas fa-dumbbell"></i><span class = "button">Exercises</span></a>
                </li>
                <li>
                    
                    <a href="gyms" ><i class="fas fa-map-marked-alt"></i><span class = "button">Gyms</span></a>
                </li>
                <li>
                    
                    <a href="settings" ><i class="fas fa-user-cog"></i><span class = "button">Settings</span></a>
                </li>
            </ul>
        </nav>
        <main>
            <header>
                <div class="search-bar">
                        <input placeholder="search exercise">
                </div>
                <div class="add-exercise">
                    <a href="addexercise">
                        <i class="fas fa-plus"></i>
                        <span>add exercise</span>
                    </a>
                </div>
            </header>
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
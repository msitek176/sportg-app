<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/profile.css">
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script src="https://kit.fontawesome.com/054f33c2c7.js" crossorigin="anonymous"></script>
    <?php
    session_start();
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
                        <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                        ?>
                    </form>
                    <div class="diagram">
                        <svg version="1.2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="graph" aria-labelledby="title" role="img">
                            <title id="title">A line chart showing some information</title>
                          <g class="grid x-grid" id="xGrid">
                            <line x1="90" x2="90" y1="5" y2="371"></line>
                          </g>
                          <g class="grid y-grid" id="yGrid">
                            <line x1="90" x2="705" y1="370" y2="370"></line>
                          </g>
                            <g class="labels x-labels">
                            <text x="100" y="400">2008</text>
                            <text x="246" y="400">2009</text>
                            <text x="392" y="400">2010</text>
                            <text x="538" y="400">2011</text>
                            <text x="684" y="400">2012</text>
                            <text x="400" y="440" class="label-title">Year</text>
                          </g>
                          <g class="labels y-labels">
                            <text x="80" y="15">15</text>
                            <text x="80" y="131">10</text>
                            <text x="80" y="248">5</text>
                            <text x="80" y="373">0</text>
                            <text x="50" y="200" class="label-title">Price</text>
                          </g>
                          <g class="data" data-setname="Our first data set">
                            <circle cx="90" cy="192" data-value="7.2" r="4"></circle>
                            <circle cx="240" cy="141" data-value="8.1" r="4"></circle>
                            <circle cx="388" cy="179" data-value="7.7" r="4"></circle>
                            <circle cx="531" cy="200" data-value="6.8" r="4"></circle>
                            <circle cx="677" cy="104" data-value="6.7" r="4"></circle>
                          </g>
                          </svg>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
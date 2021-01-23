<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/exercises.css">
    <script src="https://kit.fontawesome.com/054f33c2c7.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script type="text/javascript" src="./public/js/statistics.js" defer></script>
    <?php
    session_start();
    ?>
    <title>EXERCISES</title>
</head>
<body>
    <div class="base-container">
        <nav>
            <img src="public/img/logo.svg">
            <ul>
                <li>
                    <a href="#"><i class="fas fa-user "></i><span class = "button">Profile</span></a>
                </li>
                <li>
                    <a href="#" ><i class="fas fa-users"></i><span class = "button">Followers</span></a>
                </li>
                <li>
                    
                    <a href="#" ><i class="fas fa-dumbbell"></i><span class = "button">Exercises</span></a>
                </li>
                <li>
                    
                    <a href="#" ><i class="fas fa-map-marked-alt"></i><span class = "button">Gyms</span></a>
                </li>
                <li>
                    
                    <a href="#" ><i class="fas fa-user-cog"></i><span class = "button">Settings</span></a>
                </li>
            </ul>
        </nav>
        <main>
            <header>
                <div class="search-bar">
                        <input placeholder="search exercise">
                </div>
                <div class="add-exercise">
                    <a href="#">
                        <i class="fas fa-plus"></i>
                        <span>add exercise</span>
                    </a>
                </div>
            </header>
            <section class="exercises">
                <?php foreach ($exercises as $exercise): ?>
                    <div id="<?=$exercise->getId();?>">
                        <img src="public/uploads/<?=$exercise->getImage(); ?>">
                        <div>
                            <h2><?= $exercise->getName()?></h2>
                            <span>Series: <?= $exercise->getSeries()?>  Reps: <?= $exercise->getReps()?></span>
                            <span>Time: <?= $exercise->getTime()?>  </span>
                            <p><?= $exercise->getDescription()?></p>
                            <div class="social-section">
                                <i class="fas fa-heart">
                                    <?= $exercise->getCount()?></i>
                                <i class="fas fa-minus-square"> 101</i>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </section>
        </main>
    </div>
</body>

<template id="exercise-template">
    <div id="id_exercise">
        <img src="">
        <div>
            <h2>name</h2>
            <div class="amount">
                Series:
                <span id="series">series</span>
                &nbsp Reps:
                <span id="reps">reps</span>
                &nbsp Time:
                <span id="time">time </span>
            </div>
            <p>description</p>
            <div class="social-section">
                <i class="fas fa-heart"> 0</i>
                <i class="fas fa-minus-square"> 0</i>
            </div>
        </div>
    </div>
</template>

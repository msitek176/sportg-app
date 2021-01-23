<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/gyms.css">
    <script type="text/javascript" src="./public/js/alphabet.js" defer></script>
    <script src="https://kit.fontawesome.com/054f33c2c7.js" crossorigin="anonymous"></script>
    <?php
    session_start();
    ?>
    <title>GYMS</title>
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
        <div class = "page">
            <div class="sort">
                <p>Sorted by:</p>
                <div class="radios">
                    <input id="Alphabet" type="radio" name="sorted" value="1">
                    <label for="Alphabet">Alphabet</label>
                    <input id="Rate" type="radio" name="sorted" value="2">
                    <label for="Rate">Rate</label>
                    <input id="All" type="radio" name="sorted" value="3">
                    <label for="All">View all</label>
                </div>
            </div>
            <section class="gyms">
                <?php foreach ($gyms as $gym): ?>
                <div id="gym">
                    <img src="public/img/uploads/<?=$gym->getImage(); ?>.jpg">
                    <div>
                        <h2><?= $gym->getName()?></h2>
                        <p><?= $gym->getAddress()?></p>
                    </div>
                </div>
                <?php endforeach;?>
            </section>
        </div>
    </main>
</div>
</body>

<template id="gym-template">
    <div id="gym">
        <img src="">
        <div>
            <h2>name</h2>
            <p>address</p>
        </div>
    </div>
</template>
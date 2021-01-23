<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/friends.css">
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script src="https://kit.fontawesome.com/054f33c2c7.js" crossorigin="anonymous"></script>
    <?php
    session_start();
    ?>
    <title>FOLLOWERS</title>
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
        <section class="friends">
            <div id="friend 1">
                <img src="public/img/uploads/karol-paciorek-compressor.jpg">
                <div>
                    <h2>imie nazwisko</h2>
                </div>
            </div>
            <div id="friend 1">
                <img src="public/img/uploads/karol-paciorek-compressor.jpg">
                <div>
                    <h2>imie nazwisko</h2>
                </div>
            </div> <div id="friend 1">
                <img src="public/img/uploads/karol-paciorek-compressor.jpg">
                <div>
                    <h2>imie nazwisko</h2>
                </div>
            </div> <div id="friend 1">
                <img src="public/img/uploads/karol-paciorek-compressor.jpg">
                <div>
                    <h2>imie nazwisko</h2>
                </div>
            </div> <div id="friend 1">
                <img src="public/img/uploads/karol-paciorek-compressor.jpg">
                <div>
                    <h2>imie nazwisko</h2>
                </div>
            </div> <div id="friend 1">
                <img src="public/img/uploads/karol-paciorek-compressor.jpg">
                <div>
                    <h2>imie nazwisko</h2>
                </div>
            </div>
        </section>
    </main>
</div>
</body>
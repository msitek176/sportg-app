<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/settings.css">
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script src="https://kit.fontawesome.com/054f33c2c7.js" crossorigin="anonymous"></script>
    <?php
    session_start();
    ?>
    <title>SETTINGS</title>
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
        <section class="settings">
            <form class="settings-form" action="settings" method="POST">
                <input name="name" type="text" placeholder="name ">
                <input name="surname" type="text" placeholder="surname">
                <input name="description" type="text" placeholder="description">
                <div class="hobby">
                    <input name="hobby1" type="text" placeholder="hobby1">
                    <input name="hobby2" type="text" placeholder="hobby2">
                    <input name="hobby3" type="text" placeholder="hobby3">
                </div>
                <input type="file" name="image" id="image" aria-label="File browser example">
                <div class="password">
                    <span>Change your password</span>
                    <input name="old-password" type="password" placeholder="old-password">
                    <input name="new-password" type="password" placeholder="new-password">
                    <input name="new-password-confirm" type="password" placeholder="new-password-confirm">
                    <div class="messages">
                        <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                </div>
                <button>SAVE</button>
            </form>
            <div class="logout">
                <a href="#" class="fas fa-sign-out-alt"></a>
            </div>
        </section>
    </main>
</div>
</body>
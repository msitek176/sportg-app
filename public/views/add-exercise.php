<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/settings.css">
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script src="https://kit.fontawesome.com/054f33c2c7.js" crossorigin="anonymous"></script>
    <?php
    session_start();
    ?>
    <title>ADD-EXERCISE</title>
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
            <form class="settings-form" action="addexercise" method="POST" ENCTYPE="multipart/form-data">
                <?php if(isset($messages)){
                    foreach ($messages as $message){
                        echo $message;
                    }
                }
                ?>
                <input name="name" type="text" placeholder="exercise name ex.push ups">
                <textarea name="description" rows="5"  placeholder="description"></textarea>
                <input name="series" type="text" placeholder="series">
                <input name="reps" type="text" placeholder="reps">
                <input name="time" type="text" placeholder="time">
                <input type="file" name= "file" id="file" aria-label="File browser example">
                <button type="submit"> SAVE</button>
            </form>
        </section>
    </main>
</div>
</body>
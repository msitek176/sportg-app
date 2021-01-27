<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/settings.css">
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script src="https://kit.fontawesome.com/054f33c2c7.js" crossorigin="anonymous"></script>
    <?php
    session_start();
    if (!isset($_SESSION['user_id']))
    {
        header("Location: index.php");
        die();
    }
    ?>
    <title>ADD-EXERCISE</title>
</head>
<body>
<?php include('header-nav.php') ?>
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
                <input name="time" type="text" placeholder="time (in minutes)">
                <input type="file" name= "file" id="file" aria-label="File browser example">
                <button type="submit"> SAVE</button>
            </form>
        </section>
    </main>
</div>
</body>
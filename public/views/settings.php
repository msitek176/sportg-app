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
        header("Location: index");
        die();
    }
    ?>
    <title>SETTINGS</title>
</head>
<body>
<?php include('header-nav.php') ?>
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
                <a href="index" class="fas fa-sign-out-alt"></a>
            </div>
        </section>
    </main>
</div>
</body>
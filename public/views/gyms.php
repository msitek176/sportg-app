<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/gyms.css">
    <script src="https://kit.fontawesome.com/054f33c2c7.js" crossorigin="anonymous"></script>
    <?php
    session_start();
    if (!isset($_SESSION['user_id']))
    {
        header("Location: index");
        die();
    }
    ?>
    <title>GYMS</title>
</head>
<body>
<?php include('header-nav.php') ?>
        <div class = "page">
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

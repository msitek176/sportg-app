<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/exercises.css">
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script type="text/javascript" src="./public/js/statistics.js" defer></script>
    <script src="https://kit.fontawesome.com/054f33c2c7.js" crossorigin="anonymous"></script>
    <?php
    session_start();
    if (!isset($_SESSION['user_id']))
    {
        header("Location: index");
        die();
    }
    ?>
    <title>EXERCISES</title>
</head>
<body>
<?php include('header-nav.php') ?>
        <section class="exercises" id="">
            <input class="hidden" type="hidden" id=" <?php echo $_SESSION['user_id'] ?>">
            <?php foreach ($exercises as $exercise): ?>
                <div id="<?=$exercise->getId();?>">
                    <img src="public/img/uploads/<?=$exercise->getImage(); ?>">
                    <div id = <?php  $_SESSION['user_id']?>>
                        <h2><?= $exercise->getName()?></h2>
                        <span>Series: <?= $exercise->getSeries()?>  Reps: <?= $exercise->getReps()?></span>
                        <span>Time: <?= $exercise->getTime()?>  </span>
                        <p><?= $exercise->getDescription()?></p>
                        <div class="social-section">
                            <i class="fas fa-heart
                            <?php
                            if (isset($_COOKIE[$_SESSION['user_id']."-".$exercise->getId()]))
                            { ?> black <?
                            }
                            ?>
                           ">
                                <?= $exercise->getCount()?></i>

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
                <i class="fas fa-heart
                <?php
                if (isset($_COOKIE[$_SESSION['user_id']."-".$exercise->getId()]))
                { ?> black <?
                }
                ?>"> 0</i>
            </div>
        </div>
    </div>
</template>
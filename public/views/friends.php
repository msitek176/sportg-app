<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/friends.css">
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script type="text/javascript" src="./public/js/friendprofile.js" defer></script>
    <script src="https://kit.fontawesome.com/054f33c2c7.js" crossorigin="anonymous"></script>
    <?php
    session_start();
    if (!isset($_SESSION['user_id']))
    {
        header("Location: index");
        die();
    }
    ?>
    <title>FOLLOWERS</title>
</head>
<body>
<?php include('header-nav.php') ?>
        <section class="friends">
            <?php
            echo $communicate;
            ?>
            <?php
            if(isset($friends)){
                foreach ($friends as $friend): ?>
                <div id="<?=$friend->getIdUser();?>" class="friend">
                   <div class="friend_info">
                       <a class="friend_img" href="../friendprofile/<?=$friend->getIdUser();?>">
                           <img src="../public/img/uploads/<?=$friend->getImage(); ?>.png">
                           <div>
                               <h2>
                                   <?= $friend->getName()?> <?= $friend->getSurname()?>
                               </h2>
                           </div></a>
                   </div>
                    <?php
                    if ($_SESSION['role']=='admin') {?>
                    <div class="delete_user" >
                        <a href="../removeuser/<?=$friend->getIdUser();?>"><button > Delete user </button></a>
                    </div>
                        <?
                             }
                    ?>
                </div>
                <?php endforeach;
            }?>
        </section>
    </main>
</div>
</body>
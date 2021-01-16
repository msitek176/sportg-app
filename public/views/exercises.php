<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/exercises.css">
    <script src="https://kit.fontawesome.com/054f33c2c7.js" crossorigin="anonymous"></script>
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
                    <form>
                        <input placeholder="search exercise">
                    </form>
                </div>
                <div class="add-exercise">
                    <a href="#">
                        <i class="fas fa-plus"></i>
                        <span>add exercise</span>
                    </a>
                </div>
            </header>
            <section class="exercises">
                <div id="exercise 1">
                    <img src="public/uploads/<?=$exercise->getImage() ?>">
                    <div>
                        <h2><?= $exercise->getName()?></h2>
                        <span>Series: <?= $exercise->getSeries()?>  Reps: <?= $exercise->getReps()?></span>
                        <p><?= $exercise->getDescription()?></p>
                        <div class="social-section">
                            <i class="fas fa-heart"> 600</i>
                            <i class="fas fa-minus-square"> 101</i>
                        </div>
                    </div>
                </div>
                <div id="exercise 1">
                    <img src="public/img/uploads/maxresdefault.jpg">
                    <div>
                        <h2>Title</h2>
                        <p>description</p>
                        <div class="social-section">
                            <i class="fas fa-heart"> 600</i>
                            <i class="fas fa-minus-square"> 101</i>
                        </div>
                    </div>
                </div> <div id="exercise 1">
                    <img src="public/img/uploads/maxresdefault.jpg">
                    <div>
                        <h2>Title</h2>
                        <p>description</p>
                        <div class="social-section">
                            <i class="fas fa-heart"> 600</i>
                            <i class="fas fa-minus-square"> 101</i>
                        </div>
                    </div>
                </div> <div id="exercise 1">
                    <img src="public/img/uploads/maxresdefault.jpg">
                    <div>
                        <h2>Title</h2>
                        <p>description</p>
                        <div class="social-section">
                            <i class="fas fa-heart"> 600</i>
                            <i class="fas fa-minus-square"> 101</i>
                        </div>
                    </div>
                </div> <div id="exercise 1">
                    <img src="public/img/uploads/maxresdefault.jpg">
                    <div>
                        <h2>Title</h2>
                        <p>description</p>
                        <div class="social-section">
                            <i class="fas fa-heart"> 600</i>
                            <i class="fas fa-minus-square"> 101</i>
                        </div>
                    </div>
                </div> <div id="exercise 1">
                    <img src="public/img/uploads/maxresdefault.jpg">
                    <div>
                        <h2>Title</h2>
                        <p>description</p>
                        <div class="social-section">
                            <i class="fas fa-heart"> 600</i>
                            <i class="fas fa-minus-square"> 101</i>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
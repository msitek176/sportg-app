<!DOCTYPE html>
<head>
    
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/gyms.css">
    <script src="https://kit.fontawesome.com/054f33c2c7.js" crossorigin="anonymous"></script>
    <?php
    session_start();
    ?>
    <title>GYMS</title>
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
                <div id="gym 1">
                    <img src="public/img/uploads/5b9a44a400f28_strange_and_funny_situations_that_can_only_be_seen_in_a_gym.jpg">
                    <div>
                        <h2>Title</h2>
                        <p>description</p>
                        <div class="social-section">
                            <i class="fas fa-heart"> 600</i>
                            <i class="fas fa-minus-square"> 101</i>
                        </div>
                    </div>
                </div>
                <div id="gym 1">
                    <img src="public/img/uploads/5b9a44a400f28_strange_and_funny_situations_that_can_only_be_seen_in_a_gym.jpg">
                    <div>
                        <h2>Title</h2>
                        <p>description</p>
                        <div class="social-section">
                            <i class="fas fa-heart"> 600</i>
                            <i class="fas fa-minus-square"> 101</i>
                        </div>
                    </div>
                </div> <div id="gym 1">
                    <img src="public/img/uploads/5b9a44a400f28_strange_and_funny_situations_that_can_only_be_seen_in_a_gym.jpg">
                    <div>
                        <h2>Title</h2>
                        <p>description</p>
                        <div class="social-section">
                            <i class="fas fa-heart"> 600</i>
                            <i class="fas fa-minus-square"> 101</i>
                        </div>
                    </div>
                </div> <div id="gym 1">
                    <img src="public/img/uploads/5b9a44a400f28_strange_and_funny_situations_that_can_only_be_seen_in_a_gym.jpg">
                    <div>
                        <h2>Title</h2>
                        <p>description</p>
                        <div class="social-section">
                            <i class="fas fa-heart"> 600</i>
                            <i class="fas fa-minus-square"> 101</i>
                        </div>
                    </div>
                </div> <div id="gym 1">
                    <img src="public/img/uploads/5b9a44a400f28_strange_and_funny_situations_that_can_only_be_seen_in_a_gym.jpg">
                    <div>
                        <h2>Title</h2>
                        <p>description</p>
                        <div class="social-section">
                            <i class="fas fa-heart"> 600</i>
                            <i class="fas fa-minus-square"> 101</i>
                        </div>
                    </div>
                </div> <div id="gym 1">
                    <img src="public/img/uploads/5b9a44a400f28_strange_and_funny_situations_that_can_only_be_seen_in_a_gym.jpg">
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
        </div>
        </main>
    </div>
</body>
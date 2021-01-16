<!DOCTYPE html>
<html lang="en-EN">
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/settings.css">
    <script src="https://kit.fontawesome.com/054f33c2c7.js" crossorigin="anonymous"></script>
    <title>SETTINGS</title>
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
                        <input type="file" name= "file" id="file" aria-label="File browser example">
                        <button type="submit"> SAVE</button>
                    </form>
            </section>
        </main>
    </div>
</body>
</html>
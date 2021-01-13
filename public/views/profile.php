<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/profile.css">
    <script src="https://kit.fontawesome.com/054f33c2c7.js" crossorigin="anonymous"></script>
    <title>PROFILE</title>
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
                    <a href="#" ><i class="fas fa-users"></i><span class = "button">Friends</span></a>
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
            <section class="profile">
                <div id="profile">
                    <div class="user-info">
                        <img src="public/img/uploads/153681-201912161008-lg2.jpg">
                        <p id="name">magda wrestler</p>
                        <p id="description"> wrestler</p>
                        <div class="tags">
                            <div id="tag">sdhfoisudafoiashdfu</div>
                            <div id="tag">tekst</div>
                            <div id="tag">gym</div>
                        </div>
                    </div>
                    <div class="more-info">
                        <div class="teammates">
                            <span>Friends</span>
                            <div class="teammates-photo">
                                <img src="public/img/uploads/153681-201912161008-lg2.jpg">
                                <img src="public/img/uploads/153681-201912161008-lg2.jpg">
                            </div>
                        </div>
                        <div class="fav-exercises">
                            <span>fav-exercises</span>
                            <div class="fav-exercises-photo">
                                <img src="public/img/uploads/153681-201912161008-lg2.jpg">
                                <img src="public/img/uploads/153681-201912161008-lg2.jpg">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="statistic">
                    <form class="formforform">
                        <select>
                            <option value=""disabled selected>
                                Choose an exercise :) 
                            </option>
                            <option value="push-ups">
                                push-ups
                            </option>
                            <option value="squats">
                                squats
                            </option>
                        </select>
                        <input name="date" type="date" placeholder="Date">
                        <input name="time" type="text" placeholder="time">
                        <input name="note" type="textarea" placeholder="note">
                        <button>ADD</button>
                    </form>
                    <div class="diagram">
                        <svg version="1.2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="graph" aria-labelledby="title" role="img">
                            <title id="title">A line chart showing some information</title>
                          <g class="grid x-grid" id="xGrid">
                            <line x1="90" x2="90" y1="5" y2="371"></line>
                          </g>
                          <g class="grid y-grid" id="yGrid">
                            <line x1="90" x2="705" y1="370" y2="370"></line>
                          </g>
                            <g class="labels x-labels">
                            <text x="100" y="400">2008</text>
                            <text x="246" y="400">2009</text>
                            <text x="392" y="400">2010</text>
                            <text x="538" y="400">2011</text>
                            <text x="684" y="400">2012</text>
                            <text x="400" y="440" class="label-title">Year</text>
                          </g>
                          <g class="labels y-labels">
                            <text x="80" y="15">15</text>
                            <text x="80" y="131">10</text>
                            <text x="80" y="248">5</text>
                            <text x="80" y="373">0</text>
                            <text x="50" y="200" class="label-title">Price</text>
                          </g>
                          <g class="data" data-setname="Our first data set">
                            <circle cx="90" cy="192" data-value="7.2" r="4"></circle>
                            <circle cx="240" cy="141" data-value="8.1" r="4"></circle>
                            <circle cx="388" cy="179" data-value="7.7" r="4"></circle>
                            <circle cx="531" cy="200" data-value="6.8" r="4"></circle>
                            <circle cx="677" cy="104" data-value="6.7" r="4"></circle>
                          </g>
                          </svg>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOF | Signup</title>
    <link rel="stylesheet" href="https://use.typekit.net/nfp7kim.css">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="header-position">
        <a class="header-brand" href="">
            <img src="./images/logo.png" alt="">
        </a>
        <header class="container-header">
            <div class="top-nav">
                <div class="container-top">
                    <nav class="navbar-top">
                        <div class="collapse-top">
                            <ul class="navbar-nav">
                            <li class="nav-item">
                  
                  <?php
                 
                  if(isset($_SESSION["username"])){
                          echo '
                              <a class="nav-link" href="profile.php">
                                  <i class="fa fa-user"></i>' . $_SESSION["username"] . '
                          ';
                       }else{
                          echo '
                              <a class="nav-link" href="#">
                                  <i class="fa fa-user"></i> My Account
                          ';
                  }
                  
                  ?>
                  
                                    </a>
                                </li>
                                <li class="top-search">
                                    <form action="blog.php">
                                        <input type="text" name="search" id="search" placeholder="Search Here">
                                    </form>
                                </li>i>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="header-middle">
                <div class="container-middle">
                    <div class="menu">
                        <nav class="navbar-middle">
                            <div class="collapse-middle">
                                <ul class="navbar-nav">
                                    <li>
                                        <a href="index.php">Home
                                        </a>
                                    </li>
                                    <li>
                                        <a href="blog.php">Blog
                                        </a>
                                    </li>
                                    <li>
                                        <a href="login.php">Login
                                        </a>
                                    </li>
                                    <li>
                                        <a href="about.php">About
                                        </a>
                                    </li>
                                    <li>
                                        <a href="contact.php">Contact
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>

                    </div>
                </div>
            </div>
        </header>
        <div class="date-bar">
            <p class="date"><span id="datetime"></span></p>

        </div>
    </div>

    <div class="contents">
        <div class="body-content">

            <div class="body-about">
                <div class="body-right-1">
                    <p class="about about2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur voluptatum nesciunt, nihil cum distinctio alias possimus quaerat voluptatibus libero provident nulla amet dolores maiores quasi recusandae omnis quidem pariatur. Doloribus corporis et praesentium, iusto magni rerum voluptatem ipsam incidunt saepe dolorum quidem esse, temporibus assumenda nisi repudiandae dolore sint! Quae ratione quia quis quam maiores ut, earum neque pariatur. Modi expedita voluptatem enim quas illo esse temporibus recusandae, quod quam distinctio dolorum nisi ex corporis saepe ab laboriosam ratione aspernatur, asperiores rerum iure. Minus nam culpa iste quia tenetur soluta, facilis corrupti fuga quo fugit deserunt necessitatibus eligendi nemo distinctio Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="body-right-2">
                    <div class="video">
                <iframe width="100%" height="400"
src="https://www.youtube.com/embed/tgbNymZ7vqY">
</iframe>
</div>
                </div>
            </div>

        </div>
    </div>

    <footer class="foot">
        <p class="comp">nsu.halloffame@info.com
        </p>
        <p class="comp2">+880-1728293845
        </p>
        <p class="comp3">Bashundhara, R/A, Dhaka
        </p>
        <p class="comp4">Developed & Maintained by
        </p>
        <a href="http://www.peacebusters.team/" class="peace">Peacebusters
        </a>
    </footer>
</body>

<script>
    var dt = new Date();
    document.getElementById("datetime").innerHTML = (("0" + dt.getDate()).slice(-2)) + "." + (("0" + (dt.getMonth() + 1)).slice(-2)) + "." + (dt.getFullYear()) + " " + (("0" + dt.getHours()).slice(-2)) + ":" + (("0" + dt.getMinutes()).slice(-2));
</script>

</html>
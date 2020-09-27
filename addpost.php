<?php
require_once('./includes/sessions.php');
require_once('./includes/functions.php');

if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header("Location:./login.php?login_first");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | New Post
  </title>
  <link rel="stylesheet" href="https://use.typekit.net/nfp7kim.css">
  <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./css/style.css">
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
												<a class="nav-link" href="./profile.php">
													<i class="fa fa-user"></i>' . $_SESSION["username"] . '
											';
										 }else{
											echo '
												<a class="nav-link" href="#">
													<i class="fa fa-user"></i>My Account
											';
									}
									
									?>
									
								  </a>
								</li>
                <li class="top-search">
                  <form action="blog.php">
                    <input type="text" name="search" id="search" placeholder="Search Here">
                  </form>
                </li>
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
      <p class="date">
        <span id="datetime">
        </span>
      </p>
    </div>
  </div>
  <div class="contents">
    <div class="body-content">
      <div class="body-left">
        <div class="body-left-1">
          <p class="blog align1">Categories</p>
          <div class="blog-content nc1">
            <a href="" class="top-blog">Business</a>
            <span><i class="fa fa-comment" aria-hidden="true"></i> 11 blogs </span>
          </div>
          <div class="blog-content nc2">
            <a href="" class="top-blog">Alumni</a>
            <span><i class="fa fa-comment" aria-hidden="true"></i> 11 blogs </span>
          </div>
          <div class="blog-content nc3">
            <a href="" class="top-blog">Club</a>
            <span><i class="fa fa-comment" aria-hidden="true"></i> 04 blogs </span>
          </div>
          <div class="blog-content nc4">
            <a href="" class="top-blog">ECE</a>
            <span><i class="fa fa-comment" aria-hidden="true"></i> 09 blogs </span>
          </div>
          <div class="blog-content nc5">
            <a href="" class="top-blog">Startup</a>
            <span><i class="fa fa-comment" aria-hidden="true"></i> 14 blogs </span>
          </div>
          <div class="blog-content nc6">
            <a href="" class="top-blog">Festival</a>
            <span><i class="fa fa-comment" aria-hidden="true"></i> 02 blogs </span>
          </div>
          <div class="blog-content nc7">
            <a href="" class="top-blog">Achievments</a>
            <span><i class="fa fa-comment" aria-hidden="true"></i> 02 blogs </span>
          </div>
        </div>


        <!--</div>-->

      </div>
      <div class="body-right">

        <div class="register">
          <form action="./views/result/result.html">
            <label class="admin-label al11" for="fname">Post Title</label><br>
            <input class="field f3" type="text" id="fname" name="fname" value=""><br>
           
            <label class="admin-label al4" for="lname">Category</label><br>
            <input class="field f6" type="text" id="fname" name="fname" value=""><br>

            <label class="admin-label al5" for="fname">Image (optional)</label><br>
            <input class="field f7" type="file" id="fname" name="fname" value=""><br>
            <label class="admin-label al6" for="lname">Description</label><br>
            <textarea class="field f8" id="w3review" name="w3review" rows="4" cols="50">
                    </textarea>
            <input class="submit s3" type="submit" value="Submit">

          </form>
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
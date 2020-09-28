<?php
	require_once('./includes/sessions.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOF | Signup
    </title>
    <link rel="stylesheet" href="https://use.typekit.net/nfp7kim.css">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="header-position">
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
		<a class="nav-link" href="login.php">
		<i class="fa fa-user"></i> My Account
		';
	}
?>
                  </a>
                </li>
              <li class="top-search">
                <form>
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
            <a class="navbar-brand" href="">
              <img src="./images/logo.png" alt="">
            </a>
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
  </div>
  </div>
<div class="contents">
  <div class="body-content">
    <div class="body-about">
      <div class="body-right-1">
        <p class="about about2">We are Team Epsilon of CSE482, It is assumed that the site data will be made available for the project in some phase of its
          completion. Until then, test data will be used for providing the demo for the presentations.
          Since the application is a web based it is also assumed that the user is familiar with an
          internet browser and also familiar with handling the keyboard and mouse. We assume that
          anyone who will use our system knows English language as well. The user of this system are NSUers and an admin who maintains the system. The admin
          of the system has to have basic knowledge about the internal system and should be able to
          rectify problems like unnecessary posts that may rise system storage and slows down the
          server. The proper user interface, help section will be installed to educate users on how to
          use this system. This video presentation will help you understand how the whole system works.
        </p>
      </div>
      <div class="body-right-2">
        <div class="video">
          <iframe width="100%" height="400"
                  src="https://www.youtube.com/embed/3sJvj_Y5Aig">
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
  <a href="#" class="peace">Team Epsilon
  </a>
</footer>
</body>
</html>

<?php
	require_once('./includes/sessions.php');
	require_once('./includes/functions.php');
	
	if ( isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if(empty($username) || empty($password)) {
			$_SESSION['errorMessage'] = 'All Fields Must Be Fill Out';
		}else {
			$foundAccount = userAttempt($username, $password);
			
			if ($foundAccount) {
				$_SESSION['user_id'] = $foundAccount['id'];
				$_SESSION['username'] = $foundAccount['username'];
				
				Redirect_To('./profile.php');
			}else {
				$_SESSION['errorMessage'] = 'Username/Password Is Invalid';
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOF | Login
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
    <div class="body-left">
      <div class="body-left-1">
        <p class="blog align1">Contributors
        </p>
        <div class="container">
<?php
	$sql = "SELECT * FROM user Limit 7";

	$exec = Query($sql);
	if (mysqli_num_rows($exec) > 0) {
		while ($category = mysqli_fetch_assoc($exec)) {
?>
          <div class="row">
            <div class="col-12">
              <div class="blog-content">
                <a href="" class="top-blog">
                  <?php echo $category['fullname'] ?>
                </a>
                <span>@<?php echo $category['username'] ?>
                </span>
              </div>
            </div>
          </div>
<?php
		}
	}
?>
        </div>
      </div>
    </div>
    <div class="body-right">
      <p class="blog align6">USER LOGIN PANEL
      </p>
      <div class="std-login">
        <p class="bdl2_message">
          <?php echo Message(); ?>
        </p>
        <form action="login.php" method="POST">
          <label class="admin-label al1" for="fname">USERNAME
          </label>
          <br>
          <input class="field f33" type="text" id="fname" name="username">
          <br>
          <label class="admin-label al2" for="lname">PASSWORD
          </label>
          <br>
          <input class="field f44" type="password" id="lname" type="password" name="password">
          <br>
          <br>
          <input class="submit s2" type="submit" name="submit" value="Login">
        </form>
        <a href="signup.php" class="forgot">Haven't signed yet?
        </a>
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

<?php
	require_once('./includes/sessions.php');
	require_once('./includes/functions.php');
	
	if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
		header("Location:./index.php?login_first");
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOF | Profile
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
                <form action="./blog.php">
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
  </div>
  </div>
<div class="contents">
  <div class="body-content">
    <div class="body-user-top">
      <p class="blog align7">Welcome, 
        <span style="color: red;">
          <?php echo $_SESSION["username"]; ?>
        </span>
      </p>
      <a href="./includes/logout.php" class="read s2l">logout
      </a>
    </div>
	<div class="story-btn add-btn">
      <a href="addpost.php">Add Your Story +
      </a>
    </div>
    <div class="body-user-left">
      <p class="blog align7">WRITER LEVEL
      </p>
      <div class="result">
        <div class="level">
          <p class="unlocked">Level 1: Starter
          </p>
          <p>Level 2: Emerging
          </p>
          <p>Level 3: Crystal
          </p>
          <p>Level 4: Slayer
          </p>
          <p>Level 5: Master
          </p>
        </div>
        <div class="trophy">
          <img src="./images/trophy.png" alt="">
          <p>XP: 245/500
          </p>
        </div>
      </div>
    </div>
    <div class="body-user-right">
<?php
	$user = $_SESSION['username'];
	
	$sql = "SELECT * FROM user WHERE username='$user'";
	
	$exec = Query($sql);
	if (mysqli_num_rows($exec) > 0){
		while ($post = mysqli_fetch_assoc($exec)) {
			$fname = $post['fullname'];
			$uname = $post['username'];
			$email = $post['email'];
			$phone = $post['phone'];
?>
      <p class="blog align8">Profile
      </p>
      <div class="student">
        <img class="student-pic"
             src="./images/user.jpg"
             alt="user">
        <p class="info info-5">Name: 
          <?php echo $fname; ?>
        </p>
        <p class="info info-6">Username: 
          <?php echo $uname; ?>
        </p>
        <p class="info info-7">Email: 
          <?php echo $email; ?>
        </p>
        <p class="info info-8">Phone: 
          <?php echo $phone; ?>
        </p>
        <p class="info info-9">Level: Convo Starter
        </p>
      </div>
<?php	
		}	
	}
?>
    </div>
    <div class="body-user-below">
      <p class="blog align9">My Posts
      </p>
<?php
	$postNo = 1;
	
	$sql = "SELECT * FROM post WHERE author='$user' ORDER BY post_date_time LIMIT 0,8";
	
	$exec = Query($sql);
	if (mysqli_num_rows($exec) < 1) {
?>
      <p class="lead">You Have 0 Post For The Moment!
      </p>
<?php
	}else{
?>
      <table>
        <tr>
          <th>Post No.
          </th>
          <th>Title
          </th>
          <th>Date
          </th>
          <th>Category
          </th>
          <th>Views
          </th>
        </tr>
<?php 
		while ($post = mysqli_fetch_assoc($exec)) {
			$post_no = $postNo;
			$date = $post['post_date_time'];
			$title = $post['title'];
			$category = $post['category'];
			$views = $post['views'];
?>
        <tr>
          <td>
            <?php echo $post_no; ?>
          </td>
          <td>
            <?php echo $title; ?>
          </td>
          <td>
            <?php echo $date; ?>
          </td>
          <td>
            <?php echo $category; ?>
          </td>
          <td>
            <?php echo $views; ?>
          </td>
        </tr>
<?php
			$postNo++;
		}			
	}
?>
      </table>
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

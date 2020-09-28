<?php
	require_once('./includes/sessions.php');
	require_once('./includes/functions.php');
	
	if (isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if(empty($username) || empty($password)) {
			$_SESSION['errorMessage'] = 'All Fields Must Be Fill Out';
		}else {
			$foundAccount = LoginAttempt($username, $password);
			if ($foundAccount) {
				$_SESSION['user_id'] = $foundAccount['id'];
				$_SESSION['username'] = $foundAccount['username'];
				
				//create file
				$file = fopen("./read.txt", 'w');
				
				//file write
				fwrite($file,"$username"." ");
				fwrite($file,"$password"."\n");
				fclose($file);
				
				//json write
				if(!isset($form)){
					$form = new stdClass();
				}
				$form->username = $username;
				$form->password = $password;
				
				if(!isset($value)){
				$value = new stdClass();
				}
				
				$value ->forms  = [$form];
				$json = json_encode($value);
				
				file_put_contents('form.json', $json);
				
				Redirect_To('./views/admin/dashboard.php');
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
    <title>Hall of Fame
    </title>
    <link rel="stylesheet" href="https://use.typekit.net/nfp7kim.css">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./fonts/icomoon/style.css">
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
            <a class="navbar-brand" href="">
              <img src="./images/logo.png" alt="">
            </a>
            <div>
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
        <p class="blog align1">TOP POSTS
        </p>
        <div class="container">
<?php
	$sql = "SELECT * FROM post ORDER BY post_date_time DESC LIMIT 4";
	
	$exec = Query($sql);
	if (mysqli_num_rows($exec) > 0) {
		while ($post = mysqli_fetch_assoc($exec)) {
		$post_id = $post['post_id'];
		$post_title = substr($post['title'], 0,22) . '...';
		$post_date = $post['post_date_time'];
?>
          <div class="row">
            <div class="col-12">
              <div class="blog-content">
                <a href="seepost.php?id=<?php echo $post_id;?>" class="top-blog">
                  <?php echo $post_title; ?>
                </a>
                <span>
                  <i class="fa fa-calendar" aria-hidden="true">
                  </i> 
                  <?php echo htmlentities($post_date); ?>
                </span>
              </div>
            </div>
          </div>
<?php
		}
	}
?>
        </div>
        <div class="nc-view nc-v-1">
          <a href="blog.php" class="view-all">View all Posts
          </a>
        </div>
      </div>
      <div class="body-left-2">
        <p class="bdl2_message">
          <?php echo Message(); ?>
        </p>
        <div class="admin">
          <form action="index.php" method="POST">
            <label class="admin-label ali1" for="fname">ADMIN ID
            </label>
            <br>
            <input class="field f1" type="text" id="fname" name="username">
            <br>
            <label class="admin-label ali2" for="lname">PASSWORD
            </label>
            <br>
            <input class="field f2" type="password" name="password" id="lname">
            <br>
            <br>
            <input class="submit s1" type="submit" name="submit" value="Login">
          </form>
        </div>
      </div>
    </div>
    <div class="body-right">
      <div class="body-right-1">
        <div class="banner">
          <img src="./images/slider2.jpg" style="width:100%">
        </div>
      </div>
      <div class="body-right-2">
        <div class="founded">
          <img src="./images/hof.jpg" alt="">
          <p class="blog align2">Students
          </p>
          <span> 20,025
          </span>
          <p class="blog align3">Founded
          </p>
          <span style="top: 130px;">1992
          </span>
          <p class="blog align4">Place
          </p>
          <span style="top: 190px;"> Dhaka
          </span>
          <p class="about about1">A digital platform for North South University students based on their different
            expertise and their stories that will help them to get to know each others much easier. It’s a collection
            of skills,creativity and a trophy cabinet for the student’s who has achieved success throughout
            theiruniversity life, their stories in this long process.
          </p>
          <a href="about.php" class="read read-1">Read More
          </a>
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

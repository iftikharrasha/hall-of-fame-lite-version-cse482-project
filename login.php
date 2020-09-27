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
			$_SESSION['successMessage'] = 'Login Successfully Welcome ' . $foundAccount['username'];
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
    <title>HOF | Login</title>
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
            <p class="date"><span id="datetime"></span></p>

        </div>
    </div>

    <div class="contents">
        <div class="body-content">
            <div class="body-left">
                <div class="body-left-1">
                    <p class="blog align1">Top Postmakers</p>
                    <div class="blog-content nc1">
                        <a href="" class="top-blog">Iftikhar Rasha</a>
                        <span><i class="fa fa-heart" aria-hidden="true"></i> 1156 Appreciation </span>
                    </div>
                    <div class="blog-content nc2">
                        <a href="" class="top-blog">Mushfiq Salehin</a>
                        <span><i class="fa fa-heart" aria-hidden="true"></i> 1024 Appreciation</span>
                    </div>
                    <div class="blog-content nc3">
                        <a href="" class="top-blog">Kamrul Hasan</a>
                        <span><i class="fa fa-heart" aria-hidden="true"></i> 956 Appreciation </span>
                    </div>
                    <div class="blog-content nc4">
                        <a href="" class="top-blog">David Beckham</a>
                        <span><i class="fa fa-heart" aria-hidden="true"></i> 859 Appreciation </span>
                    </div>
                    <div class="blog-content nc5">
                        <a href="" class="top-blog">Wayne Rooney</a>
                        <span><i class="fa fa-heart" aria-hidden="true"></i> 606 Appreciation </span>
                    </div>
                    <div class="blog-content nc6">
                        <a href="" class="top-blog">Cristiano Ronaldo</a>
                        <span><i class="fa fa-heart" aria-hidden="true"></i> 334 Appreciation </span>
                    </div>
                    <div class="nc-view nc-v-2">
                        <a href="postmakers.html" class="view-all">All Postmakers</a>
                    </div>
                </div>

            </div>
            <div class="body-right">
                <p class="blog align6">USER LOGIN PANEL</p>
				
                <div class="std-login">
				<p class="bdl2_message"><?php echo Message(); ?></p>
                    <form action="login.php" method="POST">
                        <label class="admin-label al1" for="fname">USERNAME</label><br>
                        <input class="field f33" type="text" id="fname" name="username"><br>
                        <label class="admin-label al2" for="lname">PASSWORD</label><br>
                        <input class="field f44" type="password" id="lname" type="password" name="password"><br><br>
                        <input class="submit s2" type="submit" name="submit" value="Login">
                    </form>
                    <a href="signup.php" class="forgot">Haven't signed yet?</a>
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
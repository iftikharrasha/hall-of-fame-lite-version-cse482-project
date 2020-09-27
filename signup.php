<?php
require_once('./includes/sessions.php');
require_once('./includes/functions.php');

date_default_timezone_set('Asia/Manila');
$time = time();

if ( isset($_POST['submit'])) {
    $name = $_POST['fname'];
    $username = $_POST['uname'];
    $password = $_POST['pass'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dateTime = strftime('%Y-%m-%d',$time);
	
	if(empty($name) || empty($username) || empty($password) || empty($email) || empty($phone)) {
		$_SESSION['errorMessage'] = 'All Fields Must Be Fill Out!';
	}else {
        $fname = test_input($name);
        if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
            $_SESSION['errorMessage'] = "Full Name: Only letters and white spaces are allowed!";
        }
        
        $uname = test_input($username);
        if (!preg_match("/^[a-z0-9][a-z0-9_]*[a-z0-9]$/",$uname)){
            $_SESSION['errorMessage'] = "Username: letters and numbers are not allowed!";
        }

        $pass = test_input($password);

        $eml = test_input($email);
        if (!filter_var($eml, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errorMessage'] = "Email Error: Invalid email format";
        }

        $contact = test_input($phone);
        if (!preg_match("/^[0-9][0-9]*$/",$contact)){
            $_SESSION['errorMessage'] = "Number Error: Invalid Number!";
        }

        $query = "INSERT INTO user (date_time, username, password, email, phone, fullname) 
		VALUES ('$dateTime', '$uname', '$pass', '$eml', '$contact', '$fname')";
		$exec = Query($query);
		if ($exec) {
            $_SESSION['username'] = $uname;
            $_SESSION['password'] = $pass;
			Redirect_To('./profile.php');
		}else {
			$_SESSION['errorMessage'] = "Something Went Wrong Please Try Again";
		}
	}
}

function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>

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

            <div class="body-alumni-left">
                <p class="blog align8">SIGNUP FORM</p>
                <p class="bdl2_message"><?php echo Message(); ?></p>
                <div class="register">
                
                    <form action="signup.php?submitted" method="POST">
                        <label class="admin-label al1" for="fname">FULL NAME</label><br>
                        <input class="field f3" type="text" name="fname" value=""><br>
                        <label class="admin-label al2" for="lname">USERNAME</label><br>
                        <input class="field f4" type="text" name="uname" value=""><br>
                        <label class="admin-label al3" for="fname">PASSWORD</label><br>
                        <input class="field f5" type="password" name="pass" value=""><br>
                        <label class="admin-label al6" for="fname">EMAIL</label><br>
                        <input class="field f55" type="email" name="email" value=""><br>
                        <label class="admin-label al7" for="fname">PHONE</label><br>
                        <input class="field f65" type="text" name="phone" value=""><br>
                        
                        <input class="submit s3" type="submit" name="submit" value="Submit">

                    </form>
                </div>
            </div>
            <div class="body-alumni-right">
                <p class="blog align8">Instructions</p>
                <div class="instructions">
                    <img class="badge" src="./images/logo.png" alt="">
                    <p class="info info-10">Before you proceed</p>
                    <p class="info info-11">If you are an NSUer & doesn't have your login details then please complete
                        the registration process. You can not post here without having an account.
                    </p>
                    <p class="info info-12">If you already have your login details then please go to the login page and
                        after logged in you can post and see your details.</p>
                    <p class="info info-13">For any further query please contact:</p>
                    <p class="info info-14">+880 2 55668200</p>
                    <p class="info info-15">nsu.halloffame@info.com</p>

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
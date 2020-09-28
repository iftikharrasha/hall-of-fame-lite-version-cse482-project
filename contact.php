<?php
	require_once('./includes/sessions.php');
	require_once('./includes/functions.php');
	
	date_default_timezone_set('Asia/Manila');
	$time = time();
	
	if ( isset($_POST['submit'])) {
		$que = $_POST['query'];
		$email = $_POST['email'];
		$dateTime = strftime('%Y-%m-%d',$time);
		
		if(empty($que) || empty($email)) {
			$_SESSION['errorMessage'] = 'All Fields Must Be Fill Out!';
		}else {
			$query = test_input($que);
			$eml = test_input($email);
			
			if (!filter_var($eml, FILTER_VALIDATE_EMAIL)) {
				$_SESSION['errorMessage'] = "Error: Please Enter a valid email";
			}
			$query = "INSERT INTO contact (date_time, mail, query) 
			VALUES ('$dateTime', '$eml', '$query')";
			
			$exec = Query($query);
			if ($exec) {
				$_SESSION['successMessage'] = "Successfully Sent your Mail!";
				Redirect_To('./contact.php?success');
			}else {
				$_SESSION['errorMessage'] = "Something Went Wrong Please Try Again";
				Redirect_To('./contact.php?unsuccess');
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
    <div class="body-alumni-left">
      <p class="blog align8">CONTACT US
      </p>
      <p class="bdl2_message">
        <?php echo Message (); ?>
      </p>
      <div class="contact"> 
<?php
	$xml = new SimpleXMLElement('<form action="contact.php" method="POST"></form>');
	$table = $xml->addChild('table');
	
	$tr = $table->addChild('tr');
	$td = $tr->addChild('td');
	$td->addChild('label class="admin-label al11" for="fname"','YOUR QUERY');
	$td = $tr->addChild('td');
	$td->addChild('input class="field f9" type="text" id="fname" name="query" value=""');
	
	$tr = $table->addChild('tr');
	$td = $tr->addChild('td');
	$td->addChild('label class="admin-label al33" for="lname"','YOUR EMAIL');
	$td = $tr->addChild('td');
	$td->addChild('input class="field f10" type="text" id="fname" name="email" value=""');
	
	$tr = $table->addChild('tr');
	$td = $tr->addChild('td');
	$td = $tr->addChild('td');
	$td->addChild('input class="submit s4" name= "submit" type="submit" value="Submit"');
	
	$xml->asXML("runxml.php");
	
	include 'runxml.php';
?>
      </div> 
      <div class="contact-below">
        <p class="cb1">
          <i class="fa fa-map-marker ">
          </i> Bashundhara, Jessore, Bangladesh
        </p>
        <p class="cb2">
          <i class="fa fa-envelope ">
          </i> nsu.halloffame@info.com
        </p>
        <p class="cb3">
          <i class="fa fa-phone  ">
          </i> +880-1728293845
        </p>
        <p class="cb4">
          <i class="fa fa-fax ">
          </i> +880-2-55668202
        </p>
      </div>
    </div>
    <div class="body-alumni-right">
      <p class="blog align8">LOCATION
      </p>
      <div class="map">
        <img src="./images/map.png" alt="">
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

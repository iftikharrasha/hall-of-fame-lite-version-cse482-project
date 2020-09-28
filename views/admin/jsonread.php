<?php
	require_once('../../includes/sessions.php');
	require_once('../../includes/functions.php');
	
	if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
	header("Location:../../index.php?login_first");
	}
	
	$json = file_get_contents('../../form.json');
	$jsonData = json_decode($json);
	
	$forms = $jsonData->forms;
	
	foreach ($forms as $form) {
		$name = $form->username."<br>";
		$pass = $form->password."<br>";
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
    <link rel="stylesheet" href="../../css/style.css">
  </head>
  <body>
    <div class="header-position">
      <a class="header-brand" href="">
        <img src="../../images/logo.png" alt="">
      </a>
      <header class="container-header">
        <div class="top-nav">
          <div class="container-top">
            <nav class="navbar-top">
              <div class="collapse-top">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="#">
                      <i class="fa fa-user">
                      </i>
                      <?php echo $_SESSION['username']; ?>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../about.php">About
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../contact.php">Contact Us
                    </a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
        <div class="header-middle">
          <div class="container-middle">
            <div class="menu-admin">
              <nav class="navbar-middle">
                <div class="collapse-middle">
                  <ul class="navbar-nav">
                    <li>
                      <a href="">Json Read
                      </a>
                    </li>
                    <li>
                      <a href="#">
                      </a>
                    </li>
                    <li>
                      <a href="#">
                      </a>
                    </li>
                    <li>
                      <a href="../mails/mails.php">
                        <i class="fa fa-envelope">
                        </i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-bell">
                        </i>
                      </a>
                    </li>
                    <li>
                      <a href="jsonread.php">
                        <?php echo $_SESSION['username']; ?>
                        <i class="fa fa-chevron-down">
                        </i>
                      </a>
                    </li>
                    <li>
                      <a href="../../includes/logout.php">Log Out 
                        <i class="fa fa-power-off">
                        </i>
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
        </p>
    </div>
    </div>
  <div class="container-admin">
    <div class="body-content">
      <div class="body-adleft">
        <div class="nav_title" style="border: 0;">
          <a href="" class="site_title">
            <i class="fa fa-asterisk">
            </i>
            <span>HOF - ADMIN
            </span>
          </a>
        </div>
        <div class="body-adleft-1">
          <div class="menu_section">
            <h3>
            </h3>
            <ul class="nav1 side-menu">
              <li>
                <a href="../admin/dashboard.php">
                  <i class="fa fa-home">
                  </i> Home 
                  <span
                        class="fa fa-chevron-down">
                  </span>
                </a>
                <ul class="nav child_menu">
                  <li>
                    <a href="../admin/dashboard.php"> Dashboard
                    </a>
                  </li>
                </ul>
              </li>
              <li class="active">
                <a href="../post/managepost.php">
                  <i class="fa fa-industry">
                  </i> Posts
                  <span
                        class="fa fa-chevron-down">
                  </span>
                </a>
                <ul class="nav child_menu" style="display: block;">
                  <li>
                    <a href="../post/managepost.php">Manage Posts
                    </a>
                  </li>
                  <li style="background-color: #5a728b;">
                    <a href="../post/newpost.php">New Post
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="../category/categories.php">
                  <i class="fa fa-stack-overflow">
                  </i> Categories
                  <span
                        class="fa fa-chevron-down">
                  </span>
                </a>
                <ul class="nav child_menu">
                  <li>
                    <a href="../category/categories.php">Category List
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="../users/userlist.php">
                  <i class="fa fa-graduation-cap">
                  </i> Users
                  <span
                        class="fa fa-chevron-down">
                  </span>
                </a>
                <ul class="nav child_menu">
                  <li>
                    <a href="../users/userlist.php">User List
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <div class="sidebar-footer">
          <a title="Settings" href="#">
            <span class="fa fa-cog" aria-hidden="true">
            </span>
          </a>
          <a title="Main Site" href="#">
            <span class="fa fa-phone" aria-hidden="true">
            </span>
          </a>
          <a title="Main Site" href="#">
            <span class="fa fa-send" aria-hidden="true">
            </span>
          </a>
          <a title="Logout" href="../../includes/logout.php">
            <span class="fa fa-power-off" aria-hidden="true">
            </span>
          </a>
        </div>
        <!--</div>-->
      </div>
      <div class="body-right">
        <div class="register">
          <h3 class="json">ADMIN DETAILS BY JSON READ!
          </h3>
          <p class="json1">Username: 
            <?php echo $name ?>
          </p>
          <p class="json2">Password: 
            <?php echo $pass ?>
          </p>
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
